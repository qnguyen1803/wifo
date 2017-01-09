	<div class="single">
		<div class="container">
		   <div class="single_box1">

		<!-- Image box -->
			 	<div class="col-sm-5 single_left">
					<img src="<?=WEBROOT.$this->vars['tabExtensions'][0] ?>" class="img-responsive" alt=""/>
			 	</div>

		<!-- Info IMAGE -->
			 	<div class="col-sm-7 col_6">
			 	<!-- nom de l'image -->
			 		<h3><?=$this->vars['imageDetail']->getTitre() ?></h3>
			 		<hr>	 

				<!-- Categorie -->
					<p class="movie_option"><strong>Catégorie : </strong><?=$this->vars['imageCategorie']->getNom()  ?></p>

				<!-- Auteur -->	
					<?php $param = str_replace(' ', '', $this->vars['imageAuthor']->getPseudo()); ?>

					<p class="movie_option"><strong>Auteur :  </strong><a style="color: blue" href="<?=WEBROOT.'profil/index/'.$param ?>"><?=$this->vars['imageAuthor']->getPseudo() ?></a></p>

				<!-- date de publication -->	
					<p class="movie_option"><strong>Date de publication : </strong><?=$this->vars['imageDetail']->getDateDePub()  ?></p>

				<!-- note moyenne -->
					<p class="movie_option"><strong> Note moyenne : </strong>
					<?php foreach ($this->vars['tabStar'] as $key => $value) { ?>
						<span class="glyphicon <?=$value ?>" ></span>
					<?php } ?>
					</p>

				<!-- extensions to download -->
				 	<form method="post" action="<?=WEBROOT.'image/download/'.$this->vars['imageDetail']->getId() ?>">
						<?php 
							foreach ($this->vars['tabExtensions'] as $key => $value) {
								$extension = strtolower( substr(  strrchr( $value, '.')  ,1)); ?>

								<input class="btn btn-info" type="radio" value="<?=$extension ?>" name="extension"> &nbsp; <?=$extension ?>

						<?php } ?>
						&nbsp;
						<button type="submit" class="btn btn-default" name="btn_download">Télécharger</button>
					</form>	<!-- FORM TO DOWNLOAD -->


				<!-- <button class="btn btn-info glyphicon glyphicon-thumbs-up"> Aimer <span class="badge badge-info"><?= $this->vars['imageDetail']->getNote()  ?> </span></button> -->
				


				</div><!-- END Info IMAGE -->

			<div class="clearfix"> </div>
		  </div>
		<div class="tags">
			<h4 class="tag_head">Description</h4>
			<div class="well">
				<div class="clearfix"><?=$this->vars['imageDetail']->getDescription() ?> </div>
			
		 	</div>
		</div>

<!-- Liste des commentaires -->
		<div id="legend" class="">
		    <legend class=""> Commentaires </legend>
		</div>

		<div class="container">
			<div class="row">
			<?php foreach ($this->vars['tabCommentaires'] as $key => $value) { 
				?>
				<div class="col-sm-1">
					<div class="thumbnail">
						<img class="img-responsive user-photo" src="<?=WEBROOT.$this->vars['tabAuteurComment'][$key]->getAvatar() ?>">

					</div><!-- /thumbnail -->
					<a href="<?=WEBROOT.'profil/index/'.$this->vars['tabAuteurComment'][$key]->getPseudo() ?>"><?=$this->vars['tabAuteurComment'][$key]->getPseudo() ?></a>
				</div><!-- /col-sm-1 -->

				<div class="col-sm-11">
					<div class="panel panel-info">
						<div class="panel-heading">
							<strong><?=$value->getSujet() ?> &nbsp; </strong>
							<?php 
							for ($i=0; $i < (int)$value->getVote() ; $i++) { ?> 
								<span class="glyphicon glyphicon-star"></span> 
							<?php } ?> 
							
							<p class="text-muted"> publié à <?=$value->getDateDePub() ?></p>
						</div>
						<div class="panel-body">
							<?=$value->getContenu()  ?>
						</div><!-- /panel-body -->
					</div><!-- /panel panel-default -->
				</div><!-- /col-sm-5 -->
			<?php } ?>
			</div><!-- /row -->

		</div><!-- liste des commentaires -->

	<!-- Ecrire un commentaire -->
		<div class="row">
			<div class="col-sm-12">
				<legend> Ecrire votre commentaire </legend>
			</div><!-- /col-sm-12 -->
		</div><!-- /row -->	
		<style type="text/css">
			.ratingImg{
				cursor: pointer;
			}
		</style>

		<?php if (isset($_SESSION['perso'])) { ?>
			<!-- Formulaire pour écrire commentaire -->
			<form class="form-horizontal" action="" method="post">
			    <fieldset>
			    <!-- Vote du commentaire pour l'image -->
			    	<div class="control-group">
			    	<br>
			    		<label class="control-label"> Donnez une note à cette image * </label>
			    		<div class="controls">
			    			<select name="voteCommentaire">
			    				<option value="1">1</option>
							    <option value="2">2</option>
							    <option value="3">3</option>
							    <option value="4">4</option>
							    <option value="5">5</option>
			    			</select> <span> / 5</span>
			    		</div>
			    	</div>

			    <!-- Sujet du commmentaire -->
			        <div class="control-group">
			        	<label class="control-label"> Sujet * </label>
			        	<br>
			        	<div class="controls">
			                <input type="text" class="col-sm-12" name="sujetCommentaire"> </input>
			            </div>
			        </div>
			        <br>
			    <!-- contentComment -->
			        <div class="control-group">
			        	<label class="control-label"> Contenu * </label>
			        	<div class="controls">
			                <textarea type="text" class="col-sm-12" name="contentComment"></textarea>
			            </div>
			        </div>
			        <div class="clearfix"></div>
			     	<?php if ($this->vars['erreur_comment'] != "") { ?>
			     		<div class="alert alert-danger">
	 						<strong>Attention!</strong> <?= $this->vars['erreur_comment'] ?>
						</div>
			     	<?php } ?>

			     	<div class="control-group">
			           <label class="control-label"></label>
			           <div class="controls">
			             <button type="submit" class="btn btn-info" name="btn_commentaire">Publier ce commentaire</button>
			           </div>
			        </div>
			    </fieldset>
		   	</form> <!-- formulaire commentaire -->
		<?php } else { ?>
			<div class="alert alert-danger">
	 			<strong>Attention!</strong> Veuillez vous connecter pour écrire votre commentaire
			</div>

		<?php } ?>
	</div>
