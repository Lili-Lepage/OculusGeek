<?php

include 'Class/Utilisateur.php';
include 'Views/profileView.php';

$_SESSION['login']='Nico';
$profile= new Utilisateur;

$profile->modifProfile();

?>