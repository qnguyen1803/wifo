<?php session_start(); ?>

<header>
	<?php include 'views/navigation.php';  ?>
	<?php include 'views/profil/navigation_profil.php'; ?>
</header>
<section class="jumbotron">
	<div id="info_user" class="container">
		
		<img style="width: 200px;height: 200px;" src="<?=WEBROOT.$_SESSION['perso']->getAvatar() ?>">
		<p><?php echo $_SESSION['perso']->getPrenom().' '.$_SESSION['perso']->getNom(); ?></p>
		<p><?php echo "<b> Date d'inscription</b>: ".$_SESSION['perso']->getDateCreation(); ?></p>
		<p><?php echo "<b> Dernière connexion: </b>".$_SESSION['perso']->getDerniereConnexion(); ?></p>
	</div>
</section>






