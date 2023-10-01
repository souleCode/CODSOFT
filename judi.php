
<?php
 if (isset($_POST['submit'])){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    var_dump($nom);
    var_dump($prenom);
    die();

 }
?>

<div class="page-section" id="comment">
      <div class="container">
            <div class=" ">
           <h1 class="text-center ">Laissez un  commentaire</h1>
        </div>
      <form method="POST" action="" class="main-form" >
             <div class="row mt-5 ">
            <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                   <input type="text" class="form-control" name="nom" placeholder="Nom de Famille">
            </div>
            <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                  <input type="email" class="form-control" name="mail" placeholder="Email ">
            </div>

            <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
                <input type="text" class="form-control" name="prenom" placeholder="Prénom(s)">
            </div>

            <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
                 <input type="text" class="form-control" name="pays" placeholder="Votre pays">
            </div>

            <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms" >
                 <input type="Subject" class="form-control"  name="objet" placeholder="Objet" style="font-weight: bold; text-transform: uppercase;">
            </div>

           <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                <textarea name="message" id="message" class="form-control"  name="msg" rows="6" placeholder="Votre message"></textarea>
           </div>

        </div>
        <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Envoyer <i class="bi bi-send-fill"></i></button>
      </form>
    </div> <!-- .container -->
  </div> <!-- .page-section -->