<?php
require("navbar.php");

?>


<div class="container" style="background: #fff4f3;">

<h1 class="text-center mt-5">Connexion</h1>
<form class="main-form" method="POST" action="connexion.php">
<?php
if(isset($_SESSION["error"]))
{
    $error_msg=$_SESSION["error"];
    echo "<div class='alert alert-danger' role='alert'>$error_msg
  </div>";
  unset($_SESSION["error"]);
}

?>
<div class="row mt-5 ">
<div class="col-sm-12 py-2 wow fadeInRight">
    <input type="email" class="form-control" placeholder="Votre email" name="email">
</div>
<div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
  <input type="password" class="form-control" placeholder="Mot de passe" name="password">
</div>

<div class="meta" style='text-align:center;margin-bottom: 45px;'>
<button type="submit" class="btn btn-primary mt-3 wow zoomIn">Se connecter</button> 
 </div>
</form>
</div>