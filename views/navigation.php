<?php 	include "views/head.php"; ?>
<style type="text/css">
	.navbar-brand {
	  padding: 0px;
	}
	.navbar-brand>img {
	  height: 100%;
	  padding: 15px;
	  width: auto;
	}
	
</style>
<div style="background-color: #EEE2C3">
	<br>


<div class="container example4" >
  <nav class="navbar navbar-default" style="background-color: transparent; border-color: transparent;">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar4">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?=WEBROOT.'accueil/index'?>" style="color: #660066;"><img style="width: 90px; height: 70px; padding-top: 0px;" src="<?=WEBROOT.'webroot/images/logo.png'?>" alt="Home">
        </a>
      </div>
      <div id="navbar4" class="navbar-collapse collapse">
      	<ul class="nav navbar-nav navbar-left">
          <li><a href="<?=WEBROOT.'utilisateur/authorsCollection'?>">Auteurs</a></li>
          <li><a href="<?=WEBROOT.'image/imageCollection'?>">Images</a></li>
          <li><a href="<?=WEBROOT.'projet/projetCollection'?>">Projets</a></li>
          <li><a href="<?=WEBROOT.'accueil/upload'?>">Publier votre projet/image</a></li>
          <li><a href="<?=WEBROOT.'accueil/copyleft'?>"> Copyleft </a></li>
          <li><a href="<?=WEBROOT.'accueil/search'  ?>"><span class="glyphicon glyphicon-search"></span></a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
        	<?php if (isset($_SESSION['perso'])) { ?>
	          <li class="dropdown">

	            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?=$_SESSION['perso']->getPseudo()  ?> <span class="caret"></span></a>

	            <ul class="dropdown-menu" role="menu">
	              <li><a href="<?=WEBROOT.'utilisateur/tabDeBord' ?>">Tableau de bord</a></li>
	              <li><a href="<?=WEBROOT.'profil/index/'.$_SESSION['perso']->getPseudo() ?>">Votre profil</a></li>
	              <li class="divider"></li>
	              <li><a href="<?=WEBROOT.'utilisateur/deconnexion' ?>">Deconnexion</a></li>
	            </ul>

	          </li>
	        <?php } else { ?>
	        	<li><a href="<?=WEBROOT.'utilisateur'.'/'.'inscription'?>">Inscription</a></li>
	        	<li><a href="<?=WEBROOT.'utilisateur'.'/'.'connexion'?>">Connexion</a></li>

	        <?php } ?>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
    <!--/.container-fluid -->
  </nav>
</div>
</div>

	<script src="<?=WEBROOT.'webroot/js/menu_jquery.js' ?>"></script>



