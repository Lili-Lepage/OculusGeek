<?php

session_start();
// ARTICLE EN ATTENTE DE VALIDATION

  include 'header.php';

  include 'Class/Article.php';

  $list=new Article;
  $list->ListArticle(FALSE);

?>
