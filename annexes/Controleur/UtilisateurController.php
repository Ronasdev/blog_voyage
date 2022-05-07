<?php
require_once('./Controleur/Controller.php');
require_once('./Modele/Utilisateur.php');
require_once('./Renderer.php');
require_once('./Http.php');

class UtilisateurController extends Controller {
    protected $modelName = Utilisateur::class ;


   /**
     * Renvoi le formulaire de connexion
     */

    public function login()
    {
       $pageTitre = "Formulaire";
       Renderer::rendre("utilisateurs/connexion",compact("pageTitre"));
    }
    /**
     * Permet de récupper les information de connexion de l'utilisateur et de le faire connecter grâce à la vérification de ces dernières
     */
    public function connect()
    {
       $user = array();
       $erreur =[];

       //S'il y a des informations envoyer par la methode post, on passe aux verifications
       if (isset($_POST) && !empty($_POST)) {
        //    On verifie si l'email existe est est valide
            if (!empty($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $user['email'] = trim($_POST['email']);       
            }else {
                $erreur['l_email'] = "L'email est invalide";
            }
        // On verifie si le mot de passe existe
            if (!empty($_POST['password'])) {
                $user['password'] = trim($_POST['password']);
            }else{
                $erreur['l_password'] = "Le champs du mot de passe est vide";
            }

        // ON verifie si l'utilisateur existe
            $info = [];
            if (isset($user['email']) && isset($user['password']) ) {
                $info = $this->model->user_verify($user['email']);
                if ($info == null) {
                    $erreur['not_found'] = "Cet t'ulisateur n'existe pas";
                }else{
                    //  Verification du mot de passe
                    if (password_verify($user['password'],$info->password)) {
                        $this->session([],$user);
                       
                    }else{
                        $erreur['not_login'] = "L'email ou mot de passe incorrect";
                    }
                }
                
            }
            // S'il n'y a aucune erreur on se connecte
            if (empty($erreur)) {
                $data['id'] = $info->id;
                $data['nom'] = $info->nom;
                $data['prenom'] = $info->prenom;
                $data['email'] = $info->email;
                $data['admin'] = $info->admin;

                $this->session([],$data);
                Http::redirect("index.php?controller=article&action=index");
            }else{
                $this->session($erreur,[]);
                Http::redirect("index.php?controller=utilisateur&action=login");
                exit();
              
            }  
       }
    }
    //Renvoie le formulaire d'insertion d'un utilisateur 
    public function editer_enregistrement()
    {
        $pageTitre = "Enregistrement";
       Renderer::rendre("utilisateurs/enregistrer",compact("pageTitre"));
    }
    
    /**
     * Permet d'enregistrer un utilisateur dans la base de données
     */
    public function register()
    {
        $user = array();
        $erreur =[];
        if (isset($_POST) && !empty($_POST)) {
            //    On verifie si le nom existe 
            if (!empty($_POST['nom'])) {
                $user['nom'] = trim($_POST['nom']);       
            }else {
                $erreur['nom'] = "Vueillez saisir votre nom";
            }
             //    On verifie si le prenom existe 
             if (!empty($_POST['prenom'])) {
                $user['prenom'] = trim($_POST['prenom']);       
            }else {
                $erreur['prenom'] = "Vueillez saisir votre prenom";
            }
         //    On verifie si l'email existe est est valide
             if (!empty($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $user['email'] = trim($_POST['email']); 
                $result = $this->model->user_verify($user['email']);
                if ($result) {
                    $erreur['user_found'] = "Un utilisateur avec cet email existe déjà";
                }
             }else {
                 $erreur['email'] = "L'email est invalide";
             }
         // On verifie si le mot de passe existe
             if (!empty($_POST['password'])) {
                 $user['password'] = trim($_POST['password']);
             }else{
                 $erreur['password'] = "Le champs du mot de passe est vide";
             }
            //  On verifie si c'est bien confirmé
             if (!empty($_POST['password-confirm']) && $_POST['password'] === $_POST['password-confirm']) {
                $user['password'] = password_hash($user['password'],PASSWORD_BCRYPT);
            }else{
                $erreur['password-confirm'] = "Les deux mots de passe ne correspondent pas";
            }
             
             
             // On traville sur la photo
             if (isset($_FILES['photo']) && !empty($_FILES['photo']['name'])) {
                $user['photo'] = $_FILES['photo'];

            }else{
                $erreur['photo'] = "Vous devez choisir une photo";
            }
            
            // Si il n'y a pas d'erreur on passe à l'enregistrement
            // var_dump($erreur); die();
            if (empty($erreur)) {
                $photo_name = $user['photo']['name'];
                $photo_name = time().'_'.str_replace(" ","_",$photo_name);
                $photo_temp = $user['photo']['tmp_name']; 

                $direction = "./public/images/users/";
               $newdir = $direction.$photo_name;
               $user['photo'] = $photo_name;
                move_uploaded_file($photo_temp,$newdir);
               if ($this->model->enregister($user)) {
                   session_start();
                   unset($_SESSION['erreurs']);

                   Http::redirect("index.php?controller=utilisateur&action=login");
               }
            }else{
                $this->session($erreur,[]);
                Http::redirect("index.php?controller=utilisateur&action=editer_enregistrement");
                exit();
            }
        }
    }

      /**
     * La methode de la page de la liste des utilisateur du tableau du bord
     * On recupère les infos de tous les utilisateur  et les affiche dans un tableau 
     */
    public function adminindex()
    {
        $this->est_admin();
        $size = 3;
        $page= isset($_GET['page']) ? $_GET['page'] : 1;

        $offset = ($page - 1)* $size ;

        $info = $this->model->selectionne_tous($offset,$size);

        $users = $info['data'];

        $nbreuser = $info['nbreData'];

        $nbrePage = ceil($nbreuser/$size);

            $pageTitre = "Gestion-utilisateurs";
        // var_dump($users); die();
            Renderer::rendre("admin/utilisateurs/index", compact("pageTitre",'users','nbrePage','page'));
        
    }
/**
 * Revoie le formulaire de la mise à jour de l'utilisateur
 */
    public function editer($id)
    {
        $this->est_admin();
        $user = $this->model->afficherUn($id);

        $pageTitre = "Mettre à jours un utilisateur";
        Renderer::rendre("admin/utilisateurs/edit",compact("pageTitre",'user'));
    }

     /**
     * Mettre à jours un utilisateur depuis la base grâce à son id
     */
    public function mettre_a_jour()
    {
        $id = intval($_POST['id']);

        $user = array();
        $erreur =[];
        if (isset($_POST) && !empty($_POST)) {
            //    On verifie si le nom existe 
            if (!empty($_POST['nom'])) {
                $user['nom'] = trim($_POST['nom']);       
            }else {
                $erreur['nom'] = "Vueillez saisir votre nom";
            }
             //    On verifie si le prenom existe 
             if (!empty($_POST['prenom'])) {
                $user['prenom'] = trim($_POST['prenom']);       
            }else {
                $erreur['prenom'] = "Vueillez saisir votre prenom";
            }
         //    On verifie si l'email existe est est valide
             if (!empty($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $user['email'] = trim($_POST['email']); 
                $result = $this->model->user_verify($user['email']);
                if ($result && $result->id != $id) {
                    $erreur['user_found'] = "Un autre utilisateur avec cet email existe déjà";
                }
             }else {
                 $erreur['email'] = "L'email est invalide";
             }
             
             
             // On traville sur la photo
             if (isset($_FILES['photo']) && !empty($_FILES['photo']['name'])) {
                $user['photo'] = $_FILES['photo'];

            }else{
                $erreur['photo'] = "Vous devez choisir une photo";
            }
            
            // Si il n'y a pas d'erreur on passe à l'enregistrement
            // var_dump($erreur); die();
            if (empty($erreur)) {
                $photo_name = $user['photo']['name'];
                $photo_name = time().'_'.str_replace(" ","_",$photo_name);
                $photo_temp = $user['photo']['tmp_name']; 

                $direction = "./public/images/users/";
               $newdir = $direction.$photo_name;
               $user['photo'] = $photo_name;

               $user['admin'] = $_POST['admin'];
                move_uploaded_file($photo_temp,$newdir);

                //Si la mise à jours s'est bien passée, on insert les données dans la session et on se redirrige vers la pâge d'accueil
               if ($this->model->mettre_a_jour($id,$user)) {
                    unset($_SESSION['erreurs']);  
                    $this->session([],$user);
                   Http::redirect("index.php?controller=utilisateur&action=adminindex");
               }
            }else{
                // s'il y a erreur on revient sur le formulaire
                $this->session($erreur,[]);
                Http::redirect("index.php?controller=utilisateur&action=editer&id=$id");
                exit();
            }
        }
    }

     /**
     * Permet de supprimer un utilisateur grâce à son identifiant
     * @param int $id
     */
    public function supprimer($id)
    {
        $this->est_admin();
            $result = $this->model->supprimer($id);
            if ($result) {
                Http::redirect("index.php?controller=utilisateur&action=adminindex");
                exit();
            }else{
                $erreur = "Désolez! La suppression refusée.Un probleme";
                $this->session($erreur,[]);
                Http::redirect("index.php?controller=utilisateur&action=adminindex");
                exit();
            }

    }
 /**
     * Changer le role d'un utilisateur soit en administrateur soit en un visiteur
     * @param int $id
     * @return void 
     */
    public function changerRole($id)
    {
        $this->est_admin();
        $id = intval($id);
        $admin = intval($_GET['admin']);
        $result = $this->model->changerRole($id,$admin);
        Http::redirect("index.php?controller=utilisateur&action=adminindex");
    }

     /**
     * Récuperer les erreurs ou des données et de les inserer dans la session
     */

    public function session($erreur, $user)
    {   
        if(!isset($_SESSION)) session_start();
        
        unset($_SESSION['erreurs']);  
        unset($_SESSION['user']);
        if (count($erreur) !=0) {
            $_SESSION['erreurs'] = $erreur;
        }
        if (count($user) !=0) {
            $_SESSION['user'] = $user;
        }      
            // return 1;
    }

}