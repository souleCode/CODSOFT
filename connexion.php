<?php
require("bdd.php");
require("fonctions.php");
$email=$_POST["email"];

$password=$_POST['password'];

$error=null;

//vérifier est ce que l'email existe dans la bdd
if(!emailExists($email,$pdo))
{
    $error="Email ou mot de passe incorrect";
    $_SESSION["error"]=$error;
    header("Location:login.php");
    die();
}
//récupérer le mdp associé à cet email
$query=$pdo->prepare("SELECT id,nom,password FROM users WHERE email=:email");
$query->bindValue(":email",$email);
$query->execute();
$data=$query->fetch(); //récupère une liste contient passwords
$hashed_password=$data["password"];
$id=$data["id"];
$nom=$data["nom"];
if (!password_verify($password,$hashed_password))
{
    $error="Email ou mot de passe incorrect";
    $_SESSION["error"]=$error;
    header("Location:login.php");
    die();
}
//Il est authentique
login($id,$nom);
$_SESSION["message"]="Vous etes connectés";
header("Location:index.php");

