<?php 
	$param = str_replace(' ', '', $_SESSION['perso']->getPseudo());
 ?>
<nav class="navbar col-sm-12">
	<a class="navbar-brand" href="<?=WEBROOT.'profil/index/'.$param ?>"> Profil <span class="sub_icon glyphicon glyphicon-link"></span></a>
	<a class="navbar-brand" href="<?=WEBROOT.'profil/modifier/'.$param ?>"> Modifier <span class="sub_icon glyphicon glyphicon-link"></span></a>
	<a class="navbar-brand" href="<?=WEBROOT.'profil/parametre/'.$param ?>"> Paramètre <span class="sub_icon glyphicon glyphicon-link"></span></a>
</nav>