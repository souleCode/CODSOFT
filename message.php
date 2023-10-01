<?php
echo 'ceci est du text';
    if(isset($_POST["message"])){

        $message="Ce message vous a etet envoyé via la page contact du site SiteEcole.com
        Nom: " . htmlspecialchars($_POST["nom"]) ."
        Email: " . htmlspecialchars($_POST["mail"])."
        Message: " . htmlspecialchars($_POST["message"]);

        $retour =mail("souleonetraore.940@gmail.com",$_POST['subject'],$message,"From:contactsite.com"."\r\n"."Reply-to:".$_POST['mail']);
        if($retour){
            echo "<p style='text-color:green;'> Votre message a ete bien envoyé</p>";
        }
        else{
            echo "<p style='text-color:red;'>Erreur d'envoie</p>";
        }
    }
?>
