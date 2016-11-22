	<header>
		<!-- NAVIGATION -->
		<?php include 'views/navigation.php';  ?>	
	</header>
	<?php include 'views/loadScript.php';  ?>

	<div class="single">
		<div class="container">
		   <div class="single_box1">
			 <div class="col-sm-5 single_left">
				
				<img src="<?=WEBROOT.$_SESSION['tabExtensions'][0] ?>" class="img-responsive" alt=""/>
			 </div>
			 <div class="col-sm-7 col_6">
			 	<form method="post" action="<?=WEBROOT.'image/download'  ?>">
					<h3><?=$_SESSION['imageDetail']->getTitre() ?></h3>
					
					<?php 
						foreach ($_SESSION['tabExtensions'] as $key => $value) {
							$extension = strtolower(  substr(  strrchr( $value, '.')  ,1)); ?>
							<input type="radio" value="<?=$extension ?>" name="extension"><?=$extension  ?>
					<?php } ?>

					<button type="submit" name="btn_download">Télécharger</button>
				</form>	
				
				<p class="movie_option"><strong>Date d'uploader : </strong><?=$_SESSION['imageDetail']->getDateDePub()  ?></p>
				<p class="movie_option"><strong>Format : </strong>July 02, 2015</p>
			</div>
			<div class="clearfix"> </div>
		  </div>
		<div class="tags">
			<h4 class="tag_head">Description</h4>
			<div class="well">
				<div class="clearfix"><?=$_SESSION['imageDetail']->getDescription() ?> </div>
			
		 	</div>
		</div>

		<div id="legend" class="">
		    <legend class="">Commentaire</legend>
		</div>

		<!-- COMMENTS LISTS -->
		<div class="container">
			<div class="row">

			<?php foreach ($_SESSION['tabCommentaires'] as $key => $value) { ?>
				<div class="col-sm-1">
					<div class="thumbnail">
						<img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
					</div><!-- /thumbnail -->
				</div><!-- /col-sm-1 -->

				<div class="col-sm-11">
					<div class="panel panel-info">
						<div class="panel-heading">
							<strong><?=$value->getNomPrenom()  ?></strong> <span class="text-muted">commented <?=$value->getDateDePub() ?></span>
						</div>
						<div class="panel-body">
							<?=$value->getContenu()  ?>
						</div><!-- /panel-body -->
					</div><!-- /panel panel-default -->
				</div><!-- /col-sm-5 -->
			<?php } ?>
			


			</div><!-- /row -->

		</div><!-- /container -->

		<!-- END COMMENTS LISTS -->


		<div class="row">
			<div class="col-sm-12">
				<legend>Ecrire votre commentaire</legend>
			</div><!-- /col-sm-12 -->
		</div><!-- /row -->

		<form class="form-horizontal" action="" method="post">
		    <fieldset>
		        <div class="control-group">
		        	<label class="control-label">Votre nom &amp prénom</label>
		        	<br>
		        <!-- nom et prenom -->
		        	<div class="controls">
		        		<div class="textarea">
		                	<input type="text" class="col-sm-12" name="nomPrenom"> </input>
		             	</div>
		            </div>
		        </div>
		        <br>
		        <div class="control-group">
		        	<label class="control-label">Contenu</label>
		        <!-- contentComment -->
		        	<div class="controls">
		        		<div class="textarea">
		                	<textarea type="text" class="col-sm-12" name="contentComment"> </textarea>
		             	</div>
		            </div>
		        </div>
		     	<br>
		     	<br>
		     	<br>

		     	<div class="control-group">
		           <label class="control-label"></label>
		           <div class="controls">
		             <button type="submit" class="btn btn-info" name="btn_commentaire">Publier ce commentaire</button>
		           </div>
		        </div>
		    </fieldset>
	   	</form>

	   	<?php if ($_SESSION['erreur_comment'] != "") { ?>
	   		<div class="alert alert-danger">
			  <strong>Attention !</strong> <?=$_SESSION['erreur_comment'] ?>
			</div>
	   	<?php } ?>
	   	


		   <h4 class="tag_head">Keywords</h4>
	         <ul class="tags_links">
				<li><a href="#">People</a></li>
				<li><a href="#">City</a></li>
				<li><a href="#">Walking</a></li>
				<li><a href="#">Modern</a></li>
				<li><a href="#">Computer</a></li>
				<li><a href="#">Business</a></li>
				<li><a href="#">Tree</a></li>
				<li><a href="#">Motion</a></li>
				<li><a href="#">Gym</a></li>
				<li><a href="#">Men</a></li>
				<li><a href="#">Fashion</a></li>
				<li><a href="#">Industrial</a></li>
				<li><a href="#">Interior</a></li>
				<li><a href="#">Real Estate</a></li>
				<li><a href="#">Food</a></li>
		        <li><a href="#">Restaurants</a></li>
				<li><a href="#">Society</a></li>
				<li><a href="#">Traveller</a></li>
				<li><a href="#">Mountain</a></li>
				<li><a href="#">Sitting</a></li>
				<li><a href="#">Discovery</a></li>
				<li><a href="#">Activity</a></li>
				<li><a href="#">Resting</a></li>
				<li><a href="#">Blue</a></li>
				<li><a href="#">France</a></li>
				<li><a href="#">Architecture</a></li>
				<li><a href="#">Europe</a></li>
				<li><a href="#">Building</a></li>
			 </ul>
			<div class="tags">
	    	<h4 class="tag_head">Similar Images</h4>
	         <ul class="tags_images">
				<li><a href="#"><img src="images/pic40.jpg" class="img-responsive" alt=""/></a></li>
				<li><a href="#"><img src="images/pic41.jpg" class="img-responsive" alt=""/></a></li>
				<li><a href="#"><img src="images/pic42.jpg" class="img-responsive" alt=""/></a></li>
				<li><a href="#"><img src="images/pic43.jpg" class="img-responsive" alt=""/></a></li>
				<li class="last"><a href="#"><img src="images/pic39.jpg" class="img-responsive" alt=""/></a></li>
				<div class="clearfix"> </div>
			 </ul>
			</div>
	    </div>
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

