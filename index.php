<?php
require('navbar.php');
require('bdd.php');

// <!-- php pour le formulaire -->  <!-- php pour le formulaire -->

if (isset($_POST["message"])) {
    $message = "Ce message vous a été envoyé via la page contact du site SiteEcole.com
    Nom: " . htmlspecialchars($_POST["nom"]) . "
    Email: " . htmlspecialchars($_POST["mail"]) . "
    Message: " . htmlspecialchars($_POST["message"]);

    $retour = mail("souleonetraore.940@gmail.com",$_POST["subject"], $message, "From: contactsite.com" . "\r\n" . "Reply-to: " . $_POST['mail']);
    if ($retour) {
        $_SESSION['message'] ='Votre message a bien été envoyé. Merci pour votre visite.';
       
    } else {
        $_SESSION['error'] ='Votre message n\'a pas été envoyé avec succès. Veuillez ressayer a nouveau.';
        
    }
}
// <!-- fin php pour le formulaire -->

if(isset($_SESSION["message"]))
{
    $msg=$_SESSION["message"];
    echo "<div class='alert alert-success' role='alert'>$msg
  </div>";
  unset($_SESSION["message"]);
}

if(isset($_SESSION["error"]))
{
    $error_msg=$_SESSION["error"];
    echo "<div class='alert alert-danger' role='alert'>$error_msg
  </div>";
  unset($_SESSION["error"]);
}

