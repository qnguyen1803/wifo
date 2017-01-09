<?php 	include "views/head.php"; ?>
<div class="header">
      <div class="container">

  	     <div class="logo">
			<h1><a href="<?=WEBROOT.'accueil/index' ?>"><img src="<?=WEBROOT.'webroot/images/logo.png' ?>"/> WIFO</a></h1>
		 </div>

		 <!-- MENU PRINCIPAL -->
		 <div class="top_left">
			<ul>
				<li><a href="<?=WEBROOT.'utilisateur/authorsCollection'?>">Auteur</a></li>
				<li><a href="<?=WEBROOT.'image/imageCollection'?>">Image</a></li>
				<li><a href="<?=WEBROOT.'projet/projetCollection'?>">Projet</a></li>
				<li><a href="<?=WEBROOT.'accueil/upload'?>">Publier votre projet / image</a></li>
				<li><a href="<?=WEBROOT.'accueil/contact'?>">Nous contacter</a></li>
				<li><a href="<?=WEBROOT.'accueil/copyleft'?>">Mentions légales</a></li>
			<ul>
		 </div>
		 <div class="top_center"><a href="<?=WEBROOT.'accueil/search'  ?>"><span class="glyphicon glyphicon-search"></span></a></div>
		 
		 <div class="top_right">
		 	<?php if (isset($_SESSION['perso'])) { ?>
		 	<!-- BONJOUR USER -->
		 	<ul>
				<li>
					Bienvenue 
				</li>|
			<!-- CONNEXION -->
				<li class="login" >
					<div class="loginContainer">
					 	<a href="<?=WEBROOT.'utilisateur'.'/'.'connexion'?>" class="loginButton"><span style="color: blue"><?=$_SESSION['perso']->getPseudo()  ?></span></a>
						 
						<div class="loginBox">
							<div class="menu_dropdown">
								<a href="<?=WEBROOT.'utilisateur/tabDeBord'  ?>" class="row_dropdown"> Tableau de bord </a>
								<a href="<?=WEBROOT.'profil/index/'.$_SESSION['perso']->getPseudo() ?>" class="row_dropdown"> Votre profil </a>
								<a href="<?=WEBROOT.'utilisateur/deconnexion' ?>" class="row_dropdown"> Deconnexion</a>
							</div>
					    </div>
				    </div>
				</li>
		   	</ul>
	
		 	<?php } else { ?> 

		 	<!-- INSCRIPTION -->
		   	<ul>
				<li>
					<a href="<?=WEBROOT.'utilisateur'.'/'.'inscription'?>">Inscription</a>
				</li>|
			<!-- CONNEXION -->
				<li class="login" >
					 <div class="loginContainer">
					 	<a href="<?=WEBROOT.'utilisateur'.'/'.'connexion'?>" class="loginButton"><span>Connexion</span></a>
						 
						<div class="loginBox">

						  <!-- CONNEXION FORM -->
							  <form class="loginForm" method="post" action="<?=WEBROOT.'utilisateur/connexion' ?>">
				                <fieldset class="body">
				                	<fieldset>
				                          <label for="email">Email</label>
				                          <input type="email" name="email" id="email">
				                    </fieldset>
				                    <fieldset>
				                            <label for="password">Password</label>
				                            <input type="password" name="mdp" id="password">
				                     </fieldset>
				                    <input type="submit" class="login" name="btn_connexion" value="Se connecter">
				                	<label for="checkbox"><input type="checkbox" id="checkbox"> <i>Remember me</i></label>
				            	</fieldset>
				                 <span><a href="#">Forgot your password?</a></span>
							   </form>

							   <!-- CONNEXION FORM END ! -->
					        </div>
				      </div>
				  </li>
		   	</ul>
		   	<?php } ?>
	     </div>
		 <div class="clearfix"></div>
		</div>
	</div>

	<script src="<?=WEBROOT.'webroot/js/menu_jquery.js' ?>"></script>



