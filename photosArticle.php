<?php
include "libs/db.php";
include "Views/photosArticleViews.php";
if( isset($_POST['upload']) ) // si formulaire soumis
{
    $content_dir = 'photosArticle/'; // dossier où sera déplacé le fichier

    $tmp_file = $_FILES['image']['tmp_name'];

    if( !is_uploaded_file($tmp_file) )
    {
        exit("Le fichier est introuvable");
    }

    // on vérifie maintenant l'extension
    $type_file = $_FILES['image']['type'];

    if( !strstr($type_file, 'jpg') && !strstr($type_file, 'jpeg') && !strstr($type_file, 'bmp') && !strstr($type_file, 'gif') )
    {
        exit("Le fichier n'est pas une image");
    }

    // on copie le fichier dans le dossier de destination
    $name_file = $_FILES['image']['name'];

    if( !move_uploaded_file($tmp_file, $content_dir . $name_file) )
    {
        exit("Impossible de copier le fichier dans $content_dir");
    }

//on inclu la requête qui permet de rentrer les images dans la BDD une fois qu'elles sont présentes dans le dossier.

    include "Class/Photos.php";
    $uploadImg= new Photos();
    $uploadImg->uploadIMG();

        echo "Le fichier a bien été uploadé";

  }



















?>
