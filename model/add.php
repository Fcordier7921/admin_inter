<?php

require_once('connect.php');

class Add extends Model{ 
        
    //add an intervention
    public function GetInter(){

        $ajouter = "INSERT INTO intervention ( date_intervention, type__intervention, etage_intervention) 
            VALUES ($this->date, $this->type, $this->etage)";
        $query =$this->_connexion->prepare($ajouter);
        $query->execute();
    }

    public function GetUser(){

        $ajouter = "INSERT INTO user ( name_user, password_user, autoa_user) 
            VALUES ($this->user, $this->pass, $this->auto)";
        $query =$this->_connexion->prepare($ajouter);
        $query->execute();
    }
}