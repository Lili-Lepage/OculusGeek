<?php

session_start();

include 'Views/validArticleViews.php';

include 'Class/Article.php';

$list=new Article;
$list->ListArticle();

?>
