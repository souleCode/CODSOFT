<?php ;

$server ='localhost';
$login ='id21260854_essaie';
$pass ='Ceeamsite2026@';
// dbname='id21260854_stage

// $server ='localhost';
// $login ='root';
// $pass ='';


try {
$pdo =new PDO("mysql:host=$server;port=3345;dbname=id21260854_stage",$login,$pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


}
catch (PDOException $e){
    echo "error: ".$e->getMessage();
}

//mot de passe oublié 
//Etape 1: vérifier si le mail existe
//Etape 2: Génerere un code $code=createRandomPassword();
//Etape 3:rajouter cela dans la bdd
//Etape 4:  Envoyer un mail avec la fonction to mail()
//Etape 5:Rediriger vers une page qui lui demande d'entrer le code
//Etape 5:vérifier si le code entré correspond a celiui de la bdd
//Etape 6:Modifier le mdp

?>


