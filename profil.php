<?php
 session_start();


include 'Class/Utilisateur.php';
include 'Views/profilViews.php';

$profile= new Utilisateur;

$profile->modifProfile();

?>
