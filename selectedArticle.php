<?php
session_start();

include 'Views/selectedArticleViews.php';
include 'Class/Article.php';


$id=$_GET["id"]; //récupère l'id de l'article
$article= new Article();
$article->AfficheArticle($id);



?>
