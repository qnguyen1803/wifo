<link rel="stylesheet" type="text/css" href="<?= WEBROOT.'webroot/css/profile.css'?>">
<?php 
	$param = str_replace(' ', '', $this->vars['persoRef']->getPseudo());	
 ?>
<!--  si la valeur du get == pas à la valeur du session perso 
affiche pas les li Modifier 
-->
    <div class="col-sm-3">
        <nav class="navbar navbar-default sidebar" role="navigation">
          <ul class="nav navbar-nav">
          <!-- A propos de l'auteur -->
            <li class="col-xs-12"><a href="<?=WEBROOT.'profil/index/'.$param ?>">A propos de l'auteur<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li> 

            <?php if (isset($_SESSION['perso']) && ($_SESSION['perso'] == $this->vars['persoRef'] )) { ?>
            <!-- Modifier votre informations -->
	            <li class="col-xs-12"><a href="<?=WEBROOT.'profil/modifier/'.$param ?>"> Modifier votre informations <span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-pencil"></span></a></li>
	        <!-- Paramètres de votre compte  -->    
	            <li class="col-xs-12"><a href="<?=WEBROOT.'profil/parametre/'.$param ?>"> Paramètres de votre compte <span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-cog"></span></a></li>
	        <?php } ?>

          </ul>        
      </nav>
    </div>