<?php
require_once('./Controleur/Controller.php');
require_once('./Modele/Article.php');
require_once('./Renderer.php');
require_once('./Modele/Commentaire.php');
require_once('./Modele/Categorie.php');

class ArticleController extends Controller {
   //Le nom de la classe du model qui sera utiliser par ce controller
    protected $modelName = Article::class ;

   

    /**
     * La methode de la page d'accueil
     * On recupère tous les articles et on les affiche 
     */
    public function index()
    {
        // Recuperation des données depuis la base de données
            $articles = $this->model->recup_tous();

            $articles3 = $this->model->recup_tous("LIMIT 3");
            $categorie = New Categorie();
            $categories = $categorie->recup_tous();

            $pageTitre = "Accueil";
           
            Renderer::rendre("articles/index", compact("pageTitre","articles3",'articles','categories'));
        
    }

    /**
     * La methode de la page d'accueil du tableau du bord
     * On recupère tous les articles et les auteur et on les affiche 
     */
    public function adminindex()
    {
        $this->est_admin();

            $size = 5;
            $page= isset($_GET['page']) ? $_GET['page'] : 1;

            $offset = ($page - 1)* $size ;

            $info = $this->model->selectionne_tous($offset,$size);

            $articles = $info['data'];

            $nbreArticle = $info['nbreData'];

            $nbrePage = ceil($nbreArticle/$size);

            foreach($articles as $article){
                $user = new Utilisateur();
                $auteur = $user->afficherUn($article->id_aut);
                $article->nom_auteur = $auteur->prenom;
            }

            $pageTitre = "Gestion-article";

            Renderer::rendre("admin/articles/index", compact("pageTitre",'articles','nbrePage','page'));
        
    }
    /**
     * Permet de recuperer les infos d'un article et les afficher avec des commentaires liées
     * @param int $id
     */
    public function afficher($id)
    {
       $article = $this->model->afficher($id);

       // Commentaires et ses auteurs
       $comment = new Commentaire();
       $commentaires = $comment->recup_tous_avec_aut($id);

       $categorie = New Categorie();
       $categories = $categorie->recup_tous();

       $pageTitre = "Afficher";
       Renderer::rendre("articles/afficher",compact("article","pageTitre",'commentaires','categories'));
    }
    /**
     * Returne le formulaire de création d'un article
     */
    public function admin_creer()
    {
        $this->est_admin();

        $categorie = New Categorie();
        $categories = $categorie->recup_tous();
        $pageTitre = "Créer un article";
        Renderer::rendre("admin/articles/create",compact("pageTitre",'categories'));
    }
/**
 * Permet d'inserer les données d'un article dans la base de données
 */
    public function admin_inserer()
    {
        $this->est_admin();
        $erreurs = array();
        
        if (empty($_POST['titre'])) {
            array_push($erreurs, 'Le titre est demandé');
        }
        if (empty($_POST['contenu'])) {
            array_push($erreurs, 'Le contenu de l\'article est demandé');
        }
        if (!empty($_FILES['image']['name'])) {
            $image_name = time().'_'.str_replace(" ","_", $_FILES['image']['name']);

            $photo_temp = $_FILES['image']['tmp_name']; 

                $direction = "./public/images/articles/";
               $newdir = $direction.$image_name;

                $result = move_uploaded_file($photo_temp,$newdir);
    
           if ($result) {
               $_POST['image'] = $image_name;
           } else {
               array_push($erreurs,'Le chargement de l\'image à échoué');
           }
           
        }else {
            array_push($erreurs, 'Une image est demandée ');
        }
        
        if (empty($_POST['prix'])) {
            array_push($erreurs, 'Un prix du voyage est demandé');
        }
    
        if (empty($_POST['id_cat'])) {
            array_push($erreurs, 'Vueillez selectionné un pays');
        }

        if (count($erreurs) ===0) {
            $_POST['id_aut'] =intval($_POST['id_aut']); 
            $_POST['en_ligne'] = isset($_POST['en_ligne']) ? 1 : 0 ;
            $_POST['titre'] = htmlentities($_POST['titre']);
            $_POST['contenu'] = htmlentities($_POST['contenu']);
           
            $result = $this->model->inserer($_POST);
            unset($_SESSION['erreurs']);  
            unset($_SESSION['articles']);
   
            Http::redirect("index.php?controller=article&action=adminindex");
            exit();
            
        }else {
            $data['titre'] = $_POST['titre'];
            $data['contenu'] = $_POST['contenu'];
            $data['id_cat'] = $_POST['id_cat'];
            $data['prix'] = $_POST['prix'];
            $data['published'] = isset($_POST['en_ligne']) ? 1 : 0 ;
            $pageTitre ="";
            $this->session_erreur($erreurs,$data);
            Http::redirect("index.php?controller=article&action=admin_creer");
        }

    }
/**
     * Returne le formulaire de de modification d'un article
     */
    public function editer($id)
    {
        $this->est_admin();
        $article = $this->model->afficher($id);

        $categorie = New Categorie();
        $categories = $categorie->recup_tous();

        $pageTitre = "Mettre à jours un article";
        Renderer::rendre("admin/articles/edit",compact("pageTitre",'categories','article'));
    }
    /**
 * Permet de mettre à jour les données d'un article dans la base de données
 */
    public function mettre_a_jour()
    {
        $this->est_admin();

        $id = $_POST['id'];

        $erreurs = array();
        
        if (empty($_POST['titre'])) {
            array_push($erreurs, 'Le titre est demandé');
        }
        if (empty($_POST['contenu'])) {
            array_push($erreurs, 'Le contenu de l\'article est demandé');
        }
        if (!empty($_FILES['image']['name'])) {
            $image_name = time().'_'.str_replace(" ","_", $_FILES['image']['name']);

            $photo_temp = $_FILES['image']['tmp_name']; 

                $direction = "./public/images/articles/";
               $newdir = $direction.$image_name;

                $result = move_uploaded_file($photo_temp,$newdir);
    
           if ($result) {
               $_POST['image'] = $image_name;
           } else {
               array_push($erreurs,'Le chargement de l\'image à échoué');
           }
           
        }else {
            array_push($erreurs, 'Une image est demandée ');
        }
        
        if (empty($_POST['prix'])) {
            array_push($erreurs, 'Un prix du voyage est demandé');
        }
    
        if (empty($_POST['id_cat'])) {
            array_push($erreurs, 'Vueillez selectionné un pays');
        }

        if (count($erreurs) ===0) {
            unset($_POST['id']);
            $_POST['id_aut'] =intval($_POST['id_aut']); 
            $_POST['en_ligne'] = isset($_POST['en_ligne']) ? 1 : 0 ;
            $_POST['titre'] = htmlentities($_POST['titre']);
            $_POST['contenu'] = htmlentities($_POST['contenu']);
           
            $result = $this->model->mettre_a_jour($id,$_POST);

            unset($_SESSION['erreurs']);  
            unset($_SESSION['articles']);

            Http::redirect("index.php?controller=article&action=adminindex");
            exit();
            
        }else {
            $data['titre'] = $_POST['titre'];
            $data['contenu'] = $_POST['contenu'];
            $data['id_cat'] = $_POST['id_cat'];
            $data['prix'] = $_POST['prix'];
            $data['published'] = isset($_POST['en_ligne']) ? 1 : 0 ;

            $this->session_erreur($erreurs,$data);
            Http::redirect("index.php?controller=article&action=editer&id=$id");
        }
    }
    /**
     * Permet de supprimer un article grâce à son identifiant
     * @param int $id
     */
    public function supprimer($id)
    {
        $this->est_admin();
            $result = $this->model->supprimer($id);
            if ($result) {
                Http::redirect("index.php?controller=article&action=adminindex");
                exit();
            }else{
                $erreur = "Désolez! La suppression refusée.Un probleme";
                $this->session_erreur($erreur,[]);
                Http::redirect("index.php?controller=article&action=adminindex");
                exit();
            }

    }
    /**
     * Publier ou depublier un article gr^ce à son identifiant
     */
    public function publier($id)
    {
        $this->est_admin();
        $id = intval($id);
        $en_ligne = intval($_GET['en_ligne']);
        $result = $this->model->publier($id,$en_ligne);
        Http::redirect("index.php?controller=article&action=adminindex");
                exit();
    }

    /**
     * Récuperer les erreurs ou des données et de les inserer dans la session
     */
    public function session_erreur($erreurs,$data)
    {   
        if(!isset($_SESSION)) session_start();
        
        unset($_SESSION['erreurs']);  
        unset($_SESSION['articles']);
        if (count($erreurs) !=0) {
            $_SESSION['erreurs'] = $erreurs;
        }  
        if (count($data) !=0) {
            $_SESSION['articles'] = $data;
        }          
            // return 1;
    }


}