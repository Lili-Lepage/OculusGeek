<?php
// On appelle la session
session_start();

// On affiche une phrase résumant les infos sur l'utilisateur courant
echo 'Pseudo : ',$_SESSION['pseudo'],'<br />
     Age : ',$_SESSION['age'],'<br />
     Sexe : ',$_SESSION['sexe'],'<br />
     Ville : ',$_SESSION['ville'],'<br />';
?>