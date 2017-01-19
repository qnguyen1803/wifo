<link rel="stylesheet" type="text/css" href="<?= WEBROOT.'webroot/css/utilisateur.css'?>">
<div class="container">
<br><br><br>
	<form id="inscription" class="form-horizontal" role="form" data-toggle='validator' method="post" action="<?=WEBROOT.'utilisateur/inscription' ?>">
			
		<!-- ///////////////////////////
				S'INSCRIRE
		/////////////////////////////--> 
		<fieldset class="col-sm-5">
			<legend><h3 class="col-sm-3">Inscription</h3></legend> 

				<!-- PSEUDO -->
				<div class="form-group">
					<label for="pseudo">Pseudo * </label>	
					<div class="input-group">
						<input type="text" class="form-control" name="pseudo_inscription" id="inscription_pseudo">	
					</div>
				</div>
				

				<!-- EMAIL -->
				<div class="form-group">
					<label for="email">Email * </label>
					<div class="input-group">
						<input type="email" class="form-control" name="email_inscription" id="inscription _email">
					</div>
				</div>

				<!-- MDP -->
				<div class="form-group">
					<label for="mdp"> Mot de passe * </label>
					<div class="input-group">
						<input type="password" class="form-control" name="mdp_inscription" id="inscription_mdp">
					</div>
				</div>

				<!-- MDP 2 -->
				<div class="form-group">
					<label for="mdp2"> Confirmer mot de passe *</label>
					<div class="input-group">
						<input type="password" class="form-control" name="mdp2_inscription" id="inscription_mdp2">
					</div>
				</div>
			</fieldset>

			<fieldset class="container col-sm-1"></fieldset>

		<!-- ///////////////////////////
			CREER VOTRE PROFIL
		/////////////////////////////--> 
		<fieldset class="col-sm-6 createProfil">
			<legend><h3> Créer votre profil (optionnel)</h3></legend>
			<div class="left col-sm-6">
				<!-- NOM -->
				<div class="form-group">
					<label for="nom">Nom</label>
					<div class="input-group">
						<input type="text" class="form-control" name="nom_inscription" id="inscription_nom">
					</div>
				</div>

				<!-- PRENOM -->
				<div class="form-group">
					<label for="prenom">Prenom</label>
					<div class="input-group">
						<input type="text" class="form-control" name="prenom_inscription" id="inscription_prenom">
					</div>
				</div>

				<!-- SEXE -->
				<div class="form-group">
					<label for="sexe">Vous êtes </label>
					<div class="radio "> 
						<div class="col-sm-6">
							Homme <i class="fa fa-male"></i>
							<label> 
								<input type="radio" value="m" name="sexe" id="inscription_homme" checked="checked">
							</label>
						</div>
						<div class="col-sm-6">
							Femme <i class="ionicons ion-female"></i>
							<label>
								   <input type="radio" value="f" name="sexe" id="inscription_femme">
							</label>
						</div>
					</div>
				</div>
			</div> <!-- left -->

			<div class="right col-sm-6">
				<!-- TELEPHONE -->
				<div class="form-group">
					<label for="telephone">Telephone</label>
					<div class="input-group">
						<input type="tel" class="form-control" name="telephone" id="inscription_telephone">
					</div>
				</div>


				<!-- METIER -->
				<div class="form-group">
					<label for="metier">Votre profession</label>
					<div class="input-group">
						<input type="text" class="form-control" name="metier" id="inscription_metier">
					</div>
				</div>

				<!-- COMPETENCES -->
				<div class="form-group">
					<label for="competences">Compétences</label>
					<div class="input-group">
						<input type="text" class="form-control" name="competences" id="inscription_competences">
					</div>
				</div>

				<!-- FAVORI -->
				<div class="form-group">
					<label for="favori">Favories</label>
					<div class="input-group">
						<input type="text" class="form-control" name="favori" id="inscription_favori">
					</div>
				</div>

			</div> <!-- right -->

			<!-- DESCRIPTION SUPLEMENTAIRE -->
			<div class="form-group">
				<label for="description_sup" class="col-sm-12">&nbsp;Description supplémentaire</label>
				<div class="col-sm-1"></div>
				<div class="input-group col-sm-10">
					<textarea class="form-control" rows="3" name="description_sup" id="inscription_description_sup"></textarea>
				</div>
			</div>
			
		</fieldset>
				<!-- AFFICHER ERREUR SI EXISTE -->
			<?php if ($this->vars['message_error'] != "" ) { ?>
		
				<div class="alert alert-warning">
					<strong> Attention!</strong> 
					<?= print_r($this->vars['message_error']); ?>
				</div>
			

			<?php } ?>

		<!-- ////// BUTTON ////// -->
		<div class="form-group col-sm-12">
			<br><br>
			<div class="">
				<button type="submit" class="btn btn-warning col-sm-12" name="btn_inscription" id="inscription_submit"> S'inscrire </button>
			</div>
			<br><br><br><br>
		</div>
	</form>
</div>


