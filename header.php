
<?php

//vérifier que l'utilisateur est bien connecté afin d'afficher "deconnexion/mon compte"

$con = false;

if (isset($_SESSION['login'])) {
  $con = true;
}
include 'Views/headerViews.php';

?>
