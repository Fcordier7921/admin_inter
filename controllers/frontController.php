<?php

require_once(__DIR__.'/../models/post.php');

/**
 * singlePost
 *
 * @return void
 */
function singlePost(){
    /* ICI ON VA APPELER SANS FAIRE DE L'OBJET */
    // $post = thePost($_GET['id']);
    // echo $post;
    // require('post>View.php');


    // /* ICI ON VA APPELER AVEC DE L'OBJET */
    // //On instancie l'objet = on le crée
    // $post = new Post();
    // //On dit quelle méthode l'on souhaite appeler
    // $post = $post->thePost($_GET['id']);
    // //On fait le rendu
    // echo $post;

    /* ICI ON VA APPELER AVEC DE L'OBJET ET UNE BDD */
    //On instancie l'objet = on le crée
    $post = new Post();
    //On dit quelle méthode l'on souhaite appeler
    $post = $post->thePost($_GET['id']);
    //On fait le rendu
    require(__DIR__.'/../views/viewPost.php');
}

function all(){
    /* ICI ON VA APPELER SANS FAIRE DE L'OBJET */
    // $all = allPosts();
    // echo $all;
    // //require('post>View.php');

    // /* ICI ON VA APPELER AVEC DE L'OBJET */
    //  //On instancie l'objet = on le crée
    //  $post = new Post();
    //  //On dit quelle méthode l'on souhaite appeler
    //  $post = $post->allPosts();
    //  //On fait le rendu
    // //require('post>View.php');

      /* ICI ON VA APPELER AVEC DE L'OBJET ET UNE BDD */
    //On instancie l'objet = on le crée
    //$All c'est l'objet
    // POST() c'est le moule
    $all = new Post();
    //On dit quelle méthode l'on souhaite appeler
    $all = $all->allPosts(); // $all = $result

    $theLastPost = new Post();
    $theLastPost = $theLastPost->lastPost();
   // var_dump($theLastPost);
     //On fait le rendu
    require(__DIR__.'/../views/viewAll.php');

}