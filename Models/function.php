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
        


    
function ajouterinter() //fonction ajout d'un inter
    {
        $bdd=connect();
        if(isset($_GET['ajouter']))
        {
            $ajouter = $bdd->prepare('INSERT INTO intervention ( date_intervention, type__intervention, etage_intervention) 
            VALUES (:date_intervention, :type__intervention, :etage_intervention)');
            $ajouter->bindParam(':date_intervention', $_GET['date'],PDO::PARAM_STR);
            $ajouter->bindParam(':type__intervention', $_GET['type'],PDO::PARAM_STR);
            $ajouter->bindParam(':etage_intervention', $_GET['etage'],PDO::PARAM_STR);
            $estceok=$ajouter->execute();
            
                if($estceok)
                {
                    echo 'votre enregistrement a été ajouté avec succès <br>';
                    echo "<script>window.location.replace(\"index.php\")</script>";
                 
                } 
                else 
                {
                    echo 'Veuillez recommencer svp, une erreur est survenue <br>';
                }
            }
    }


function modifiinter() //fonction modification d'un inter
    {
        $bdd=connect();
        if(isset($_GET['action']) && $_GET['action']=="modifier" && !empty($_GET['id'])  && !empty($_GET['date'])  && !empty($_GET['type'])&& !empty($_GET['etage']))
        { 
            $modifierv2 = $bdd->prepare('UPDATE intervention SET id_intervention =:id_intervention, date_intervention = :date_intervention, type__intervention = :type__intervention, etage_intervention = :etage_intervention WHERE id_intervention =:id_intervention');
            $modifierv2->bindParam(':id_intervention', $_GET['id'], PDO::PARAM_STR);
            $modifierv2->bindParam(':date_intervention', $_GET['date'], PDO::PARAM_STR);
            $modifierv2->bindParam(':type__intervention', $_GET['type'], PDO::PARAM_STR);
            $modifierv2->bindParam(':etage_intervention', $_GET['etage'], PDO::PARAM_STR);        
               
             $debug=$modifierv2->execute();
             
                if($debug)
                {
                    echo 'votre enregistrement a bien été modifié';
                    echo "<script>window.location.replace(\"index.php\")</script>";
                } 
                else 
                {
                    echo 'Veuillez recommencer svp, une erreur est survenue';
                }
        }

    }


function supriinter() //fonction suppression d'un cinter
    {
        $bdd=connect();
        if(isset($_GET['action']) && $_GET['action']=="supprimer" && !empty($_GET['id']))
        {
            
            $supprimer2 = $bdd->prepare('DELETE FROM intervention WHERE id_intervention =:id_intervention');
            $supprimer2->bindParam(':id_intervention', $_GET['id'],PDO::PARAM_STR);


            $supprimer2 = $supprimer2->execute();
                if($supprimer2)
                {
                    echo 'votre enregistrement a bien été supprimé';
                    echo "<script>window.location.replace(\"index.php\")</script>";
                
                } else
                {
                    echo 'Veuillez recommencer svp, une erreur est survenue';
                }
        }
    }


function aff_inter() //Boucle d'affichage du CRUD inter
    {
        $bdd=connect();
        $recuperation = $bdd->query('SELECT * FROM intervention ORDER BY id_intervention DESC');
       
         while ($client = $recuperation->fetch()) {
         echo " <form><tr><td><input class='form-control'  type='text' name='id' value='".$client['id_intervention']."'></td>
        <td><input class='form-control'  type='date' name='date' value='".$client['date_intervention']."'></td>
        <td><input class='form-control'  type='text' name='type' value='".$client['type__intervention']."'></td>
        <td><input class='form-control'  type='text' name='etage' value='".$client['etage_intervention']."'></td>
        <td><button class='btn btn_blue btn-primary' onclick='window.location.hash=\"CRUD_client\";' type='submit' value='modifier' name='action'>Modifier</button></td>
       
        <td><button class='btn btn-danger'  type='submit' value='supprimer' name='action'>Supprimer</button></td></tr></form> 
        ";
        }
    }

    function recherd(){
        
        $bdd=connect();
        if(isset($_GET['action']) && $_GET['action']=="cherchd")
        {

    }else{
        
    }
