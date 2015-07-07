<?php

class Photos {

    private $imageID;
    private $imageNom = '';
    private $imageURL = '';


    public function setPhotosInfos($infos = array()) {  //récupération des infos de la photo dans la DB
        foreach($infos as $info => $infoValue) {
            $this->$info = $infoValue;

        }
    }



public function uploadIMG(){
    include 'libs/db.php';
    $uploadImg=$connexion->prepare('INSERT INTO image (imageNom, imageURL)
                                        VALUES (:imageNom,:imageURL)');

    $uploadImg->bindValue(':imageNom',   $this->imageNom);
    $uploadImg->bindValue(':imageURL',   $this->imageURL);
    $uploadImg->execute();

  }
}
   ?>
