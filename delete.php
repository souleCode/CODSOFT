<?php
session_start();
require('bdd.php');

$post_id =$_GET["id"];
$id = $_SESSION['id'];

//vérifier si c est bien lui le propietaire du post en question
$query = $pdo->prepare("SELECT * FROM posts WHERE id=:id");
$query->bindValue(':id',$post_id);
$query->execute();
$data = $query->fetch();

if($data['author_id']!=$id){
    $_SESSION['error'] ='Vous ne pouvez pas supprimer ce poste';
    header('Location:index.php');
    die();
}

$query= $pdo->prepare('DELETE FROM posts WHERE id=:post_id');
$query->bindValue(':post_id',$post_id);
$query->execute();
$_SESSION['message'] ='Ce poste a bien été supprimé';
header('Location:index.php');

?>