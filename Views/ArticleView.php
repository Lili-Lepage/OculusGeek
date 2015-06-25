<!DOCTYPE html>
<link rel="stylesheet" media="all"type "text/css" href="css/fixe.css" />
<link rel="stylesheet" media="all"type "text/css" href="css/styles.css" />

<html lang="fr">
  <head>
      <meta charset= "UTF-8" />
      <link rel="stylesheet" media="all"type "text/css" href="css/fixe.css" />
      <title>Occulus_Geek</title>
      <script type="text/javascript" src="Jquery/jquery-2.1.4.min.js"></script>
      <script type="text/javascript" src="Jquery/Article.js"></script>

  </head>

  <body>

  <?php include 'header.php'?>

  <div class="creerArticle">
    <form action='' method='post'>
        <p class="titreArticle">
          Titre</br>
            <input id="articleTitle" type='text' name='nom_article' placeholder='titre de l&#8217article' />
            <!-- <input type='text' name='titre_article' placeholder=$titre/> mettre combobox-->
        </p>

        <p>Attention, tous les champs doivent être remplis: titre, contenu de l'article,thème principale et thème(s) secondaire(s).</p>

        <p><label for='contenu'></label><textarea id="articleContent" name='contenu' tabindex='13' cols='80' rows='40' placeholder='Ecrivez votre article ici'></textarea></p>
        </fieldset>

        <div id="imgSubmit" style="width: 150px; background-color: rgb(55, 55, 55); font-weight: bold; padding: 10px; text-align: center; color: rgb(255, 99, 0); margin: 15px 0px 0px 400px;">Validez l'article !</div>
        <div style='text-align:center; display:none;'><input id="submit" type='submit' name='submit' value="Valider l'article ?" tabindex='15' /></div>


    </form>
 </div>
  </body>

</html>
