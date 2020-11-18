<?php
function connect() //fonction de connextion à la base
    {
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=inter;port=3306;charset=utf8', 'root', '');
            return $bdd;
         
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }
        
function refresh($url) //fonction de rafraichissement d'une page
    {
        echo '<script language="Javascript">
        document.location.replace("'.$url.'");
        </script>';
    }
 
    
function ajouterinter() //fonction ajout d'un véhicule
    {
        $bdd=connect();
        if(isset($_GET['ajouter']))
        {
            $ajouter = $bdd->prepare('INSERT INTO vehicules ( type_Vehicules, modele_Vehicules, immatriculation_Vehicules) 
            VALUES (:type_Vehicules, :modele_Vehicules, :immatriculation_Vehicules)');
            $ajouter->bindParam(':type_Vehicules', $_GET['type'],PDO::PARAM_STR);
            $ajouter->bindParam(':modele_Vehicules', $_GET['modele'],PDO::PARAM_STR);
            $ajouter->bindParam(':immatriculation_Vehicules', $_GET['immat'],PDO::PARAM_STR);
            $estceok=$ajouter->execute();
            
                if($estceok)
                {
                    echo 'votre enregistrement a été ajouté avec succès <br>';
                } 
                else 
                {
                    echo 'Veuillez recommencer svp, une erreur est survenue <br>';
                }
            }
    }

function ajouterc() //fonction ajout d'un client
    {
        $bdd=connect();
        if(isset($_GET['ajouter'])&& !empty($_GET['nom'])  && !empty($_GET['prenom'])  && !empty($_GET['adresse']) && !empty($_GET['cp']) && !empty($_GET['ville'])) {
            $ajouter2 = $bdd->prepare('INSERT INTO clients (Nom_Clients, Prenom_Clients, adresse_Clients, CP_Clients, Ville_Clients  ) VALUES (:Nom_Clients, :Prenom_Clients, :adresse_Clients, :CP_Clients, :Ville_Clients)');
            $ajouter2->bindParam(':Nom_Clients', $_GET['nom'],PDO::PARAM_STR);
            $ajouter2->bindParam(':Prenom_Clients', $_GET['prenom'],PDO::PARAM_STR);
            $ajouter2->bindParam(':adresse_Clients', $_GET['adresse'],PDO::PARAM_STR);
            $ajouter2->bindParam(':CP_Clients', $_GET['cp'],PDO::PARAM_STR);
            $ajouter2->bindParam(':Ville_Clients', $_GET['ville'],PDO::PARAM_STR);
            $estceok = $ajouter2->execute();
        
                if($estceok){
                    echo 'votre enregistrement a été ajouté avec succès <br>';
                } else {
                    echo 'Veuillez recommencer svp, une erreur est survenue <br>';
                }
    }
    }
    function ajouter_client()
    {
        $bdd=connect();
        if(isset($_GET['ajouter']) && !empty($_GET['nom'])  && !empty($_GET['prenom'])  && !empty($_GET['adresse']) && !empty($_GET['cp']) && !empty($_GET['ville'])) {
            $ajouter2 = $bdd->prepare('INSERT INTO clients (id_Clients, Nom_Clients, Prenom_Clients, adresse_Clients, CP_Clients, Ville_Clients  ) VALUES (:Nom_Clients, :Prenom_Clients, :adresse_Clients, :CP_Clients, :Ville_Clients)');
            $ajouter2->bindParam(':Nom_Clients', $_GET['nom'],PDO::PARAM_STR);
            $ajouter2->bindParam(':Prenom_Clients', $_GET['prenom'],PDO::PARAM_STR);
            $ajouter2->bindParam(':adresse_Clients', $_GET['adresse'],PDO::PARAM_STR);
            $ajouter2->bindParam(':CP_Clients', $_GET['cp'],PDO::PARAM_STR);
            $ajouter2->bindParam(':Ville_Clients', $_GET['ville'],PDO::PARAM_STR);
            $estceok = $ajouter2->execute();
        
                if($estceok){
                    echo 'votre enregistrement a été ajouté avec succès <br>';
                } else {
                    echo 'Veuillez recommencer svp, une erreur est survenue <br>';
                }
    }
    }
function ajouterl() //fonction ajout d'une location
    {
        $bdd=connect();
        if(isset($_GET['ajouter']))
        {
            $ajouter = $bdd->prepare('INSERT INTO louer ( id_Clients, id_Vehicules, date_fin_Louer, retour_Louer, date_debut_Louer) 
            VALUES (:id_Clients, :id_Vehicules, :date_fin_Louer, 0, :date_debut_Louer)');
            $ajouter->bindParam(':id_Clients', $_GET['idc'],PDO::PARAM_STR);
            $ajouter->bindParam(':id_Vehicules', $_GET['idv'],PDO::PARAM_STR);
            $ajouter->bindParam(':date_fin_Louer', $_GET['fin'],PDO::PARAM_STR);
            $ajouter->bindParam(':date_debut_Louer', $_GET['debut'],PDO::PARAM_STR);
            $estceok=$ajouter->execute();
            
                if($estceok)
                {
                    echo 'votre enregistrement a été ajouté avec succès <br>';
                } 
                else 
                {
                    echo 'Veuillez recommencer svp, une erreur est survenue <br>';
                }
                echo '<script language="Javascript">

                document.location.replace("locations.php");
                
                </script>';
            }
    }
function modifiv() //fonction modification d'un véhicule 
    {
        $bdd=connect();
        if(isset($_GET['action']) && $_GET['action']=="modifier"  && !empty($_GET['id'])  && !empty($_GET['type'])  && !empty($_GET['modele']) && !empty($_GET['immat']))
        {
            $modifierv2 = $bdd->prepare('UPDATE vehicules SET id_Vehicules = :id_Vehicules, type_Vehicules = :type_Vehicules, modele_Vehicules = :modele_Vehicules, immatriculation_Vehicules = :immatriculation WHERE id_Vehicules =:id_Vehicules');
            $modifierv2->bindParam(':id_Vehicules', $_GET['id'], PDO::PARAM_STR);
            $modifierv2->bindParam(':type_Vehicules', $_GET['type'], PDO::PARAM_STR);
            $modifierv2->bindParam(':modele_Vehicules', $_GET['modele'], PDO::PARAM_STR);
            $modifierv2->bindParam(':immatriculation', $_GET['immat'], PDO::PARAM_STR);        
               
            $modifierv2 = $modifierv2->execute();

                if($modifierv2)
                {
                    echo 'votre enregistrement a bien été modifié';
                } 
                else 
                {
                    echo 'Veuillez recommencer svp, une erreur est survenue';
                }
        }

    }
function modific() //fonction modification d'un client
    {
        $bdd=connect();
       
            if(isset($_GET['action']) && $_GET['action']=="modifier"  && !empty($_GET['id'])  && !empty($_GET['nom'])  && !empty($_GET['prenom'])&& !empty($_GET['adresse'])&& !empty($_GET['cp'])&& !empty($_GET['ville'])){
            
            $modifierc2 = $bdd->prepare('UPDATE clients SET id_Clients = :id_Clients, Nom_Clients = :Nom_Clients, Prenom_Clients = :Prenom_Clients, adresse_Clients = :adresse_Clients, CP_Clients = :CP_Clients, Ville_Clients = :Ville_Clients WHERE id_Clients =:id_Clients');
            $modifierc2->bindParam(':id_Clients', $_GET['id'],PDO::PARAM_INT);
            $modifierc2->bindParam(':Nom_Clients', $_GET['nom'],PDO::PARAM_STR);
            $modifierc2->bindParam(':Prenom_Clients', $_GET['prenom'],PDO::PARAM_STR);
            $modifierc2->bindParam(':adresse_Clients', $_GET['adresse'],PDO::PARAM_STR);
            $modifierc2->bindParam(':CP_Clients', $_GET['cp'],PDO::PARAM_INT);
            $modifierc2->bindParam(':Ville_Clients', $_GET['ville'],PDO::PARAM_STR);
            $modifierc2 = $modifierc2->execute();
            
                if($modifierc2){
                    echo 'Votre enregistrement a bien été modifié';
                    refresh('crudclients.php'); 
                } 
                else 
                {
                    echo 'Veuillez recommencer svp, une erreur est survenue';
                }
        }

    }
function supriv()//fonction suppression d'un véhicule
    {
        $bdd=connect();
        if(isset($_GET['action']) && $_GET['action']=="supprimer" && !empty($_GET['id'])){
            
            $supprimer = $bdd->prepare('DELETE FROM vehicules WHERE id_Vehicules =:id_Vehicule');
            $supprimer->bindParam(':id_Vehicule', $_GET['id'],PDO::PARAM_STR);


            $supprimer = $supprimer->execute();
                if($supprimer)
                {
                    echo 'votre enregistrement a bien été supprimé';
                } 
                else 
                {
                    echo 'Veuillez recommencer svp, une erreur est survenue';
                }
            }
    }
function supric() //fonction suppression d'un client
    {
        $bdd=connect();
        if(isset($_GET['action']) && $_GET['action']=="supprimer" && !empty($_GET['id']))
        {
            
            $supprimer2 = $bdd->prepare('DELETE FROM clients WHERE id_Clients =:id_Clients');
            $supprimer2->bindParam(':id_Clients', $_GET['id'],PDO::PARAM_STR);


            $supprimer2 = $supprimer2->execute();
                if($supprimer2)
                {
                    echo 'votre enregistrement a bien été supprimé';
                    
                
                } else
                {
                    echo 'Veuillez recommencer svp, une erreur est survenue';
                }
        }
    }
function aff_voiture() //Boucle d'affichage du CRUD véhicules
    {
        $bdd=connect();
        $recuperation = $bdd->query('SELECT * FROM vehicules');
       
         while ($voit = $recuperation->fetch()) 
        {
            echo "<form><tr><td><input class='form-control' type='text' name='id' value='".$voit['id_Vehicules']."'></td>
            <td><input class='form-control' type='text' name='type' value='".$voit['type_Vehicules']."'></td>
            <td><input class='form-control' type='text' name='modele' value='".$voit['modele_Vehicules']."'></td>
            <td><input class='form-control' type='text' name='immat' value='".$voit['immatriculation_Vehicules']."'></td>
            <td><button class='btn btn_jaune btn-primary' onclick='window.location.hash=\"CRUD_vehicule\";' type='submit' value='modifier' name='action'>Modifier</button></td>
            <td><button class='btn btn-danger' onclick='window.location.hash=\"CRUD_vehicule\";' type='submit' value='supprimer' name='action'>Supprimer</button></td></tr></form>";

        }
    }
function aff_client() //Boucle d'affichage du CRUD clients
    {
        $bdd=connect();
        $recuperation = $bdd->query('SELECT * FROM clients');
       
         while ($client = $recuperation->fetch()) {
         echo " <form><tr><td><input class='form-control'  type='text' name='id' value='".$client['id_Clients']."'></td>
        <td><input class='form-control'  type='text' name='nom' value='".$client['Nom_Clients']."'></td>
        <td><input class='form-control'  type='text' name='prenom' value='".$client['Prenom_Clients']."'></td>
        <td><input class='form-control'  type='text' name='adresse' value='".$client['adresse_Clients']."'></td>
        <td><input class='form-control'  type='text' name='cp' value='".$client['CP_Clients']."'></td>
        <td><input class='form-control'  type='text' name='ville' value='".$client['Ville_Clients']."'></td>
        <td><button class='btn btn_jaune btn-primary' onclick='window.location.hash=\"CRUD_client\";' type='submit' value='modifier' name='action'>Modifier</button></td>
        <td><button class='btn btn_jaune btn-primary' onclick='window.location.hash=\"histo\";' type='submit' value='historique' name='action'>Historique</button></td>
        <td><button class='btn btn-danger' type='submit' value='supprimer' name='action'>Supprimer</button></td></tr></form>";
        }
            }
function aff_louer() //Boucle d'affichage des locations en cours pour tous les clients
    {
        $bdd=connect();
        $recup= $bdd->query('SELECT clients.id_Clients, Nom_Clients, Prenom_Clients, id_location, date_debut_Louer, date_fin_Louer, retour_Louer, vehicules.id_Vehicules, modele_Vehicules, immatriculation_Vehicules
        FROM clients
        INNER JOIN louer ON clients.id_Clients = louer.id_Clients
        INNER JOIN vehicules ON louer.id_Vehicules = vehicules.id_Vehicules
        WHERE louer.retour_Louer=0');
        while($donnees = $recup->fetch())
        {

            if( $donnees['retour_Louer']==1){
        
               $status = "checked";
            }
            else{
           
                $status = "test";
            }
            
            echo "<form><input hidden class='form-control' type='text' name='idc' value='".$donnees['id_Clients']."'>
            <input hidden class='form-control' type='text' name='idv' value='".$donnees['id_Vehicules']."'>
            <tr><td><input class='form-control' type='text' name='idl' value='".$donnees['id_location']."'></td> 
            <td><input class='form-control' type='text' name='nom' value='".$donnees['Nom_Clients']."'></td>
            <td><input class='form-control' type='text' name='vehicule' value='".$donnees['modele_Vehicules']."'></td>
            <td><input class='form-control' type='text' name='immat' value='".$donnees['immatriculation_Vehicules']."'></td>
            <td><input class='form-control' type='date' name='debut' value='".$donnees['date_debut_Louer']."'></td>
            <td><input class='form-control' type='date' name='fin' value='".$donnees['date_fin_Louer']."'></td>
            <td><input class='form-control' type='checkbox' name='retour' value='1'" . $status ."></td>                
            <td><button class='btn btn_jaune btn-primary' type='submit' value='modifier' name='action'>Modifier</button></td></tr></form>";

        }
    }

function aff_location_indivuel($idclient) //Boucle d'affichage des locations en cours pour un client donnée ($id_client)
    {
        $bdd=connect();
        $recup= $bdd->prepare('SELECT clients.id_Clients, id_location,  date_fin_Louer,  vehicules.id_Vehicules, modele_Vehicules, type_Vehicules, immatriculation_Vehicules
        FROM clients
        INNER JOIN louer ON clients.id_Clients = louer.id_Clients
        INNER JOIN vehicules ON louer.id_Vehicules = vehicules.id_Vehicules
        WHERE (louer.retour_Louer=0 and clients.id_Clients= :id)');
        $recup->bindParam(':id', $idclient, PDO::PARAM_STR);
        $recup->execute();
        $controle=$recup->fetchall();
        if (empty($controle)) 
        {
            echo 'Pas de location en cours';
        }
        else{ 
            echo'<div class="container my-5 collapse multi-collapse bgblancdiv" id="location_active">
            <h2 class=" text-center py-5">Véhicules en cours de location</h2><table class="table table-hover table-sm">
            <thead class="bg_entete_tab">
                <tr>
                    <th scope="col">Réference Location</th>
                    <th scope="col">Type de véhicule</th>
                    <th scope="col">Modèle</th>
                    <th scope="col">Date de fin de location</th>
                    <th scope="col">Délai avant retour</th>
                </tr>
            </thead>
            <tbody>';
        foreach($controle as $donnees)
        {   
            $now=time();               
            $fin_loc=strtotime($donnees['date_fin_Louer']);
            if($fin_loc>=$now)
            {
            $retour=ceil(($fin_loc-$now)/86400).' jours';
            }
            else {$retour='Retard de '.ceil(($now-$fin_loc)/86400).' jours';}     
            echo "<tr class='text-center'><td>".$donnees['id_location']."</td>
            <td>".$donnees['type_Vehicules']."</td>
            <td>".$donnees['modele_Vehicules']."</td>
            <td>".$donnees['date_fin_Louer']."</td>
            <td>".$retour."</td></tr>
            ";
        }
        echo '</tbody>
               </table>
               </div>';
    }
   }   

function aff_historique() //Boucle d'affichage des anciennes location pour tous les clients
    {
        $bdd=connect();
        $button = $_GET['nom du boutton'];
        if(isset($_GET[$button]) && $_GET[$button]=="historique")
        {
            $recup= $bdd->query('SELECT clients.id_Clients, Nom_Clients, Prenom_Clients, id_location, date_debut_Louer, date_fin_Louer, retour_Louer, vehicules.id_Vehicules, modele_Vehicules, immatriculation_Vehicules
            FROM clients
            INNER JOIN louer ON clients.id_Clients = louer.id_Clients
            INNER JOIN vehicules ON louer.id_Vehicules = vehicules.id_Vehicules WHERE louer.retour_Louer=1 AND clients.id_Clients= :client');
            $recup->bindParam(':client', $client);
            $recup->execute();
            
            echo '<div class="container my-5" id="histo">
            <h2 class=" text-center py-5"> Historique '.$prenom_client.' '.$nom_client.'</h2>
            <table class="table" >
                <thead class="bg_entete_tab">
                    <tr>
                        <th scope="col">Véhicule</th>
                        <th scope="col">Immatriculation</th>
                        <th scope="col">Début de Location</th>
                        <th scope="col">Fin de location de Location</th>
                    </tr>
                </thead>
                <tbody>';
                
            while($donnees = $recup->fetch())
            {

                if( $donnees['retour_Louer']==1){
            
                $status = "checked";
                }
                else{
            
                    $status = "test";
                }
                
               
            }
        }
    }

function aff_historique_client($id_client)//Boucle d'affichage des anciennes location pour un client donnée ($id_client)
    {
        $bdd=connect(); 
            $recup= $bdd->prepare('SELECT clients.id_Clients, Nom_Clients, Prenom_Clients, id_location, date_debut_Louer, date_fin_Louer, retour_Louer, vehicules.id_Vehicules, modele_Vehicules, immatriculation_Vehicules
            FROM clients
            INNER JOIN louer ON clients.id_Clients = louer.id_Clients
            INNER JOIN vehicules ON louer.id_Vehicules = vehicules.id_Vehicules WHERE louer.retour_Louer=1 AND clients.id_Clients= :client');
            $recup->bindParam(':client', $id_client);
            $recup->execute();
            
            echo '<div class="container collapse multi-collapse my-5 bgblancdiv" id="historique_client">
            <h2 class=" text-center py-5"> Historique de vos locations</h2>
            <table class="table">
                <thead class="bg_entete_tab">
                    <tr>
                        <th scope="col">Véhicule</th>
                        <th scope="col">Immatriculation</th>
                        <th scope="col">Début de Location</th>
                        <th scope="col">Fin de location de Location</th>
                    </tr>
                </thead>
                <tbody>';
                
            while($donnees = $recup->fetch())
            {
                echo '<tr class=" text-center"><td>'.$donnees['modele_Vehicules'].'</td><td>'.$donnees['immatriculation_Vehicules'].'</td><td>'.$donnees['date_debut_Louer'].'</td><td>'.$donnees['date_fin_Louer'].'</td></tr>';
         }
         echo'</tbody></table></div>';
        }
    
function requete_vehicules_dispo() // Requête établissant la liste des véhicules disponibles à la location
    {
    $bdd=connect();
        $recup= $bdd->query('SELECT id_Vehicules FROM louer WHERE retour_Louer = 0 and louer.date_debut_Louer< now()');
        $id=$recup->fetchAll();
        $id_list=implode(', ', array_column($id, 'id_Vehicules'));
        $sql= $bdd->query('SELECT vehicules.*, louer.retour_Louer, louer.date_debut_Louer  
        from vehicules 
        LEFT JOIN louer ON vehicules.id_Vehicules=louer.id_Vehicules 
        WHERE (vehicules.id_Vehicules NOT IN ('.$id_list.')) GROUP BY vehicules.id_Vehicules');
        return $sql;
    }


function aff_voitdispo() //Boucle d'affichage des véhicules disponibles à la location coté administrateur
    {
        $sql=requete_vehicules_dispo();
        while($donnees = $sql->fetch())
        {
            if(($donnees['retour_Louer']=='1')||($donnees['retour_Louer']==NULL)){
            echo '<tr class="text-center"><td>'.$donnees['id_Vehicules'].'</td><td>'.$donnees['type_Vehicules'].'</td><td>'.$donnees['modele_Vehicules'].'</td><td>'.$donnees['immatriculation_Vehicules'].'</td><td>Plus de 30 jours</td></tr>';
        }
    else {
        $now=time();
                    $debutloc=$donnees['date_debut_Louer'];
                    $dispo=ceil((strtotime($debutloc) - $now)/86400);
                    echo '<tr class="text-center"><td>'.$donnees['id_Vehicules'].'</td><td>'.$donnees['type_Vehicules'].'</td><td>'.$donnees['modele_Vehicules'].'</td><td>'.$donnees['immatriculation_Vehicules'].'</td><td>'.$dispo.' jours</td></tr>';
    }
        } 
    } 

function aff_voitdispoFront() // boucle d'affichage des véhicules disponible à la location coté client
        {    
            $sql=requete_vehicules_dispo();

                while($donnees = $sql->fetch())
                {
                    if(($donnees['retour_Louer']=='1')||($donnees['retour_Louer']==NULL)){
                        switch($donnees['modele_Vehicules']){
                            case "Fiat 500";
                            echo'<div class="col-12 col-sm-6 col-lg-3"><div class="ficheauto"><img src="Img/fiat500.png" alt="Fiat 500" style="max-height:100px"><p style="font-weight: bolder">'.$donnees['modele_Vehicules'].'</><p>'.$donnees['type_Vehicules'].'</p>'.$donnees['immatriculation_Vehicules'].'<p></p><p>Disponibilité + de 30 jours</p></div></div>';
                            break;
                            case "Renault Clio";
                            echo'<div class="col-12 col-sm-6 col-lg-3"><div class="ficheauto"><img src="Img/clio.png" alt="clio" style="max-height:100px"><p style="font-weight: bolder">'.$donnees['modele_Vehicules'].'</><p>'.$donnees['type_Vehicules'].'</p>'.$donnees['immatriculation_Vehicules'].'<p></p><p>Disponibilité + de 30 jours</p></div></div>';
                            break;
                            case "Peugeot 308";
                            echo'<div class="col-12 col-sm-6 col-lg-3"><div class="ficheauto"><img src="Img/308.png" alt="308" style="max-height:100px"><p style="font-weight: bolder">'.$donnees['modele_Vehicules'].'</><p>'.$donnees['type_Vehicules'].'</p>'.$donnees['immatriculation_Vehicules'].'<p></p><p>Disponibilité + de 30 jours</p></div></div>';
                            break;
                            case "Renault Scénic";
                            echo'<div class="col-12 col-sm-6 col-lg-3"><div class="ficheauto"><img src="Img/scenic.png" alt="scenic" style="max-height:100px"><p style="font-weight: bolder">'.$donnees['modele_Vehicules'].'</><p>'.$donnees['type_Vehicules'].'</p>'.$donnees['immatriculation_Vehicules'].'<p></p><p>Disponibilité + de 30 jours</p></div></div>';
                            break;
                            case "Peugeot 5008";
                            echo'<div class="col-12 col-sm-6 col-lg-3"><div class="ficheauto"><img src="Img/5008.png" alt="5008" style="max-height:100px"><p style="font-weight: bolder">'.$donnees['modele_Vehicules'].'</><p>'.$donnees['type_Vehicules'].'</p>'.$donnees['immatriculation_Vehicules'].'<p></p><p>Disponibilité + de 30 jours</p></div></div>';
                            break;
                            case "Peugeot expert 12m3";
                            echo'<div class="col-12 col-sm-6 col-lg-3"><div class="ficheauto"><img src="Img/expert.png" alt="expert" style="max-height:100px"><p style="font-weight: bolder">'.$donnees['modele_Vehicules'].'</><p>'.$donnees['type_Vehicules'].'</p>'.$donnees['immatriculation_Vehicules'].'<p></p><p>Disponibilité + de 30 jours</p></div></div>';
                            break;
                            case "Iveco daily 20m3";
                            echo'<div class="col-12 col-sm-6 col-lg-3"><div class="ficheauto"><img src="Img/Iveco.png" alt="Iveco" style="max-height:100px"><p style="font-weight: bolder">'.$donnees['modele_Vehicules'].'</><p>'.$donnees['type_Vehicules'].'</p>'.$donnees['immatriculation_Vehicules'].'<p></p><p>Disponibilité + de 30 jours</p></div></div>';
                            break;
                        }
                        
                    }
                    else{
                    $now=time();
                    $debutloc=$donnees['date_debut_Louer'];
                    $dispo=ceil((strtotime($debutloc) - $now)/86400);
                    switch($donnees['modele_Vehicules']){
                        case "Fiat 500";
                        echo'<div class="col-12 col-sm-6 col-lg-3"><div class="ficheauto"><img src="Img/fiat500.png" alt="Fiat 500" style="max-height:100px"><p style="font-weight: bolder">'.$donnees['modele_Vehicules'].'</><p>'.$donnees['type_Vehicules'].'</p>'.$donnees['immatriculation_Vehicules'].'<p></p><p>Disponibilité '.$dispo.' jour(s)</p></div></div>';
                        break;
                        case "Renault Clio";
                        echo'<div class="col-12 col-sm-6 col-lg-3"><div class="ficheauto"><img src="Img/clio.png" alt="clio" style="max-height:100px"><p style="font-weight: bolder">'.$donnees['modele_Vehicules'].'</><p>'.$donnees['type_Vehicules'].'</p>'.$donnees['immatriculation_Vehicules'].'<p></p><p>Disponibilité '.$dispo.' jour(s)</p></div></div>';
                        break;
                        case "Peugeot 308";
                        echo'<div class="col-12 col-sm-6 col-lg-3"><div class="ficheauto"><img src="Img/308.png" alt="308" style="max-height:100px"><p style="font-weight: bolder">'.$donnees['modele_Vehicules'].'</><p>'.$donnees['type_Vehicules'].'</p>'.$donnees['immatriculation_Vehicules'].'<p></p><p>Disponibilité '.$dispo.' jour(s)</p></div></div>';
                        break;
                        case "Renault Scénic";
                        echo'<div class="col-12 col-sm-6 col-lg-3"><div class="ficheauto"><img src="Img/scenic.png" alt="scenic" style="max-height:100px"><p style="font-weight: bolder">'.$donnees['modele_Vehicules'].'</><p>'.$donnees['type_Vehicules'].'</p>'.$donnees['immatriculation_Vehicules'].'<p></p><p>Disponibilité '.$dispo.' jour(s)</p></div></div>';
                        break;
                        case "Peugeot 5008";
                        echo'<div class="col-12 col-sm-6 col-lg-3"><div class="ficheauto"><img src="Img/5008.png" alt="5008" style="max-height:100px"><p style="font-weight: bolder">'.$donnees['modele_Vehicules'].'</><p>'.$donnees['type_Vehicules'].'</p>'.$donnees['immatriculation_Vehicules'].'<p></p><p>Disponibilité '.$dispo.' jour(s)</p></div></div>';
                        break;
                        case "Peugeot expert 12m3";
                        echo'<div class="col-12 col-sm-6 col-lg-3"><div class="ficheauto"><img src="Img/expert.png" alt="expert" style="max-height:100px"><p style="font-weight: bolder">'.$donnees['modele_Vehicules'].'</><p>'.$donnees['type_Vehicules'].'</p>'.$donnees['immatriculation_Vehicules'].'<p></p><p>Disponibilité '.$dispo.' jour(s)</p></div></div>';
                        break;
                        case "Iveco daily 20m3";
                        echo'<div class="col-12 col-sm-6 col-lg-3"><div class="ficheauto"><img src="Img/Iveco.png" alt="Iveco" style="max-height:100px"><p style="font-weight: bolder">'.$donnees['modele_Vehicules'].'</><p>'.$donnees['type_Vehicules'].'</p>'.$donnees['immatriculation_Vehicules'].'<p></p><p>Disponibilité '.$dispo.' jour(s)</p></div></div>';
                        break;
                   
                    }
                }
            }      
            }        

function liste_déroulante_client() // menu déroulant affichant les cleint de la base de données
    {
    $bdd=connect();
    $reponse = $bdd->query('SELECT * FROM clients');
    echo'<select class="custom-select my-2" name="idc">';
    echo'<option value="NULL">Choisir le client</option>';
    while ($donnees = $reponse->fetch()) {
        echo'<option value='.$donnees['id_Clients'].'>'.$donnees['id_Clients'].' '.$donnees['Prenom_Clients'].' '.$donnees['Nom_Clients'].' '.$donnees['CP_Clients'].' '.$donnees['Ville_Clients'].' </option>';
    }
    echo'</select>';
    }

function liste_déroulante_vehicule() //menu déroulant affichant les véhicules disponibles uniquement
    {
        $reponse = requete_vehicules_dispo();
        echo'<select class="custom-select my-2" name="idv">';
        echo'<option value="NULL">Choisir le véhicule</option>';
        while ($donnees = $reponse->fetch()) {
            echo'<option value='.$donnees['id_Vehicules'].'>'.$donnees['id_Vehicules'].' / '.$donnees['type_Vehicules'].' / '.$donnees['modele_Vehicules'].' / '.$donnees['immatriculation_Vehicules'].' </option>';
        }
        echo'</select>';
    }

function modifil() // Modification des termes de la location (dont retour de location)
    {
        $bdd=connect();
        if(isset($_GET['action']) && $_GET['action']=="modifier" && !empty($_GET['idc']) && !empty($_GET['idv']) && !empty($_GET['fin']) && !empty($_GET['debut']))
        {
            if(isset($_GET['retour'])){
                $valeurretour = "1";
            }
            else{
                $valeurretour = "0";
            }
        $modifierv2 = $bdd->prepare('UPDATE louer SET date_fin_Louer = :date_fin_Louer, retour_Louer = :retour_Louer, date_debut_Louer = :date_debut_Louer WHERE id_location =:idl');
        $modifierv2->bindParam(':idl', $_GET['idl'], PDO::PARAM_STR);
        $modifierv2->bindParam(':date_fin_Louer', $_GET['fin'], PDO::PARAM_STR);
        $modifierv2->bindParam(':retour_Louer', $valeurretour, PDO::PARAM_STR);
        $modifierv2->bindParam(':date_debut_Louer', $_GET['debut'], PDO::PARAM_STR);
            
        
        $modifierv2 = $modifierv2->execute();
        echo '<script language="Javascript">
        document.location.replace("locations.php");
        </script>';
        if($modifierv2)
        {
        echo 'votre enregistrement a bien été modifié';
        }
        else
        {
        echo 'Veuillez recommencer svp, une erreur est survenue';
        }
        }
        
    }        

function aff_voit_en_location() // Affichage voiture en cours de location
    {
        $bdd=connect();
        
            $recup= $bdd->query('SELECT vehicules.id_Vehicules, type_Vehicules, modele_Vehicules, immatriculation_Vehicules, Nom_Clients, id_location, retour_Louer, date_debut_Louer, date_fin_Louer
            FROM vehicules
            INNER JOIN louer ON vehicules.id_Vehicules = louer.id_Vehicules
            INNER JOIN clients ON louer.id_Clients = clients.id_Clients
            WHERE (retour_Louer = 0 and louer.date_fin_Louer> now()) and (retour_Louer = 0 and louer.date_debut_Louer< now())');
            while($donnees = $recup->fetch())
            {
                $now=time();
                $fin_loc=$donnees['date_fin_Louer'];
                $retour=ceil((strtotime($fin_loc)-$now)/86400);
                echo '<tr class="text-center"><td>'.$donnees['id_location'].'</td><td>'.$donnees['modele_Vehicules'].'</td><td>'.$donnees['Nom_Clients'].'</td><td>'.$donnees['date_fin_Louer'].'</td><td>'.$retour.' jours</td></tr>';
            }
       
    }
        
function aff_voitrouge() // affichage voiture qui n'a pas été rendu
    {
        $bdd=connect();
        
            $recup= $bdd->query('SELECT vehicules.id_Vehicules, modele_Vehicules, immatriculation_Vehicules, id_location, retour_Louer, date_fin_Louer, clients.id_Clients, Nom_Clients, Prenom_Clients, adresse_Clients, CP_Clients, Ville_Clients
            FROM vehicules
            INNER JOIN louer ON vehicules.id_Vehicules = louer.id_Vehicules 
            INNER JOIN clients ON louer.id_Clients = clients.id_Clients 
            WHERE (retour_Louer = 0 and louer.date_fin_Louer<now())');
            while($donnees = $recup->fetch())
            {
                $now=time();
                $fin_loc=$donnees['date_fin_Louer'];
                $retard=ceil(($now-strtotime($fin_loc))/86400);
                echo '<tr class="text-center"><td>'.$donnees['id_location'].'</td><td>'.$donnees['modele_Vehicules'].'</td><td>'.$donnees['Nom_Clients'].'</td><td>'.$donnees['date_fin_Louer'].'</td><td>'.$retard.' jour(s)</td></tr>';
            }
       
    }

function detailclient($idclient) //récupération données client à partir de l'ID
 {
    $bdd=connect();
    $recuperation = $bdd->query('SELECT * FROM clients where clients.id_Clients='.$idclient.'');
    $client = $recuperation->fetch();

    return $client;

 }   
