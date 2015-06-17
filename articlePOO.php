<?session_start();?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Rédaction d'articles</title>
</head>
<body>


<?php

include 'Class/Article.php';

include "Views/ArticleView.php";


$monArticle=new Article;

$monArticle->ecritureArticle();


?>

</body>
</html>