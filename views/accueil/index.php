<link rel="stylesheet" type="text/css" href="<?= WEBROOT.'webroot/css/accueil.css'?>">
	 <div class="banner">
		<div class="container">
			<div class="span_1_of_1">
			    <h2>Photos, illustrations by<br> Creatives all over the world.</h2>

			    <div class="search">
		            <!-- search form -->
					<div class="search-form col-sm-12">
                        <form action="<?=WEBROOT.'accueil/search' ?>" method="post">
                        		
                            <div class="input-group col-sm-12">
                                <input type="text" placeholder="Ecrire votre mot clé ..." name="search-content" class="form-control input-lg">

                                <div class="input-group-btn">
                                    <button class="btn btn-lg btn-primary" type="submit" name="search-btn" id="search-btn">
                                        Search
                                    </button>
                                </div>
                            </div>

                            <select name="search-param" class="selectpicker col-sm-12">
									<option value="image">Image</option>
									<option value="projet">Projet</option>
							</select>
                        </form>
                    </div>
					<!-- END search form -->
	            </div>

			</div>
		</div>
	</div>
	<!-- LISTE IMAGES -->
	<div class="grid_1">
		<h2> Dernières images publiées </h2>
		<hr>
		<div class="row">
			<?php foreach ($this->vars['listImagesRecents'] as $key => $value) { ?>
				<div class="col-md-3">
			    	<div class="thumbnail">
			        	<a href="<?=WEBROOT.'image/imageDetail/'.$value->getId()  ?>" target="_blank">
			         	 	<img src="<?=WEBROOT.$this->vars['tabImgPaths'][$key]?>" alt="Lights" style="width:100%">
					        <div class="caption">
					        	<strong style="color: blue"><?=$value->getTitre()  ?> </strong><i> publié par </i>
					        	<strong><?=$this->vars['tabImagesAuthor'][$key]->getPseudo() ?></strong>
					        </div>
			        	</a>
			      	</div>
			    </div>
			<?php } ?>
	  </div>

	  <br><br>

	 <!--  LISTE PROJETS -->
	  <h2> Derniers projets </h2>
		<hr>
		<div class="row">
			<?php foreach ($this->vars['listProjetsRecents'] as $key => $value) { ?>
				<div class="col-md-3">
			    	<div class="thumbnail">
			        	<a href="<?=WEBROOT.'projet/projetDetail/'.$value->getId()  ?>" target="_blank">
			         	 	<img src="<?=WEBROOT.$value->getImageIllustration()?>" alt="Lights" style="width:100%">
					        <div class="caption">
					        	<strong style="text-align: center;"><?=$value->getTitre()  ?> </strong>
					        	<i> publié par </i>
					        	<strong><?=$this->vars['tabProjectsAuthor'][$key]->getPseudo() ?></strong>
					        </div>
			        	</a>
			      	</div>
			    </div>
			<?php } ?>
	  </div>

	  <br><br>

	  <!-- LISTE AUTEURS -->
	  <h2> Derniers auteurs </h2>
		<hr>
		<div class="row">
			<?php foreach ($this->vars['listUsersRecents'] as $key => $value) { ?>
				<div class="col-sm-3">
					<div class="col-md-6" >
				    	<div class="thumbnail">
				    		<img class="img-responsive user-photo" src="<?=WEBROOT.$value->getAvatar() ?>">
				      	</div>
			      	</div>
			      	<div class="col-md-6" style="border: 1px solid #ccc;">
			      		<p><strong>Wifo - user</strong></p>
			      		<a href="<?=WEBROOT.'profil/index/'.$value->getPseudo() ?>"><?=$value->getPseudo() ?></a>
			      		<p><strong> Intégration </strong></p>
			      		<p><?=$value->getDateCreation() ?></p>
			      	</div>
			    </div>
			<?php } ?>
	  </div>
  </div>


