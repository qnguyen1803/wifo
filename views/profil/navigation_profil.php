<link rel="stylesheet" type="text/css" href="<?= WEBROOT.'webroot/css/profile.css'?>">
<?php 
	$param = str_replace(' ', '', $this->vars['persoRef']->getPseudo());	
 ?>
<!--  si la valeur du get == pas à la valeur du session perso 
affiche pas les li Modifier 
-->


<nav class="navbar col-lg-12 navigation_profile">
	<a class="navbar-brand col-lg-4 col-xs-12 border_around" href="<?=WEBROOT.'profil/index/'.$param ?>"> A propos de l'auteur <span class="sub_icon glyphicon glyphicon-link"></span></a>
	
	<?php if (isset($_SESSION['perso']) && ($_SESSION['perso'] == $this->vars['persoRef'] )) { ?>

	<a class="navbar-brand col-lg-4 col-xs-12 border_around" href="<?=WEBROOT.'profil/modifier/'.$param ?>"> Modifier votre informations <span class="sub_icon glyphicon glyphicon-link"></span></a>
	
	<a class="navbar-brand col-lg-4 col-xs-12 border_around" href="<?=WEBROOT.'profil/parametre/'.$param ?>"> Paramètres de votre compte <span class="sub_icon glyphicon glyphicon-link"></span></a>
		
	<?php } ?>
	
</nav>