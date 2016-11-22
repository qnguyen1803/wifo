	
	<header>
		<!-- NAVIGATION -->
		<?php include 'views/navigation.php';  ?>	
	</header>
	<?php include 'views/loadScript.php';  ?>	
	
	
	<div class="register">
		<div class="container">

			<?php if (isset($_SESSION['perso'])) { ?>
			<ul class="nav nav-pills" role="tablist">
		  		<li role="presentation" class="active"><a href="upload.html">Image</a></li>
		  		<li role="presentation"><a href="uploadProjet.html">Projet</a></li>
			</ul>
			

			<!-- FORM UPLOAD IMAGE -->
			<form id="upload_image" role="form" enctype="multipart/form-data" method="post" action="" data_toggle="validator">


				<fieldset class="container">

				<!-- image_title -->
					<div class="form-group">
						<label for="image_title">Titre de l'image *</label>
						<input type="text" class="form-control" name="image_title">
					</div>

				<!-- image_categorie -->
					<div class="form-group">
						<div class="selectContainer">
							<label for="image_categorie">Catégorie *</label>
							<select name="image_categorie" class="form-control selectpicker">
						      <option value="Nature">Nature</option>
						      <option value="Personne">Personne</option>
						      <option value="Infrastructures">Infrastructures</option>
						      <option value="Armes">Armes</option>
						    </select>		
						</div>
					</div>

				<!-- image_description -->
					<div class="form-group">
	    				<label for="name" class="control-label">Description *</label>
	    				<textarea class="form-control" rows="3" name="image_description"></textarea>
	  				</div>

					
					<div class="form-group">
						<label for="fileList">Image : <i>Vous pouvez chosir plusieurs extensions</i></label>

						<input type="file" class="file" name="image1" accept="image/bnp, image/gif,image/jpg,image/jpeg,image/png,image/svg">

						<input type="file" class="file" name="image2" accept="image/bnp, image/gif,image/jpg,image/jpeg,image/png,image/svg">

						<input type="file" class="file" name="image3" accept="image/bnp, image/gif,image/jpg,image/jpeg,image/png,image/svg">

						<input type="file" class="file" name="image4" accept="image/bnp, image/gif,image/jpg,image/jpeg,image/png,image/svg">

						<input type="file" class="file" name="image5" accept="image/bnp, image/gif,image/jpg,image/jpeg,image/png,image/svg">

						<input type="file" class="file" name="image6" accept="image/bnp,image/gif,image/jpg,image/jpeg,image/png,image/svg">

					</div>

					<?php if ($_SESSION['erreur_image'] != "") { ?>
						<div class="alert alert-danger">
 							<strong>Attention!</strong> <?= $_SESSION['erreur_image'] ?>
						</div>
					<?php } ?>

					<div class="form-group">
						<button name="btn_upload_img" type="submit" class="btn_Form"> Publier cette image</button>	
					</div>
				</fieldset>
			</form>
			<!-- END FORM UPLOAD IMAGE -->

			<?php if ($_SESSION['success_image'] != "") { ?>
				<div class="alert alert-success">
 					<strong> Félicitation !</strong> <?= $_SESSION['success_image'] ?>
 					<a style="color: blue" href="<?=WEBROOT.'image/imageDetail/'.$_SESSION['image']->getId() ?>" > Consulter votre derniere image publiée</a>
				</div>
			<?php } ?>

			

			<?php } else { ?>
			<br>
			<br>
			<br>
			<div class="alert alert-danger">
 				<strong>Attention!</strong> Veuillez vous connecter pour pouvoir effectuer cette fonction
			</div>
	<?php }  ?>   
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
</body>
<script>
	$("#file-1").fileinput({
			uploadUrl: '#', // you must set a valid URL here else you will get an error
			allowedFileExtensions : ['jpg', 'png','gif'],
			overwriteInitial: false,
			maxFileSize: 1000,
			maxFilesNum: 10,
			//allowedFileTypes: ['image', 'video', 'flash'],
			slugCallback: function(filename) {
					return filename.replace('(', '_').replace(']', '_');
			}
});
</script> 

