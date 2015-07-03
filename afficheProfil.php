<?php

session_start();

include "Class/Utilisateur.php";
include "Views/afficheProfilViews.php";
$ID=$_GET["id"]; //récupère l'id de l'article
$userProfil= new Utilisateur();
$userProfil->afficheProfil($ID);

?>
