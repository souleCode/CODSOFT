<?php
require("bdd.php");
require("fonctions.php");
$nom=$_POST["nom"];
$prenom=$_POST["prenom"];
$level = $_POST["level"];
$email=$_POST["email"];

$password=$_POST['password'];
$password_confirm=$_POST['password_confirm'];

$error=null;

if(!filter_var($email,FILTER_VALIDATE_EMAIL))
{
    $error="Email invalide";
}
if($password!=$password_confirm)
{
    $error="Mot de passses non identiques";
}

if(emailExists($email,$pdo))
{
    $error="Cet Email existe déjà";
}
if($error)
{
    $_SESSION['error']=$error;
   header("Location:register.php");
}
else
{
    $password=password_hash($password,PASSWORD_DEFAULT);
    $query=$pdo->prepare("INSERT INTO users(nom,prenom,email,password,level)
    VALUES(:nom,:prenom,:email,:password,:level)");
    $query->bindValue(":nom",$nom);
    $query->bindValue(":prenom",$prenom);
    $query->bindValue(":email",$email);
    $query->bindValue(":password",$password);
    $query->bindValue(":level",$level);
    $query->execute();
    $id=$pdo->lastInsertId();
    login($id,$nom);
    $_SESSION['message']="Compte crée avec succès";
    header("Location:index.php");
}