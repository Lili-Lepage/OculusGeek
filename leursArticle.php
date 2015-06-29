<?php

include 'Class/Article.php';
//include 'Views/leursExperiencesViews.php';

$id=$_GET["id"];
$article= new Article($id);
$article->AfficheArticle($id);

?>