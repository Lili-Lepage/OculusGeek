<!Doctype.html>
<head>

  <link rel="stylesheet" media="all"type "text/css" href="css/fixe.css" />
  <meta charset= "UTF-8" />
  <title>Occulus_Geek</title>
</head>

<?php include 'header.php'; ?>


<body>


    <form action='accueil.php' method='post'>
      <table>
          <tr>
              <td>Pseudo *</td>
              <td><input type='text' name='pseudo' value=".$pseudo." /></td>
          </tr>

          <tr>
          <td>Prénom *</td>
          <td><input type='text' name='firstName' value=".$data->firstName." /></td>
          </tr>
          <tr>
          <td>Nom *</td>
          <td><input type='text' name='lastName' value= ".$data->lastName." /></td>
          </tr>
          <tr>
          <td>Date de naissance</td>
          <td><input type='date' name='birthDate' value=".$data->birthDate." /></td>
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
            <td><input type='text' name='email' value=".$data->email." /></td>
            </tr>
            <tr>
            <td>Loisirs</td>
            <td><textarea type='text' name='hobits'>".$data->hobits." </textarea></td>
            </tr>
            <tr>
            <td>Centres d interets technologiques</td>
            <td><textarea type='text' name='geekHobits' height='80px' maxlength='100'>".$data->geekHobits."</textarea></td>
            </tr>
            <tr>
            <td><input type='submit' value='Valider' name='submit'></td>
            </tr>
      </table>
    </form>
</body>
