<?php session_start();?>

<?php

//Creation d'article

    include 'Class/Article.php';

    echo date('d/m/Y', time()); //date de la création

    $monArticle=new Article;

    $monArticle->ecritureArticle();

    include "Views/creerArticleViews.php";

?>

</body>
</html>
