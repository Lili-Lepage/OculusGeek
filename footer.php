<?php

//Vérifie que le user est connecté pour afficher "mon compte" "deconnexion" même principe que sur le header

$con = false;

if (isset($_SESSION['login'])) {
  $con = true;
}


// Inscription à la News Letter

	$singed = false; //variable désignant si une personne est inscrite ou non

	if (isset($_POST['email']) && isset($_POST['submit'])) {
  $message = 'inscription réussie'; //variable contenant le message de la fenêtre popup

		include 'libs/db.php'; //connexion à la DB
		$inscriptionNews=$connexion->prepare('INSERT INTO newslettersmails (email) VALUES (:email)');
	  $inscriptionNews->bindValue(':email', $_POST['email']);
		$inscriptionNews->execute();

		$singed = true; //personne vient de s'inscrire

 }






include 'Views/footerViews.php';


?>
