<?php

//Regroupe de toutes les fonctons utiles pour toutes les actions touchant les utilisateurs



class Utilisateur {

    private $userId;
    public  $pseudo = '';
    private $passWord = '';
    private $firstName = '';
    private $lastName = '';
    private $birthDate = '';
    private $sexe = '';
    private $email = '';
    private $hobits = '';
    private $geekHobits = '';

  //  public function __construct(){    }

    public function setUserInfos($infos = array()) {  //récupération des infos du user dans la DB
        foreach($infos as $info => $infoValue) {
            $this->$info = $infoValue;

        }
    }


                            /* VERIFIER SI LE PSEUDO EXISTE OU NON */


    public function pseudoAlreadyExist() {

        $pseudoAlreadyExist = true;
        if (isset($this->pseudo)) {

            include 'libs/db.php'; //fonction connexion à la DB
            $query = $connexion->prepare('SELECT pseudo FROM users WHERE pseudo = :pseudo ;' ); // on peut remplacer :pseudo par titi
           	$query->bindValue(':pseudo', $this->pseudo); //toujours mettre bindValue = protection des données.
            $query->execute();
            $user = $query->fetch(PDO::FETCH_OBJ);


            //Si le pseudo trouvé en base et celui de l'objet ne sont pas les mêmes ou que l'objet n'existe pas, on met la variable à false.
            if (!is_object($user) || $user->pseudo != $this->pseudo) {
                $pseudoAlreadyExist = false;
            }
        }
        return $pseudoAlreadyExist;
    }





                                /*INSERER NOUVEL UTILISATEUR DANS LA DB*/

    public function insertNewUserInDb() {

        if (!$this->pseudoAlreadyExist()) {      //si le pseudo n'existe pas

            include 'libs/db.php';
            $inscription=$connexion->prepare('INSERT INTO users (pseudo, passWord, firstName,lastName,birthDate,sexe,email,hobits,geekHobits)
                                                VALUES (:pseudo,:passWord,:firstName,:lastName,:birthDate,:sexe,:email,:hobits,:geekHobits)');
        	$inscription->bindValue(':pseudo',     $this->pseudo);
        	$inscription->bindValue(':passWord',   $this->passWord);
        	$inscription->bindValue(':firstName',  $this->firstName);
        	$inscription->bindValue(':lastName',   $this->lastName);
        	$inscription->bindValue(':birthDate',  $this->birthDate);
        	$inscription->bindValue(':sexe',       $this->sexe);
        	$inscription->bindValue(':email',      $this->email);
        	$inscription->bindValue(':hobits',     $this->hobits);
        	$inscription->bindValue(':geekHobits', $this->geekHobits);
        	$inscription->execute();
            echo 'Inscription réussie';

        }

    }

                        /* ON RECUPERE LES INFORMATIONS DU USERS PAR SON PSEUDO*/


    public static function getUserByPseudo($pseudo) {
        include 'libs/db.php';
        $query = $connexion->prepare('SELECT * FROM users WHERE pseudo = :pseudo ;');
        $query->bindValue(':pseudo', $pseudo);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_OBJ);
        $userByPseudo = 'Utilisateur inconnu';

        if (is_object($user)) {
            $userByPseudo = new Utilisateur();
            $userByPseudo->setUserInfos(get_object_vars($user));
        }

        return $userByPseudo;

    }


                        /* VERIFICATION DU PASSWORD*/

    public function checkPassWord($passWord) {
        return ($passWord == $this->passWord);
    }



//VERIFICATION SI USER DEJA INSCRIT A LA NEWS LETTER

    /*public function isFollower() {

      $isFollower = false;  //user pas encore inscrit

      include 'libs/db.php';
      $query = $connexion->prepare('SELECT * FROM newsLettersMails WHERE userId = :userId ;'); //on récupère l'id du user qui s'inscrit
      $query->bindValue(':userId', $this->userId);
      $query->execute();
      $mail = $query->fetch(PDO::FETCH_OBJ);

      if (is_object($mail)) {  //si le user existe bien, son inscription est réussis.
        $isFollower = true;
      }

      return $isFollower;

    }*/


}
?>
