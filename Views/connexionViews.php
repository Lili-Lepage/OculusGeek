<!DOCTYPE html>
    <html lang="fr">
    	<head>
    		<meta charset= "UTF-8" />
    		<link rel="stylesheet" media="all"type "text/css" href="css/fixe.css" />

    		<title>Occulus_Geek_connexion</title>

    </head>

<body>

<div class="FormCon">
    <form action="" method="post">

        <p>Login</p> <br />
            <input type="text" name="login" /><br />

        <p>Mot de passe</p>
            <input type="password" name="MDP" /><br />

        <input type="submit" value="Valider" name="valider"/>

        <?php if ($con) {  // si l'utilisateur est connecté ?>

          <nav class="D_MC">
              <ul>
                  <li><a href="/OculusGeek/accueil.php"><div class="btnD_C">Deconnexion</div></a></li>
                  <li><a href="/OculusGeek/#"><div class="btnD_C">Mon compte</div></a></li>
              </ul>
        </nav>
        <?php } else {?>

          <nav class="C_I">
              <ul>
                  <li><a href="/OculusGeek/connexion.php"><div class="btnC_I">Connexion</div></a></li>
                  <li><a href="/OculusGeek/inscription.php"><div class="btnC_I">Inscription</div></a></li>
              </ul>
        </nav>

        <?php } ?>


    </form>
</div>

</body>
