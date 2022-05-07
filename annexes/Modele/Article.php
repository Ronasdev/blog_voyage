<?php
require_once('./Modele/Modele.php');

class Article extends Modele{
    protected $table = "articles";


    /**
     * Récuperation de tous les articles depuis la base de données
     */
    public function recup_tous()
    {
        $sql = "SELECT a.id id,c.id id_cat,a.id_aut id_aut,titre,contenu,image,prix, a.date_create date_create,nom  FROM {$this->table} a 
        INNER JOIN categories c ON a.id_cat = c.id WHERE en_ligne = 1 ORDER BY a.date_create DESC";

        $result = $this->pdo->prepare($sql);
        $result->execute();
        $data = $result->fetchAll();
       return $data;
    }
    
    /**
     * Récuperer un article grâce à son identifiant
     */
    public function afficher(int $id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = ? LIMIT 1";
        $result = $this->pdo->prepare($sql);
        $result->bindParam(1,$id);
        $result->execute();
        $data = $result->fetch();
        return $data;
    }
    /**
     * Inserer un article dans la table de base de données
     */
    public function inserer(array $data)
    {
        extract($data);

        $sql = "INSERT INTO {$this->table}(id_aut,id_cat,titre,contenu,image,prix,en_ligne,date_create) VALUES(?,?,?,?,?,?,?,NOW())";
        $result = $this->pdo->prepare($sql);

        $result->bindParam(1,$id_aut);
        $result->bindParam(2,$id_cat);
        $result->bindParam(3,$titre);
        $result->bindParam(4,$contenu);
        $result->bindParam(5,$image);
        $result->bindParam(6,$prix);
        $result->bindParam(7,$en_ligne);
        $result->execute();
        
        return $result;
    }
    /**
     * Mettre à jours un article depuis la base grâce à son id
     * @param int $id
     * @param array $data
     * @return  $result
     */
    public function mettre_a_jour(int $id, array $data)
    {
        extract($data);

        $sql = "UPDATE {$this->table} SET id_aut=?,id_cat=?,titre=?,contenu=?,image=?,prix=?,en_ligne=?,date_update=NOW() WHERE id = $id";
        $result = $this->pdo->prepare($sql);

        $result->bindParam(1,$id_aut);
        $result->bindParam(2,$id_cat);
        $result->bindParam(3,$titre);
        $result->bindParam(4,$contenu);
        $result->bindParam(5,$image);
        $result->bindParam(6,$prix);
        $result->bindParam(7,$en_ligne);
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
     /**
     * Publier ou depublier un article grâce à son identifiant
     */
    public function publier($id,$en_ligne)
    {
        $sql = "UPDATE {$this->table} SET en_ligne=?,date_update=NOW() WHERE id = $id";
        $result = $this->pdo->prepare($sql);
        $result->bindParam(1,$en_ligne);
        $result->execute();
        
        return $result;
    }
}