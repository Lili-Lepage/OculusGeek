<?php

session_start();

include "Class/Utilisateur.php";
include "Views/afficheProfilViews.php";
$ID=$_GET["id"]; //récupère l'id de l'article
$userProfil= new Utilisateur();
$userProfil->afficheProfil($ID);
$userProfil->getProfil();
$grade=$userProfil->getGrade();
if ($grade>2){
    echo "Changer le rang de la personne."; //ici on doit rajouter la possibilité de changer le rang (?)
    echo"Supprimer le compte de la personne."; //ici on doit ajouter la possibilité de supprimer le compte (?)
}
?>
