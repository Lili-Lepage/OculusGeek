<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8"/>
</head>

<body>
<div class ="articleSelected">

    <FORM ACTION="" method="POST" ENCTYPE="multipart/form-data">
          <br />
           <?php if (isset ($suppr) && $suppr==TRUE){ //Vérification si l'article n'a pas encore été validé.
                echo '<input type="submit" name="validArticle" value="valider l article">
                <input type="submit" name="supprimerArticle" value="Supprimer">';
            }
?>
</FORM>
</body>
