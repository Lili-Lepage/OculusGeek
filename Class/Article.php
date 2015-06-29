<?php

class Article{

    private $nom_article;
    private $contenu;
    private $auteur;
    private $date;


  public function ecritureArticle(){
  //        $nom_article='Le titre est ici';
  //        $contenu='Ecrivez votre article ici';

      if (!empty($_POST['submit'])){
          $this->verifArticle();
      }
  }

  public function verifArticle(){//Fonction qui s'active après qu'il y ait eu Validation

  //mettre les $_POST en variable.
    if (isset($_POST['nom_article'])&& !empty($_POST['nom_article'])/*&& isset($_POST['theme1'])&& !empty($_POST['theme1'])*/&& isset($_POST['contenu'])&& !empty($_POST['contenu'])/*&& isset($_POST['theme2'])&& !empty($_POST['theme2'])*/){
            $this->recordArticle();

    } else {

    	$_SESSION['nom_article']=$_POST['nom_article'];//permet de maintenir le nom de l'article en place si il y a des champs manquant
    	$_SESSION['contenu']=$_POST['contenu'];//conserve le contenu si il y a des champs manquant

      /*echo '<p></p>
  		 <FORM><INPUT Type="button" VALUE="Retourner à l&#8217écriture de votre article" onClick="history.go(-1);return true;"></FORM>';
  			//!\ ICI LA POP UP DOIT FAIRE UN RETOUR, COMME LA FLECHE RETOUR DU NAVIGATEUR /!\
      */
      $message='Oups, on dirait que tout les champs n&#8217ont pas été remplis, si vous changez de page maintenant, vos données seront perdu';

      echo '<script type="text/javascript">window.alert("'.$message.'");</script>';


  		}
  	}

  public function recordArticle(){//Va enregistrer les articles dans la DB
    include 'libs/db.php';
    $stmt=$connexion->prepare('INSERT INTO articles (nom_article,contenu) VALUES (:nom_article,:contenu)');
    $stmt->bindValue(':nom_article', $_POST['nom_article']);
    $stmt->bindValue(':contenu', $_POST['contenu']);
    $stmt->execute();

    //!\ ATTENTION ICI LA POP UP DOIT RENVOYER AU MENU ACCUEIL OU A L'AFFICHAGE DES EXPERIENCES /!\
     /* echo "
    <form action='../accueil.php' method='post'>
    <p></p>
    <div style='text-align:center;'><input type='submit' name='submit' value='Page d&#8217acceuil' tabindex='15' /></div>
    </form>";*/

    $message='Félicitation, votre article a bien été enregistré et soumis à l aprobation d un administrateur.';

    echo '<script type="text/javascript">window.alert("'.$message.'");</script>';

  }

  public function AfficheArticle(){
    include 'libs/db.php';
    $stmt=$connexion->prepare('SELECT FROM info (nom_article,contenu) VALUES (:nom_article,:contenu)');
    foreach (articles as $article){
      $stmt->bindValue(':nom_article',$article);
      echo $article;
      var_dump($article);
    }

  }

}

?>
