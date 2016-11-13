<nav class="navbar-header col-sm-10">
	<a class="navbar-brand" href="<?=WEBROOT ?>"><img style='width: 100px; height: 100px;' src="<?=WEBROOT.'webroot/images/logo.png' ?>"></a>
	<a class="navbar-brand" href="#">Auteur</a>
	<a class="navbar-brand" href="#">Image</a>
	<a class="navbar-brand" href="#">Projet</a>
	<a class="navbar-brand" href="<?=WEBROOT.'accueil'.'/'.'contact'?>">Nous contacter</a>
	<a class="navbar-brand" href="<?=WEBROOT.'accueil'.'/'.'copyleft'?>">Mentions légales</a>
	<a class="navbar-brand" href="#">Publier votre projet/ image</a>
</nav>

<?php if (!isset($_SESSION['perso'])) {?>
	<!-- CONNEXION FORM -->
	<nav>
		<a id='open_connexion' href="#">Connexion</a>
		<a href="<?=WEBROOT.'utilisateur'.'/inscription'?>">Inscription</a>
	</nav>
<?php } else { ?>
	
	<ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['perso']->getPseudo(); ?> <span class="glyphicon glyphicon-user pull-right"></span></a>
          <a href="<?=WEBROOT.'utilisateur'.'/deconnexion'?>">Deconnexion</a>
          
        </li>
      </ul>

<?php } ?>


