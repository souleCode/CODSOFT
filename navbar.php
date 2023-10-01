<?php
session_start();
require('bdd.php');


?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">

  <title>SiteE-Ecole</title>
  <link rel="icon" href="assets\img\logo.jpeg" type="image/x-icon">

  <link rel="stylesheet" href="assets//css/maicons.css">

  <link rel="stylesheet" href="assets//css/bootstrap.css">

  <link rel="stylesheet" href="assets//vendor/owl-carousel/css/owl.carousel.css">

  <link rel="stylesheet" href="assets//vendor/animate/animate.css">

  <link rel="stylesheet" href="assets//css/style.css">
</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header  style="background:#fff4f3 ;">
    <div class="topbar">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 text-sm" >
            <div class="site-info" style="text-align:center;">
              <h3><span style='color:#FF0000;font-weight: bold;'>C</span style='color:#0A0DC5;font-weight: bold;'>ommunauté des 
              <span style='color:#FF0000;font-weight: bold;'>E</span>tudiants <span style='color:#FF0000;font-weight: bold;'>E</span>trangers 
              <span style='color:#FF0000;font-weight: bold;'>A</span>rts & <span style='color:#FF0000;font-weight: bold;'>M</span>étiers </h3>
            </div>
          </div>
          <div class="col-sm-4 text-right text-sm">
            <div class="social-mini-button">
              <a href="https://www.facebook.com/CommunautedesEtudiantsEtrangersArtsMetiers" class='nav-item active'><span class="mai-logo-facebook-f"></span></a>
              <a href="https://instagram.com/ceeam_ensam_meknes?igshid=OGQ5ZDc2ODk2ZA=="><span class="mai-logo-instagram"></span></a>
            </div>
          </div>
        </div> <!-- .row -->
      </div> <!-- .container -->
    </div> <!-- .topbar -->

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm" style="background: #fff4f3;">
      <div class="container">
        <img src="assets\img\logo.jpeg" style='width: 70px;margin-right:40px;' alt="Notre Logo">
        <form action="#">
        </form>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupport">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="about.php">Apropos</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <?php
            if(isset($_SESSION["id"]))
            {
              $id= $_SESSION['id'];
              $user = $pdo->prepare("SELECT nom FROM users WHERE id=?");
              $user->execute(array($id));
              $allUser = $user->fetch();

              echo '<li class="nav-item active">
              <a class="nav-link" href="post.php">Publier</a>
            </li>';
             echo '<li class="nav-item active">
             <a class="nav-link" href="blog.php">Blog</a>
           </li>';
              echo '<li class="nav-item active">
              <a class="btn btn-primary ml-lg-3" href="logout.php">Se Déconnecter</a>
            </li>'; 
            echo " <img src='assets\img\doc\pp.png' style='width: 40px;margin-left:30px;margin-right:30px;' alt='Notre Logo'>".$allUser['nom'];
              
            }
             else
             {
                 echo '<li class="nav-item active">
                 <a class="btn btn-primary ml-lg-3" href="register.php">Se connecter</a>
               </li>';
             }
            ?>
          </ul>
        </div> <!-- .navbar-collapse -->
      </div> <!-- .container -->
    </nav>
  </header>
