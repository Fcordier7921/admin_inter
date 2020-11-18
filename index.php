    <?php
    $titrepage='Administration Immeuble';
   include 'header.php';
   require ('Models/function.php');
   ?>
<div style="background-image: url('img/tools.jpg'); background-size: cover;" >
    <div id="home" class="container-fluid mt-5">
        <div class="row justify-content-end mb-5">
            <div class="col-12 col-lg-6 py-5">
                <h2 class="mb-5 text-center">Ajout d'une intervention</h2>
                <form name="ajoutcinter" method="get" action="index.php">
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
                    <?php aff_inter()?>
                </tbody>
            </table>
      
    </div>
    <?php
ajouterinter();
modifiinter();
supriinter();

?>
    
</div>
    <footer class="page-footer font-small blue">

<!-- Copyright -->
<div class="footer-copyright text-center py-3">© 2020 Copyright:
  
</div>
<!-- Copyright -->

</footer>
</body>
<script>    
    if(typeof window.history.pushState == 'function') {
        window.history.pushState({}, "Hide", "http://gest_imm.test/index.php");
        
    }
    
</script>
</html>