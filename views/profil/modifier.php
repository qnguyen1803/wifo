<header>
	<?php include 'views/navigation.php';  ?>
	<?php include 'views/profil/navigation_profil.php'; ?>

</header>

<section class="jumbotron">

<aside>
	<form id="modified_avatar" class="form-horizontal" role="form" method="post" action="" enctype="multipart/form-data">
		<fieldset class="container">
			<h2> AJOUTER/ MODIFIER VOTRE AVATAR </h2>
			<div class="form-group">
				<div class="inputGroupContainer">
					<div class="input-group">	
						<input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
						<input type="file" name="avatar">
					</div>
				</div>
			</div>

			<div class="form-group">
					<label class="col-sm-2 control-label"></label>
					<div class="col-sm-8">
						<button type="submit" class="btn btn-primary" name="btn_avatar" id="avatar_submit"> Enregister </button>
					</div>
				</div>
		</fieldset>
	</form>

</aside>
</section>


<section class="jumbotron">

<form id="modified_profil" class="form-horizontal" role="form" data-toggle='validator' method="post" action="">
			
	<fieldset class="container">
			
	<h2> MODIFIER VOTRE PROFIL </h2>

			<!-- NOM -->
			<div class="form-group">
				<label for="nom" class="col-sm-2 control-label">Nom</label>
				<div class="col-sm-6 inputGroupContainer">
					<div class="input-group">
						<input type="text" class="form-control" name="nom" placeholder="<?=$_SESSION['perso']->getNom()?>">
					</div>

				</div>
			</div>

			<!-- PRENOM -->
			<div class="form-group">
				<label for="prenom" class="col-sm-2 control-label">Prenom</label>
				<div class="col-sm-6 inputGroupContainer">
					<div class="input-group">
						<input type="text" class="form-control" name="prenom" placeholder="<?=$_SESSION['perso']->getPrenom()?>">
					</div>
				</div>
			</div>

			<!-- SEXE -->
			<div class="form-group">
				<label for="sexe" class="col-sm-2 control-label">Vous êtes </label>
				<div class="col-sm-6 inputGroupContainer">
					<div class="radio">
						Homme <i class="fa fa-male"></i>
						<label> 
						   	<input type="radio" value="m" name="sexe"  checked="checked">
						</label>
					</div>
					<div class="radio">
						Femme <i class="ionicons ion-female"></i>
						<label>
						   	<input type="radio" value="f" name="sexe">
						</label>
					</div>
				</div>
			</div>

			<!-- TELEPHONE -->
			<div class="form-group">
				<label for="telephone" class="col-sm-2 control-label">Telephone</label>
				<div class="col-sm-6 inputGroupContainer">
					<div class="input-group">
						<input type="tel" class="form-control" name="telephone" placeholder="<?=$_SESSION['perso']->getTelephone()?>">
					</div>
				</div>
			</div>


			<!-- METIER -->
			<div class="form-group">
				<label for="metier" class="col-sm-2 control-label">Votre profession</label>
				<div class="col-sm-6 inputGroupContainer">
					<div class="input-group">
						<input type="text" class="form-control" name="metier" placeholder="<?=$_SESSION['perso']->getMetier()?>">
					</div>
				</div>
			</div>

			<!-- COMPETENCES -->
			<div class="form-group">
				<label for="competences" class="col-sm-2 control-label">Compétences</label>
				<div class="col-sm-6 inputGroupContainer">
					<div class="input-group">
						<input type="text" class="form-control" name="competences" placeholder="<?=$_SESSION['perso']->getCompetences()?>">
					</div>
				</div>
			</div>

			<!-- FAVORI -->
			<div class="form-group">
				<label for="favori" class="col-sm-2 control-label">Favories</label>
				<div class="col-sm-6 inputGroupContainer">
					<div class="input-group">
						<input type="text" class="form-control" name="favori" placeholder="<?=$_SESSION['perso']->getFavori()?>">
					</div>
				</div>
			</div>

			<!-- DESCRIPTION SUPLEMENTAIRE -->
			<div class="form-group">
				<label for="description_sup" class="col-sm-2 control-label">Description supplémentaire</label>
				<div class="col-sm-6 inputGroupContainer">
					<div class="input-group">
						<input type="text" class="form-control" name="description_sup" placeholder="<?=$_SESSION['perso']->getDescriptionSup()?>">
					</div>
				</div>
			</div>
				


			<!-- button -->
			<div class="form-group">
				<label class="col-sm-2 control-label"></label>
				<div class="col-sm-8">
					<button type="submit" class="btn btn-primary" name="btn_changed_profil"> Enregistrer les modifications</button>
				</div>
			</div>
		</fieldset>
	</form>
	
</section>



