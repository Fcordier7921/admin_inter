<?php

abstract class Model
{
    //information de base de donné
    private $host = "localhost";
    private $bd_name = "inter";
    private $port = "3306";
    private $charset = "utf8";
    private $username = "root";
    private $password = "";

    //propiété contenant la conection
    protected $_connexion;

    //propiété contenant le info de requéte
    public $table;
    public $id;

    public function getConnection()//cette fonction permet de me connecté a ma base de donné
    {
        $this->_connexion = null;//je met fair référence a l'objet appelent et je le met dan connexon si il est null

        try {//je fais apelle a mon ojet et je le pace dans ma requétte pour me connecté puis je l'exécute 
            $this->_connexion = new PDO('mysql:host=' . $this->host . '; dbname=' . $this->bd_name . ';port=' . $this->port . ';charset=' . $this->charset, $this->username, $this->password);
            $this->_connexion->exec('set names utf8');
        } catch (PDOException $exception) {//si il y a un pb de connection a la base de donné j'affiche un erreur 
            echo 'Erreur :' . $exception->getMessage();
        }
    }

    /**
     * getAll
     *
     * @return void
     */
    public function getAll()//cette fonttion permet de récupérer tout les info de la table
    {
        $sql = "SELECT * FROM " . $this->table;
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
    public function findBy($datas)
    {
        $sql = "SELECT * FROM " . $this->table;
        $conditions = [];
        foreach ($datas as $name => $data) {
            if ($data == "tous" || $data == "") {
                continue;
            }
            $conditions[] = $name . '_' . $this->table . ' = :' . $name . '_' . $this->table;
        }
        $sql .= " WHERE " . join(" AND ", $conditions);

        $query = $this->_connexion->prepare($sql);

        foreach ($datas as $name => $data) {
            if ($data == "tous" || $data == "") {
                continue;
            }
            $query->bindParam(':' . $name . '_' . $this->table, $datas[$name], (is_numeric($data) ? PDO::PARAM_INT : PDO::PARAM_STR));
        }

        $query->execute();
        return $query->fetchAll();
    }

    public function add($datas)
    {
        if (!isset($datas) || empty($datas)) {
            return false;
        }
        $sql =
            'INSERT INTO ' .
            $this->table .
            ' ( ';
        foreach ($datas as $name => $data) {
            $sql .= $name . '_' . $this->table . ',';
        }
        $sql = trim($sql, ",");
        $sql .=  ') VALUES (';
        foreach ($datas as $name => $data) {
            $sql .= ':' . $name . '_' . $this->table . ',';
        }
        $sql = trim($sql, ",");
        $sql .= ')';

        $query = $this->_connexion->prepare($sql);

        foreach ($datas as $name => $data) {
            $query->bindParam(':' . $name . '_' . $this->table, $datas[$name], (is_numeric($data) ? PDO::PARAM_INT : PDO::PARAM_STR));
        }

        $result = $query->execute();

        return    $result;
    }

    public function update($datas)
    {
        if (!isset($datas) || empty($datas)) {
            return false;
        }
        $sql =
            'UPDATE ' .
            $this->table .
            ' SET ';
        foreach ($datas as $name => $data) {
            if ($name == "id") {
                continue;
            }
            $sql .= $name . '_' . $this->table . '= :' . $name . '_' . $this->table . ',';
        }
        $sql = trim($sql, ",");

        $sql .= ' WHERE id = :id';

        $query = $this->_connexion->prepare($sql);

        $query->bindParam(':id', $datas['id'], PDO::PARAM_INT);
        foreach ($datas as $name => $data) {
            if ($name == "id") {
                continue;
            }
            $query->bindParam(':' . $name . '_' . $this->table, $datas[$name], (is_numeric($data) ? PDO::PARAM_INT : PDO::PARAM_STR));
        }

        $result = $query->execute();

        return    $result;
    }
    public function delete($id)
    {
        $sql = "DELETE FROM " . $this->table . " WHERE id=:id";
        $query = $this->_connexion->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return true;
    }
    public function find($id)
    {
        $sql = "SELECT * FROM " . $this->table . " where id= " . $id;
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetch();
    }

    public function getOne()
    {
        $sql = "SELECT * FROM " . $this->table . " where id=" . $this->id;
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetch();
    }
}
