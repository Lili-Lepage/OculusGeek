<?php
if (isset($_POST['submit'])) {

    if ($_POST['passWord'] == $_POST['passWordBis']) {
        include 'Class/Utilisateur.php';
        $newUser = new Utilisateur();
        $userInfos = array(
            'pseudo'     => $_POST['pseudo'],
            'passWord'   => $_POST['passWord'],
            'firstName'  => $_POST['firstName'],
            'lastName'   => $_POST['lastName'],
            'birthDate'  => $_POST['birthDate'],
            'sexe'       => $_POST['sexe'],
            'email'      => $_POST['email'],
            'hobits'     => $_POST['hobits'],
            'geekHobits' => $_POST['geekHobits']
        );
        $newUser->setUserInfos($userInfos);
        $newUser->insertNewUserInDb();
        header('location:/OculusGeek/accueil.php');
        
    }
}



include 'Views/inscriptionViews.php';
?>
