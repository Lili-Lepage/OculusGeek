<!Doctype.html>
<head>

  <link rel="stylesheet" media="all"type "text/css" href="css/fixe.css" />
    <link rel="stylesheet" media="all"type "text/css" href="css/styles.css" />
  <meta charset= "UTF-8" />
  <title>Occulus_Geek</title>
</head>

<?php include 'header.php'; ?>


<body>

<h1 class="profil"><?php echo $_SESSION['login']; ?></h1>

  <FORM ACTION="modifProfil.php" method="POST" ENCTYPE="multipart/form-data">
  <input type="hidden" name=\"max_file_size" value="50000">
  image:<input TYPE="file" NAME="image"><br>
  <INPUT TYPE="submit" NAME="telecharger" VALUE="envoyer">
  </form>
<div class="texteProfil">(Ecrivez dans les champs pour modifier votre profil)</div>
<div class="formProfil">

    <form action='' method='post'>
      <table>
          <tr>
              <td>Pseudo (<i>impossible à changer</i>)</td>
              <td><input type='text' name='pseudo' value="<?php echo $profil->getPseudo(); ?>" /></td>
          </tr>

          <tr>
          <td>Prénom *</td>
          <td><input type='text' name='firstName' value="<?php echo $profil->getFirstName(); ?>" /></td>
          </tr>
          <tr>
          <td>Nom *</td>
          <td><input type='text' name='lastName' value= "<?php echo $profil->getLastName(); ?>" /></td>
          </tr>
          <tr>
          <td>Date de naissance</td>
          <td><input type='date' name='birthDate' value="<?php echo $profil->getBirthDate(); ?>" /></td>
          </tr>
          <tr>
          <td>Sexe</td>
          <td>
            <input type='texte' name='sexe' value="<?php echo $profil->getSexe(); ?>">
          </td>
          </tr>
            <tr>
            <td>Email *</td>
            <td><input type='text' name='email' value="<?php echo $profil->getEmail(); ?>" /></td>
            </tr>
            <tr>
            <td>Loisirs</td>
            <td><input type='textarea' name='hobits' value="<?php echo $profil->getHobits(); ?>"/></td>
            </tr>
            <tr>
            <td>Centres d'interets technologiques</td>
            <td><input type='textarea' name='geekHobits' value="<?php echo $profil->getGeekHobits(); ?>" height='80px'  maxlength='100'/></td>
            </tr>
            <tr>
              <input type='hidden' name="userID" value="<?php echo $profil->getUserID(); ?>">
            <td><input type='submit' value='modifier' name='submit'></td>
            </tr>
      </table>
    </form>
</div>
</body>