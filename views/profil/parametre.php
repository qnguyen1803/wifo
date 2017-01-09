
<header>
	<?php include 'views/profil/navigation_profil.php'; ?>
</header>

<div class="parametres">
	<?php if (isset($_SESSION['perso'])) { ?>

		<!-- MODIFIER EMAIL ZONE -->
		<section class="container col-sm-4" style="border-left: 1px solid #cccccc">
			<form id="email" method = "post" action="">
				<legend><h3> Votre email </h3></legend>
			<!-- ANCIEN EMAIL -->
				<div class="form-group">
	    			<label for="name">Votre email *</label>
	    			<div class="input-group">
						<input type="email" class="form-control" name="old_email">
					</div>
	  			</div>

			<!-- NEW EMAIL -->
				<div class="form-group">
	    			<label for="name">Nouveau email *</label>
	    			<div class="input-group">
						<input type="email" class="form-control" name="new_email">
					</div>
	  			</div>

			<!-- BUTTON -->
				<div class="form-group">
					<label></label>
					<div class="col-sm-8">
						<button type="submit" class="btn btn-primary" name="btn_email" id="email_submit"> Envoyer </button>
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
		</section>

		<section class="container col-sm-4" style="border-left: 1px solid #cccccc">
			<form id="mdp" method="post">
				<legend><h3> Votre mdp </h3></legend>

			<!-- ANCIEN MDP -->
				<div class="form-group">
					<label for="old_mdp"> Votre mdp actuel *</label>
					<div class="input-group">
						<input type="password" class="form-control" name="old_mdp">
					</div>
				</div>

			<!-- NOUVEAU MDP -->
				<div class="form-group">
					<label for="new_mdp"> Nouveau mdp *</label>
					<div class="input-group">
						<input type="password" class="form-control" name="new_mdp">
					</div>
				</div>

			<!-- CONFIRMER NOUVEAU MDP -->
				<div class="form-group">
					<label for="new_mdp2"> Confirmer le nouveau mdp *</label>
					<div class="input-group">
						<input type="password" class="form-control" name="new_mdp2">
					</div>
				</div>

			<!-- button -->
				<div class="form-group">
					<label class="col-sm-2 control-label"></label>
					<div class="col-sm-8">
						<button type="submit" class="btn btn-primary" name="btn_mdp" id="mdp_submit"> Envoyer </button>
					</div>
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
		</section>

		<section class="container col-sm-3" style="border-left: 1px solid #cccccc">
			<legend><h4>Supprimer votre compte</h4></legend>
			<a href="<?=WEBROOT.'profil/deleteAccount' ?>">Supprimer votre compte</a>
		</section>
	<?php } else { ?>
		<div class="alert alert-danger col-sm-12">
	 		<strong> Attention !</strong> Veuillez vous connecter pour effectuer cette action
		</div>
	<?php } ?>
</div>