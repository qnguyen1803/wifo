	<div class="register">
		
		<fieldset class="container">

		<?php
		// si le personnage n'est pas encore connecté 
		if (!isset($_SESSION['perso'])){?>

			<form id="connexion" class="form-horizontal" role="form" data-toggle='validator' method="post" action="">
		<!-- WEBROOT.'/'.CONTROLLER.'/tabDeBord' -->
			
				<legend><h3>Connexion</h3></legend>

					<!-- text-input -->
					<div class="form-group">
						<label for="email" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-6 inputGroupContainer">
							<div class="input-group">
								<input type="email" class="form-control" name="email" id="connexion_email">
							</div>
						</div>
					</div>

					<!-- text-input -->
					<div class="form-group">
						<label for="mdp" class="col-sm-2 control-label">Password</label>
						<div class="col-sm-4 inputGroupContainer">
							<div class="input-group">
								<input type="password" class="form-control" name="mdp" id="connexion_mdp">
							</div>
						</div>
					</div>

					<!-- button -->
					<div class="form-group">
						<label class="col-sm-2 control-label"></label>
						<div class="col-sm-8">
							<button type="submit" class="btn btn-warning" name="btn_connexion" id="connexion_submit"> Se connecter </button>
						</div>
					</div>

					<?php if( $this->vars['connexion_error'] != "" ){ ?> 
						<div class="alert alert-warning">
						  <strong> Attention!</strong> 
						  <?= $this->vars['connexion_error']?>
						</div>
					<?php } ?> 	
			</form>
			<?php } // si ne pas connecté ?> 
		</fieldset>
	</div>



