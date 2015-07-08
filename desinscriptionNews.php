<?php

session_start();

include 'header.php';
include 'Views/desinscriptionNewsViews.php';
include_once 'Class/Utilisateur.php';

  $messageD='vous etes maintenant desinscrit';


	if (isset($_POST['email']) && isset($_POST['submit'])) {
  $message = 'inscription réussie'; //variable contenant le message de la fenêtre popup

  $profil= new Utilisateur;
  $profil->DesinNL();


	/*	include 'libs/db.php'; //connexion à la DB
    $desinscriptionN=$connexion->prepare('DELETE from newslettersmails where email =:email');
	  $desinscriptionN->bindValue(':email', $_POST['email']);
		$desinscriptionN->execute();*/


    echo'<script type="text/javascript">window.alert("'.$messageD.'");</script>';

   }










 ?>
