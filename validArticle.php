<?php

session_start();

include 'header.php';

include 'Class/Article.php';

$list=new Article;
$list->ListArticle(FALSE);

?>
