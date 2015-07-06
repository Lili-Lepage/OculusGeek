<?php session_start();
 include "header.php"; ?>


 <?php

 include_once "Class/Utilisateur.php";

 //on affiche les utilisateurs inscrits.

  $listUser = new Utilisateur();
  $listUser->listInscritNL();

  ?>
