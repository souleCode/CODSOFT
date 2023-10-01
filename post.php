<?php
    require('navbar.php');

?>
<br>
<br>
<br>
<br>
<br>

<div class="container mt-8"  style="background: #fff4f3;">
    <h1 class="text-center mt-7">Ajouter une publication</h1>
 <form class="main-form" method="POST" action="post_traitement.php"  enctype="multipart/form-data">
<div class="col-sm-12 py-2 wow fadeInRight">
    <input type="titre" class="form-control" placeholder="Le titre" name="titre">
</div>
<div class="col-sm-12 py-2 wow fadeInRight">
<input type="file" name="image" id="image"> 
</div>
<div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <textarea name="contenu" id="contenu" class="form-control" rows="3" placeholder="Entrez votre contenu"></textarea>
</div>

<div class="meta" style='text-align:center;margin-bottom: 45px;'>
    <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Publier</button>     
</div>

          
</form>