<?php


function inscription($cible,$value){
echo"	<p>
    Bonjour! <br />
</p>C'est ici qu'on se connecte.

<form action=$cible.php method='post' >
<p>
    <input type='text' name='login' placeholder='Login'/>
</p>

<form action=$cible.php method='post' >
<p>
    <input type='password' name='mdp' placeholder='mot de passe'/>
  <br/>  <input type='submit' value=$value />
</p>";	
}



// ceci est une simple fonction pour la redirection, 
//comme indiqué $cible est le nom de la page/du fichier sans ".php"
// $value défini ce qui est écrit dans le bouton
function redirection($cible,$value){
	echo "<form action=$cible.php method='post'>
	<input type='submit' value=$value />";
	}

?>