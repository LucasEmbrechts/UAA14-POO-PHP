<?php
class LecteurFichier{
    private $fichier;

    function __construct($n){
        if(!(file_exists($n))){
            throw new LectureException();
        }
        $this->fichier = fopen($n, "r");
    }

    function lireLigne(){
        if(!feof($this->fichier)) {
            return fgets($this->fichier);
        }
    }

    function encoreUneLigneALire(){
        return !feof($this->fichier);
    }

    function __destruct(){
        fclose($this->fichier);
    }
}
