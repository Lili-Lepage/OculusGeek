<?php
function connexionPDO($host,$bdd,$user,$mdp) {



        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=test;', 'root', '');
        }
        catch (Exception $e)
        {
                die('Erreur : ' . $e->getMessage());

        }
    }




?>
