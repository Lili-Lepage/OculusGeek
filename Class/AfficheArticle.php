<?session_start();?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <title>Rédaction d'articles</title>
    </head>
    <body>
<?php

    include 'libs/db.php';
    include 'Class/Article.php';

$affichage=new Article;

$affichage->AfficheArticle();
?>
</body>
</html>