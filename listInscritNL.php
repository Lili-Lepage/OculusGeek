<?php session_start();
 include "header.php";

//AFFICHAGE DES UTILISATEURS INSCRITS A LA NEWS LETTER


 include_once "Class/Utilisateur.php";

  $listUser = new Utilisateur();
  $listUser->listInscritNL();

  ?>
