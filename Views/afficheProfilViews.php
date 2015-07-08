<!doctype html>
<html lang="fr">
<head>
  <meta charset= "UTF-8" />
  <link rel="stylesheet" media="all"type "text/css" href="css/fixe.css" />
  <link rel="stylesheet" media="all"type "text/css" href="css/styles.css" />
</head>




<body>
<form ACTION="" method="POST" ENCTYPE="multipart/form-data">
  <?php include "header.php";
  if ($grade>2){ ?>


      <div>
<select name="grade">
    <option value=0>Limité</option>
    <option value=1>Inscrit</option>
    <option value=2>Administrateur</option>
    <option value=0>Master</option>
</select>
<input type="submit" name="validerGrade" value="Changer">
</div>
<div>
    <input type="submit" name="suppr" value="Supprimer le compte">
</div>
  <?php ;
  }
  $self=1?>

</form>
</body>
