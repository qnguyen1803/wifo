<div class="register">
	<form id="inscription" class="form-horizontal" role="form" data-toggle='validator' method="post" action="#">
			
		<fieldset class="container">
			<legend><h2>INSCRIPTION</h2></legend>

				<!-- PSEUDO -->
				<div class="form-group">
					<label for="pseudo" class="col-sm-2 control-label">Pseudo</label>
					<div class="col-sm-6 inputGroupContainer">
						<div class="input-group">
							<input type="text" class="form-control" name="pseudo" id="inscription_pseudo">
						</div>
					</div>
				</div>

				<!-- EMAIL -->
				<div class="form-group">
					<label for="email" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-6 inputGroupContainer">
						<div class="input-group">
							<input type="email" class="form-control" name="email" id="connexion_email">
						</div>
					</div>
				</div>

				<!-- MDP -->
				<div class="form-group">
					<label for="mdp" class="col-sm-2 control-label">Password</label>
					<div class="col-sm-4 inputGroupContainer">
						<div class="input-group">
							<input type="password" class="form-control" name="mdp" id="connexion_mdp">
						</div>
					</div>
				</div>

				<!-- MDP 2 -->
				<div class="form-group">
					<label for="mdp2" class="col-sm-2 control-label">Password</label>
					<div class="col-sm-4 inputGroupContainer">
						<div class="input-group">
							<input type="password" class="form-control" name="mdp2" id="connexion_mdp2">
						</div>
					</div>
				</div>

	<!-- ///////////////////////////
		CREER VOTRE PROFIL
	/////////////////////////////--> 
				<h2>CREER VOTRE PROFIL </h2>
				<!-- NOM -->
				<div class="form-group">
					<label for="nom" class="col-sm-2 control-label">Nom</label>
					<div class="col-sm-6 inputGroupContainer">
						<div class="input-group">
							<input type="text" class="form-control" name="nom" id="inscription_nom">
						</div>
					</div>
				</div>

				<!-- PRENOM -->
				<div class="form-group">
					<label for="prenom" class="col-sm-2 control-label">Prenom</label>
					<div class="col-sm-6 inputGroupContainer">
						<div class="input-group">
							<input type="text" class="form-control" name="prenom" id="inscription_prenom">
						</div>
					</div>
				</div>

				<!-- SEXE -->
				<div class="form-group">
					<label for="prenom" class="col-sm-2 control-label">Vous êtes </label>
					<div class="col-sm-6 inputGroupContainer">
						<div class="radio">
							Homme <i class="fa fa-male"></i>
							<label> 
						   		<input type="radio" value="m" name="sexe" id="inscription_homme">
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
						<button type="submit" class="btn btn-primary" name="btn_inscription" id="inscription_submit"> S'inscrire </button>
					</div>
				</div>
		</fieldset>
	</form>
</div>

