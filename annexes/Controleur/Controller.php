<?php
class Controller{
    protected $model;
    protected $modelName;

    public function __construct()
    {
        $this->model = new $this->modelName();
    }
/**
     * Verrifier si un utilisateur est connecté ou non
     */

    public function est_connecter()
    {
        if(!isset($_SESSION)) session_start();
        if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
            return 1;
        } else {
            Http::redirect("index.php?controller=utilisateur&action=login");
        }
    }
    /**
     * Vérifier si est utilisateur est un administrateur ou non
     */
    public function est_admin()
    {
        if(!isset($_SESSION)) session_start();
        if (isset($_SESSION['user']) && ($_SESSION['user']['admin'] == 1)) {
            return 1;
        } else {
            Http::redirect("index.php?controller=article&action=index");
        }
    }
      /**
     * Permet de deconnecter un utilisateur
     */
    public function deconnecter()
    {
        session_unset();
        session_destroy();
        
        Http::redirect("index.php?controller=article&action=index");
    }

}