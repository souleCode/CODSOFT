<?php
session_start();
require("bdd.php");

$titre=htmlspecialchars($_POST["titre"]);
$contenu=htmlspecialchars($_POST["contenu"]);
$date=new DateTime();
$date=$date->format("Y-m-d H:i");
$author_id = $_SESSION["id"];
$image = $_FILES["image"]["name"];
$destination= "images/".$image;
$imagePath =pathinfo($destination,PATHINFO_EXTENSION);
$valid_extension = array("jpg", "jpeg", "png", "gif");
if(!in_array(strtolower($imagePath),$valid_extension)){
    $_SESSION['error']='extension introuvable';
}

if(!move_uploaded_file($_FILES['image']['tmp_name'],$destination)){
    $_SESSION['error']='Emplacement introuvable';
}

$query=$pdo->prepare("INSERT INTO posts(titre,contenu,sent_at,author_id,image) VALUES
(:titre,:contenu,:sent_at,:author_id,:image)");
$query->bindValue(":titre",$titre);
$query->bindValue(":contenu",$contenu);
$query->bindValue(":author_id",$author_id);
$query->bindValue(":sent_at",$date);
$query->bindValue(":image",$image);
$query->execute();

$_SESSION['message'] ='Votre publication est bien ajoutée avec succèes,rendez-vous dans la rubrique blog pour plus de details. Merci';
header('Location:index.php');