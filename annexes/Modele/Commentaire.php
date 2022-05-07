<?php
require_once('./Modele/Modele.php');

class Commentaire extends Modele{
    
    protected $table = "commentaires";

/**
     * Récupere tous les commentaires liées à un article avec les auteurs
     */
    public function recup_tous_avec_aut($id)
    {
        $sql = "SELECT c.id id,contenu,nom,prenom,photo,DATE_FORMAT(c.date_create,'%d/%m/%Y à %Hh:%imin') date_create 
                FROM {$this->table} c INNER JOIN utilisateurs u ON c.id_aut = u.id WHERE id_art = {$id} ORDER BY c.date_create DESC";
        
        $result = $this->pdo->query($sql);
        $data = $result->fetchAll();

        return $data;
    }

/**
     * Inserer un commentaire d'un article dans la base de données
     */
    public function inserer(int $id,$data)
    {
        extract($data);
        $sql = "INSERT INTO  {$this->table}(id_art,contenu,id_aut) VALUES(?,?,?)";
        $result = $this->pdo->prepare($sql);
        
        $result->bindParam(1,$id);
        $result->bindParam(2,$contenu);
        $result->bindParam(3,$id_aut);
        $result->execute();

        return $result;
    }
}