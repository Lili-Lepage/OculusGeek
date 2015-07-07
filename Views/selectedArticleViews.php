<meta charset="UTF-8"/>

<body>
<div class ="articleSelected">

    <FORM ACTION="" method="POST" ENCTYPE="multipart/form-data">
          <br />
           <?php if (isset ($suppr) && $suppr==TRUE){

          //les boutons valider et supprimer peuvent s'afficher selon si l'article est en attente de validation ou non.
          echo '<input type="submit" name="validArticle" value="valider l article">
          <input type="submit" name="supprimerArticle" value="Supprimer">';
          }
          ?>
    </FORM>
</div>
</body>
