<?php

//Vérifie que le user est connecté pour afficher "mon compte" "deconnexion" même principe que sur le header

$con = false;  //session

if (isset($_SESSION['login'])) {
  $con = true;
}


// Inscription à la News Letter

	$singed = false; //variable désignant si une personne est inscrite ou non, ici elle ne l'est pas.

	if (isset($_POST['email']) && isset($_POST['submit'])) {
  $message = 'inscription réussie'; //variable contenant le message de la fenêtre popup

		include 'libs/db.php'; //connexion à la DB
		$inscriptionNews=$connexion->prepare('INSERT INTO newslettersmails (email) VALUES (:email)'); //insertion de l'email dans la DB
	  $inscriptionNews->bindValue(':email', $_POST['email']);
		$inscriptionNews->execute();

		$singed = true; //personne vient de s'inscrire Singed passe à true

 } else if ($_SESSION["isFollower"] == true) {  //Si le follower est deja inscrit singed.

   $singed =true;

 }






include 'Views/footerViews.php';


?>
