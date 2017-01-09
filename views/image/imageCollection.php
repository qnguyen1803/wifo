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


		
<!-- 			<section class="sky-form">
				<h4>Freshness</h4>
				<div class="col col-4">
					<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Any time</label>
					<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Past 3 months</label>
					<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Past month</label>
				</div>

				<div class="col col-4">
					<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Past week</label>
					<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Past 3 days</label>
					<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Any time</label>
				</div>
			</section> -->
	   	</div>
    </div> <!-- fin stock-left -->
<!--  FIN ASIDE -->

<!-- TABS IMAGES RESULTS -->
	<div class="col-md-10 sap_tabs">
	    <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
			<ul class="resp-tabs-list">
			  	<li class="resp-tab-item"><span class="paramList" value="recent">Plus récents</span></li>
				<li class="resp-tab-item" ><span class="paramList" value="bonneNote">Plus apprécié</span></li>
				<li class="resp-tab-item" ><span class="paramList" value="mostDownload">Plus téléchargé</span></li>
				<div class="clearfix"></div>
			</ul>
			
			<div class="resp-tabs-container">	
				<div class="tab-1" aria-labelledby="tab_item-0">
					<ul class="tab_img">
						<?php foreach ($this->vars['tabImages'] as $key => $value) { ?>
							<li>
								<a href="<?=WEBROOT.'image/imageDetail/'.$value->getId()  ?>">
									<img style="height: 150px; width: 200px" src="<?=WEBROOT.$this->vars['tabPaths'][$key] ?>" class="img-responsive" alt=""/>
								    <div class="tab_desc" style="text-align: center;">
										<strong ><?=$value->getTitre()  ?></strong>
										<p> Date de publication </p>
										<h4><?=$value->getDateDePub()  ?></h4>
										<p> Nombre download: </p>
									</div>
							   </a>
							</li>
						<?php } ?>
					</ul> <!-- fin tab_img -->

				</div>
			</div>
        </div>
        <div class="pagination">
<!-- 	        <li>
	          <a href="#" aria-label="Previous">
	            <span aria-hidden="true">«</span>
	          </a>
	        </li>
	        <li><a href="#">1</a></li>
	        <li><a href="#">2</a></li>
	        <li><a href="#">3</a></li>
	        <li><a href="#">4</a></li>
	        <li><a href="#">5</a></li>
	        <li>
	          <a href="#" aria-label="Next">
	            <span aria-hidden="true">»</span>
	          </a>
	        </li> -->
        </div>
    </div>
    <!-- FINS TABS IMAGES RESULTS -->

       <!-- FIN DIV RIGHT -->
       <div class="clearfix"> </div>
</div>