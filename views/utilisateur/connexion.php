<header>
	<!-- NAVIGATION -->
	<?php include 'views/navigation.php';  ?>	
</header>
	<div class="register">
		
		<fieldset class="container">
		<?php if (!isset($_SESSION['perso'])){?>

			<form id="connexion" class="form-horizontal" role="form" data-toggle='validator' method="post" action="">
		<!-- WEBROOT.'/'.CONTROLLER.'/tabDeBord' -->
			
				<legend><h2>Connexion</h2></legend>

					<!-- text-input -->
					<div class="form-group">
						<label for="email" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-6 inputGroupContainer">
							<div class="input-group">
								<input type="email" class="form-control" name="email" id="connexion_email">
							</div>
						</div>
					</div>

					<!-- text-input -->
					<div class="form-group">
						<label for="mdp" class="col-sm-2 control-label">Password</label>
						<div class="col-sm-4 inputGroupContainer">
							<div class="input-group">
								<input type="password" class="form-control" name="mdp" id="connexion_mdp">
							</div>
						</div>
					</div>

					<!-- button -->
					<div class="form-group">
						<label class="col-sm-2 control-label"></label>
						<div class="col-sm-8">
							<button type="submit" class="btn btn-warning" name="btn_connexion" id="connexion_submit"> Se connecter </button>
						</div>
					</div>

					<?php if($_SESSION['connexion_erreur'] != "" ){ ?> 
						<div class="alert alert-warning">
						  <strong> Attention!</strong> <?=$_SESSION['connexion_erreur']  ?>
						</div>
					<?php	} ?> 
					
			</form>
			<?php	} ?> 
		</fieldset>
	</div>

	<div class="grid_2">
		<div class="container">
			<div class="col-md-3 col_2">
				<h3>Stock Photo<br>Categories</h3>
			</div>
			<div class="col-md-9 col_5">
				<div class="col_1_of_5 span_1_of_5">
					<ul class="list1">
					    <li><a href="stock.html">Abstract</a></li>
			            <li><a href="stock.html">Animals/Wildlife</a></li>
			            <li><a href="stock.html">The Arts</a></li>
			            <li><a href="stock.html">Backgrounds/Textures</a></li>
			            <li><a href="stock.html">Beauty/Fashion</a></li>
			            <li><a href="stock.html">Buildings/Landmarks</a></li>
		            </ul>
				</div>
				<div class="col_1_of_5 span_1_of_5">
					<ul class="list1">
					    <li><a href="stock.html">Business/Finance</a></li>
			            <li><a href="stock.html">Celebrities</a></li>
			            <li><a href="stock.html">Editorial</a></li>
			            <li><a href="stock.html">Education</a></li>
			            <li><a href="stock.html">Food and Drink</a></li>
			            <li><a href="stock.html">Healthcare/Medical</a></li>
		            </ul>
				</div>
				<div class="col_1_of_5 span_1_of_5">
					<ul class="list1">
					    <li><a href="stock.html">Holidays</a></li>
			            <li><a href="stock.html">Illustrations/Clip-Art</a></li>
			            <li><a href="stock.html">Industrial</a></li>
			            <li><a href="stock.html">Interiors</a></li>
			            <li><a href="stock.html">Miscellaneous</a></li>
			            <li><a href="stock.html">Model Released Only</a></li>
		            </ul>
				</div>
				<div class="col_1_of_5 span_1_of_5">
					<ul class="list1">
					    <li><a href="stock.html">Nature</a></li>
			            <li><a href="stock.html">Objects</a></li>
			            <li><a href="stock.html">Parks/Outdoor</a></li>
			            <li><a href="stock.html">People</a></li>
			            <li><a href="stock.html">Religion</a></li>
			            <li><a href="stock.html">Science</a></li>
		            </ul>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<div class="grid_3">
	  <div class="container">
	  	 <ul id="footer-links">
			<li><a href="#">Terms of Use</a></li>
			<li><a href="#">Royalty Free License</a></li>
			<li><a href="#">Extended License</a></li>
			<li><a href="#">Privacy</a></li>
			<li><a href="support.html">Support</a></li>
			<li><a href="about.html">About Us</a></li>
			<li><a href="faq.html">FAQ</a></li>
			<li><a href="#">Categories</a></li>
         </ul>
         <p>Copyright &copy; 2015.Company name All rights reserved.More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></p>
	  </div>
	</div>




