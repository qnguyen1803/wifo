<header>
	<?php include 'views/profil/navigation_profil.php'; ?>
</header>
<div class="profil">
	<!-- AVATAR -->
	<section class="container col-sm-3 left">
		<img style="width: 200px;height: 200px;" src="<?=WEBROOT. $this->vars['persoRef']->getAvatar() ?>">
		<p><?php echo "<b> Date d'inscription</b>: ". $this->vars['persoRef']->getDateCreation(); ?></p>
		<p><?php echo "<b> Dernière connexion: </b>". $this->vars['persoRef']->getDerniereConnexion(); ?></p>
	</section>

	<!-- COORDONNEES -->
	<section class="container col-sm-9 right">
		<h2><?= $this->vars['persoRef']->getPseudo() ?></h2>
		<hr>
		<ul class="list-group">
		  <!-- nom -->
		  <li class="list-group-item"><span class="glyphicon glyphicon-play"></span> Nom : <?= $this->vars['persoRef']->getNom() ?> </li>

		  <!-- prenom -->
		  <li class="list-group-item"><span class="glyphicon glyphicon-play"></span> Prénom : <?= $this->vars['persoRef']->getPrenom() ?> </li>

		  <!-- sexe -->
		  <li class="list-group-item">
		  	<span class="glyphicon glyphicon-play"></span> 
		  	Sexe : <?php if ($this->vars['persoRef']->getSexe() == "m") {
		  		echo "Homme";
		  	} else {
		  		echo "Femme";
		  	}?> 
		  </li>
		  
		  <!-- métier -->
		  <li class="list-group-item"><span class="glyphicon glyphicon-play"></span> Profession : <?= $this->vars['persoRef']->getMetier() ?> </li>

		  <!-- téléphone -->
		  <li class="list-group-item"><span class="glyphicon glyphicon-play"></span> Téléphone : <?= "0".$this->vars['persoRef']->getTelephone() ?> </li>

		  <!-- email -->
		  <li class="list-group-item"><span class="glyphicon glyphicon-play"></span> Email : <?= $this->vars['persoRef']->getEmail() ?> </li>

		  <!-- competences -->
		  <li class="list-group-item"><span class="glyphicon glyphicon-play"></span> Compétences : <?= $this->vars['persoRef']->getCompetences() ?> </li>

		  <!-- favori -->
		  <li class="list-group-item"><span class="glyphicon glyphicon-play"></span> Favori : <?= $this->vars['persoRef']->getFavori() ?> </li>

		  <!-- descriptionSup -->
		  <li class="list-group-item"><span class="glyphicon glyphicon-pencil"></span> " <i><?= $this->vars['persoRef']->getDescriptionSup() ?> " </i></li>


		</ul>
		
		
	</section>
</div>






