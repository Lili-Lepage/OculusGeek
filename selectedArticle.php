<?php
session_start();

include 'header.php';
include 'Class/Article.php';
include_once 'Class/Utilisateur.php';

$id=$_GET["id"]; //récupère l'id de l'article
$article= new Article();

$grade= new Utilisateur;
$grade= $grade ->getUserByPseudo($_SESSION['login']);
$article=$article->getArticleById($id);

if ($grade->getGrade()>1 && !$article->getVisible()){//permet aux membres de rang suppérieur aux simples utilisateurs de valider ou supprimer les articles.
    $suppr=TRUE;
}
$article->AfficheArticle($id);//permet d'afficher l'article (titre, date, contenu)
include 'Views/selectedArticleViews.php';

if (isset ($_POST['validArticle']) && $_POST['validArticle']){//fait appel à la fonction de validation si le bouton valider est appuyé.
    $article->validArticle($id,1);
}
if (isset ($_POST['supprimerArticle']) && $_POST['supprimerArticle']){
 $article->supprimerArticle($id);
}

?>
