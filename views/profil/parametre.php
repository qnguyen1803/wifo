<header>
	<?php include 'views/navigation.php';  ?>
	<?php include 'views/profil/navigation_profil.php'; ?>

</header>

<section class="container">
	<form id="email" method = "post" action="">
	<!-- ancien email -->
		<legend><h2> Votre email</h2></legend>
		<div class="form-group col-sm-12">
			<label for="old_email" class="control-label col-sm-2"> Votre email actuel</label>
			<div class="col-sm-6 inputGroupContainer">
				<div class="input-group">
					<input type="email" class="form-control" name="old_email">
				</div>
			</div>
		</div>

	<!-- new-email -->
		<div class="form-group col-sm-12">
			<label for="new_email" class="control-label col-sm-2"> New email</label>
			<div class="col-sm-6 inputGroupContainer">
				<div class="input-group">
					<input type="email" class="form-control" name="new_email">
				</div>
			</div>
		</div>

	<!-- button -->
		<div class="form-group">
			<label class="col-sm-2 control-label"></label>
			<div class="col-sm-8">
				<button type="submit" class="btn btn-primary" name="btn_email" id="email_submit"> Envoyer </button>
			</div>
		</div>
	</form>

</section>

<section class="container">
	<form id="mdp" method="post">
	<!-- ancien email -->
		<legend><h2> Votre mot de passe</h2></legend>
		<div class="form-group col-sm-12">
			<label for="old_mdp" class="control-label col-sm-2"> Votre mdp actuel</label>
			<div class="col-sm-6 inputGroupContainer">
				<div class="input-group">
					<input type="password" class="form-control" name="old_mdp">
				</div>
			</div>
		</div>

	<!-- new-mdp -->
		<div class="form-group col-sm-12">
			<label for="new_mdp" class="control-label col-sm-2"> Nouveau mdp</label>
			<div class="col-sm-6 inputGroupContainer">
				<div class="input-group">
					<input type="password" class="form-control" name="new_mdp">
				</div>
			</div>
		</div>

	<!-- new-mdp-confirmer -->
		<div class="form-group col-sm-12">
			<label for="new_mdp2" class="control-label col-sm-2"> Nouveau mdp confirm</label>
			<div class="col-sm-6 inputGroupContainer">
				<div class="input-group">
					<input type="password" class="form-control" name="new_mdp2">
				</div>
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
</section>

<section class="container">
	<legend><h2>Supprimer votre compte</h2></legend>

	<a href="<?=WEBROOT.'profil/deleteAccount' ?>">Supprimer votre compte</a>
</section>