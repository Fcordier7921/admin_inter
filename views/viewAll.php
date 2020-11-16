<?php

$title="Initiation au MVC de manière simple";
ob_start();

?>



<div class="jumbotron p-4 p-md-5 text-white rounded bg-dark">
    <div class="col-md-6 px-0">
      <h1 class="display-4 font-italic"><?= $theLastPost['title']; ?></h1>
      <p class="lead my-3"><?= substr($theLastPost['content'], 0,250)."..."; ?></p>
      <p class="lead mb-0"><a href="?id=<?= $theLastPost['id'] ?>" class="text-white font-weight-bold">Continue reading...</a></p>
    </div>
  </div>

  <div class="row mb-2">

  <?php
        foreach($all as $movie)
        {
        ?>

<div class="col-md-6">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-primary"><?= $movie['author']; ?></strong>
          <h3 class="mb-0">  <?= htmlspecialchars($movie['title']); ?></h3>
          <div class="mb-1 text-muted"><?= date("d-m-Y", strtotime( $movie['date'])); ?></div>
          <p class="card-text mb-auto"><?= htmlspecialchars(substr($movie['content'], 0,49))."..."; ?></p>
          <a href="?id=<?= $movie['id'] ?>" class="stretched-link">Continue reading</a>
        </div>
        <div class="col-auto d-none d-lg-block">
          <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
        </div>
      </div>
    </div>

        <?php
        }
       ?>



  </div>

<?php
        $metaDesc = ">Bienvenue sur notre super Blog en MVC";
        $loopArticle =  ob_get_clean();
        require_once('template.php');
      
        ?>