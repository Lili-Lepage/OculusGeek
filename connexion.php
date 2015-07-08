
<?php
session_start();

$error="";

  if (isset($_POST['valider'])) {  //vérifier que le bouton valider soit exécuté

    include 'Class/Utilisateur.php';
    $user=Utilisateur::getUserByPseudo($_POST['login']);//récupération des informations par le pseudo du users
    if (is_object($user)) { //si le pseudo existe

      if ($user->checkPassWord($_POST['MDP'])) {  //vérification du mot de passe et du pseudo associé

      $_SESSION["login"] = $user->getPseudo();

        header('location:accueil.php');// renvoie à la page d'accueil

      } else {
        $error="mauvais pseudo ou mot de passe";
      }
    }

    if (!is_object($user))  //si le pseudo existe pas
      {
      $error="vous n'êtes pas inscrit";
    }
  }



  include 'Views/connexionViews.php';



?>
