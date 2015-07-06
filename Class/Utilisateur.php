<?php

//Regroupe de toutes les fonctions utiles pour toutes les actions touchant les utilisateurs



class Utilisateur {

    private $userID;
    private $pseudo = '';
    private $passWord = '';
    private $firstName = '';
    private $lastName = '';
    private $birthDate = '';
    private $sexe = '';
    private $email = '';
    private $hobits = '';
    private $geekHobits = '';
    private $grade='';

  /*  public function __construct(){}*/

    public function setUserInfos($infos = array()) {  //récupération des infos du user dans la DB
        foreach($infos as $info => $infoValue) {
            $this->$info = $infoValue;

        }
    }

    /*INSTANCIE L OBJET AVEC LES DONNEES DE COMPTES (va chercher dans la base de données les infos)*/

    public function getProfil(){

        include 'libs/db.php';
        $pseudo=$_SESSION['login'];
        $query = $connexion->query('SELECT * FROM users WHERE pseudo="'.$pseudo.'"');
        $data=$query->fetch(PDO::FETCH_OBJ);

        foreach ($data as $key => $value) {
          $this->$key = $value;
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
            $inscription=$connexion->prepare('INSERT INTO users (pseudo, passWord, firstName,lastName,birthDate,sexe,email,hobits,geekHobits,grade)
                                                VALUES (:pseudo,:passWord,:firstName,:lastName,:birthDate,:sexe,:email,:hobits,:geekHobits,:grade)');
                                                $this->grade=1;
        	$inscription->bindValue(':pseudo',     $this->pseudo);
        	$inscription->bindValue(':passWord',   $this->passWord);
        	$inscription->bindValue(':firstName',  $this->firstName);
        	$inscription->bindValue(':lastName',   $this->lastName);
        	$inscription->bindValue(':birthDate',  $this->birthDate);
        	$inscription->bindValue(':sexe',       $this->sexe);
        	$inscription->bindValue(':email',      $this->email);
        	$inscription->bindValue(':hobits',     $this->hobits);
        	$inscription->bindValue(':geekHobits', $this->geekHobits);
          $inscription->bindValue(':grade',       $this->grade);
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





                    /* AFFICHER LE FORMULAIRE ET ENREGISTRER LES MODIFICATIONS DU PROFIL */

    public function modifProfil($modifpseudo,$firstName,$lastName,$birthDate,$sexe,$email,$hobits,$geektHobits,$userID){
        include 'libs/db.php';
        $pseudo=$_SESSION['login'];
              $maj=$connexion->query("UPDATE users
                                      SET
                                            lastName='$lastName',
                                            firstName='$firstName',
                                            birthDate='$birthDate',
                                            sexe='$sexe',
                                            email='$email',
                                            hobits='$hobits',
                                            geekHobits='$geektHobits'
                                     WHERE  userID= '$userID' ");
              $maj->execute();


            }

            /*AFFICHE UNE LISTE DES MEMBRES INSCRITS*/

          public function listInscrit(){
            include 'libs/db.php';
            foreach ($connexion->query('SELECT userID, pseudo, email FROM users')as $row){

                $url= 'afficheProfil.php?id=';
                $id= $row ['userID'];
                $url= $url.$id;


                print "</p><a href=$url>".$row ['pseudo']." "."</a>"."email: ";
                print $row ['email']."\t";


            }
          }

            /* PERMET D'AFFICHER LE PROFIL D'UN UTILISATEUR SELECTIONNE*/

            public function afficheProfil($id){
                include 'libs/db.php';
                $query=$connexion->query("SELECT pseudo, lastName, firstName, birthDate, sexe, email, hobits, geekHobits FROM users WHERE userID=".$id);
                $data=$query->fetch(PDO::FETCH_OBJ);


                foreach ($data as $key => $value)
                {
                  print "<p>".$key.": ".$value."</p>";
                }
            }


          /*AFFICHE LES INSCRIS A LA NEWS LETTER */

            public function listInscritNL(){
              include 'libs/db.php';
              foreach ($connexion->query('SELECT email FROM newslettersmails')as $row){


                  print $row ['email'];


              }
            }





    /**********************GETTER / SETTER************************************/

    public function getUserID()
    {
      return $this->userID;
    }
    public function setUserID($userID)
    {
      $this->userId=$userID;
    }


    public function getPseudo()
    {
      return $this->pseudo;
    }
    public function setPseudo($pseudo)
    {
      $this->pseudo=$pseudo;
    }



    public function getPassord()
    {
      return $this->password;
    }
    public function setPassword($password)
    {
      $this->password=$password;
    }



    public function getFirstName()
    {
      return $this->firstName;
    }
    public function setFirstName($firstName)
    {
      $this->firstName=$firstName;
    }



    public function getLastName()
    {
      return $this->lastName;
    }
    public function setLastName($lastName)
    {
      $this->lastName=$lastName;
    }



    public function getBirthDate()
    {
      return $this->birthDate;
    }
    public function setBirthDate($birthDate)
    {
      $this->birthDate=$birthDate;
    }



    public function getSexe()
    {
      return $this->sexe;
    }
    public function setSexe($sexe)
    {
      $this->sexe=$sexe;
    }



    public function getEmail()
    {
      return $this->email;
    }
    public function setEmail($email)
    {
      $this->email=$email;
    }



    public function getHobits()
    {
      return $this->hobits;
    }
    public function setHobits($hobits)
    {
      $this->hobits=$hobits;
    }



    public function getGeekHobits()
    {
      return $this->geekHobits;
    }
    public function setgeekHobits($geekHobits)
    {
      $this->geekHobits=$geekHobits;
    }
    public function getGrade()
    {
        return $this->grade;
    }
    public function setGrade($grade)
    {
        $this->grade=$grade;
    }

}






?>
