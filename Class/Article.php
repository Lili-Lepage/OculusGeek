<?php

class Article{

    private $id_article;
    private $userId;
    public $nom_article='';
    public $contenu='';
    public $date_article='';
    public $visible='';


    public function setArticleInfos($infos = array()) {  //récupération des infos de l'article dans la DB
        foreach($infos as $info => $infoValue) {
            $this->$info = $infoValue;

        }
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


    $message='Félicitation, votre article a bien été enregistré et soumis à l aprobation d un administrateur.';

    echo '<script type="text/javascript">window.alert("'.$message.'");</script>';

  }


    /*AFFICHE UNE LISTE DES TITRES DES ARTICLES*/

  public function ListArticle($visibility){
    include 'libs/db.php';


    if ($visibility==TRUE){
        foreach ($connexion->query('SELECT id_article,nom_article,date_article,contenu FROM articles WHERE visible=1')as $row){

            $url= 'selectedArticle.php?id=';
            $id= $row ['id_article'];
            $url= $url.$id;


            print "</p><a href=$url>".$row ['nom_article']."</a>"."  -  fait le: ";
            print $row ['date_article']."\t";


        }
    }else if ($visibility==FALSE){
        foreach ($connexion->query('SELECT id_article,nom_article,date_article,contenu FROM articles WHERE visible=0')as $row){

            $url= 'selectedArticle.php?id=';
            $id= $row ['id_article'];
            $url= $url.$id;


            print "</p><a href=$url>".$row ['nom_article']."</a>"."  -  fait le: ";
            print $row ['date_article']."\t";


        }
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

    public function validArticle($id,$TRUE){
        include 'libs/db.php';
        $maj=$connexion->query("UPDATE articles
                                      SET
                                            visible=$TRUE
                                     WHERE  id_article= $id ");
        $maj->execute();
    }
public function supprimerArticle($id){
    include 'libs/db.php';
    $suppr=$connexion->query("DELETE FROM articles WHERE id_article= $id");
    $suppr->execute();
}

    public static function getArticleById($id) {
        include 'libs/db.php';
        $query = $connexion->prepare('SELECT * FROM articles WHERE id_article = :id_article ;');
        $query->bindValue(':id_article', $id);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_OBJ);
        $userByPseudo = 'Utilisateur inconnu';

        if (is_object($user)) {
            $userByPseudo = new Article();
            $userByPseudo->setArticleInfos(get_object_vars($user));
        }

        return $userByPseudo;

    }

    public function getVisible()
    {
        return $this->visible;
    }
    public function setVisible($visible)
    {
        $this->visible=$visible;
    }
}

?>
