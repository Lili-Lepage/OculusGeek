<?php


function connexionPDO($host,$bd,$nom,$mdp)
$PARAM_hote=$host; // le chemin vers le serveur
$PARAM_port=$port; '3306';
$PARAM_nom_bd=$bdd; // le nom de votre base de donn꦳
$PARAM_utilisateur=$user; // nom d'utilisateur pour se connecter
$PARAM_mot_passe=$mdp; // mot de passe de l'utilisateur
try{
    $connexion = new PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mot_passe);
    $connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION );
    return $connexion;
}
 catch(Exception $e) {
        echo 'Erreur : '.$e->getMessage().'<br />';
        echo 'NР: '.$e->getCode();
}

?>
