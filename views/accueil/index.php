
	 <div class="banner">
		<div class="container">
			<div class="span_1_of_1">
			    <h2 style=" opacity: 0.8; color: #010066;">Images libres - Projets libres <br> Communautés libres</h2>

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
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
			    	<div class="thumbnail">
			        	<a href="<?=WEBROOT.'image/imageDetail/'.$value->getId()  ?>" target="_blank">
			         	 	<img src="<?=WEBROOT.$this->vars['tabImgPaths'][$key]?>" alt="Lights" style="width:100%; height: 180px;">
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
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
			    	<div class="thumbnail">
			        	<a href="<?=WEBROOT.'projet/projetDetail/'.$value->getId()  ?>" target="_blank">
			         	 	<img src="<?=WEBROOT.$value->getImageIllustration()?>" alt="Lights" style="width:100%; height: 180px;">
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
				<div class="col-sm-6 col-md-3" >
					<div class="col-md-6 text-center" >
				    	<img class="img-circle img-responsive img-center" src="<?=WEBROOT.$value->getAvatar()?>" style="width: 150px; height: 120px;" alt="">
			      	</div>
			      	<div class="col-md-6 text-center">
			      		<p><strong>Wifo - user</strong></p>
			      		<a href="<?=WEBROOT.'profil/index/'.$value->getPseudo() ?>"> <i> <?=$value->getPseudo() ?> </i></a>
			      		<p><strong> Intégration </strong></p>
			      		<p><?=$value->getDateCreation() ?></p>
			      	</div>
			    </div>
			<?php } ?>
	  </div>
  </div>


