
	<script type="text/javascript" src="<?=WEBROOT.'webroot/js/fileinput.js' ?>"></script>
	
	<div class="register">
		<div class="container">

			<?php if (isset($_SESSION['perso'])) { ?>

				<!-- image error -->
				<?php if ($this->vars['errorImage'] != "") { ?>
					<div class="alert alert-danger">
	 					<strong> Attention !</strong> <?= $this->vars['errorImage'] ?>
					</div>
					
				<?php } ?>

				<!-- image success -->
				<?php if ($this->vars['succesImage'] != "") { ?>
					<div class="alert alert-success">
	 					<strong> Félicitation !</strong> <?= $this->vars['succesImage'] ?>
	 					<a style="color: blue" href="<?=WEBROOT.'image/imageDetail/'.$this->vars['img']->getId() ?>" > Consulter votre derniere image publiée</a>
					</div>
				<?php } ?>

				<!-- project error -->
					<?php if ($this->vars['errorProject'] != "") { ?>
						<div class="alert alert-danger">
		 					<strong> Attention !</strong> <?= $this->vars['errorProject'] ?>
						</div>
						
					<?php } ?>

					<!-- project success -->
					<?php if ($this->vars['succesProject'] != "") { ?>
						<div class="alert alert-success">
		 					<strong> Félicitation !</strong> <?= $this->vars['succesProject'] ?>
		 					<a style="color: blue" href="<?=WEBROOT.'projet/projetDetail/'.$this->vars['projet']->getId() ?>" > Consulter votre dernier projet publié</a>
						</div>
					<?php } ?>

			<!-- BUTTON SELECT IMAGE/ PROJET -->
				<div class="btn-group btn-group-justified">
  					<div class="btn-group">
    					<input type="button" class="btn btn-default" value="Publier votre image" onclick="showTab1();"></input>
  					</div>
  					
  					<div class="btn-group">
    					<input type="button" class="btn btn-default" value="Publier votre projet" onclick="showTab2();"></input>
  					</div>
				</div>
				<br>

	<!--/////////////////////////// IMAGES FORM ////////////////////////-->
				<form id="t1" method="post" enctype="multipart/form-data">
				<!-- image_title -->
					<div class="form-group">
						<label for="exampleInputinfo">Titre de l'image *</label>
						<input type="titre" class="form-control" name="image_title" >
					</div>

				<!-- image_categorie -->
					<div class="form-group">
						<div class="selectContainer">
							<label for="image_categorie">Catégorie *</label>
							<select name="image_categorie" class="form-control selectpicker">
								<?php foreach ($this->vars['tabCategories'] as $key => $value) { ?>
									<option value="<?=$value->getId()  ?>"><?=$value->getNom()  ?></option>
								<?php } ?>
						    </select>		
						</div>
					</div>
			
				<!-- image_description -->
					<div class="form-group">
    					<label for="name">Description *</label>
    					<textarea class="form-control" rows="3" name="image_description"></textarea>
  					</div>

  				<!-- select images -->
					<div class="form-group">
						<label for="fileList">Image * : 
							<p><i>La taille maximum pour chaque image est 4Mb</i></p>
							<p><i>Les extensions ne peuvent pas être redondantes</i></p>
							<p><i>Les extensions valides sont jpg, png, gif, svg</i></p>
						</label>

						<div class="form-group">
							<input class="file" type="file" multiple="multiple" data-preview-file-type="any" data-upload-url="#" name="image1[]" accept="image/*">
						</div>

					</div>



				<!-- button valid Image -->
					<button name="btn_upload_img" type="submit" class="btn btn-primary"> Publier cette image </button>
				</form> <!-- IMAGE FORM -->

				

	<!--//////////////////// PROJECT FORM //////////////////////-->
				<form id="t2" role="form" style="display:none" enctype="multipart/form-data" method="post">

					<!-- project_title -->
					<div class="form-group">
						<label for="exampleInputinfo">Titre du projet *</label>
						<input type="titre" class="form-control" name="project_title" >
					</div>

					<!-- image_description -->
					<div class="form-group">
	    				<label for="name"> Description *</label>
	    				<textarea class="form-control" rows="3" name="project_description"></textarea>
	  				</div>

	  				<!-- select imageIllustration -->
					<div class="form-group">
						<label for="fileListProjet">
							Image d'illustration du projet
							<p><i>Une image unique</i></p>
							<p><i>La taille maximum pour l'image est 4Mb</i></p>
							<p><i>Vous pouvez choisir l'extension jpg, png, gif, svg</i></p>
						</label>

						<div class="form-group">
							<input class="file" type="file" multiple="multiple" data-preview-file-type="any" data-upload-url="#" name="imageIllusProject" accept="image/*">
						</div>
					</div>
					

					<!-- button valid Project -->
					<button name="btn_upload_projet" type="submit" class="btn btn-primary"> Publier ce projet </button>

				</form> <!-- PROJECT FORM -->

		<!-- Message warning pour demander de se connecter -->
			<?php } else { ?>
				<div class="alert alert-danger">
	 				<strong> Attention !</strong> Veuillez vous connecter pour effectuer cette action
				</div>

			<?php } ?> <!-- END if isset($_SESSION['perso']) -->

		  </div> <!-- container -->
	</div> <!-- register -->
</body>

<script>
	function showTab1(){
	    document.getElementById("t1").style.display = "block";
	    document.getElementById("t2").style.display = "none";
	}

	function showTab2(){
	    document.getElementById("t1").style.display = "none";
	    document.getElementById("t2").style.display = "block";			
	}
</script>

<script type="text/javascript">
		$("#file-1").fileinput({
			uploadUrl: '#', // you must set a valid URL here else you will get an error
			allowedFileExtensions : ['jpg', 'png','gif'],
			overwriteInitial: false,
			maxFileSize: 10000,
			maxFilesNum: 10,
			//allowedFileTypes: ['image', 'video', 'flash'],
			slugCallback: function(filename) {
					return filename.replace('(', '_').replace(']', '_');
			}
	});
</script>

