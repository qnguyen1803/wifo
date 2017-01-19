<div class="container">
	<br><br>
	<div class="row">
	<?php include 'views/profil/navigation_profil.php'; ?>
	<?php if (isset($_SESSION['perso'])) { ?>

		<!-- MODIFIER EMAIL ZONE -->
		<section class="col-sm-9">
			<div class="row">
				<h3> Votre email </h3>
				<hr>
				<form id="email" method = "post" action="">
					
					<!-- ANCIEN EMAIL -->
					<div class="form-group col-sm-6">
		    			<label for="name">Votre email *</label>
		    			<div class="input-group">
							<input type="email" class="form-control" name="old_email">
						</div>
		  			</div>

				<!-- NEW EMAIL -->
					<div class="form-group col-sm-6">
		    			<label for="name">Nouveau email *</label>
		    			<div class="input-group">
							<input type="email" class="form-control" name="new_email">
						</div>
		  			</div>

				<!-- BUTTON -->
					<div class="form-group">
						<label></label>
						<div class="col-sm-8">
							<button type="submit" class="btn btn-primary" name="btn_email" id="email_submit"> Enregistrer votre nouveau email </button>
						</div>
					</div>
				</form>

				<!-- Erreur modifier email -->
				<?php if( $this->vars['errorEmail'] != "" ){ ?> 
					<div class="alert alert-warning col-sm-12">
						<strong> Attention!</strong> <?= $this->vars['errorEmail']?>
					</div>
				<?php } elseif ($this->vars['succesEmail'] != "")  { ?>
					<div class="alert alert-success col-sm-12">
						<strong> Félicitation!</strong> <?= $this->vars['succesEmail']?>
					</div>
				<?php } ?> 
			</div>

			<br><br><br>

		<!-- MDP -->
			<div class="row">
				<h3> Votre mot de passe </h3>
				<hr>
				<form id="mdp" method="post">

				<!-- ANCIEN MDP -->
					<div class="form-group col-sm-4">
						<label for="old_mdp"> Votre mdp actuel *</label>
						<div class="input-group">
							<input type="password" class="form-control" name="old_mdp">
						</div>
					</div>

				<!-- NOUVEAU MDP -->
					<div class="form-group col-sm-4">
						<label for="new_mdp"> Nouveau mdp *</label>
						<div class="input-group">
							<input type="password" class="form-control" name="new_mdp">
						</div>
					</div>

				<!-- CONFIRMER NOUVEAU MDP -->
					<div class="form-group col-sm-4">
						<label for="new_mdp2"> Confirmer le nouveau mdp *</label>
						<div class="input-group">
							<input type="password" class="form-control" name="new_mdp2">
						</div>
					</div>

				<!-- button -->
					<div class="form-group col-sm-12">
						<button type="submit" class="btn btn-primary" name="btn_mdp" id="mdp_submit"> Enregistrer votre nouveau mot de passe </button>
					</div>
				</form>

				<!-- Erreur modifier Mdp -->
				<?php if( $this->vars['errorMdp'] != "" ){ ?> 
					<div class="alert alert-warning">
						<strong> Attention!</strong> <?= $this->vars['errorMdp']?>
					</div>
				<?php } elseif ($this->vars['succesMdp'] != "")  { ?>
					<div class="alert alert-success">
						<strong> Félicitation!</strong> <?= $this->vars['succesMdp']?>
					</div>
				<?php } ?> 
			</div>
			<br><br>
			<!-- SUPPRIMER COMPTE -->
			<div class="row">
				<h3>Supprimer votre compte</h3>
				<a href="<?=WEBROOT.'profil/deleteAccount' ?>">Supprimer votre compte</a>
				<?php } else { ?>
				<div class="alert alert-danger col-sm-12">
			 		<strong> Attention !</strong> Veuillez vous connecter pour effectuer cette action
				</div>
			</div>

		<?php } ?>
		</section>
	</div>
	<br><br>
</div>