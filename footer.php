<?php

//Vérifie que le user est connecté pour afficher "mon compte" "deconnexion" même principe que sur le header

$con = false;

if (isset($_SESSION['login'])) {
  $con = true; //session active

}



//if(!isset($_POST['email'])) {
 $signed=NULL;

//}
if(isset($_POST['email'])&& !empty($_POST['email'])){
      $user=new Utilisateur;

      $signed =  $user->isfollower($_POST['email']);

    // Inscription à la News Letter

    	//$signed = false; //variable désignant si une personne est inscrite ou non, ici on part du principe qu'elle ne l'est pas.
      $message = 'inscription réussie';    //variable contenant le message de la fenêtre popup

    	if ($signed==false) {

    		include 'libs/db.php'; //connexion à la DB
    		$inscriptionNews=$connexion->prepare('INSERT INTO newslettersmails (email) VALUES (:email)'); //insertion de l'email dans la DB
    	  $inscriptionNews->bindValue(':email', $_POST['email']);
    		$inscriptionNews->execute();
        $_SESSION["isFollower"] = true;
    		$signed = true; //personne vient de s'inscrire Signed passe à true


    }

}
include 'Views/footerViews.php';





?>
