<!DOCTYPE html>
<html>
<head>
	<title>wifo</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../webroot/bootstrap/css/bootstrap.min.css">
</head>
<body>

	<header>
		
	</header>
	<section class="jumbotron">
		<form id="contact_form" class="form-horizontal" role="form" method="post" action="">
			<fieldset class="container">

			<!-- form-name -->
			<legend><h2>Contact us</h2></legend>

				<!-- text-input -->
				<div class="form-group">
					<label for="name" class="col-sm-2 control-label">Nom</label>
					<div class="col-sm-8 inputGroupContainer">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input type="text" class="form-control" name="name" id="name" placeholder="Votre nom et prénom" value="">
						</div>
					</div>
				</div>

				<!-- text-input -->
				<div class="form-group">
					<label for="email" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-8 inputGroupContainer">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
							<input type="email" class="form-control" name="email" id="email" placeholder="example@domain.com" value="">
						</div>
					</div>
				</div>

				<!-- text-input -->
				<div class="form-group">
					<label for="subject" class="col-sm-2 control-label">Sujet</label>
					<div class="col-sm-8 selectContainer">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-menu-down"></i></span>
							<select name="subject" class="form-control">
								<option value="">Veuillez selectionner votre sujet</option>
								<option>Question</option>
								<option>Probleme</option>
								<option>Blabla</option>
							</select>
						</div>
					</div>
				</div>

				<!-- text-input -->
				<div class="form-group">
					<label for="message" class="col-sm-2 control-label">Message</label>
					<div class="col-sm-8 inputGroupContainer">
						<div class="input-group col-xs-12">
							<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
							<textarea rows="5" class="form-control " placeholder="Contenu de votre message"></textarea>
						</div>
					</div>
				</div>

				<!-- success - message -->
				<div class="form-group">
					<label class="col-sm-2 control-label"></label>
					<div class="alert alert-success col-sm-8" role="alert" id="success-message">Votre message est pris en compte   
						<i class="glyphicon glyphicon-thumbs-up"></i>
						<p>Merci de votre message, nous allons vous contacter bientôt</p>
					</div>
				</div>


				<!-- button -->
				<div class="form-group">
					<label class="col-sm-2 control-label"></label>
					<div class="col-sm-8">
						<button type="submit" class="btn btn-success"> Envoyer <span class="glyphicon glyphicon-send"></span></button>
					</div>
				</div>
			</fieldset>
		</form>
	</section>

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="../webroot/js/checkContactForm.js"></script>
	<script src="../webroot/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>