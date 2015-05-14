<?php
function connexionPDO($host,$bdd,$user,$mdp) {



        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=test;', 'toto', 'mysqlmaster');
        }
        catch (Exception $e)
        {
                die('Erreur : ' . $e->getMessage());

        }
    }




?>
