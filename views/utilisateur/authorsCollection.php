<link rel="stylesheet" type="text/css" href="<?= WEBROOT.'webroot/css/utilisateur.css'?>">
<div class="container authorsCollection">
<br><br>
	<?php foreach ($this->vars['tabUsers'] as $key => $value): ?>
		<div class="col-md-2 span4">
	   	   	<div class="plan-options">
	   	   		<div class="plan-price">
	   	   			<img class="img-circle img-responsive img-center" src="<?=WEBROOT.$value->getAvatar()?>" alt="avatar_benoit">
				</div>
				<div class="caption">
					<h4><?=$value->getPseudo()  ?></h4>
					<hr>
					<p class="text-center">
						<strong>
						<?php if ($value->getMetier() == "") {
							echo "Métier non défini";
						} else {
							echo $value->getMetier();

						} ?>
							
						</strong>
					</p>
					<p class="text-center"><?=$value->getDateCreation()  ?></p>
				</div>
				
				<a class="btn_4" href="<?=WEBROOT.'profil/index/'.$value->getPseudo()  ?>"> Voir profil </a>
			</div>
		</div>
		
	<?php endforeach ?>
   	
	<div class="clearfix"> </div>
</div>


