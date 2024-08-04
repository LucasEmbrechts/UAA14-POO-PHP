<?php
class Eleve
{
    private $id;
    private $nom;
    private $dateDeNaissance;
    function __construct($id, $nom, $dateDeNaissance)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->dateDeNaissance = $dateDeNaissance;
    }
    function __set($name, $value)
    {
        switch ($name) {
            case "id":
                $this->id = $value;
                break;
            case "nom":
                $this->nom = $value;
                break;
            case "dateDeNaissance":
                $this->dateDeNaissance = $value;
                break;
        }
    }

    function __get($name){
        switch ($name) {
            case "id":
                return $this->id;
            case "nom":
                return $this->nom;
            case "dateDeNaissance":
                return $this->dateDeNaissance;
        }
    }
}