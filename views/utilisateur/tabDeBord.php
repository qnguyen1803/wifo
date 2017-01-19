
<section class="container">
<br>
<h2> Tableau de bord </h2>
<br>
<br>
<!-- LISTES DES DEMANDES A REPONDRE -->
    <div class="row">
    
        <div class="col-md-12">
            <h3 style="color: #660066">APPELS A COLLABORATIONS</h3>
            <hr>
            <div class="table-responsive">
                <table id="mytable" class="table table-bordred table-striped">
                <!-- Column name -->
                   <thead>
                        <th>idDemande</th>
                        <th>Candidat</th>
                        <th>Projet</th>
                        <th>Motivations</th>
                        <th>Accepter</th>
                        <th>Refuser</th>
                   </thead>
                <!-- Content table -->
                    <tbody>
                        <?php foreach ($this->vars['tabDemandesARepondre'] as $key => $value) { ?>
                            <tr>
                                <!-- idDemande -->
                                <td><?=$value->getId();  ?></td>

                                <!-- pseudo Candidat -->
                                <td><a href="<?=WEBROOT."profil/index/".$this->vars['tabUsersCandidate'][$key]->getPseudo()  ?>"><?=$this->vars['tabUsersCandidate'][$key]->getPseudo() ?></a></td>

                                <!-- titre du projet -->
                                <td><a href="<?=WEBROOT."projet/projetDetail/".$this->vars['tabProjects'][$key]->getId()  ?>"><?=$this->vars['tabProjects'][$key]->getTitre() ?></a></td>

                                <!-- motivations -->
                                <td><?=$value->getMessage() ?></td>

                                <form method="POST" action="">
                                    <!-- btn accepter -->
                                    <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" type="submit" data-target="#edit" name="btnAccept" value="<?=$value->getId()?>"><span class="glyphicon glyphicon-ok"></span></button></p></td>

                                    <!-- btn refuser -->
                                    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" name="btnRefuse" type="submit" value="<?=$value->getId()?>"><span class="glyphicon glyphicon-trash"></span></button></p></td>
                                </form>
                            </tr>
                        <?php } ?>
                       

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <br>
    <!-- LISTE DEMANDES ENVOYEES -->
    <div class="row">
        <div class="col-md-12">
            <h3 style="color: #660066"> MES OFFRES </h3>
            <hr>
            <div class="table-responsive">
                <table id="mytable" class="table table-bordred table-striped">
                <!-- Column name -->
                   <thead>
                        <th>idDemande</th>
                        <th>Projet</th>
                        <th>Motivations</th>
                        <th>Réponse</th>
                   </thead>
                <!-- Content table -->
                    <tbody>
                        <?php foreach ($this->vars['tabDemandesEnvoyees'] as $key => $value) { ?>
                            <tr>
                                <!-- idDemande -->
                                <td><?=$value->getId();  ?></td>

                                <!-- projet -->
                                <td><a href="<?=WEBROOT."projet/projetDetail/".$value->getIdProjet()  ?>"><?=$this->vars['tabProjets'][$key]->getTitre() ?></a></td>

                                <!-- motivations -->
                                <td><?=$value->getMessage()  ?></td>

                                <!-- Réponse -->
                                <td>
                                    <?php if ($value->getReponse() == "1") {
                                        echo "Accepté";
                                    } elseif ($value->getReponse() == "0") {
                                        echo "Refusé";
                                    } else {
                                        echo "En attente de la réponse de l'utilisateur";
                                    } ?>
                                    
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    
    <br>
<!-- LISTE DES IMAGES PUBLIEES -->
	<div class="row">
        <div class="col-md-12">
        	<h3 style="color: #660066">MES IMAGES</h3>
        	<hr>
        	<div class="table-responsive">
        		<table id="mytable" class="table table-bordred table-striped">
        		<!-- Column name -->
                   <thead>
                   		<th>Id</th>
                   		<th>Titre</th>
                    	<th>Catégorie</th>
                     	<th>Image</th>
                    	<th>Description</th>
                    	<th>Date de publication</th>
                    	<th>Note</th>
                    	<th>Modifier</th>
                    	<th>Supprimer</th>
                   </thead>
    			<!-- Content table -->
    				<tbody>
    				<?php foreach ($this->vars['tabImagesOfPerson'] as $key => $value) { ?>
    					<tr>
	    					<!-- idImage -->
	    					<td><?=$value->getId() ?></td>
	    					<!-- titre -->
	    					<td><?=$value->getTitre() ?></td>
	    					<!-- categorie -->
	    					<td><?=$this->vars['tabCategories'][$key]  ?></td>
	    					<!-- Image -->
	    					<td><img style="height: auto; width: 30%;" src="<?=WEBROOT.$this->vars['tabPaths'][$key] ?>" class="img-responsive" alt=""/></td>
	    					<!-- Description -->
	    					<td><?=$value->getDescription() ?></td>
	    					<!-- Date de publication -->
	    					<td><?=$value->getDateDePub() ?></td>
	    					<!-- Note -->
	    					<td><?=$value->getNote() ?></td>

                            
    	    					<!-- Modifier -->
    	    					<td><a href="<?=WEBROOT."image/modifierImage/".$value->getId() ?>"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" type="submit" data-target="#edit" name="btnModifierImage" value="<?=$value->getId() ?>"><span class="glyphicon  glyphicon glyphicon-pencil"></span></button></a></td>

    	    					<!-- supprimer -->
                            <form method="POST" action=""> 
    	    					<td><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" type="submit" name="btnSupprimerImage" value="<?=$value->getId()  ?>"><span class="glyphicon glyphicon-trash"></span></button></td>
                            </form>
    					</tr>
    				<?php } ?>
					</tbody>
    			</table>
 			</div>
        </div>
	</div>
	<br><br>

<!-- LISTE DES PRROJETS PUBLIES -->
	<div class="row">
        <div class="col-md-12">
        	<h3 style="color: #660066">MES PROJETS</h3>
        	<hr>
        	<div class="table-responsive">
        		<table id="mytable" class="table table-bordred table-striped">
        		<!-- Column name -->
                   <thead>
                   		<th>Id</th>
                   		<th>Titre</th>
                     	<th>Image d'illustration</th>
                    	<th>Description</th>
                    	<th>Date de publication</th>
                    	<th>Note</th>
                    	<th>Membres</th>
                    	<th>Supprimer</th>
                   </thead>
    			<!-- Content table -->
    				<tbody>
    				<?php foreach ($this->vars['listProjectOfThisPerson'] as $key => $value) { ?>
    					<tr>
	    					<!-- idProjet -->
	    					<td><?=$value->getId() ?></td>
	    					<!-- titre -->
	    					<td><a href="<?=WEBROOT.'projet/projetDetail/'.$value->getId() ?>"><?=$value->getTitre() ?></a></td>
	    			
	    					<!-- ImageIllustration -->
	    					<td><img style="height: auto; width: 30%;" src="<?=WEBROOT.$this->vars['tabImagesIllustration'][$key]  ?>" class="img-responsive" alt="Image"/></td>
	    					<!-- Description -->
	    					<td><?=$value->getDescription() ?></td>
	    					<!-- Date de publication -->
	    					<td><?=$value->getDateDePub() ?></td>
	    					<!-- Compteur -->
	    					<td><?=$value->getCompteur() ?></td>
	    					<!-- Membres -->
	    					<td><?=$value->getMembres() ?></td>
                            
                                <!-- supprimer -->
                            <form method="POST" action=""> 
                                <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" type="submit" name="btnSupprimerProjet" value="<?=$value->getId() ?>"><span class="glyphicon glyphicon-trash"></span></button></p></td>
                            </form>
    					</tr>
    				<?php } ?>
    			

					</tbody>
    			</table>
 			</div>
        </div>
	</div>

    
</section>





