<?php

class Article{

    private $id_article;
    private $userId;
    public $nom_article='';
    public $contenu='';
    public $date_article='';



    public function setArticleInfos($infos=array()){ //je récupère les infos de l'article dans la DB
        foreach($info as $info=>$infoValue){
            $this->$info=$infoValue;
        }
        var_dump($info);
    }

    /**/
  public function ecritureArticle(){

      if (!empty($_POST['submit'])){
          $this->verifArticle();
      }
  }

    /*VERIFICATION DU REMPLISSAGE DES CHAMPS*/

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

    /*ENREGISTREMENT DES DONNEES*/

  public function recordArticle(){//Va enregistrer les articles dans la DB
    include 'libs/db.php';
    $stmt=$connexion->prepare('INSERT INTO articles (nom_article,contenu,date_article) VALUES (:nom_article,:contenu,:date_article)');
    $stmt->bindValue(':nom_article', $_POST['nom_article']);
    $stmt->bindValue(':contenu', $_POST['contenu']);
    $stmt->bindValue(":date_article",date('Y-m-d G:i:s'));
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


    /*AFFICHE UNE LISTE DES TITRES DES ARTICLES*/

  public function ListArticle(){
    include 'libs/db.php';
    foreach ($connexion->query('SELECT id_article,nom_article,date_article,contenu FROM articles')as $row){

        $url= 'leursArticle.php?id=';
        $id= $row ['id_article'];
        $url= $url.$id;


        print "</p><a href=$url>".$row ['nom_article']."</a>"."  -  fait le: ";
        print $row ['date_article']."\t";
  //      print "<h4>".$row ['contenu']."<br /><br /></h4>";

    }
  }

    /* PERMET D'AFFICHER UN ARTICLE COMPLET (TITRE, DATE, CONTENU)*/

    public function AfficheArticle($id){
        include 'libs/db.php';
        $query=$connexion->query("SELECT nom_article,date_article,contenu FROM articles WHERE id_article=".$id);
        $data=$query->fetch(PDO::FETCH_OBJ);


        print "<h1>".$data->nom_article."</h1>";
        print "<p>".$data->date_article."</p>";
        print "<p>".$data->contenu."</p>";



    }
}

?>
