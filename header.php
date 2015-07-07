
<?php

//vérifier que l'utilisateur est bien connecté afin d'afficher "deconnexion/mon compte"

include_once 'Class/Utilisateur.php';
$con = false;

if (isset($_SESSION['login'])) {
  $con = true;
  /*PERMET D'UTILISER LE GRADE SUR TOUTES LES PAGES AVEC $grade*/
  $profil= new Utilisateur;
  $profil->getProfil();
  $grade=$profil->getGrade(); //pour avoir lke grade de présent
  $pseudo=$profil->getPseudo(); //pour récupérer le pseudo et l'afficher dans le header

}

include 'Views/headerViews.php';

?>
