
<?php

session_start();

  if (isset($_POST['valider'])) {  //vérifier que le bouton valider soit exécuté

    include 'Class/Utilisateur.php';
    $user=Utilisateur::getUserByPseudo($_POST['login']); //récupération des informations par le pseudo du users
    if (is_object($user)) { //si le pseudo existe

      if ($user->checkPassWord($_POST['MDP'])) {  //vérification du mot de passe et du pseudo associé

        $_SESSION["login"] = $user->pseudo;
      //  $_SESSION["isFollower"] = false; //on part du principe que le user n'est pas inscrit à la News

        //if ($user->isFollower()) {

        //  $_SESSION["isFollower"] = true;  //si il est inscrit on passe à true.

        

        header('location:accueil.php');// renvoie à la page d'accueil

      } else {
        echo "mauvais pseudo ou mot de passe";
      }
    }
  }
  include 'Views/connexionViews.php';



?>
