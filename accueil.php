<?php //page de Code dans lequel on intègre les pages de design  ?>

<?php
include 'Views/accueilViews.php';

if (empty($userByPseudo)){
    print $userByPseudo;

}else {
    echo "Je n'ai pas les informations";
}
?>
