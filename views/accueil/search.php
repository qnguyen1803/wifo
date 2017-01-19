
    <br>
    <br>

    <div class="container">
        <div class="row col-lg-12">

                    <div class="ibox-content">
            
                    <!--  SEARCH_BOX -->
                        <div class="search-form">
                            <form action="#" method="post">
                                    
                                <div class="input-group">
                                    <input type="text" placeholder="Ecrire votre mot clé ..." name="search-content" class="form-control input-lg">

                                    <div class="input-group-btn">
                                        <button class="btn btn-lg btn-primary" type="submit" name="search-btn" id="search-btn">
                                            Search
                                        </button>
                                    </div>
                                </div>
                                <br>

                                <select name="search-param" class="selectpicker col-sm-12">
                                        <option value="image">image</option>
                                        <option value="projet">projet</option>
                                </select>
                            </form>
                        </div>
                        <br>
                        <br>

                    <!-- RESULTATS -->
                        <!-- afficher erreur -->
                            <?php if ($this->vars['search_error'] != "") { ?>
                                <div class="alert alert-warning">
                                    <strong> Warning !</strong> <?=$this->vars['search_error'] ?>
                                </div>
                            <?php } ?>

                        
                            <div class="sap_tabs">
                            <?php if (isset($this->vars['tabResultsImg'])) { ?>

                            <!--  nombre de resultats -->
                                <h3><?= count($this->vars['tabResultsImg']). ' résultats pour le mot clef "'. $this->vars['motClef'].' "' ?></h3>
                            <!-- list des resultats -->
                                <div class="resp-tabs-container">
                                    <?php foreach ($this->vars['tabResultsImg'] as $key => $value) {
                                            $tabExtensions = array_filter(explode(',', $value->getRepository()));  ?>
                                        <div class="search-result">
                                            <div class="col-sm-4">
                                                <img style="height: 40vh; width: 100%" src="<?=WEBROOT.$tabExtensions[0] ?>" class="img-responsive" alt=""/>
                                                
                                                <div class="col-sm-12" style="border:1px solid #ccc">
                                                    <br>
                                                    <p class="movie_option"><h3><?=$value->getTitre()?></h3></p>
                                                    <p class="movie_option"><strong>Date de publication : </strong><?=$value->getDateDePub()  ?></p>
                                                    <p class="movie_option"><strong>Auteur : </strong><?=$value->getIdUtilisateur() ?></p>
                                                    <a href="<?=WEBROOT.'image/imageDetail/'.$value->getId() ?>"> Consulter cette image</a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }  ?>
                                </div>
                            </div>
                              
                            <?php } elseif (isset($this->vars['tabResultsProj'])) { ?>
                              <!--  nombre de resultats -->
                                <h3><?= count($this->vars['tabResultsProj']). ' résultats pour le mot clef "'. $this->vars['motClef'].' "' ?></h3>
                            <!-- list des resultats -->
                                <div class="resp-tabs-container">
                                    <?php foreach ($this->vars['tabResultsProj'] as $key => $value) {
                                            $tabExtensions = array_filter(explode(',', $value->getRepository()));  ?>
                                        <div class="search-result">
                                            <div class="col-sm-4">
                                                <img style="height: 40vh; width: 100%" src="<?=WEBROOT.$tabExtensions[0] ?>" class="img-responsive" alt=""/>
                                                
                                                <div class="col-sm-12" style="border:1px solid #ccc">
                                                    <br>
                                                    <p class="movie_option"><h3><?=$value->getTitre()?></h3></p>
                                                    <p class="movie_option"><strong>Date de publication : </strong><?=$value->getDateDePub()  ?></p>
                                                    <p class="movie_option"><strong>Auteur : </strong><?=$value->getIdUtilisateur() ?></p>
                                                    <a href="<?=WEBROOT.'image/imageDetail/'.$value->getId() ?>"> Consulter cette image</a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }  ?>
                                </div>
                            </div>
                            <?php } ?>
         
        </div>
</div>




