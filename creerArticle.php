<?session_start();?>

<?php

include 'Class/Article.php';

include "Views/ArticleViews.php";

echo date('d/m/Y', time());

$monArticle=new Article;

$monArticle->ecritureArticle();


?>

</body>
</html>
