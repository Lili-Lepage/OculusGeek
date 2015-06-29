
<?php



include 'Views/headerViews.php';

$con=false;
    include 'Class/Utilisateur.php';
    $user=Utilisateur::getUserByPseudo($_POST['login']);
    $_SESSION['login']=$_POST['login'];
    if (is_object($user)) {

        if ($user->checkPassWord($_POST['MDP'])) {  //vérification du mot de passe et du pseudo associé
            session_start(); //session ouverte

            $_SESSION["login"] = $user->pseudo;

            $con=true;


            //header('location:/OculusGeek/accueil.php');// renvoie à la page d'acceuil

        $_SESSION["login"] = $user->pseudo;
      //  $_SESSION["isFollower"] = false; //on part du principe que le user n'est pas inscrit à la News

        //if ($user->isFollower()) {

        //  $_SESSION["isFollower"] = true;  //si il est inscrit on passe à true.

        




        } else {
            echo "mauvais pseudo ou mot de passe";
        }
    }

    include 'Views/connexionViews.php';



?>
