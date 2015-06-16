
<?php


    //design de la page
    include 'Views/connexionViews.php';


    include 'Class/Utilisateur.php';
    $user=Utilisateur::getUserByPseudo($_POST['login']);
    if (is_object($user)) {

        if ($user->checkPassWord($_POST['MDP'])) {  //vérification du mot de passe et du pseudo associé
            session_start(); //session ouverte

            $_SESSION["login"] = $user->pseudo;

            header('location:/OculusGeek/accueil.php');// renvoie à la page d'acceuil



        } else {
            echo "mauvais pseudo ou mot de passe";
        }
    }



?>
