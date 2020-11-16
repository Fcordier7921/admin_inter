<?php




class Databases
{

    
    public function connect() //fonction de connextion à la base
    {
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=blog;port=3306;charset=utf8', 'root', '');
            return $bdd;
         
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }
        
    
}
