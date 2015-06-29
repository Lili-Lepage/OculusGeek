<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" media="all"type "text/css" href="css/fixe.css" />
  </head>

		<body>

			<form method="post" action="#">
				<input type="*" name='email' placeholder="email"  size="30" maxlength="100" />
				<input type="submit" name="submit" value="je m'inscris" />
		</form>


<?php
$message='inscription reussie';

	if (isset($_POST['email']) && isset($_POST['submit'])){


		include 'libs/db.php';
		$inscriptionNews=$connexion->prepare('INSERT INTO newslettersmails (email)
																				VALUES (:email)');
	  $inscriptionNews->bindValue(':email',     $_POST['email']);

		$inscriptionNews->execute();
    echo '<script type="text/javascript">window.alert("'.$message.'");</script>';

 }


?>

		</body>

</html>
