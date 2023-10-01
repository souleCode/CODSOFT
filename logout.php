<?php
require("fonctions.php");

logout();

$_SESSION["message"]="Vous etes maintenant déconnectés";
header("Location:index.php");