<?php
require('navbar.php');

?>


<div class="container" style="background: #fff4f3;">

<h1 class="text-center mt-5">Création de compte</h1>
<form class="main-form" method="POST" action="traitement.php">
<?php


?>
<div class="row mt-5 ">
          <div class="col-sm-6 py-2 wow fadeInLeft">
      
              <input type="text" name="nom" class="form-control" placeholder="Votre nom">
          </div>
          <div class="col-sm-6 py-2 wow fadeInLeft">
      
              <input type="text" name="prenom" class="form-control" placeholder="Votre prenom">
          </div>
          
          <div class="col-sm-6 py-2 wow fadeInLeft">
      
              <input type="text" name="level" class="form-control" placeholder="Niveau d'etude">
        </div>
        <div class="col-sm-12 py-2 wow fadeInRight">
            <input type="email" class="form-control" placeholder="Votre Email" name="email">
          </div>
        <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <input type="password" class="form-control" placeholder="Mot de passe" name="password">
        </div>
        <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <input type="password" class="form-control" placeholder="Confirmer votre mot de passe" name="password_confirm">
        </div>
        </div>

        <div class="meta" style='text-align:center;margin-bottom: 45px;'>
            <button type="submit" class="btn btn-primary mt-3 wow zoomIn" style="text-align:center;">Valider</button>   
            <p class="text-small mt-2">Déjà un compte?<a href="login.php">Se connecter</a></p> 
        </div>

       
        
      </form>
</div>
<?php
require('footer.php');
?>