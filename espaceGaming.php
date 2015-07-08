<?php session_start();

include "header.php";
include "Class/Article.php";

    $article= new Article;
    $article->articleGame();

?>
