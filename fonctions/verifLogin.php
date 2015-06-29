<?php
// On démarre la session
session_start();
$loginOK = false;  // cf Astuce

// On n'effectue les traitement qu'à la condition que
// les informations aient été effectivement postées
if ( isset($_POST) && (!empty($_POST['login'])) && (!empty($_POST['password'])) ) {

  extract($_POST);  // je vous renvoie à la doc de cette fonction
  include "function.php";
$connexion=connexionPDO('localhost','oculus','toto','mysqlmaster');
  // On va chercher le mot de passe afférent à ce login
  $prepare_1 = $connexion->prepare( "SELECT pseudo,nom_utilisateur,prenom_utilisateur,email,mot_de_passe FROM utilisateur WHERE pseudo = '".addslashes($login)."'");
  $prepare_1->execute();
  $result = $login->query($prepare_1);

  // On vérifie que l'utilisateur existe bien
  if (mysql_num_rows($data) == 1){
     $row = $result->fetch(PDO::FETCH_ASSOC);

    // On vérifie que son mot de passe est correct
    if ($password == $data['mdp']) {
      $loginOK = true;
    }
  }
}

// Si le login a été validé on met les données en sessions
if ($loginOK) {
	$_SESSION['pseudo'] = $data['pseudo'];
	$_SESSION['nom_utilisateur'] = $data['nom_utilisateur'];
	$_SESSION['prenom_utilisateur'] = $data['prenom_utilisateur'];
	$_SESSION['email'] = $data['email'];
	$_SESSION['mot_de_passe'] = $data['mot_de_passe'];
}
else {
  echo 'Une erreur est survenue, veuillez réessayer !';
}
?>
