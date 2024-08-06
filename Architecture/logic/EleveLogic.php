<?php
require_once 'dataAccess/EleveDataAccess.php';
require_once "model/exceptions/EleveInexistantException.php";
class EleveLogic{
    private $eleveDA;
    public function __construct() {
        $this->eleveDA = new EleveDataAccess();
    }

    public function getAllEleves(){
        try{
            $eleves = $this->eleveDA->getAllEleves();
            return $eleves;
        }catch(ConnexionException $e){
            throw new ConnexionException($e->getMessage());
        }
    }

    public function addEleve($eleve){
        try{
            return $this->eleveDA->addEleve($eleve);
        }catch(ConnexionException $e){
            throw new ConnexionException($e->getMessage());
        }
    }

    public function getEleveById($id){
        try{
            $eleve = $this->eleveDA->getEleveById($id);
            if($eleve == null){
                throw new EleveInexistantException("L'élève $id n'a pas été trouvé");
            }
            return $eleve;
        }catch(ConnexionException $e){
            throw new ConnexionException($e->getMessage());
        }
    }

    public function deleteEleve($id){
        try{
            $eleve = $this->getEleveById($id);
            $this->eleveDA->deleteEleve($id);
        }catch(ConnexionException $ec){
            throw new ConnexionException($ec->getMessage());
        }
    }
}