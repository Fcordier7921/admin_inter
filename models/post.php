<?php
/*SANS OBJET*/
// function thePost($postID){
//     return "je suis le poste".$postID;
// }

// function allPosts(){
//    return "voici tous les postes"; 
// }

/*AVEC DE L'OBJET*/
// class Post{
//     public function thePost($postID){
//     return "je suis le poste".$postID;
//     }

//     public function allPosts(){
//     return "voici tous les postes"; 
//     }

// }

require_once('connection.php');

/*AVEC DE L'OBJET ET UNE BDD*/
/**
 * Post
 * Ici on dira que les fonctions sont les méthodes d'une classe, d'un objet
 * Les variables passé en début comme $maxId sont des propriétés
 */
class Post extends Databases{

    public $maxId;

    // Methode pour afficher un seul poste
    public function thePost($postID){
        $post = $this->connect()->prepare('SELECT * FROM post WHERE id='.$postID.'');
        $post->execute();
        $result = $post->fetch(PDO::FETCH_ASSOC);
        return $result;
     }

    // Méthode pour afficher tous les postes
    public function allPosts(){
        $post = $this->connect()->prepare('SELECT * FROM post WHERE  id!='.$this->maxId().' ORDER BY date DESC' );
        $post->execute();
        $result = $post->fetchAll();
        return $result;
    }

    //Méthode pour récupérer l'id du dernier poste
    public function maxId(){
        $post = $this->connect()->prepare('SELECT max(ID) FROM post' );
        $post->execute();
        $lastId = $post->fetch();
        return $lastId['max(ID)'];
        //var_dump($lastId['max(ID)']);
    }

    //Méthode pour appeler le dernier poste
    public function lastPost(){
        $post = $this->connect()->prepare('SELECT * FROM post WHERE id='.$this->maxId().'');
        $post->execute();
        $lastPosts = $post->fetch(PDO::FETCH_ASSOC);
        return $lastPosts;
        //var_dump($lastPosts);
    }

}