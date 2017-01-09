<header>
	<?php include 'views/profil/navigation_profil.php'; ?>
</header>

	<div class="modifier">
	<?php if (isset($_SESSION['perso'])) { ?>
	
		<!-- PHOTO COLUMN -->
		<section class="container col-sm-3">
			<form id="modified_avatar" class="form-horizontal" role="form" method="post" action="" enctype="multipart/form-data">
				<legend><h3> Votre photo de profil </h3></legend>
				
				<div class="form-group">	
					<div class="input-group">	
						<input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
						<input type="file" name="avatar">
					</div>
				</div>

				<div class="form-group">
					<label></label>
					<div class="col-sm-8">
						<button type="submit" class="btn btn-primary" name="btn_avatar" id="avatar_submit"> Enregister </button>
					</div>
				</div>
			</form>

			<!-- Erreur update avatar -->
			<?php if( $this->vars['errorAvatar'] != '' ){ ?> 
				<div class="alert alert-warning">
					<strong> Attention!</strong> <?= $this->vars['errorAvatar']?>
				</div>
			<?php } elseif ($this->vars['succesAvatar'] != '')  { ?>
				<div class="alert alert-success">
					<strong> Félicitation!</strong> <?= $this->vars['succesAvatar']?>
				</div>
			<?php } ?> 	

		</section>

		<section class="container col-sm-1"></section>

		<!-- COORDONNEES COLUMN -->
		<section class="container col-sm-8" style="border-left: 1px solid #ccc">

			<div class="col-sm-2" style=""></div>

			<form id="modified_profil" class="form-horizontal col-sm-10" role="form" data-toggle='validator' method="post" action="">

				<legend><h3> Vos coordonnées </h3></legend>

				<div class="left col-sm-6 ">
				<!-- NOM -->
					<div class="form-group">
						<label for="nom"> Nom </label>
						<div class="input-group">
							<input type="text" class="form-control" name="nom" placeholder="<?=$_SESSION['perso']->getNom()?>">
						</div>
					</div>

				<!-- PRENOM -->
					<div class="form-group">
						<label for="prenom">Prenom</label>
						<div class="input-group">
							<input type="text" class="form-control" name="prenom" placeholder="<?=$_SESSION['perso']->getPrenom()?>">
						</div>
					</div>

				<!-- PSEUDO -->
					<div class="form-group">
						<label for="pseudo"> Pseudo </label>
						<div class="input-group">
							<input type="text" class="form-control" name="pseudo" placeholder="<?=$_SESSION['perso']->getPseudo()?>">
						</div>
					</div>

				<!-- SEXE -->
					<div class="form-group">
						<label for="sexe" class="col-sm-12">Vous êtes </label>
						<div class="radio col-sm-6">
							
							<label> 
								<input type="radio" value="m" name="sexe" checked="checked">
							</label>
							Homme
						</div>
						
						<div class="radio col-sm-6">
							<label>
								<input type="radio" value="f" name="sexe">
							</label>
							Femme 
						</div>
					</div>
					
				</div> <!-- left -->

				<div class="right col-sm-6">

				<!-- PROFESSION -->
					<div class="form-group">
						<label for="metier"> Votre profession</label>
						<div class="input-group">
							<input type="text" class="form-control" name="metier" placeholder="<?=$_SESSION['perso']->getMetier()?>">
						</div>
					</div>

					<!-- TELEPHONE -->
					<div class="form-group">
						<label for="telephone">Telephone</label>
						<div class="input-group">
							<input type="tel" class="form-control" name="telephone" placeholder="<?=$_SESSION['perso']->getTelephone()?>">
						</div>
					</div>

					<!-- COMPETENCES -->
					<div class="form-group">
						<label for="competences">Compétences</label>
						<div class="input-group">
							<input type="text" class="form-control" name="competences" placeholder="<?=$_SESSION['perso']->getCompetences()?>">
						</div>
					</div>

					<!-- FAVORI -->
					<div class="form-group">
						<label for="favori">Favories</label>
						<div class="input-group">
							<input type="" class="form-control" name="favori" placeholder="<?=$_SESSION['perso']->getFavori()?>">
						</div>
					</div>
				</div> <!-- right -->

				<!-- DESCRIPTION SUPLEMENTAIRE -->
				<div class="form-group col-sm-12">
					<label for="description_sup">Description supplémentaire</label>
					<div class="input-group col-sm-11">
						<textarea class="form-control" rows="3"  name="description_sup" placeholder="<?=$_SESSION['perso']->getDescriptionSup()?>"></textarea>
					</div>
				</div>
				
						
				<!-- button -->
				<div class="form-group col-sm-12">
					<label></label>
					<div class="input-group">
						<button type="submit" class="btn btn-primary" name="btn_changed_profil"> Enregistrer les modifications</button>
					</div>
				</div>
			</form>
			<?php if ($this->vars['errorInfos'] != "") { ?>
				<div class="alert alert-warning">
					<strong> Attention!</strong> <?= $this->vars['errorInfos']?>
				</div>
			
			<?php } elseif ($this->vars['succesInfos'] != "")  { ?>
				<div class="alert alert-success">
					<strong> Félicitation!</strong> <?= $this->vars['succesInfos']?>
				</div>
			<?php } ?> 

		</section>

		<?php } else { ?>
			<div class="alert alert-danger col-sm-12">
	 			<strong> Attention !</strong> Veuillez vous connecter pour effectuer cette action
			</div>
		<?php } ?>
	</div> <!-- modifier -->






