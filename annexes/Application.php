<?php 
require('./Requete.php');
require("./Controleur/ArticleController.php");
require("./Controleur/UtilisateurController.php");
require("./Controleur/CommentaireController.php");
require("./Controleur/CategorieController.php");
class Application {
   
// Demarrer l'application
    public static function run($url)
    {
        // On passe  l'url à l'objet Requete pour ressortir les paramettre http 
        // Et identifier le controller et l'action à executer
       $requete = new Requete();
       $requete->passer($url);
      
    //    On instancie le controller de la requete et on invoque la methode correspondante
       $controller = new $requete->controller();
       $methode = $requete->action;
       if (isset($requete->params['id'])) {
        //    Convertir léindentifiant en un entier
            $id = intval($requete->params['id']);
            // Appel de la méthode avec du parametre;
            $controller->$methode($id);
       }else{
        //    Appel de la methode sans parametre
           $controller->$methode();
       }
    }
}