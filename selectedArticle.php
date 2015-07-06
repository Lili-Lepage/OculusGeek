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

if ($grade->getGrade()>1 && !$article->getVisible()){
    $suppr=TRUE;
}
$article->AfficheArticle($id);
include 'Views/selectedArticleViews.php';

if ($_POST['validArticle']){
    $article->validArticle($id,1);
}

?>
