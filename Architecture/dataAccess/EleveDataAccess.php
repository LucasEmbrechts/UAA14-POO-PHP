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

    public function getEleveById($id){
        try{
            $query = 'SELECT * FROM eleve WHERE id=?';
            $statement = $this->connexion->prepare($query);
            $statement->bindValue(1, $id, PDO::PARAM_INT);
            $statement->execute();
            $eleve = $statement->fetch(PDO::FETCH_ASSOC);
            if($eleve == false) return null;
            return new Eleve($eleve["id"], $eleve["nom"], $eleve["dateDeNaissance"]);            
        }catch(Exception $e){
            throw new ConnexionException($e->getMessage());
        }
    }

    public function addEleve($eleve){
        try{
            $query = 'INSERT INTO eleve(nom, dateDeNaissance) values (?,?)';
            $statement = $this->connexion->prepare($query);
            $statement->bindValue(1, $eleve->nom, PDO::PARAM_STR);
            $statement->bindValue(2, $eleve->dateDeNaissance, PDO::PARAM_STR);
            $statement->execute();
            return $this->getEleveById($this->connexion->lastInsertId());
        }catch(Exception $e){
            throw new ConnexionException($e->getMessage());
        }
    }
}