<?php
class Database{
    protected $host;
    protected $port;
    protected $dbname;
    protected $user;
    protected $password;

    /**
     * Initialisation des differentes valeur par defaut de connexion à la base de données
     */
    public function __construct()
    {
       $this->host = "localhost";
       $this->port = 3306;
       $this->dbname = "id18877773_projet_merveille";
       $this->user = "id18877773_merveille";
       $this->password = "~F*mz\bsA!3W?ctm"; 
    }

    /**
     * Obtention de connexion à la base de données
     */
    public  function getPdo()
    {
        //Gestion des erreurs
       try {
           $pdo = new PDO("mysql:host={$this->host};port={$this->port};dbname={$this->dbname};charset=utf8",$this->user,$this->password,[
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
                    ]);
           
       } catch (\Exception $e) {
           die('Erreur de connexion à la base de données :'.$e->getMessage());
       }
       return $pdo;
    }

}