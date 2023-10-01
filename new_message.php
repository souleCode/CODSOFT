<?php
session_start();
if (isset($_POST["message"])) {

    # Tu peux tous simplement definir les parametres du SMTP ici pour ecouter le port 25
    

    $message = "Ce message vous a été envoyé via la page contact du site SiteEcole.com
    Nom: " . htmlspecialchars($_POST["nom"]) . "
    Email: " . htmlspecialchars($_POST["mail"]) . "
    Message: " . htmlspecialchars($_POST["message"]);

    $retour = mail("souleonetraore.940@gmail.com", $_POST['subject'], $message, "From: ceeamsite.com" . "\r\n" . "Reply-to: " . $_POST['mail']);
    if ($retour) {
        $_SESSION['message'] ='Votre message a bien été envoyé. Merci pour votre visite.';
        header('Location:index.php');
    } else {
        $_SESSION['error'] ='Votre message n\'a pas été envoyé avec succès. Veuillez ressayer a nouveau.';
        header('Location:contact.php');
    }
}
?>

