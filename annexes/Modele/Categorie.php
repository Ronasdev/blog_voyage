<?php
require_once('./Modele/Modele.php');
class Categorie extends Modele{

    protected $table = "categories";

 /**
     * Récuperation de tous les categories des pays depuis la base de données
     */
    public function recup_tous()
    {
        $sql = "SELECT * FROM {$this->table} ORDER BY nom";

        $result = $this->pdo->prepare($sql);
        $result->execute();
        $data = $result->fetchAll();
       return $data;

    }

/**
 * Recupere un pays depuis la base de données 
 */
    public function afficherUn(int $id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = ? LIMIT 1";
        $result = $this->pdo->prepare($sql);
        $result->bindParam(1,$id);
        $result->execute();
        $data = $result->fetch();
        return $data;
    }
    /**
     * Inserer un pays dans la base données
     */
    public function inserer(array $data)
    {
        extract($data);

        $sql = "INSERT INTO {$this->table}(nom,description,date_create) VALUES(?,?,NOW())";
        $result = $this->pdo->prepare($sql);

        $result->bindParam(1,$nom);
        $result->bindParam(2,$description);
        $result->execute();
        
        return $result;
    }

/**
     * Mettre à jours un pays depuis la base grâce à son id
     * @param int $id
     * @param array $data
     * @return  $result
     */
    public function mettre_a_jour(int $id, array $data)
    {
        extract($data);

        $sql = "UPDATE {$this->table} SET nom=?,description=?,date_update=NOW() WHERE id = $id";
        $result = $this->pdo->prepare($sql);

        $result->bindParam(1,$nom);
        $result->bindParam(2,$description);
        $result->execute();
        
        return $result;
    }

 /**
     * Supprimer un article depuis la base grâce à son id
     * @param int $id
     * @return  $result
     * 
     */
    public function supprimer(int $id)
    {
        $sql = "DELETE FROM {$this->table} WHERE id = ? ";
        $result = $this->pdo->prepare($sql);
        $result->bindParam(1,$id);
        $result->execute();
        return $result;   
    }

}