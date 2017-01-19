<script type="text/javascript" src="<?=WEBROOT.'webroot/js/fileinput.js' ?>"></script>
<section class="container">
	<br><br><br>
	<div class="alert alert-warning">
		<strong> Attention!</strong> Si vous voulez télécharger un nouveau fichier d'image, veuillez effacer complètement l'ancienne image uploadée et réuploader une nouvelle. 
	</div>
	<form method="post" enctype="multipart/form-data">
		<legend><h3 style="color: blue"> Modifier les informations concernées votre image </h3></legend>
				<!-- image_title -->
					<div class="form-group">
						<label for="exampleInputinfo"> Nouveau titre de l'image </label>
						<input type="text" class="form-control" name="image_title" placeholder="<?=$this->vars['imageModified']->getTitre().'...' ?>">
					</div>

				<!-- image_categorie -->
					<div class="form-group">
						<div class="selectContainer">
							<label for="image_categorie"> Catégorie </label>
							<select name="image_categorie" class="form-control selectpicker">
								<?php foreach ($this->vars['tabCategories'] as $key => $value) { ?>
									<option value="<?=$value->getId()  ?>"><?=$value->getNom()  ?></option>
								<?php } ?>
						    </select>		
						</div>
					</div>
			
				<!-- image_description -->
					<div class="form-group">
    					<label for="name"> Nouvelle description </label>
    					<textarea class="form-control" rows="3" name="image_description" placeholder="<?=$this->vars['imageModified']->getDescription() ?>"></textarea>
  					</div>

				<!-- button valid Image -->
					<button name="btn_upload_img" type="submit" class="btn btn-primary"> Mettre à jour les modifications  </button>
				</form> <!-- IMAGE FORM -->
					<!-- erreur et succes -->
		<?php if ($this->vars['errorImage'] != "") { ?>
			<div class="alert alert-warning" role="alert"><strong> Attention ! </strong><?= $this->vars['errorImage'] ?> </div>

		<?php } elseif ($this->vars['succesImage'] != "") { ?>	
			<div class="alert alert-success" role="alert"> <strong> Félicitation ! </strong><?= $this->vars['succesImage'] ?>  <a href="<?=WEBROOT.'image/imageDetail/'.$this->vars['imageModified']->getId()  ?>"> Voir cette image </a>
		</div>
		<?php } ?>
</section>