<?session_start();?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Rédaction d'articles</title>
</head>
<body>



<?php
include "function.php";
$connexion=connexionPDO('localhost','occulus','toto','mysqlmaster');

if (!isset($_POST['nom_article'])|| empty($_POST['nom_article'])/*|| !isset($_POST['theme1'])|| empty($_POST['theme1'])*/|| !isset($_POST['contenu'])|| empty($_POST['contenu'])/*|| !isset($_POST['theme2'])|| empty($_POST['theme2'])*/){
	
echo "<form action='' method='post'>
<p>
    <input type='text' name='nom_article' placeholder='titre de l&#8217article'/>
	<!-- <input type='text' name='titre_article' placeholder='titre de l&#8217article'/> mettre combobox-->
</p>

<p><label for='contenu'></label><textarea id='article' name='contenu' tabindex='13' cols='80' rows='40' placeholder='écrivez votre article ici'></textarea></p>
</fieldset>

<div style='text-align:center;'><input type='submit' name='submit' value='Valider l&#8217article ?' tabindex='15' /></div>
<p>Attention, tout les champs doivent être remplit: titre, contenu de l'article,thème principale et thème(s) secondaire(s).
</form>";
}


//!\supposé être la dropbox mais bon j'y arrive pas /!\

/*$requete_prepare_1=$connexion->prepare("SELECT*FROM categorie_articles");
	$requete_prepare_1->execute();
	echo"	<form method='post' name='formcategorie' onchange='document.formcategorie.submit'>";
	echo"	<select name='categorie_articles'>;";
	echo "	<option value='ordinateur'></option>
			<option value='jeux'></option>";
	
	echo"</select><input type='submit' value='Submit'></form>";*/




if (isset($_POST['nom_article'])&& !empty($_POST['nom_article'])/*&& isset($_POST['theme1'])&& !empty($_POST['theme1'])*/&& isset($_POST['contenu'])&& !empty($_POST['contenu'])/*&& isset($_POST['theme2'])&& !empty($_POST['theme2'])*/){
	
	$stmt=$connexion->prepare('INSERT INTO articles (nom_article,contenu) VALUES (:nom_article,:contenu)');
	$stmt->bindValue(':nom_article', $_POST['nom_article']);
	$stmt->bindValue(':contenu', $_POST['contenu']);
	$stmt->execute();

	echo $_SESSION["pseudo"];
	echo $_SESSION["nom_utilisateur"];
	echo $_SESSION["prenom_utilisateur"];
	echo $_SESSION["email"];
	echo $_SESSION["mot_de_passe"];
	
echo "
	<form action='acceuil.php' method='post'>
	<p>Félicitation, votre article a bien été enregistré et soumis à l'aprobation d'un administrateur.</p>
	<div style='text-align:center;'><input type='submit' name='submit' value='Page d&#8217acceuil' tabindex='15' /></div>
	</form>";
}
?>

</body>
</html>