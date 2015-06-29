

<?php session_start();

include 'Views/compteViews.php'; ?>

<?php

include 'libs/db.php';

  $query=$connexion->prepare('SELECT * from users  WHERE pseudo = :pseudo ;');
  $query->bindValue(':pseudo', $pseudo);
  $query->execute();

echo $pseudo;


 

?>
