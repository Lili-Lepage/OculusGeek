  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" media="all"type "text/css" href="css/fixe.css" />
  </head>
<header>


    <div class="baniere">
      <img class="image" src="<?=(isset($bannPicture)) ? $bannPicture : 'images/baniere/oculusGeek2.png'?>" />
    </div>

    </div>
    <nav class="menuTop">
        <ul class="menu">
            <li class="itemMenu"><a class="menuLink" href="/OculusGeek/accueil.php"><div class="menuLinkContent">Accueil</div></a></li>
            <li class="itemMenu"><a class="menuLink" href="/OculusGeek/objectif.php"><div class="menuLinkContent">Notre objectif</div></a>
            <li class="itemMenu"><a class="menuLink" href="#"><div class="menuLinkContent">A la pointe de la technologie</div></a>
                <ul class="subMenu">
                    <li class="itemSubMenu"><a class="subMenuLink" href="#"><div class="subMenuLinkContent">ordinateur</div></a></li>
                    <li class="itemSubMenu"><a class="subMenuLink" class="menuLink" href="#"><div class="subMenuLinkContent">console</div></a></li>
                    <li class="itemSubMenu"><a class="subMenuLink" href="#"><div class="subMenuLinkContent">objets connectés</div></a></li>
                </ul>
            </li>
            <li class="itemMenu"><a class="menuLink" href="#"><div class="menuLinkContent">Espace gaming</div></a>
                <ul class="subMenu">
                    <li class="itemSubMenu"><a class="subMenuLink" href="#"><div class="subMenuLinkContent">ordinateur</div></a></li>
                    <li class="itemSubMenu"><a class="subMenuLink" href="#"><div class="subMenuLinkContent">console</div></a></li>
                </ul>
            </li>
            <li class="itemMenu"><a class="menuLink" href="leursExperiences.php"><div class="menuLinkContent">Leurs expériences</div></a></li>
            <li class="itemMenu"><a class="menuLink" href="#"><div class="menuLinkContent">Forum</div></a></li>
        </ul>
    </nav>



    <?php if ($con) {  // si l'utilisateur est connecté afficher mon compte et deconnexion ?>
    <nav>
      <div class="D_MC">
        <ul>
          <li><a href="/OculusGeek/deconnexion.php"><div class="btnD_C">Deconnexion</div></a></li>
          <li><a href="/OculusGeek/profil.php"><div class="btnD_C">Mon compte : <?php echo $_SESSION['login']; ?></div></a>
              <ul class="D_MC_Sub">
                <li><a href="/OculusGeek/creerArticle.php"><div class="btnD_CA">Créer un article</div></a></li>
                <li><a href="/OculusGeek/espaceAdmin.php"><div class="btnD_CA">Espace admin </div></a></li>
              </ul>
          </li>
       </ul>
     </div>
     <div class="BA">

    </div>

   </nav>
    <?php } else {?>
      <nav class="C_I">
        <ul>
          <li><a href="/OculusGeek/connexion.php"><div class="btnC_I">Connexion</div></a></li>
          <li><a href="/OculusGeek/inscription.php"><div class="btnC_I">Inscription  </div></a></li>
        </ul>
      </nav>

    <?php }?>

    <script type="text/javascript" src="Jquery/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="Jquery/menuFixe.js"></script>
</header>
