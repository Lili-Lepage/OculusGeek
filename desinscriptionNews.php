

<?php

include 'Views/headerViews.php';
include 'Views/desinscriptionNewsViews.php';


  $messageD='vous etes maintenant desinscrit';
	$desinscription = false; //variable désignant si une personne est inscrite ou non

	if (isset($_POST['email']) && isset($_POST['submit'])) {
  $message = 'inscription réussie'; //variable contenant le message de la fenêtre popup

		include 'libs/db.php'; //connexion à la DB
    $desinscriptionN=$connexion->prepare('DELETE from newslettersmails where email =:email');
	  $desinscriptionN->bindValue(':email', $_POST['email']);
		$desinscriptionN->execute();

		$desinscription = true; //personne vient de s'inscrire
    echo'<script type="text/javascript">window.alert("'.$messageD.'");</script>';

 }







 ?>
