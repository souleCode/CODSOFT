<?php
 require('navbar.php');
 require('bdd.php');
?>

  <div class="page-banner overlay-dark bg-image" style="background-image: url(assets/img/bg_image_2.jpg);">
    <div class="banner-section">
      <div class="container text-center wow fadeInUp">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Recherche</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal">Resultats de recherches</h1>
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div> <!-- .page-banner -->

  <?php

if (isset($_GET['keywords'])) {
  $keywords = '%' . $_GET['keywords'] . '%';
  $keywords= htmlspecialchars($keywords);

  // Requête SQL pour rechercher des articles contenant le terme de recherche
  $sql = "SELECT * FROM posts WHERE contenu LIKE :keywords OR titre LIKE :keywords";
  $query = $pdo->prepare($sql);
  $query->bindValue(':keywords', $keywords, PDO::PARAM_STR);
  $query->execute();
  $resultats = $query->fetchAll(PDO::FETCH_ASSOC);
  $nbr = count($resultats);
  
}


if($nbr>1){
  echo '<div class="meta" style="text-align:center;margin-bottom: 45px;margin-top: 45px;">
  <h2>'.$nbr.' resultats trouvés</h2>
</div>';
}
else if($nbr==1){
  echo '<div class="meta" style="text-align:center;margin-bottom: 45px;margin-top: 45px;">
  <h2>'.$nbr.' resultat trouvé</h2>
</div>';
}
else{
  echo '<div class="meta" style="text-align:center;margin-bottom: 45px;margin-top: 45px;">
  <h2> aucun resultats trouvés</h2>
</div>';
}

  ?>

  <div class="page-section"  style='text-align:center;margin-bottom: 45px;'> 
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">

    <?php
  
        
        foreach ($resultats as $post){ 



          
    ?>



<div class="col-sm-4 py-3">
              <div class="card-blog">
                <div class="header">
                  <div class="post-category">
                  <?php
                    if($_SESSION['id']){
                      $post_id = $post['id'];
                      echo "<a href='blog-details.php?id=$post_id'>Voir Plus</a>";
                      
                    }
                    ?>
                    
                  </div>
                   <?php
                    echo "<img src='images/" . $post['image'] . "' alt='Image du post'><br><br>";
                   ?>
                  </a>
                </div>
                <div class="body">
                  
                  <h5 class="post-title"><?=$post["titre"]?></h5>
                  <div class="site-info">
                    <div class="avatar mr-2">
                      <p><?= mb_strimwidth($post["contenu"],0,100,"...")?></p>
                    </div>
                    <span class="mai-time"></span>Piblié le <?=$post["sent_at"]?>;

                    <?php
                    if(isset($_SESSION['id'])){
                      $id = $_SESSION['id'];

                      if(!empty($id) || $post['author_id']==$id){
                        $post_id =$post['id'];
                        echo "
                        <button class='btn btn-danger mt-3 wow zoomIn'><a href='delete.php?id=$post_id' style='color:white'>Supprimer</a></button>";
                      }


                    }
                    ?>


                  </div>
                </div>
              </div>
            </div>

         <?php
            }
          ?>

           

            
            
            
            
            

            <div class="col-12 my-5">
            </div>
          </div> <!-- .row -->
        </div>

        <div class="col-lg-4">
          <div class="sidebar">
          
              
            </div>
          </div>  
        </div> 
      </div> <!-- .row -->
    </div> <!-- .container -->
  </div> <!-- .page-section -->

  

  <?php
 require('footer.php');
?>