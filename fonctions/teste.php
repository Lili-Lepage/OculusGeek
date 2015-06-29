<?session_start()?>
<!-- formulaire.php -->
<meta charset="utf-8">


<html>
 <head>
  <title>Connexion au site</title>
 </head>
 <body>
  <form method="post" action="verifLogin.php">
   <table border="0" width="400" align="center">
    <tr>
     <td width="200"><b>Vôtre login</b></td>
     <td width="200">
      <input type="text" name="login">
     </td>
    </tr>
    <tr>
     <td width="200"><b>Votre mot de passe<b></td>
     <td width="200">
      <input type="password" name="password">
     </td>
    </tr>
    <tr>
     <td colspan="2">
      <input type="submit" name="submit" value="login">
     </td>
    </tr>
   </table>
  </form>
 </body>
</html>
