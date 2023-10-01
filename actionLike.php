<?php
session_start();


require('bdd.php');

if(isset($_GET['t'],$_GET['id']) AND ! empty($_GET['t']) AND ! empty($_GET['id'])){
    $getid =(int)$_GET['id'];
    $gett =(int)$_GET['t'];

    // $ip =$_SERVER['REMOTE_ADDR'];
    $sessionid =$_SESSION['id'];

    $check = $pdo->prepare('SELECT id FROM posts WHERE id=?');
    $check->execute(array($getid));


    if($check->rowCount()==1){
        if($gett==1){
            $check_like = $pdo->prepare('SELECT id FROM likes WHERE id_post=? AND id_author=?');
            $check_like->execute(array($getid,$sessionid));
            // supprime le dislike si le user a deja liké ce post
            $del=$pdo->prepare('DELETE FROM dislikes  WHERE id_post = ? AND id_author = ?');
            $del->execute(array($getid,$sessionid));

            if($check_like->rowCount()==1){
                $del=$pdo->prepare('DELETE FROM likes  WHERE id_post = ? AND id_author = ?');
                $del->execute(array($getid,$sessionid));
            }else{
                $query=$pdo->prepare('INSERT INTO likes (id_post,id_author ) VALUES (?, ?)');
                $query->execute(array($getid,$sessionid));
            }

        }else if($gett==2){
            $check_like = $pdo->prepare('SELECT id FROM dislikes WHERE id_post=? AND id_author=?');
            $check_like->execute(array($getid,$sessionid));
            // supprime ce like si le user a deja un dislike sur ce post
            $del=$pdo->prepare('DELETE FROM likes  WHERE id_post = ? AND id_author = ?');
            $del->execute(array($getid,$sessionid));

            if($check_like->rowCount()==1){
                $del=$pdo->prepare('DELETE FROM dislikes  WHERE id_post = ? AND id_author = ?');
                $del->execute(array($getid,$sessionid));
            }else{
                $query=$pdo->prepare('INSERT INTO dislikes (id_post,id_author ) VALUES (?, ?)');
                $query->execute(array($getid,$sessionid));
            }

        }
        header("Location:blog-details.php?id=".$getid);

    }else{
        exit('Erreur fatale');
    }
}else{
    exit('Erreur fatale.<a href="http://localhost:3000">Revenir a l\'accueil</a>');
}

?>