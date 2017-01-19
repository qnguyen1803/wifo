<div class="stock_box">

<!-- ASIDE -->
	<div class="col-md-2 stock_left">
	    <div class="w_sidebar">

	   <!--  Categories -->
			<section class="sky-form">
		   		<h4> Catégories </h4>
			 	
			 	<div class="col col-4">
			 		<label class="radio">
			 			<input type="radio" name="categorie" checked="" value="all"><i></i>Toutes les catégories
			 		</label>
			 		<?php foreach ($this->vars['tabCategories'] as $key => $value) { ?>
			 			<label class="radio"><input type="radio" name="categorie"  value="<?=$value->getNom()  ?>"><i></i><?=$value->getNom()  ?></label>
			 		<?php } ?>
				</div>
			</section>

		<!-- End categories -->
		<script type="text/javascript">
			$(document).ready(function(){
				// action categorie
				$('input[name=categorie]').change(function(){
					var cate = $(this).val();
					var data = 'categorie=' + cate;
					$.ajax({
						type : "POST",
						url : "<?=WEBROOT.'image/imageCollectionAjax' ?>",
						data : data,
						success: function(server_result){
							$('.tab_img').html(server_result);
						}
					})
				}) 
			})
		</script>
	   	</div>
    </div> <!-- fin stock-left -->
<!--  FIN ASIDE -->

<!-- TABS IMAGES RESULTS -->
	<div class="col-md-10 sap_tabs">
	    <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
			<div class="resp-tabs-container">	
				<div class="tab-1" aria-labelledby="tab_item-0">
					<ul class="tab_img">
						<?php foreach ($this->vars['tabImages'] as $key => $value) {?>

							<li>
								<a href="<?=WEBROOT.'image/imageDetail/'.$value->getId()  ?>">
									<img style="height: 150px; width: 100%" src="<?=WEBROOT.$this->vars['tabPaths'][$key] ?>" class="img-responsive" alt=""/>
								    <div class="tab_desc" style="text-align: center;">
										<strong ><?=$value->getTitre()  ?></strong>
										<hr>
										<p><strong> Date de publication </strong></p>
										<p><?=$value->getDateDePub()  ?></p>
										<p><strong> Note moyenne </p>
										<p><?=$value->getNote().'/5' ?></p>
									</div>
							   </a>
							</li>
						<?php } ?>
					</ul> <!-- fin tab_img -->

				</div>
			</div>
        </div>
    </div>
    <!-- FINS TABS IMAGES RESULTS -->

       <!-- FIN DIV RIGHT -->
       <div class="clearfix"> </div>
</div>