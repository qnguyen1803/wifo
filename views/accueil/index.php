<body>
	<header>
		<!-- NAVIGATION -->
		
		<nav class="navbar-header">
			<a class="navbar-brand" href="#">Auteur</a>
			<a class="navbar-brand" href="#">Image</a>
			<a class="navbar-brand" href="#">Projet</a>
			<a class="navbar-brand" href="<?=WEBROOT.'accueil'.'/'.'contact'?>">Nous contacter</a>
			<a class="navbar-brand" href="<?=WEBROOT.'accueil'.'/'.'copyleft'?>">Mentions légales</a>
			<a class="navbar-brand" href="#">Publier votre projet/ image</a>
		</nav>
		

		<!-- CONNEXION FORM -->
		<div>
			<a id='open_connexion' href="#">Connexion</a>
			<a href="<?=WEBROOT.'utilisateur'.'/inscription'?>">Inscription</a>
		</div>
		
	</header>
	<?php 
	// #connexion_form
	// #email
	// #mdp
	// #connexion_but


	 ?>

	 <script type="text/javascript" src="webroot/bpopup-master/jquery.bpopup.min.js"></script>
	 <script type="text/javascript">
	 	$(document).ready(function(){
			$('#open_connexion').bind('click', function(e) {
                e.preventDefault();
                $('#connexion').bPopup();
            });
		})
	 </script>

	 <form id="connexion" class="form-horizontal" role="form" data-toggle='validator' method="post" action="<?=WEBROOT.'utilisateur'.'/connexion'?>">

	<!-- WEBROOT.'/'.CONTROLLER.'/tabDeBord' -->
		<fieldset class="container">
			<legend><h2>Connexion</h2></legend>

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
						<button type="submit" class="btn btn-primary" name="btn_connexion" id="connexion_submit"> Se connecter </button>
					</div>
				</div>
		</fieldset>
	</form>

<!-- 	<script type="text/javascript">
		$(document).ready(function(){
			$("connexion_submit").click(function(event){
				// stocker les données dans un array
				var form_data = $("#connexion_form").serializeArray();
				var error_free = true;
				for(var input in form_data){
				 	var element = $("#connexion_"+form_data[input]['name']);
				 	var valid = element.hasClass("valid");
				 	var error_element = $("span", element.parent());
				 	if (!valid) {error_element.removeClass("error").addClass("error_show");
				 	error_free = false;}
				 	else {
				 		error_element.removeClass("error_show").addClass("error");
				 	}
				}// fin for
			if (!error_free) {
				event.preventDefault();
			}else{
				alert('Form valid');
			}

			})
			
		})
		
	</script> -->
