	<div class="register">
		<form id="contact_form" class="form-horizontal" role="form" method="post">
			<fieldset class="container">

			<!-- form-name -->
			<legend><h3>Nous contacter</h3></legend>

				<!-- Nom et prénom -->
				<div class="form-group">
					<label for="name" class="col-sm-2 control-label">Nom &amp; prénom * </label>
					<div class="col-sm-8 inputGroupContainer">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input type="text" class="form-control" name="name" placeholder="Votre nom et prénom" value="">
						</div>
					</div>
				</div>

				<!-- Email -->
				<div class="form-group">
					<label for="email" class="col-sm-2 control-label">Email * </label>
					<div class="col-sm-8 inputGroupContainer">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
							<input type="email" class="form-control" name="email" placeholder="example@domain.com" value="">
						</div>
					</div>
				</div>

				<!-- Sujet -->
				<div class="form-group">
					<label for="subject" class="col-sm-2 control-label"> Sujet * </label>
					<div class="col-sm-8 selectContainer">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-menu-down"></i></span>
							<select name="subject" class="form-control">
								<option value="">Veuillez selectionner votre sujet</option>
								<option value="question"> Question </option>
								<option value="problème"> Problème </option>
								<option value="suggestion"> Suggestion </option>
								<option value="autres"> Autres </option>
							</select>
						</div>
					</div>
				</div>

				<!-- Content message -->
				<div class="form-group">
					<label for="message" class="col-sm-2 control-label"> Message * </label>
					<div class="col-sm-8 inputGroupContainer">
						<div class="input-group col-xs-12">
							<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
							<textarea rows="5" class="form-control " placeholder="Contenu de votre message" name="contentMessage"></textarea>
						</div>
					</div>
				</div>

				<!-- button -->
				<div class="form-group">
					<label class="col-sm-2 control-label"></label>
					<div class="col-sm-8">
						<button type="submit" class="btn btn-warning" name="btn_message"> Envoyer <span class="glyphicon glyphicon-send"></span></button>
					</div>
				</div>


				<!-- erreur et succes -->
				<?php if ($this->vars['errorMessage'] != "") { ?>

					<div class="alert alert-warning" role="alert"><strong> Attention ! </strong><?= $this->vars['errorMessage'] ?> 
					</div>

				<?php } elseif ($this->vars['succesMessage'] != "") { ?>
					
					<div class="alert alert-success" role="alert" id="success-message"> <strong> Félicitation ! </strong><?= $this->vars['succesMessage'] ?>   
						<i class="glyphicon glyphicon-thumbs-up"></i>
						<p>Merci de votre message, nous allons vous contacter bientôt</p>
					</div>

				<?php } ?>


			</fieldset>
		</form>
	</div> <!-- register -->