?>

  <div class="page-hero bg-image overlay-dark" style="background-image: url(assets/img/bg_image_2.jpg);">
    <div class="hero-section">
      <div class="container text-center wow fadeInLeftBig">
        <span class="subhead">Facilitons la vie des etudiants</span>
        <h1 class="display-4">CeeamSite</h1>
        <a href="contact.php" class="btn btn-primary">Nous consulter</a>
      </div>
    </div>
  </div>


  <div class="bg-light">
    <div class="page-section pb-0">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6 py-3 wow fadeInUp" data-wow-delay="800ms">
            <h1>Bienvenue sur notre page <br> CEE A&M</h1>
            <p class="text-grey mb-4">La communauté des étudiants étrangers à Arts et Métiers est un groupe dynamique et diversifié qui incarne la
               richesse de la diversité culturelle au sein de cette prestigieuse institution d'enseignement supérieur. Composée de jeunes talents du 
               monde entier, cette communauté apporte une dimension internationale et multiculturelle à l'université, contribuant ainsi à l'enrichissement
                mutuel de ses membres et à l'ensemble de la communauté académique.
                En somme, la communauté des étudiants étrangers à Arts et Métiers incarne la fusion de la connaissance, de la diversité culturelle et de l'innovation. Elle représente un pilier essentiel de l'écosystème académique de l'université, contribuant de manière significative à l'enrichissement personnel et professionnel de ses membres tout en renforçant la réputation de l'institution à l'échelle internationale.
            </p> 

            <div class="meta">
                  <a href="assets\img\doc\Statut CEE A&M.pdf" class="btn btn-primary" download="Statut CEE A&M.pdf">Télécharger le statut ici</a>
            </div><br><br>
            <div class="meta">
                <a href="#" class="btn btn-success"> Nos Laureats Promo2023</a>    
            </div>
          </div>
          <div class="col-md-6 wow fadeInRight" data-wow-delay="400ms">
            <div class="img-place custom-img-1">
              <img src="assets\img\doctors\SG.jpeg" alt="">
            </div>
          </div>
        </div>
      </div>
    </div> <!-- .bg-light -->
  </div> <!-- .bg-light -->

  <div class="page-section" >
    <div class="container">
      <U><h1 class="text-center mb-5 wow fadeInUp">Notre bureau executif 2022-2023</h1></U>

      <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">
        <div class="item">
          <div class="card-doctor">
            <div class="header">
              <img src="assets\img\doctors\SG.jpeg" alt="">
              <div class="meta">
              <a href="tel:+2120706220881"><span class="mai-call"></span></a>
                <a href="https://wa.me/2120706220881"><span class="mai-logo-whatsapp"></span></a>
              </div>
            </div>
            <div class="body">
              <p class="text-xl mb-0">M.SISSOKO</p>
              <span class="text-sm text-grey">SG de la CEE A&M</span>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="card-doctor">
            <div class="header">
              <img src="assets//img/doctors/charge_compte.jpeg" alt="">
              <div class="meta">
              <a href="tel:+2120777920995"><span class="mai-call"></span></a>
                <a href="https://wa.me/2120777920995"><span class="mai-logo-whatsapp"></span></a>
              </div>
            </div>
            <div class="body">
              <p class="text-xl mb-0">Mme DIALLO</p>
              <span class="text-sm text-grey">Chargé adjointes aux comptes</span>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="card-doctor">
            <div class="header">
              <img src="assets//img/doctors/Charge_Comm.jpeg" alt="">
              <div class="meta">
              <a href="tel:+22672533656"><span class="mai-call"></span></a>
                <a href="https://wa.me/22672533656"><span class="mai-logo-whatsapp"></span></a>
              </div>
            </div>
            <div class="body">
              <p class="text-xl mb-0">M.TAMINI</p>
              <span class="text-sm text-grey">Charge a la communication de la CEE &AM</span>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="card-doctor">
            <div class="header">
              <img src="assets//img/doctors/Tresorier_adjoint.jpeg" alt="">
              <div class="meta">
              <a href="tel:+2120714243807"><span class="mai-call"></span></a>
                <a href="https://wa.me/2120714243807"><span class="mai-logo-whatsapp"></span></a>
              </div>
            </div>
            <div class="body">
              <p class="text-xl mb-0">M.OCA S ARMEL FLORIAN</p>
              <span class="text-sm text-grey">Responsables finaciers adjoint</span>
            </div>
          </div>
        </div>


        <div class="item">
          <div class="card-doctor">
            <div class="header">
              <img src="assets//img/doctors/Charge_treso2.jpeg" alt="">
              <div class="meta">
              <a href="tel:+2120646460443"><span class="mai-call"></span></a>
                <a href="https://wa.me/2120646460443"><span class="mai-logo-whatsapp"></span></a>
              </div>
            </div>
            <div class="body">
              <p class="text-xl mb-0">Mme WADIDIE</p>
              <span class="text-sm text-grey">Charge a la trésorie de la CEE &AM</span>
            </div>
          </div>
        </div>
        

        <div class="item">
          <div class="card-doctor">
            <div class="header">
              <img src="assets//img/doctors/Chage_org.jpeg" alt="">
              <div class="meta">
              <a href="tel:+2120619944895"><span class="mai-call"></span></a>
                <a href="https://wa.me/212619944895"><span class="mai-logo-whatsapp"></span></a>
              </div>
            </div>
            <div class="body">
              <p class="text-xl mb-0">M.TRAORE</p>
              <span class="text-sm text-grey">Chargé a l'organisation de la CEE A&M</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  
  <div class="page-section "  style="background:#AFDAD8;">
    <div class="container">
      <h1 class="text-center wow rotateIn">Laissez un commentaire</h1>

      <form class="main-form" method="POST" action=''>
        <div class="row mt-5 ">
          <div class="col-sm-6 py-2 wow fadeInLeft">
            <input type="text" name="nom" class="form-control" placeholder="Votre nom">
          </div>
          <div class="col-sm-6 py-2 wow fadeInRight">
            <input type="text" name="mail" class="form-control" placeholder="Votre email...">
          </div>
          
         
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
          <input type="text" id="subject" name="subject" class="form-control" placeholder="Entrer le sujet.."required>
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <textarea name="message" id="message" class="form-control" rows="3" placeholder="Entrez votre message.."></textarea>
          </div>
        </div>

        <div class="meta" style='text-align:center;margin-bottom: 45px;'>
          <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Envoyer</button>     
        </div>
      </form>
    </div>
  </div> <!-- .page-section -->



  <?php
 require('footer.php');
?>