<?session_start();?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Inscription</title>
</head>
<body>





<?php
include "function.php";

$connexion=connexionPDO('localhost','oculus','root','');


	echo 'Creation d\'un compte<BR/><BR/>';

$requete_prepare_1=$connexion->prepare("SELECT*FROM utilisateur");
$requete_prepare_1->execute();

if (!isset($_POST['pseudo'])&& empty($_POST['pseudo'])&& !isset($_POST['prenom_utilisateur'])&& empty($_POST['prenom_utilisateur'])&& !isset($_POST['nom_utilisateur'])&& empty($_POST['nom_utilisateur'])&& !isset($_POST['email'])&& empty($_POST['email'])&& !isset($_POST['mot_de_passe'])&& empty($_POST['mot_de_passe'])){
echo"<form action=' ' method='post'>

	<p>Pseudo*</p>
		<input type='text' name='pseudo' placeholder='Pseudo'/> <br />
	<p>Prénom*</p>
		<input type='text' name='prenom_utilisateur' placeholder='Prénom'/><br />
	<p>Nom*</p>
		<input type='text' name='nom_utilisateur' placeholder='Nom'/> <br />
	<p>Date de naissance</p>
		<input type='date' name='date_naissance' placeholder='JJ/MM/AAAA'/><br />
	<p>Sexe</p>
		<input type='text' name='sexe' placeholder='Homme/Femme/Autre ?'/><br />
	<p>Email*</p>
		<input type='text' name='email' placeholder='xxxx@xxxx.com'/><br />
	<p>Loisirs</p>
		<input type='text' name='loisirs' placeholder='qu aimez vous ?'/><br />
	<p>Centres d'interets technologiques</p>
		<input type='text' name='centres_interets' placeholder='Quels sujets t&#8217interessent ?'/><br />
	<p>Mot de passe*</p>
		<input type='password' name='mot_de_passe' placeholder='mdp'/><br />

	<br/><input type='submit' value='Valider' name='submit'>
</form>";
}


if (isset($_POST['pseudo'])&& !empty($_POST['pseudo'])&& isset($_POST['prenom_utilisateur'])&& !empty($_POST['prenom_utilisateur'])&& isset($_POST['nom_utilisateur'])&& !empty($_POST['nom_utilisateur'])&& isset($_POST['email'])&& !empty($_POST['email'])&& isset($_POST['mot_de_passe'])&& !empty($_POST['mot_de_passe'])){
	$stmt=$connexion->prepare('INSERT INTO utilisateur (pseudo, nom_utilisateur, prenom_utilisateur,date_naissance,sexe,email,loisirs,centres_interets,mot_de_passe) VALUES (:pseudo,:nomU,:preU,:date,:sexe,:email,:loisirs,:centInteret,:mdp)');
	$stmt->bindValue(':pseudo', $_POST['pseudo']);
	$stmt->bindValue(':nomU', $_POST['nom_utilisateur']);
	$stmt->bindValue(':preU', $_POST['prenom_utilisateur']);
	$stmt->bindValue(':date',$_POST['date_naissance']);
	$stmt->bindValue(':sexe',$_POST['sexe']);
	$stmt->bindValue(':email',$_POST['email']);
	$stmt->bindValue(':loisirs',$_POST['loisirs']);
	$stmt->bindValue(':centInteret',$_POST['centres_interets']);
	$stmt->bindValue(':mdp',$_POST['mot_de_passe']);
	$stmt->execute();
	echo "<form action='connexion.php' method='post'>
		<p>Votre compte a été créé !<br/>
		Veuillez vous rediriger vers la page de connexion: <p/>
		<input type='submit' value='redirection' name='Connexion'><br/>

		<form>";
}



?>

</br><a href = "connexion.php"> Retourner à la connexion </a> <br/>
</br><a href="acceuil.php">Retour à l'acceuil</a><br/>

</body>
</html>
