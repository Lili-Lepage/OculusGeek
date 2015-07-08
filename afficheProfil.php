<?php

session_start();

include "Class/Utilisateur.php";
include "Views/afficheProfilViews.php";
$ID=$_GET["id"]; //récupère l'id de l'article
$userProfil= new Utilisateur();
$userProfil->afficheProfil($ID);
$userProfil->getProfil();
$grade=$userProfil->getGrade();
if (isset($_POST['validerGrade'])){
    $userProfil->changeGrade($ID,$_POST['grade']);

}
if (isset($_POST['suppr']) && $_POST['suppr']){
    $userProfil->supprimerCompte($ID);
}
?>
