
<?php

require_once(__DIR__.'/controllers/frontController.php');

//Quand on arrive sur la page on récupère déjà l'url pour voir si l'on est sur la page d'accueil ou sur une page article
//Quand on sera sur un detail on peut imaginer un truc du genre /index.php?id=:id
//on vérifie donc notre url

if(isset($_GET['id'])){
    //echo "on est sur la page de détail de l'article ".$_GET['id'];
    //Maintenant on va donc appeler le controller pour lui dire ce qu'il doit faire
    //Première étape il faut appeler notre controller
    echo singlePost();
}
else{
    echo all();
}

?>