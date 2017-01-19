	<link rel="stylesheet" type="text/css" href="<?=WEBROOT.'webroot/css/projet.css'  ?>">
	<div class="single">
		<div class="container">
		   <div class="single_box1">

		<!-- Image illustration box -->
			 	<div class="col-sm-4 single_left">
					<img src="<?=WEBROOT.$this->vars['projetDetail']->getImageIllustration()  ?>" class="img-responsive" alt="illustration Project"/>
			 	</div>

		<!-- Info PROJET -->
			 	<div class="col-sm-5 col_6">
			 	<!-- nom du projet-->
			 		<h3><?=$this->vars['projetDetail']->getTitre() ?></h3>
			 		<hr>	 

			 	<!-- Catégorie -->	
					<p class="movie_option"><strong>Catégorie :  </strong> <?=$this->vars['projectCate']->getNom() ?> </p>

				<!-- Auteur -->	
					<p class="movie_option"><strong>Auteur :  </strong><a style="color: blue" href="<?=WEBROOT."profil/index/".$this->vars['projectAuthor']->getPseudo() ?>"><?=$this->vars['projectAuthor']->getPseudo() ?> </a></p>

				<!-- date de publication -->	
					<p class="movie_option"><strong>Date de publication : </strong> <p> <?=$this->vars['projetDetail']->getDateDePub() ?>  </p></p>

				<!-- like dislike -->
					<p class="movie_option">
						<strong> Ce projet est-t-il intéressant ?</strong>
						<p>
							<button class="vote btn btn-primary" type="button" value="like">
							Aimer 
							</button> <span class=" badge like"><?=$this->vars['tabCompteurs'][0] ?></span> <span class="glyphicon glyphicon-thumbs-up"></span>

							<button class="vote btn btn-danger" type="button" value="dislike">
							Ne pas aimer 
							</button><span class="badge dislike"><?=$this->vars['tabCompteurs'][1]  ?></span><span class="glyphicon glyphicon-thumbs-down"></span>
						</p>
					</p> <!-- movie_option --> 
					<script type="text/javascript">
						$(document).ready(function(){
							// function ajax pour les boutons aimer et dislike
							$('.vote').click(function(){
								var valueVote = $(this).val();
								var data = 'vote=' + valueVote;
								$.ajax({
									type : "POST",
									url : "<?=WEBROOT.'projet/projetDetailVoteAjax/'.$this->vars['projetDetail']->getId() ?>",
									data : data,
									success: function(server_result){
										console.log(server_result);
									 	var res = $.parseJSON(server_result);
									 	$('.like').text(res[0]);
									 	$('.dislike').text(res[1]);
									 	$('.vote').css("display", "none");
									}
								})
							}) 

							// function pour afficher le popup
							$("#btn_postuler").click(function(){
								$(".popupWindow").css("display", "block");
							})

							$(".close").click(function(){
								$(".popupWindow").css("display", "none");
							})
						})
					</script>
					<br>

				<!-- postuler à ce projet -->
					<p class="movie_option">
						<p>
						<?php if (isset($_SESSION['perso']) && $this->vars['projetDetail']->getIdUtilisateur() != $_SESSION['perso']->getId()) { ?>
							<strong> Postuler pour participer à ce projet ?</strong>
							<button type="submit" class="btn btn-warning" name="btn_message" id="btn_postuler"> Postuler <span class="glyphicon glyphicon-send"></span></button>
						<?php } elseif( $this->vars['projetDetail']->getIdUtilisateur() == $_SESSION['perso']->getId()){
							} else { ?>
							<br>
							<div class="alert alert-info">
	 							<strong> Veuillez vous connecter pour pouvoir postuler à ce projet </strong> 
							</div>

						<?php } ?>

						<?php if ($this->vars['succes_demande']) { ?>
						<br>
							<div class="alert alert-success">
	 							<strong>Félicitation!</strong> <?= $this->vars['succes_demande'] ?>
							</div>
						<?php } ?>
		
						</p>
					</p>	
					<br><br>
				</div><!-- END Info Projet -->
			
			<!-- List membres -->
				<h3 class="text-center">Membres du projet</h3>
					<div class="thumbnail col-sm-3">
					<?php foreach ($this->vars['tabMembres'] as $key => $value) { ?>
					   	<div class="text-center col-sm-6" >
							<img class="img-circle img-responsive img-center" src="<?=WEBROOT.$value->getAvatar()?>" style="width: 100px; height: 100px;" alt="">
							<a href="<?=WEBROOT.'profil/index/'.$value->getPseudo()  ?>"><?=$value->getPseudo()  ?></a>
						</div>
					<?php } ?>
				</div>

		  </div>
		  <div class="clearfix"></div>
		<div class="rows"><br>
			<h4>Description</h4>
			<div class="well">
				<div class="clearfix"><?=$this->vars['projetDetail']->getDescription() ?> </div>
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

	<!-- ECRIRE UN COMMENTAIRE -->
		<div class="row">
			<div class="col-sm-12">
				<legend> Ecrire votre commentaire </legend>
			</div><!-- /col-sm-12 -->
		</div><!-- /row -->	

		<!-- Commentaires form -->
		<?php if (isset($_SESSION['perso'])) { ?>
			<!-- Formulaire pour écrire commentaire -->
			<form class="form-horizontal" action="" method="post">
			    <fieldset>
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
	</div> <!-- container -->

	<!-- POPUP WINDOW -->
	<div class="popupWindow col-sm-12" id="popupWindow">	
		<div class="container popupWindowContent">
			<?php if ($this->vars['demandeExist']) { ?>
				<div class="alert alert-danger">
	 				<strong>Attention!</strong> Vous avez déjà envoyé la demande pour ce projet
				</div>
			<?php } else { 
				if ($this->vars['projetDetail']->getIdUtilisateur() != $_SESSION['perso']->getId()) { ?>
				<h3> Postuler pour participer à ce projet</h3>
				<form id="postuler_form" class="form-horizontal" role="form" method="post">

					<!-- motivations -->
					<div class="form-group">
						<label for="motivations" class=" control-label"></label>
						<div class="inputGroupContainer">
							<div class="input-group col-xs-12">
								<textarea class="form-control" name="motivations" id="motivationsZone" rows="6"placeholder="Veuillez écrire vos motivations ..."></textarea>
							</div>
						</div>
					</div>

					<!-- button -->
					<div class="form-group">
						<div class="col-sm-8">
							<button type="submit" class="btn btn-warning" name="btn_demande" id="connexion_submit"> Envoyer la demande au créateur</button>
						</div>
					</div>

					<?php if ($this->vars['erreur_demande'] != "") { ?>
			     		<div class="alert alert-danger">
	 						<strong>Attention!</strong> <?= $this->vars['erreur_demande'] ?>
						</div>
			     	<?php } ?>
				</form>
					
				<?php }
			} ?>
		</div>
		<div class="close">&times;</div>
	</div> <!-- popupWindow -->


