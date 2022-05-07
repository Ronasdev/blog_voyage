<?php
require_once('./Controleur/Controller.php');
require_once('./Modele/Commentaire.php');

class CommentaireController extends Controller {
    protected $modelName = Commentaire::class ;

/**
     * Permet d'inserer un commentaire dans la base de données grâce à l'identifiant de l'article auquel il est lié
     * @param int $id
     */
    public function inserer($id)
    {
        $this->est_connecter();
        
        $id_art = intval($id);
        $data = $_POST;
        $result = $this->model->inserer($id_art,$data);
        if ($result) {
            $url = "index.php?controller=article&action=afficher&id=$id_art";
            Http::redirect($url);
        }
       
    }
}