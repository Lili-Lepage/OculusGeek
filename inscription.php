<?php

session_start();
$messageIns="problème de champs";

if (isset($_POST['submit'])) {

    if ($_POST['passWord'] == $_POST['passWordBis']) { //on vérifie que le mdp est égal à la deuxième case (mdp validation) de l'inscription
        include 'Class/Utilisateur.php';
        $newUser = new Utilisateur();
        $userInfos = array(
            'pseudo'     => $_POST['pseudo'],
            'passWord'   => $_POST['passWord'],
            'firstName'  => $_POST['firstName'],
            'lastName'   => $_POST['lastName'],
            'birthDate'  => $_POST['birthDate'],
            'sexe'       => $_POST['sexe'],
            'email'      => $_POST['email'],
            'hobits'     => $_POST['hobits'],
            'geekHobits' => $_POST['geekHobits']
        );
        $newUser->setUserInfos($userInfos);
        $newUser->insertNewUserInDb();



        header('location:/OculusGeek/accueil.php'); //on renvoi à la page d'acceuil lorsque l'inscription a réussie

    }

    else {
    echo'<script type="text/javascript">window.alert("'.$messageIns.'");</script>';
    }
  }






include 'Views/inscriptionViews.php';
?>
