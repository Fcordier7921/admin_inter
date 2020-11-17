<?php

require_once('connect.php');

class Modify extends Model{ 
        
    //add an intervention
    public function GetInter(){

        $ajouter = "UPDATE clients SET id_Clients = :id_Clients, Nom_Clients = :Nom_Clients, Prenom_Clients = :Prenom_Clients, adresse_Clients = :adresse_Clients, CP_Clients = :CP_Clients, Ville_Clients = :Ville_Clients WHERE id_Clients =:id_Clients'";
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