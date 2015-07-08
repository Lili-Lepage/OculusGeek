<!Doctype.html>
<head>

  <link rel="stylesheet" media="all"type "text/css" href="css/fixe.css" />
    <link rel="stylesheet" media="all"type "text/css" href="css/styles.css" />
  <meta charset= "UTF-8" />
  <title>Occulus_Geek</title>
</head>

<?php include 'header.php'; ?>


<body>




    <h1 class="profil"><?php echo $_SESSION['login']; //afffichage du nom du user ?></h1>


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
                  <td>inscription à la news letter </td>
                <!--   <td><input type="checkbox" name="newsLetters" checked /></td> -->
               <td><input type="checkbox" name="newsLetters" <?php echo $profil->getInscriptionNL();?> /></td>
                </tr>
                <tr>
                <td>Loisirs/centre d'intérêts</td>
                <td><input type='textarea' name='hobits' class="Hobits" value="<?php echo $profil->getHobits(); ?>"/></td>
                </tr>
                <tr>
                <td>A propos de moi</td>
                <td><input type='textarea' name='geekHobits' class="geekHobits" value="<?php echo $profil->getGeekHobits(); ?>" height='80px'  maxlength='100'/></td>
                </tr>
                <tr>


                  <input type='hidden' name="userID" value="<?php echo $profil->getUserID(); ?>">
                <td><input type='submit' value='modifier' name='submit'></td>
                </tr>
          </table>
        </form>
    </div>
</body>
