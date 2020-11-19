    <?php
    $titrepage='Administration Immeuble';
    require_once('Models/function.php')

   ?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
  </script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
  </script>
  <link rel="stylesheet" type="text/css" href="CSS/style.css">
  <title><?php echo $titrepage?></title>
</head>

<body>
  <header >
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#home">Administration Immeuble</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <form class="form-inline my-2 my-lg-0" name="reche_date" method="get" action="index.php">
      <input class="form-control mr-sm-2" type="date" name="datec" value="datec" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" mane="action" value='cherchd' type="submit">Chercher</button>
    </form>
  </div>
  <div class=" collapse navbar-collapse" id="navbarSupportedContent">
    <form role="form" name="reche_date" method="get" action="index.php">
      <div class="form-group">
        <select class="form-control" id="sel1">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
          <option>6</option>
          <option>7</option>
          <option>8</option>
          <option>9</option>
          <option>10</option>

        </select>
        <br>
      </div>
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Chercher</button>
    </form>
  </div>
</nav>
</header>
<?php
    recherd();
?>
<div style="background-image: url('img/tools.jpg'); background-size: cover;" >
    <div id="home" class="container-fluid mt-5">
        <div class="row justify-content-end mb-5">
            <div class="col-12 col-lg-6 py-5">
                <h2 class="mb-5 text-center">Ajout d'une intervention</h2>
                <form name="ajoutcinter" method="get" action="Mindex.php">
                    <div class="form-group">
                        <input type="date" placeholder="date" name="date" class="form-control"></input><br />
                        <input type="text my-5" placeholder="Type d'intervention" name="type" class="form-control"></input><br />
                        <input type="text my-5" placeholder="Etage" name="etage" class="form-control"></input><br />
                        <button class="btn  btn-primary my-2" type="submit" name="ajouter"
                            value="ajouter">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container py-5" id="CRUD_cinter">
                   <table class="table table-hover table-sm">
                <thead class="bg_entete_tab text-center">
                    <tr class="bg-primary">
                        <th scope="col" style="width:5%">numéro d'intervention</th>
                        <th scope="col" style="width:10%">date</th>
                        <th scope="col" style="width:40%">type d'intervention</th>
                        <th scope="col" style="width:20%">étage</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    aff_inter();
                    ?>
                </tbody>
            </table>
      
    </div>
    <?php
ajouterinter();
modifiinter();
supriinter();

?>
    
    <footer class="page-footer font-small blue">

<!-- Copyright -->
<div class="footer-copyright text-center py-3">© 2020 Copyright:
  
</div>
<!-- Copyright -->

</footer>
</body>

</html>
</body>
<script>    
    // if(typeof window.history.pushState == 'function') {
    //     window.history.pushState({}, "Hide", "http://gest_imm.test/index.php");
        
    // }
    
</script>
</html>