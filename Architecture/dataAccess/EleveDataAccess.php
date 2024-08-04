<?php
require_once 'BDConnexion.php';
require_once "model/exceptions/ConnexionException.php";
require_once "model/Eleve.php";
class EleveDataAccess{
    private $connexion;
    public function __construct() {
        $bdd = BDConnexion::getInstance();
        $this->connexion = $bdd->getConnection();
    }

    public function getAllEleves(){
        try{
            $query = 'SELECT * FROM eleve';
            $statement = $this->connexion->prepare($query);
            $statement->execute();
            $eleves = $statement->fetchAll(PDO::FETCH_ASSOC);
            $elevesResult = array();
            foreach($eleves as $eleve){
                $eleveModel = new Eleve($eleve["id"], $eleve["nom"], $eleve["dateDeNaissance"]);
                array_push($elevesResult,$eleveModel);
            }
            return $elevesResult;
        }catch(Exception $e){
            throw new ConnexionException($e->getMessage());
        }

    }

    public function __autoload($classe){
    }
}