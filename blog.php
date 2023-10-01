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
            <li class="breadcrumb-item active" aria-current="page">Blog</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal">Nouvelles</h1>
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div> <!-- .page-banner -->

  <div class="page-section"  style='text-align:center;margin-bottom: 45px;'>
  <div class='col-12 "'>
        
              <form action="search.php" class="search-form sidebar-title" method="GET">
                <div class="form-group">
                  <input type="text" name="keywords" class="form-control" placeholder="Rechercher un poste a travers son titre..." style="text-align:center;">
                  <button type="submit" class="btn"><span class="icon mai-search"></span></button>
                </div>
              </form>
  </div>
           
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">

    <?php

    // pagination requete in php

        $postParPage = 9;
        $req =$pdo->query("SELECT id FROM posts");
        $postTotale = $req->rowCount();
        
        $pagesTotales = ceil($postTotale/$postParPage);


        if (isset($_GET['page']) && !empty($_GET['page']) && $_GET['page']<=$pagesTotales && $_GET['page']>0){
              $_GET['page'] = intval($_GET['page']);
              $pageCourante=$_GET['page'];

        }else{
          $pageCourante=1;
        }
        $depart =($pageCourante-1)*$postParPage;


        $query=$pdo->prepare('SELECT * FROM posts ORDER BY id DESC LIMIT '.$depart.','.$postParPage);
        $query->execute();
        $data=$query->fetchAll();
        foreach ($data as $post){ 
          
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
                    <span class="mai-time"></span>Piblié le <?=$post["sent_at"]?> <br>;

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

           
        <!-- La pagination_start -->

            <div class="col-12 my-5">
              <nav aria-label="Page Navigation">
                <ul class="pagination justify-content-center">
                  <!-- <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                  </li> -->

                  <?php

                    for($i=1; $i<=$pagesTotales; $i++){

                      if($i==$pageCourante){
                        echo '<li class="page-item active" aria-current="page">
                        <a class="page-link" href="blog.php?page='.$i.'">'.$i.'</a>';
                          '</li>';
                      }else{
                        echo '<li class="page-item">
                        <a class="page-link" href="blog.php?page='.$i.'">'.$i.'</a>';
                          '</li>';
                      }

                          
                    }
                      
                      
                      ?>

                  <!-- <li class="page-item active" aria-current="page">
                    <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                  </li> -->
                  
                  

                
                  <!-- <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                  </li> -->
                </ul>
              </nav>
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