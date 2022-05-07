<?php
require_once('./Modele/Modele.php');

class Utilisateur extends Modele{
    
    protected $table = "utilisateurs";

    // Verification de l'existance de l'utilisateur
    public function user_verify(string $email)
    {
        $sql = "SELECT * FROM {$this->table} WHERE email = ? LIMIT 1";

        $result = $this->pdo->prepare($sql);
        $result->bindParam(1,$email);
        $result->execute();
        $data = $result->fetch();

        if ($result->rowCount($data)) {
            return $data;
        }else{
            return null;
        }
    }

    // Enregistrer un nouveau utilisateur

    public function enregister(array $user)
    {
        extract($user);
        $sql = "INSERT INTO {$this->table}(nom,prenom,email,password,photo) VALUES(?,?,?,?,?)";
        $result = $this->pdo->prepare($sql);
        $result->bindParam(1,$nom);
        $result->bindParam(2,$prenom);
        $result->bindParam(3,$email);
        $result->bindParam(4,$password);
        $result->bindParam(5,$photo);
        $result->execute();
        return $result;
    }
     /**
     * Recuperer un utilisateur de la base gr^ce à son identifiant
     * @param int $id
     * @return object $data
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
     * Mettre à jours un utilisateur depuis la base grâce à son id
     * @param int $id
     * @param array $data
     * @return  $result
     */
    public function mettre_a_jour(int $id, array $data)
    {
        extract($data);

        $sql = "UPDATE {$this->table} SET nom=?,prenom=?,email=?,admin=?,photo=?,date_update=NOW() WHERE id = $id";
        $result = $this->pdo->prepare($sql);

        $result->bindParam(1,$nom);
        $result->bindParam(2,$prenom);
        $result->bindParam(3,$email);
        $result->bindParam(4,$admin);
        $result->bindParam(5,$photo);
        $result->execute();
        
        return $result;
    }

 /**
     * Supprimer un utilisateur depuis la base grâce à son id
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
     * Changer le role d'un utilisateur soit en administrateur soit en un visiteur
     * @param int $id
     * @param int $admin
     * @return  $result
     */
    public function changerRole($id,$admin)
    {
        $sql = "UPDATE {$this->table} SET admin=?,date_update=NOW() WHERE id = $id";
        $result = $this->pdo->prepare($sql);
        $result->bindParam(1,$admin);
        $result->execute();
        
        return $result;
    }


}