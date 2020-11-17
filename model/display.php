<?php

require_once('connect.php');

class display extends Model{ 
    
    
    public function AffInter(){

        $ajouter = "INSERT * FROM intervention";
        $query =$this->_connexion->prepare($ajouter);
        $query->execute();
    }

    public function AffUser(){

        $ajouter = "INSERT * FROM user";
        $query =$this->_connexion->prepare($ajouter);
        $query->execute();
    }
}