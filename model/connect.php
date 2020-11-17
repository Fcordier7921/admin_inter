<?php

abstract class Model{
    //basic data
    private $host ="localhost";
    private $bd_name ="inter";
    private $port ="3306";
    private $charset ="utf8";
    private $username ="root";
    private $password ="";
    //variable to add in my database
    public $date;
    public $type;
    public $etage;
    private $user;
    private $pass;
    private $auto;

    //property containing the connection
    protected $_connexion;

    //property containing the request info
    public $table;
    public $id;

    public function getConnection(){
        $this ->_connexion =null;

        try{
            $this->_connexion =new PDO('mysql:host='. $this->host .'; dbname='. $this->bd_name .';port='. $this->port .';charset='. $this->charset, $this->username, $this->password);
            $this->_connexion->exec('set names utf8');
            
        }catch(PDOException $exception){
            echo 'Erreur :' .$exception->getMessage();
        }
    }
    
    
}