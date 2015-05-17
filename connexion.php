
<?php


    include 'Views/connexionViews.php';
    include 'Class/Utilisateur.php';
    $user=Utilisateur::getUserByPseudo($_POST['login']);
    if (is_object($user)) {
        if ($user->checkPassWord($_POST['MDP'])) {

            session_start();

            $_SESSION["login"] = $user->pseudo;
            header('location:/OculusGeek/accueil.php');

        }
    }



?>
