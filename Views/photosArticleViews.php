<html>

<meta charset="utf-8"/>
<body>
<form method="POST" action="" enctype="multipart/form-data">
     <!-- On limite le fichier à 100Ko -->
     Fichier : <input type="file" name="image">
     <input type="submit" name="upload" value="upload">

     <?php if (isset($photoPath)) {         //affichage de l'url de l'image  copier dans l'article
         echo '&lt;img src="'.$photoPath.'" /&gt;';
     }?>
</form>
</body>
</html>
