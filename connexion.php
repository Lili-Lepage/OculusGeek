
<?php



include 'Views/headerViews.php';

$con=false;
    include 'Class/Utilisateur.php';
    $user=Utilisateur::getUserByPseudo($_POST['login']);
    if (is_object($user)) {

        if ($user->checkPassWord($_POST['MDP'])) {  //vérification du mot de passe et du pseudo associé
            session_start(); //session ouverte

            $_SESSION["login"] = $user->pseudo;

            $con=true;

            //header('location:/OculusGeek/accueil.php');// renvoie à la page d'acceuil



        } else {
            echo "mauvais pseudo ou mot de passe";
        }
    }

    include 'Views/connexionViews.php';



?>
