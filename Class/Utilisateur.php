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

        if (!$this->pseudoAlreadyExist()) {      //si le pseudo n'existe PAS

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

                        /*AFFICHAGE DES DONNEES DE COMPTES*/

    public function getProfile(){

        include 'libs/db.php';
        $pseudo=$_SESSION['login'];
        $query = $connexion->query('SELECT lastName,firstName,birthDate,sexe,email,hobits,geekHobits FROM users WHERE pseudo="'.$pseudo.'"');
        $data=$query->fetch(PDO::FETCH_OBJ);


            print "Pseudo: ";
            print "<h3>" . $pseudo . "</h3>";
            print "Prénom: ";
            print "<h4>" . $data->firstName . "</h4>";
            print "Nom: ";
            print "<h4>" . $data->lastName . "</h4>";
            print "date de naissance: ";
            print $data->birthDate . "<br/><br/>";
            print "sexe: ";
            print $data->sexe . "<br/><br/>";
            print "Email: ";
            print $data->email . "<br/><br/>";
            print "Hobits: ";
            print $data->hobits . "<br/><br/>";
            print "interets Technologiques: ";
            print $data->geekHobits . "<br/><br/>";





    }

                            /* AFFICHER LE FORMULAIRE ET ENREGISTRER LES MODIFICATIONS */
    public function modifProfile(){
        include 'libs/db.php';
        $pseudo=$_SESSION['login'];
        $query = $connexion->query('SELECT userID,lastName,firstName,birthDate,sexe,email,hobits,geekHobits FROM users WHERE pseudo="'.$pseudo.'"');
        $data=$query->fetch(PDO::FETCH_OBJ);



echo "<body>


<form action='accueil.php' method='post'>
    <table>
        <tr>
            <td>Pseudo *</td>
            <td><input type='text' name='pseudo' value=".$pseudo." /></td>
</tr>
<tr>
    <td>Prénom *</td>
    <td><input type='text' name='firstName' value=".$data->firstName." /></td>
</tr>
<tr>
    <td>Nom *</td>
    <td><input type='text' name='lastName' value= ".$data->lastName." /></td>
</tr>
<tr>
    <td>Date de naissance</td>
    <td><input type='date' name='birthDate' value=".$data->birthDate." /></td>
</tr>
<tr>
    <td>Sexe</td>
    <td>
        <select name='sexe' >
            <option value='Homme' selected>Homme</option>
            <option value='Femme'>Femme</option>
            <option value='Autre'>Autre</option>
        </select>
    </td>
</tr>
<tr>
    <td>Email *</td>
    <td><input type='text' name='email' value=".$data->email." /></td>
</tr>
<tr>
    <td>Loisirs</td>
    <td><textarea type='text' name='hobits'>".$data->hobits." </textarea></td>
</tr>
<tr>
    <td>Centres d interets technologiques</td>
    <td><textarea type='text' name='geekHobits' height='80px' maxlength='100'>".$data->geekHobits."</textarea></td>
</tr>
<tr>
    <td><input type='submit' value='Valider' name='submit'></td>
</tr>
</table>
</form>



</body>";
        if (isset($_POST['submit'])){
            if (!$this->pseudoAlreadyExist()|| $pseudo=$this->pseudo) {      //vérifie si le pseudo n'existe PAS || si c'est le même que celui déjà utilisé

                include 'libs/db.php';
                $maj=$connexion->query("UPDATE users SET  lastName= '".$this->lastName."',firstName='".$this->firstName."',birthDate='".$this->birthDate."',sexe='".$this->sexe."',email='".$this->email."',hobits='".$this->hobits."',geekHobits='". $this->geektHobits."' WHERE userID='".$data->userID."'");

                $maj->execute();

            }
        }
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

    /*AFFICHAGE DES DONNEES DE COMPTES*/

    public function getProfile(){

        include 'libs/db.php';
        $pseudo=$_SESSION['login'];
        $query = $connexion->query('SELECT lastName,firstName,birthDate,sexe,email,hobits,geekHobits FROM users WHERE pseudo="'.$pseudo.'"');
        $data=$query->fetch(PDO::FETCH_OBJ);


        print "Pseudo: ";
        print "<h3>" . $pseudo . "</h3>";
        print "Prénom: ";
        print "<h4>" . $data->firstName . "</h4>";
        print "Nom: ";
        print "<h4>" . $data->lastName . "</h4>";
        print "date de naissance: ";
        print $data->birthDate . "<br/><br/>";
        print "sexe: ";
        print $data->sexe . "<br/><br/>";
        print "Email: ";
        print $data->email . "<br/><br/>";
        print "Hobits: ";
        print $data->hobits . "<br/><br/>";
        print "interets Technologiques: ";
        print $data->geekHobits . "<br/><br/>";





    }

    /* AFFICHER LE FORMULAIRE ET ENREGISTRER LES MODIFICATIONS */
    public function modifProfile(){
        include 'libs/db.php';
        $pseudo=$_SESSION['login'];
        $query = $connexion->query('SELECT userID,lastName,firstName,birthDate,sexe,email,hobits,geekHobits FROM users WHERE pseudo="'.$pseudo.'"');
        $data=$query->fetch(PDO::FETCH_OBJ);



        echo "<body>


<form action='accueil.php' method='post'>
    <table>
        <tr>
            <td>Pseudo *</td>
            <td><input type='text' name='pseudo' value=".$pseudo." /></td>
</tr>
<tr>
    <td>Prénom *</td>
    <td><input type='text' name='firstName' value=".$data->firstName." /></td>
</tr>
<tr>
    <td>Nom *</td>
    <td><input type='text' name='lastName' value= ".$data->lastName." /></td>
</tr>
<tr>
    <td>Date de naissance</td>
    <td><input type='date' name='birthDate' value=".$data->birthDate." /></td>
</tr>
<tr>
    <td>Sexe</td>
    <td>
        <select name='sexe' >
            <option value='Homme' selected>Homme</option>
            <option value='Femme'>Femme</option>
            <option value='Autre'>Autre</option>
        </select>
    </td>
</tr>
<tr>
    <td>Email *</td>
    <td><input type='text' name='email' value=".$data->email." /></td>
</tr>
<tr>
    <td>Loisirs</td>
    <td><textarea type='text' name='hobits'>".$data->hobits." </textarea></td>
</tr>
<tr>
    <td>Centres d interets technologiques</td>
    <td><textarea type='text' name='geekHobits' height='80px' maxlength='100'>".$data->geekHobits."</textarea></td>
</tr>
<tr>
    <td><input type='submit' value='Valider' name='submit'></td>
</tr>
</table>
</form>



</body>";
        if (isset($_POST['submit'])){
            if (!$this->pseudoAlreadyExist()|| $pseudo=$this->pseudo) {      //vérifie si le pseudo n'existe PAS || si c'est le même que celui déjà utilisé

                include 'libs/db.php';
                $maj=$connexion->query("UPDATE users SET  lastName= '".$this->lastName."',firstName='".$this->firstName."',birthDate='".$this->birthDate."',sexe='".$this->sexe."',email='".$this->email."',hobits='".$this->hobits."',geekHobits='". $this->geektHobits."' WHERE userID='".$data->userID."'");

                $maj->execute();

            }
        }
    }
}
?>
