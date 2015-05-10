<?session_start()?>
<!-- formulaire.php -->
<meta charset="utf-8">





<?php
include "function.php";
/* aidé par la page: http://www.phpdebutant.org/article69.php*/
$connexion=connexionPDO('localhost','occulus','toto','mysqlmaster');
$loginOK=false;

if (!$loginOK){
	echo "<p>
    Bonjour! <br />
</p>C'est ici qu'on se connecte.

<form action='' method='post' >
<p>
    <input type='text' name='login' placeholder='Login'/>
</p>
<p>
    <input type='password' name='password' placeholder='mot de passe'/>
  <br/>  <input type='submit' value=Valider />
</p>
</form>


<form action=Inscription.php method='post'>
	<input type='submit' value=Inscription />
</form>";
}
if (isset($_POST)&&(!empty($_POST['login']))&&(!empty($POST_['password']))){
	
	extract($_POST);
	$requete_prepare_1=$connexion->prepare("SELECT*FROM utilisateur");
	$requete_prepare_1->execute();
	$sql="SELECT pseudo,nom_utilisateur,prenom_utilisateur,email,mot_de_passe FROM utilisateur WHERE login=".$_POST['login']."";
	$req=mysql_query($sql) or die('erreur SQL: <br/>'.sql);
	
	if (mysql_num_rows($req)>0){
		$data = mysql_fetch_assoc($req);
		
		if ($password == $data['mot_de_passe']){
			$loginOK = true;
		}
	}
}

if ($loginOK){
	$_SESSION["pseudo"]=$data["pseudo"];
	$_SESSION["nom_utilisateur"]=$data["nom_utilisateur"];
	$_SESSION["prenom_utilisateur"]=$data["prenom_utilisateur"];
	$_SESSION["email"]=$data["email"];
	$_SESSION["mot_de_passe"]=$data["mot_de_passe"];
	
	echo "<form action= 'acceuil.php' method='post'>
	<input type='submit' value=Acceuil>
	</form>";
}else {echo 'Une erreur est survenue, veuillez réessayer !';}
/*include "occulusfonc.php";
inscription ("cible","Valider");

echo "<p>Pas encore inscrit ?<br/>
Venez creer votre compte gratuitement.<p/>";


redirection("Inscription","Inscription");*/
//<form action="Inscription.php" method="post">
//<input type="submit" value="Inscription"/>
?>