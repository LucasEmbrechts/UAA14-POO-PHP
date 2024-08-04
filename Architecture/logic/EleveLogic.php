<?php
class EleveLogic{
    private $eleveDA;
    public function __construct() {
        $this->connexion = $bdd->getConnection();
    }

    public function getAllEleves(){
        try{
            $query = 'SELECT * FROM eleve';
            $statement = $this->connexion->prepare($query);
            $statement->execute();
            $eleves = $statement->fetchAll();
            return $eleves;
        }catch(Exception $e){
            throw new ConnexionException($e->getMessage());
        }

    }
}