<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8" />

		<link rel="stylesheet" media="all"type "text/css" href="css/fixe.css" />
		<title>Occulus_Geek</title>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>

		<script>
			webshims.setOptions('forms-ext', {types: 'date'});
			webshims.polyfill('forms forms-ext');
		</script>

    </head>
	<body>
        <?php include 'header.php'; ?>

        <form action="" method="post">
            <table>
                <tr>
                    <td>Pseudo *</td>
                    <td><input type="text" name="pseudo" value="" /></td>
                </tr>
                <tr>
                    <td>Mot de passe *</td>
                    <td><input type="password" name="passWord" value="" /></td>
                </tr>
                <tr>
                    <td>Confirmer le mot de passe *</td>
                    <td><input type="password" name="passWordBis" value="" /></td>
                </tr>
                <tr>
                    <td>Prénom *</td>
                    <td><input type="text" name="firstName" placeholder="Prénom" /></td>
                </tr>
                <tr>
                    <td>Nom *</td>
                    <td><input type="text" name="lastName" placeholder="Nom" /></td>
                </tr>
                <tr>
                    <td>Date de naissance</td>
                    <td><input type="date" name="birthDate" /></td>
                </tr>
                <tr>
                    <td>Sexe</td>
                    <td>
                        <select name="sexe" >
                            <option value="Homme" selected>Homme</option>
                            <option value="Femme">Femme</option>
                            <option value="Autre">Autre</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Email *</td>
                    <td><input type="text" name="email" placeholder="xxxx@xxxx.com" /></td>
                </tr>
                <tr>
                    <td>Loisirs</td>
                    <td><textarea type="text" name="hobits">qu aimez vous ?</textarea></td>
                </tr>
                <tr>
                    <td>Centres d"interets technologiques</td>
                    <td><textarea type="text" name="geekHobits" height="80px" maxlength="100">Quels sujets t&#8217interessent ?</textarea></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Valider" name="submit"></td>
                </tr>
            </table>
        </form>

    </body>
</html>
