
<div class="container">
  <br><br>
  <div class="row">
  <!-- menu-left -->
    <?php include 'views/profil/navigation_profil.php'; ?>
    <div class="col-sm-9">
        <div class="panel panel-default">
               <div class="panel-heading resume-heading">
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="col-xs-12 col-sm-4">
                           <figure>
                              <img class="img-circle img-responsive" style="width: 100%; height: 40%" alt="" src="<?=WEBROOT. $this->vars['persoRef']->getAvatar()?>">
                           </figure>
                           <br>
                           <p class="text-center col-sm-12"><?php echo "<b> Date d'inscription</b>: ". $this->vars['persoRef']->getDateCreation(); ?></p>
                           <p class="text-center col-sm-12"><?php echo "<b> Dernière connexion: </b>". $this->vars['persoRef']->getDerniereConnexion(); ?></p>
                        </div>
                        <div class="col-xs-12 col-sm-8">
                        <br>
                           <ul class="list-group">
                              <li class="list-group-item"><?= $this->vars['persoRef']->getPseudo() ?></li>
                              <li class="list-group-item"><span class="glyphicon glyphicon-play"></span> Nom : <?= $this->vars['persoRef']->getNom() ?></li>

                              <!-- prenom -->
                              <li class="list-group-item"><span class="glyphicon glyphicon-play"></span> Prénom : <?= $this->vars['persoRef']->getPrenom() ?> </li>

                              <!-- sexe -->
                              <li class="list-group-item">
                                <span class="glyphicon glyphicon-play"></span> 
                                Sexe : <?php if ($this->vars['persoRef']->getSexe() == "m") {
                                  echo "Homme";
                                } else {
                                  echo "Femme";
                                }?> 
                              </li>
                              
                              <!-- métier -->
                              <li class="list-group-item"><span class="glyphicon glyphicon-play"></span> Profession : <?= $this->vars['persoRef']->getMetier() ?> </li>

                              <!-- competences -->
                              <li class="list-group-item"><span class="glyphicon glyphicon-play"></span> Compétences : <?= $this->vars['persoRef']->getCompetences() ?> </li>

                              <!-- favori -->
                              <li class="list-group-item"><span class="glyphicon glyphicon-play"></span> Favori : <?= $this->vars['persoRef']->getFavori() ?> </li>

                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="bs-callout bs-callout-danger">
               <br>
                  <div class="container">
                  <h4> Présentation</h4>
                   " <i><?= $this->vars['persoRef']->getDescriptionSup() ?> " </i>
                   </div>
                <br>
               </div>
            </div>
         </div>
        <!-- resume -->

    </div>
</div>
</div>