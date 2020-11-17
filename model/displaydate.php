<?php

require_once('connect.php');

class displaydate extends Model{ 
        
    //add an intervention
    public function GetInter(){

        $ajouter = "SELECT date_intervention, type__intervention
        FROM intervention
        WHERE date_intervention IN($this->date)";
        $query =$this->_connexion->prepare($ajouter);
        $query->execute();
    }


}