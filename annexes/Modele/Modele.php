<?php
require('./Database.php');
class Modele {
    protected $pdo;
    protected $table;

    public function __construct()
    {
        /**
         * Récuperation de l'objet pdo
         */
        $pdo = new Database();
       $this->pdo = $pdo->getPdo();
    }

/**
     * Selectionner toutes les données de la base
     */
    function selectionne_tous($offset,$size){

        $sql1 ="SELECT COUNT(*) countData FROM $this->table "; 
        $resultCount =  $this->pdo->query($sql1);

           $tabCount = $resultCount->fetch();
           $nbrData = $tabCount->countData;

    
        $sql2 ="SELECT * FROM $this->table ORDER BY date_create DESC LIMIT $offset, $size"; 
      
            $req = $this->pdo->prepare($sql2);
            $req->execute();
            $data = $req->fetchAll();

            $result = [];
            $result['data'] = $data;
            $result['nbreData'] = $nbrData;
            
            return $result;
         
    
    }
}