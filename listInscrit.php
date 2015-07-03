<?php session_start();
 include "header.php"; ?>


 <?php

 include"Class/Utilisateur.php";

 //on affiche les utilisateurs inscrits.

  $listUser = new Utilisateur();
  $listUser->listInscrit();

  ?>
