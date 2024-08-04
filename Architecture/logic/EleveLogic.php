<?php
require_once 'dataAccess/EleveDataAccess.php';
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
}