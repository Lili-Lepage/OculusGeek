<!Doctype.html>
<head>

  <link rel="stylesheet" media="all"type "text/css" href="css/fixe.css" />
  <meta charset= "UTF-8" />
  <title>Occulus_Geek</title>
</head>

<?php include 'header.php'; ?>


<body>


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
          <select name='sexe' >
              <option value='Homme' selected>Homme</option>
              <option value='Femme'>Femme</option>
              <option value='Autre'>Autre</option>
          </select>
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
            <td>Centres d interets technologiques</td>
            <td><input type='textarea' name='geekHobits' value="<?php echo $profil->getGeekHobits(); ?>" height='80px'  maxlength='100'/></td>
            </tr>
            <tr>
              <input type='hidden' name="userID" value="<?php echo $profil->getUserID(); ?>">
            <td><input type='submit' value='Valider' name='submit'></td>
            </tr>
      </table>
    </form>
</body>
