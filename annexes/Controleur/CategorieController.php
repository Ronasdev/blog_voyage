<?php
require_once('./Controleur/Controller.php');
require_once('./Modele/Categorie.php');

class CategorieController extends Controller {
    protected $modelName = Categorie::class ;


   /**
     * La methode de la page de la liste des pays du tableau du bord
     * On recupère les infos de tous les categories du pays  et les affiche dans un tableau 
     */
    public function adminindex()
    {
        $this->est_admin();
        $this->est_admin();
        $size = 3;
        $page= isset($_GET['page']) ? $_GET['page'] : 1;

        $offset = ($page - 1)* $size ;

        $info = $this->model->selectionne_tous($offset,$size);

        $categories = $info['data'];

        $nbrecategorie = $info['nbreData'];

        $nbrePage = ceil($nbrecategorie/$size);

            $pageTitre = "Gestion-Catégories";

            Renderer::rendre("admin/pays/index", compact("pageTitre",'categories','nbrePage','page'));
        
    }
 /**
     * Returne le formulaire de création d'un pays
     */
    public function admin_creer()
    {
        $this->est_admin();
        $pageTitre = "Enregistrer un nouveau pays";
        Renderer::rendre("admin/pays/create",compact("pageTitre"));
    }

    /**
     * Permet d'inserer les données d'une categorie du pays dans la base de données
     */
    public function admin_inserer()
    {
        $this->est_admin();
        $erreurs = array();
        
        if (empty($_POST['nom'])) {
            array_push($erreurs, 'Le nom est demandé');
        }
        if (empty($_POST['description'])) {
            array_push($erreurs, 'La description du pays est demandée');
        }
       

        if (count($erreurs) ===0) {
            $_POST['nom'] = htmlentities($_POST['nom']);
            $_POST['description'] = htmlentities($_POST['description']);
            
    
           
            $result = $this->model->inserer($_POST);
            unset($_SESSION['erreurs']);  
            unset($_SESSION['pays']);
   
            Http::redirect("index.php?controller=categorie&action=adminindex");
            exit();
            
        }else {
            $data['nom'] = $_POST['nom'];
            $data['description'] = $_POST['description'];
            $pageTitre ="";
            $this->session_erreur($erreurs,$data);
            Http::redirect("index.php?controller=categorie&action=admin_creer");
        }

    }
    /**
 * Revoie le formulaire de la mise à jour du categorie du pays
 */
    public function editer($id)
    {
        $this->est_admin();
        $categorie = $this->model->afficherUn($id);

        $pageTitre = "Mettre à jours un Pays";
        Renderer::rendre("admin/pays/edit",compact("pageTitre",'categorie'));
    }

     /**
     * Mettre à jours une categorie du pays depuis la base grâce à son id
     */
    public function mettre_a_jour()
    {
        $this->est_admin();
        $id = intval($_POST['id']);

        $erreurs = array();
        
        if (empty($_POST['nom'])) {
            $erreurs['nom'] = 'Le nom est demandé';
        }
        if (empty($_POST['description'])) {
            $erreurs['description'] ='La description du pays est demandée';
        }

        if (count($erreurs) ===0) {
            unset($_POST['id']);
            $_POST['nom'] = htmlentities($_POST['nom']);
            $_POST['description'] = htmlentities($_POST['description']);
            // var_dump($_POST); var_dump($erreurs); die();
    
           
           if ( $this->model->mettre_a_jour($id,$_POST)) {
                unset($_SESSION['erreurs']);  
                unset($_SESSION['pays']);
    
                Http::redirect("index.php?controller=categorie&action=adminindex");
           }
            
        }else {
            $data['nom'] = $_POST['nom'];
            $data['description'] = $_POST['description'];

            $this->session_erreur($erreurs,$data);
            Http::redirect("index.php?controller=categorie&action=editer&id=$id");
        }
    }
     /**
     * Permet de supprimer une categorie du pays grâce à son identifiant
     * @param int $id
     */
    public function supprimer($id)
    {
        $this->est_admin();
         $id = intval($id);
            $result = $this->model->supprimer($id);
            if ($result) {
                Http::redirect("index.php?controller=categorie&action=adminindex");
            }else{
                $erreur = "Désolez! La suppression refusée.Un probleme";
                $this->session_erreur($erreur,[]);
                Http::redirect("index.php?controller=categorie&action=adminindex");
            }

    }

     /**
     * Récuperer les erreurs ou des données et de les inserer dans la session
     */
    public function session_erreur($erreurs,$data)
    {   
        if(!isset($_SESSION)) session_start();

        unset($_SESSION['erreurs']);  
        unset($_SESSION['pays']);
       
        if (count($erreurs) !=0) {
            $_SESSION['erreurs'] = $erreurs;
        }  
        if (count($data) !=0) {
            $_SESSION['pays'] = $data;
        }          
            // return 1;
    }

}