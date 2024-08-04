<?php

class EleveDataAccess{
    private $connexion;
    public function __construct() {
        $bdd = BDConnexion::getInstance();
        $this->connexion = $bdd->getConnection();
    }

    
}