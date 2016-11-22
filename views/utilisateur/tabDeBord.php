<?php 
	session_start(); 
	include 'views/navigation.php';
?>

<section class="container">
	<h2>Cette page est la page tableau de bord</h2>
	<?php 
	if (isset($_SESSION['perso'])) { 
		$param = str_replace(' ', '', $_SESSION['perso']->getPseudo());
	?>
		 <span>Bonjour <a href=" <?=WEBROOT.'profil/index/'.$param ?>"> <?php echo $_SESSION['perso']->getPseudo(); ?></a></span>
		 <nav></nav>
	<?php } ?>

	<p>Liste des favoris</p>
	<p>Votre publications</p>
	<p>Vos participations</p>
	<p>Vos historiques (optionnel)</p>
</section>





