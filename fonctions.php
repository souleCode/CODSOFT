<?php
session_start();
require("bdd.php");
function login(String $id,String $nom)
{
    $_SESSION["id"]=$id;
    $_SESSION["nom"]=$nom; 
}

function logout()
{
    if(isset($_SESSION["id"]))
    {
        unset($_SESSION["id"]);
        unset( $_SESSION["nom"]);
    }
}

function emailExists(String $email,PDO $pdo)
{
    $query=$pdo->prepare("SELECT * FROM users WHERE email=:email");
    $query->bindValue(":email",$email);
    $query->execute();
    if($query->rowCount()>0)
    {
        return true;
    }
    else
    {
        return false;
    }
}
function createRandomPassword() { 

    $chars = "abcdefghijkmnopqrstuvwxyz023456789"; 
    srand((double)microtime()*1000000); 
    $i = 0; 
    $pass = '' ; 

    while ($i <= 7) { 
        $num = rand() % 33; 
        $tmp = substr($chars, $num, 1); 
        $pass = $pass . $tmp; 
        $i++; 
    } 

    return $pass; 

} 




?>