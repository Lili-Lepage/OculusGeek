<?php
 session_start();

//AFFICHAGE DU COMPTE DU USER ET POSSIBILITE DE MODIFICATION

include 'Class/Utilisateur.php';

$profil= new Utilisateur;
$profil->getProfil();

if (isset($_POST['submit'])) // validation pour modifProfil
{
if($_POST['newsLetters']=='on'){
  $inscriptionNL=true;   //si on coche la checkbox, l'inscription = true

 $profil->InscNL();


}
else{
  $inscriptionNL=false; //si on l'a décoche, le user se désinscrit de la DB.
   $profil->DesinNL();


}
  $profil->modifProfil($_POST['pseudo'],$_POST['firstName'],$_POST['lastName'],$_POST['birthDate'],$_POST['sexe'],$_POST['email'],$_POST['hobits'],$_POST['geekHobits'],$_POST['userID'],$inscriptionNL);
  header('location:modifProfil.php');
}


include 'Views/modifProfilViews.php';


?>
