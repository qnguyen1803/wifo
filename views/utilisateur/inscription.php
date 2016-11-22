<header>
		<!-- NAVIGATION -->
		<?php include 'views/navigation.php';  ?>	
</header>

<div class="register">
	<form id="inscription" class="form-horizontal" role="form" data-toggle='validator' method="post" action="<?=WEBROOT.'utilisateur/inscription' ?>">
			
		<fieldset class="container">
			<legend><h2 class="col-sm-3">INSCRIPTION</h2><span>* Obligatoire de remplir tous les champs</span></legend> 

				<!-- PSEUDO -->
				<div class="form-group">
					<label for="pseudo" class="col-sm-2 control-label">Pseudo</label>
					<div class="col-sm-6 inputGroupContainer">
						<div class="input-group">
							<input type="text" class="form-control" name="pseudo_inscription" id="inscription_pseudo">
						</div>
					</div>
				</div>

				<!-- EMAIL -->
				<div class="form-group">
					<label for="email" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-6 inputGroupContainer">
						<div class="input-group">
							<input type="email" class="form-control" name="email_inscription" id="inscription _email">
						</div>
					</div>
				</div>

				<!-- MDP -->
				<div class="form-group">
					<label for="mdp" class="col-sm-2 control-label">Password</label>
					<div class="col-sm-4 inputGroupContainer">
						<div class="input-group">
							<input type="password" class="form-control" name="mdp_inscription" id="inscription_mdp">
						</div>
					</div>
				</div>

				<!-- MDP 2 -->
				<div class="form-group">
					<label for="mdp2" class="col-sm-2 control-label">Password</label>
					<div class="col-sm-4 inputGroupContainer">
						<div class="input-group">
							<input type="password" class="form-control" name="mdp2_inscription" id="inscription_mdp2">
						</div>
					</div>
				</div>

	<!-- ///////////////////////////
		CREER VOTRE PROFIL
	/////////////////////////////--> 
	<legend><h2 class="col-sm-5">CREER VOTRE PROFIL </h2> * facultatif </legend>
				<!-- NOM -->
				<div class="form-group">
					<label for="nom" class="col-sm-2 control-label">Nom</label>
					<div class="col-sm-6 inputGroupContainer">
						<div class="input-group">
							<input type="text" class="form-control" name="nom_inscription" id="inscription_nom">
						</div>
					</div>
				</div>

				<!-- PRENOM -->
				<div class="form-group">
					<label for="prenom" class="col-sm-2 control-label">Prenom</label>
					<div class="col-sm-6 inputGroupContainer">
						<div class="input-group">
							<input type="text" class="form-control" name="prenom_inscription" id="inscription_prenom">
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
						   		<input type="radio" value="m" name="sexe" id="inscription_homme" checked="checked">
						   	</label>
						</div>
						<div class="radio">
							Femme <i class="ionicons ion-female"></i>
							<label>
						   		<input type="radio" value="f" name="sexe" id="inscription_femme">
						   	</label>
						</div>
					</div>
				</div>

				<!-- TELEPHONE -->
				<div class="form-group">
					<label for="telephone" class="col-sm-2 control-label">Telephone</label>
					<div class="col-sm-6 inputGroupContainer">
						<div class="input-group">
							<input type="tel" class="form-control" name="telephone" id="inscription_telephone">
						</div>
					</div>
				</div>


				<!-- METIER -->
				<div class="form-group">
					<label for="metier" class="col-sm-2 control-label">Votre profession</label>
					<div class="col-sm-6 inputGroupContainer">
						<div class="input-group">
							<input type="text" class="form-control" name="metier" id="inscription_metier">
						</div>
					</div>
				</div>

				<!-- COMPETENCES -->
				<div class="form-group">
					<label for="competences" class="col-sm-2 control-label">Compétences</label>
					<div class="col-sm-6 inputGroupContainer">
						<div class="input-group">
							<input type="text" class="form-control" name="competences" id="inscription_competences">
						</div>
					</div>
				</div>

				<!-- FAVORI -->
				<div class="form-group">
					<label for="favori" class="col-sm-2 control-label">Favories</label>
					<div class="col-sm-6 inputGroupContainer">
						<div class="input-group">
							<input type="text" class="form-control" name="favori" id="inscription_favori">
						</div>
					</div>
				</div>

				<!-- DESCRIPTION SUPLEMENTAIRE -->
				<div class="form-group">
					<label for="description_sup" class="col-sm-2 control-label">Description supplémentaire</label>
					<div class="col-sm-6 inputGroupContainer">
						<div class="input-group">
							<input type="text" class="form-control" name="description_sup" id="inscription_description_sup">
						</div>
					</div>
				</div>
				


				<!-- button -->
				<div class="form-group">
					<label class="col-sm-2 control-label"></label>
					<div class="col-sm-8">
						<button type="submit" class="btn btn-warning" name="btn_inscription" id="inscription_submit"> S'inscrire </button>
					</div>
				</div>
		</fieldset>
	</form>
</div>


