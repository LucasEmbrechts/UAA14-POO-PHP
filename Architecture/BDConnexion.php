<?php
class BDConnexion {
    private static $instance = null;
    private $connection;
    private $host = 'localhost';
    private $username = '';
    private $password = '';
    private $database = 'archi';

    private function __construct() {
        try{
            $this->connection = new PDO("mysql:host=$this->host;dbname=$this->database", $this->username, $this->password);
            //On définit le mode d'erreur de PDO sur Exception
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e){
            throw new ConnexionException("Échec de la connexion : $e->getMessage()");
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new BDConnexion();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }

    private function __clone() {}

    private function __wakeup() {}
}
