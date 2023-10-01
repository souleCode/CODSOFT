<?php
 require('navbar.php');
?>



  <div class="page-banner overlay-dark bg-image" style="background-image: url(assets/img/bg-image_3.jpg);">
    <div class="banner-section">
      <div class="container text-center wow fadeInUp">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Contact</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal">Contact</h1>
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div> <!-- .page-banner -->

  <div class="page-section"  style="background:#AFDAD8;">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Laissez nous un message</h1>

      <form class="contact-form mt-5" action="new_message.php" method ="POST">
        <div class="row mb-3">
          <div class="col-sm-6 py-2 wow fadeInLeft">
            <label for="fullName"></label>
            <input type="text" id="fullName" name="nom" class="form-control" placeholder="Votre nom.." required>
          </div>
          <div class="col-sm-6 py-2 wow fadeInRight">
            <label for="emailAddress"></label>
            <input type="text" id="emailAddress" name="mail" class="form-control" placeholder="Votre Email..."required>
          </div>
          <div class="col-12 py-2 wow fadeInUp">
            <label for="subject"></label>
            <input type="text" id="subject" name="subject" class="form-control" placeholder="Entrer le sujet.."required>
          </div>
          <div class="col-12 py-2 wow fadeInUp">
            <label for="message"></label>
            <textarea id="message" class="form-control" name="message" rows="8" placeholder="Entrer le Message.." required></textarea>
          </div>
        </div> 
        <div class="meta"style='text-align:center;margin-bottom: 45px;' >
        <button type="submit" class="btn btn-primary wow zoomIn" >Envoyer le message</button>
        </div>
        
      </form>
    </div>
  </div>



  <?php
 require('footer.php');
?>