<?php

//Vérifie que le user est connecté pour afficher "mon compte" "deconnexion" même principe que sur le header

$con = false;

if (isset($_SESSION['login'])) {
  $con = true; //session active



  /*$_SESSION["isFollower"] = false; //on part du principe que le user n'est pas inscrit à la News
  include 'Class/Utilisateur.php';
   $user=Utilisateur::getUserByPseudo($_POST['login']);
     if ($user->isFollower()) {    //fonction 'isFollower' d'utilisateur.php
     $_SESSION["isFollower"] = true;  //si il est inscrit on passe à true.
   }*/


}

// Inscription à la News Letter

	$signed = false; //variable désignant si une personne est inscrite ou non, ici on part du principe qu'elle ne l'est pas.
  $message = 'inscription réussie';    //variable contenant le message de la fenêtre popup


	if (isset($_POST['email']) && isset($_POST['submit'])) {

		include 'libs/db.php'; //connexion à la DB
		$inscriptionNews=$connexion->prepare('INSERT INTO newslettersmails (email) VALUES (:email)'); //insertion de l'email dans la DB
	  $inscriptionNews->bindValue(':email', $_POST['email']);
		$inscriptionNews->execute();
    $_SESSION["isFollower"] = true;
		$signed = true; //personne vient de s'inscrire Signed passe à true

 }






include 'Views/footerViews.php';


?>
