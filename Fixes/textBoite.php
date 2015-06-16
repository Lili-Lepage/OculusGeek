<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" media="all"type "text/css" href="css/fixe.css" />
  </head>

		<body>

			<form method="post" action="#">
				<input type="*" name='email' placeholder="email"  size="30" maxlength="100" />
				<input type="submit" value="je m'inscris" />
		</form>


<?php

$_POST['newsletter'] = false;
	if (isset($_POST["email"]) && !empty($_POST['email'])){

		include 'libs/db.php';
		/*$query = $connexion->prepare('SELECT email FROM users WHERE email = :email ;' );
		$query->bindValue(':email', $this->email);
	  $query->execute();
  	$user = $query->fetch(PDO::FETCH_OBJ);*/

		if(isset($_POST["submit"])){

				$_POST['newsletter'] = true;



 }
}

?>

		</body>

</html>
