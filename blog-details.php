<?php
require('bdd.php');
require('navbar.php');

$post_id =$_GET['id'];


$query =$pdo->prepare("SELECT* FROM posts WHERE id=:post_id");
$query->bindValue(':post_id',$post_id);
$query->execute();
$post = $query->fetch();


$postsID = $pdo->prepare("SELECT * FROM posts WHERE id=:post_id");
$postsID->bindValue(':post_id',$post_id);
$postsID->execute();
$all = $postsID->fetch();
$author_id = $all['author_id'];


 

$user =$pdo->prepare("SELECT nom FROM users WHERE id=?");
$user->execute(array($author_id));
$allUser = $user->fetch();

$likes =$pdo->prepare("SELECT id FROM likes WHERE id_post=?");
$likes->execute(array($post_id));
$likes =$likes->rowCount();

$dislikes =$pdo->prepare("SELECT id FROM dislikes WHERE id_post=?");
$dislikes->execute(array($post_id));
$dislikes =$dislikes->rowCount();



$post_id = htmlspecialchars($_GET['id']);   
if(isset($_POST['commenter'])){
  if(isset($_POST['msg']) AND !empty($_POST['msg'])){
  $msg = htmlspecialchars( $_POST['msg']);
  $author_id = $_SESSION["id"];

  $ins =$pdo->prepare('INSERT INTO comment (contenu,id_post,author_id) VALUES(?,?,?)');
  $ins->execute(array($msg,$post_id,$author_id));

  $c_msg ="<span style = 'color:green'>Votre commentaire a ete bien envoyé</span>";


}else{
$c_msg= "<span style='color:red'>Erreur: Tous les champs doivent etre renseignés</span>";
}
}

$comment = $pdo->prepare("SELECT id FROM comment WHERE id_post=?");
  $comment->execute(array($post_id));

  $comment = $comment->rowCount();
  


?>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>
  <div class="page-section pt-5">
    <div class="container">
      <!-- <div class="row"> -->
        <div class="col-lg-8">
          <nav aria-label="Breadcrumb">
            <ol class="breadcrumb bg-transparent py-0 mb-5">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item"><a href="blog.php">Blog</a></li>
              
            </ol>
          </nav>
        </div>
      <!-- </div>  -->

      <!-- <div class="row"> -->
        <div class="col-lg-8">
          <article class="blog-details">
            <div class="post-thumb">
            <?php
                    echo "<img src='images/" . $post['image'] . "' alt='Image du post'><br><br>";
                   ?>
            </div>
            <div class="post-meta">
              <div class="post-author">
                <span class="text-grey">Publié par:</span> <?=$allUser['nom'] ?> 
              </div>
              <span class="divider">|</span>
              <div class="post-date">
                <a href="#"><?=$post['sent_at'] ?></a>
              </div>
              <span class="divider">|</span>
              <!-- <div>
                <a href="#">StreetStyle</a>, <a href="#">Fashion</a>, <a href="#">Couple</a>  
              </div> -->
              <span class="divider">|</span>
              
              <div class="post-comment-count">
                 
              <img src="assets/img/doc/comment_icon1.png" style='width: 20px;' alt="">
              <?php
              if($comment==1){
                echo $comment." <span class='text-grey' >Commentaire</span>                   
                    </div>";
              } 

              else if ($comment >1){
                echo $comment." <span class='text-grey' >Commentaires</span>                   
                </div>";
              } 
              else {
                echo " <span class='text-grey' >0 Commentaire</span>                   
                    </div>";
              }  
              ?>
                              
              </div>
            </div>
            <h2 class="post-title h1">Plus sur la publication...!</h2>
            <div class="post-content">
              <h3><?=$post['contenu'] ?></h3>
            </div>
            <hr>
            <div class="post-tags">
              <a href="actionLike.php?t=1&id=<?=$post_id ?>" class="tag-link"><img src="assets/img/doc/like_icon.png" style="width: 20px;" alt="image du like"></a>[<?=$likes?>]
              
              <a href="actionLIke.php?t=2&id=<?=$post_id ?>" class="tag-link"><img src="assets/img/doc/dislike_icon.png" style="width: 20px;" alt="image du like"></a>[<?=$dislikes?>]
            </div>
          </article> <!-- .blog-details -->

          
<div class="comment-form-wrap pt-5">
            <h3 class="mb-5">Laissez nous un commentaire</h3>


            <?php
                $commentaire =$pdo->prepare('SELECT * FROM comment WHERE id_post=?');
                $commentaire->execute(array($post_id));
                

               while($c = $commentaire->fetch()){ ?>
                <div class="avatar mr-2">
                      <div class="avatar-img">
                        <img src="assets/img/doc/comment_icon1.png" alt="">
                      </div>
               </div>
                       <?= $c['contenu']?> <br>

                <?php

               }
         ?>
         <br>
         <br>
         <hr>
          <div class="page-section ">
            <form method ="POST" action="">
             <div class="form-group" >
                <label for="message">commentaire</label>
                <textarea name="msg" id="message" cols="30" rows="8" class="form-control"></textarea>
              </div>
              <div class="form-group"style='text-align:center;margin-bottom: 45px;'>
                <input type="submit" value="Commenter" class="btn btn-secondary" name="commenter">
              </div>
          </div>    
          <?php
            if(isset($c_msg)){echo $c_msg;}
          ?>
            </form>
          </div>
        </div>
        
      </div> 
    </div> <!-- .row -->
  </div> <!-- .container -->
   <!-- .page-section -->

  

  <?php
 require('footer.php');
?>