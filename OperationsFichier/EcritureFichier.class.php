<?php
require_once('LectureException.class.php');
class EcritureFichier{
    private $fichier;

    function __construct($n){
        if(!(file_exists($n))){
            throw new LectureException();
        }
        $this->fichier = fopen($n, "a");
    }

    function ecrire($ligne){
        if(fwrite($this->fichier, $ligne) == false) throw new LectureException();
    }

    function __destruct(){
        fclose($this->fichier);
    }
}
