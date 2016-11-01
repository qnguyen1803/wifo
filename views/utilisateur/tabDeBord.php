<?php session_start(); ?>
<h2>Cette page est la page tableau de bord</h2>

<?php if (isset($_SESSION['perso'])) { ?>
	 <span>Bonjour <a href=" <?=WEBROOT.'profil/index?id='.$_SESSION['perso']->getId() ?>"> <?php echo $_SESSION['perso']->getPseudo(); ?></a></span>
	 <nav></nav>




<?php
}
 ?>

