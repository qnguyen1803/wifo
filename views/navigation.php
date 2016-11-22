
<div class="header">
      <div class="container">

  	     <div class="logo">
			<h1><a href="<?=WEBROOT.'accueil/index' ?>"><img src="<?=WEBROOT.'webroot/images/logo.png' ?>"/> WIFO</a></h1>
		 </div>

		 <!-- MENU PRINCIPAL -->
		 <div class="top_left">
			<ul>
				<li><a href="#">Auteur</a></li>
				<li><a href="#">Image</a></li>
				<li><a href="#">Projet</a></li>
				<li><a href="<?=WEBROOT.'accueil/upload'?>">Publier votre projet / image</a></li>
				<li><a href="<?=WEBROOT.'accueil/contact'?>">Nous contacter</a></li>
				<li><a href="<?=WEBROOT.'accueil/copyleft'?>">Mentions légales</a></li>
			<ul>
		 </div>

		 
		 <div class="top_right">
		 	<?php if (isset($_SESSION['perso'])) { ?>

		 		<!-- BONJOUR USER -->
		 		<p> Bonjour <span ><a style="color: red;" href="<?=WEBROOT.'profil/index' ?>"> <?=$_SESSION['perso']->getPseudo() ?></a></span> </p>
		 		<p> <a href="<?=WEBROOT.'utilisateur/deconnexion' ?>"> Se déconnecter</a></p>
		 	<?php } else { ?> 

		 	<!-- INSCRIPTION -->
		   	<ul>
				<li>
					<a href="<?=WEBROOT.'utilisateur'.'/'.'inscription'?>">Inscription</a>
				</li>|
			<!-- CONNEXION -->
				<li class="login" >
					 <div id="loginContainer"><a href="<?=WEBROOT.'utilisateur'.'/'.'connexion'?>" id="loginButton"><span>Connexion</span></a>
						  <div id="loginBox">

						  <!-- CONNEXION FORM -->
							  <form id="loginForm" method="post" action="<?=WEBROOT.'utilisateur/connexion'  ?>">
				                <fieldset id="body">
				                	<fieldset>
				                          <label for="email">Email</label>
				                          <input type="email" name="email" id="email">
				                    </fieldset>
				                    <fieldset>
				                            <label for="password">Password</label>
				                            <input type="password" name="mdp" id="password">
				                     </fieldset>
				                    <input type="submit" id="login" name="btn_connexion" value="Se connecter">
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



