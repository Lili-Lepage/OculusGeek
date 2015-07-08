<?php session_start();

//AFFICHAGE DES INSCRITS SUR LE SITE COTE ADMIN
 include "header.php"; ?>


 <?php

 include_once "Class/Utilisateur.php";

  $listUser = new Utilisateur();
  $listUser->listInscrit();

  ?>
