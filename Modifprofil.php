<?php
 session_start();

//AFFICHAGE DU COMPTE DU USER ET POSSIBILITE DE MODIFICATION

include 'Class/Utilisateur.php';


$profil= new Utilisateur;
$profil->getProfil();
if (isset($_POST['submit'])) // validation pour modifProfil
{

  $profil->modifProfil($_POST['pseudo'],$_POST['firstName'],$_POST['lastName'],$_POST['birthDate'],$_POST['sexe'],$_POST['email'],$_POST['hobits'],$_POST['geekHobits'],$_POST['userID']);
  header('location:modifProfil.php');
}


include 'Views/modifProfilViews.php';


?>
