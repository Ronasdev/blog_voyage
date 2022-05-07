<?php
class Requete{
     /**
     * La classe requete analyse la requête du visiteur afin d'initialiser
     * le controleur et la methode à éxecuter en lui passant des parametres comme par exemple de l'id si 
     *ça existe  
     */
    public $controller = "ArticleController";
    public $action = "index";
    public $params = array();

 /**
     * Cette fonction passe l'url et fait tout le travail
     * @param String $url
     * @return void
     */
    public  function passer($url)
    {
       if (isset($url['controller']) && !empty($url['controller'])) {
           $this->controller = ucfirst($url['controller']) .'Controller';
       }
       if (isset($url['action']) && !empty($url['action'])) {
            $this->action = $url['action'];
        }
        if (isset($url['id']) && !empty($url['id'])) {
            $this->params['id'] = $url['id'];
        }
    }
}