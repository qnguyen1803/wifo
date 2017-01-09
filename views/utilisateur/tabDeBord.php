
<section class="container">
	<h2>Cette page est la page tableau de bord</h2>
	<?php 
	if (isset($_SESSION['perso'])) { 
		$param = str_replace(' ', '', $_SESSION['perso']->getPseudo());
	?>
		 <span>Bonjour <a href=" <?=WEBROOT.'profil/index/'.$param ?>"> <?php echo $_SESSION['perso']->getPseudo(); ?></a></span>
		 <nav></nav>
	<?php } ?>

	<p>Votre publications : images + projets</p>
	<p>Vos participations : les projets que je suis membre</p>
	<p>La liste des demandes de participer à mon projet qui accompagne le bouton "accepter" et "refuser" </p>
</section>





