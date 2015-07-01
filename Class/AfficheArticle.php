<?php


class AfficheArticle {

    private $id_article;
    private $userId;
    public $nom_article='';
    public $contenu='';
    public $date_article='';
    public $id;

    public function setArticleInfos($infos=array()){ //je récupère les infos de l'article dans la DB
        foreach($infos as $info=>$infoValue) {
            $this->$info = $infoValue;
        }
    }


    public function AfficheArticle($id){
        include 'libs/db.php';
        $connexion->query('SELECT * FROM articles WHERE id_article='.$id);

        print $nom_article;
        print $date_article;
        print $contenu;

    }
    public function showArticles(){
        public function AfficheArticle($id){
            include 'libs/db.php';
            $stmt=$connexion->query('SELECT * FROM articles'); //on prend nom-article pour faire une liste des articles existants par nom.
            echo"<table>";
            while($row=mysql_fetch_assoc($stmt)) {
                $connexion->query('SELECT * FROM articles WHERE id_article='.$id);

                foreach ($row as $key=>$val){
                    echo "Article: $nom_article<br/>";//avec les noms, on sera redirigé vers la page de l'article complet.
                }
            }
            print $nom_article;
            print $date_article;
            print $contenu;

        }
    }
}