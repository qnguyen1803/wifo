
<div class="register">
	<form id="connexion" class="form-horizontal" role="form" data-toggle='validator' method="post" action="">
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
</div>

<!-- <script type="text/javascript">
	$(document).ready(function() {
	 	$('#connexion').submit(
	 		function(event){
	 		event.preventDefault();
	 		$donnees = $(this).serialize();
	 		console.log($donnees);
	 		submitForm();

	 	});

	 	function submitForm(){
	 		 var email = $('#connexion_email').val();
	 		 var mdp = $('#connexion_mdp').val();


	 		$.ajax({
	 			type: "POST",
	 			url: ,
	 			data: {
		 			email : email,
		 			mdp: mdp
	 			},
	 			success: function(data){
	 				console.log('success');
	 			},

	 			error: function(){
	 				console.log('error');
	 			}

	 		})
	 	}
	})
</script> -->



