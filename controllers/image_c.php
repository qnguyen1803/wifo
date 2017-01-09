<?php 
class Image_c extends Controller{

	/**
	 * Fonction pour afficher la page collectionImage
	 * 
	 */
	public function imageCollection(){
		// liste de toutes les images
		$tabImages = $this->model->getAll();
		$tabPaths = array();
		foreach ($tabImages as $key => $value){
			$path = explode(',', $value->getRepository());
			array_push($tabPaths, $path[0]);
		}

		// liste de tous les catégories
		$categorie_m = $this->model('categorie_m');
		$tabCategories = $categorie_m->getAll();

		$this->ajouterVar(array('tabCategories' => $tabCategories));
		$this->ajouterVar(array('tabImages' => $tabImages));
		$this->ajouterVar(array('tabPaths'=> $tabPaths));
		$this->view('imageCollection');
	}

	/**
	 * Fonction pour renvoyer la liste des images selon des
	 * critères sélectionnés en évitant la répétition
	 * de la page complète imageCollection
	 * 
	 */
	public function imageCollectionAjax(){

		$tabPaths = array();
		if (!empty($_POST)) {
			if ($_POST['categorie'] == 'all') {
				$tabImages = $this->model->getAll();
			} elseif ($_POST['categorie'] == 'Arts') {
				$tabImages = $this->model->getListCate(1);
			} elseif ($_POST['categorie'] == 'Animaux - Vie Sauvage') {
				$tabImages = $this->model->getListCate(2);
			} elseif ($_POST['categorie'] == 'Abstrait') {
				$tabImages = $this->model->getListCate(3);
			} elseif ($_POST['categorie'] == 'Fond-Textures') {
				$tabImages = $this->model->getListCate(4);
			} elseif ($_POST['categorie'] == 'Beauté - Mode') {
				$tabImages = $this->model->getListCate(5);
			} elseif ($_POST['categorie'] == 'Bâtiments - Monuments') {
				$tabImages = $this->model->getListCate(6);
			} elseif ($_POST['categorie'] == 'Affaires - Finances') {
				$tabImages = $this->model->getListCate(7);
			} elseif ($_POST['categorie'] == 'Célébrités') {
				$tabImages = $this->model->getListCate(8);
			} elseif ($_POST['categorie'] == 'Éditorial') {
				$tabImages = $this->model->getListCate(9);
			} elseif ($_POST['categorie'] == 'Éducation') {
				$tabImages = $this->model->getListCate(10);
			} elseif ($_POST['categorie'] == 'Nourriture - Boisson') {
				$tabImages = $this->model->getListCate(11);
			} elseif ($_POST['categorie'] == 'Santé - Médical') {
				$tabImages = $this->model->getListCate(12);
			} elseif ($_POST['categorie'] == 'Vacances') {
				$tabImages = $this->model->getListCate(13);
			} elseif ($_POST['categorie'] == 'Illustrations - Clip-Art') {
				$tabImages = $this->model->getListCate(14);
			} elseif ($_POST['categorie'] == 'Industriel') {
				$tabImages = $this->model->getListCate(15);
			} elseif ($_POST['categorie'] == 'Interieurs') {
				$tabImages = $this->model->getListCate(16);
			} elseif ($_POST['categorie'] == 'Divers') {
				$tabImages = $this->model->getListCate(17);
			} elseif ($_POST['categorie'] == 'Modèle') {
				$tabImages = $this->model->getListCate(18);
			} elseif ($_POST['categorie'] == 'Nature') {
				$tabImages = $this->model->getListCate(19);
			} elseif ($_POST['categorie'] == 'Objets') {
				$tabImages = $this->model->getListCate(20);
			} elseif ($_POST['categorie'] == 'Parcs - Plein air') {
				$tabImages = $this->model->getListCate(21);
			} elseif ($_POST['categorie'] == 'Etre-humain') {
				$tabImages = $this->model->getListCate(22);
			} elseif ($_POST['categorie'] == 'Religion') {
				$tabImages = $this->model->getListCate(23);
			} elseif ($_POST['categorie'] == 'Sciences') {
				$tabImages = $this->model->getListCate(24);
			}
		}


		foreach ($tabImages as $key => $value){
			$path = explode(',', $value->getRepository());
			array_push($tabPaths, $path[0]);
		}

		foreach ($tabImages as $key => $value) {
			echo("<li><a href='".WEBROOT.'image/imageDetail/'.$value->getId()."'><img style='height: 150px; width: 200px' src='".WEBROOT.$tabPaths[$key]."' alt='imageElement' class='img-responsive'><div class='tab_desc' style='text-align: center;'><strong>".$value->getTitre()."</strong><p> Extensions: </p><h4>Nombre download: </h4></div></a></li>");
		}
	}

	/**
	 * Fonction pour afficher l'information d'une image en 
	 * détail
	 *
	 */
	public function imageDetail(){

		// AFFICHER IMAGE DETAIL
		$utilisateur_m = $this->model('utilisateur_m');
		$categorie_m = $this->model('categorie_m');

		// récupérer Id de l'image du URL 
		// retrouver l'image dans la table image
		// retrouver l'auteur de cette image dans la table utilsateur
		if (isset($_GET)) {
			$imageDetail = $this->model->get($_GET['params']);
			$tabExtensions = explode(',', $imageDetail->getRepository());
			$imageAuthor =  $utilisateur_m->get($imageDetail->getIdUtilisateur());
			$imageCategorie = $categorie_m->get($imageDetail->getIdCategorie());

		}

		$this->ajouterVar(array('imageCategorie' => $imageCategorie));
		$this->ajouterVar(array('imageDetail' => $imageDetail));
		$this->ajouterVar(array('tabExtensions' => $tabExtensions));
		$this->ajouterVar(array('imageAuthor' => $imageAuthor));

		// LES COMMENTAIRES
		// add new comment
		$erreur_comment = "";
		$modelCommentaire = $this->model('commentaire_m');
		$tabCommentaires = 1;

		if (isset($_POST['btn_commentaire'])) {
			if (!empty($_POST['sujetCommentaire']) && !empty($_POST['contentComment'])) {
				
				$idUtilisateur = $_SESSION['perso']->getId();
				$sujetCommentaire = htmlspecialchars($_POST['sujetCommentaire']);
				$contentComment = htmlspecialchars($_POST['contentComment']);
				$vote = (int) $_POST['voteCommentaire'];
				$date = date('Y-m-d H:i:s');
				$idImage = $imageDetail->getId();

				$comment = new Commentaire(['idUtilisateur'=> $idUtilisateur ,'sujet' => $sujetCommentaire,'vote' => $vote , 'contenu' => $contentComment, 'dateDePub' => $date, 'idImage' => $idImage]);
				
				// ajouter ce commentaire dans la BDD
				$modelCommentaire->add($comment);

			} else {
				$erreur_comment = "Veuillez remplir tous les champs";
			}
		}

		// afficher les commentaires qui correspond à l'image
		$tabCommentaires = $modelCommentaire->getList($_GET['params'], 'idImage');

		// afficher les auteurs de ces commentaires
		$tabAuteurComment = array();
		foreach ($tabCommentaires as $key => $value) {
			$commentAuthor =  $utilisateur_m->get($value->getIdUtilisateur());
			array_push($tabAuteurComment, $commentAuthor);
		}
		

		// calculer la note moyenne de l'image et l'updater dans la bdd
		$totalVoteImage = 0;
		for ($i=0; $i < count($tabCommentaires); $i++) { 
			$totalVoteImage += (int)($tabCommentaires[$i]->getVote() );
		}
		if ($tabCommentaires) {
			$noteImage = round ($totalVoteImage/ count($tabCommentaires));
		} else {
			$noteImage = 0;
		}
		
		$this->model->update('note', $noteImage, $_GET['params']);


		// affichage de la note moyenne de l'image
		$tabStar = array(0 => "glyphicon-star-empty", 1 => "glyphicon-star-empty", 2 => "glyphicon-star-empty", 3=> "glyphicon-star-empty", 4=> "glyphicon-star-empty");
		for ($i=0; $i < $noteImage; $i++) { 
			$tabStar[$i] = "glyphicon-star";
		}

		$this->ajouterVar(array('tabAuteurComment' => $tabAuteurComment));
		$this->ajouterVar(array('tabStar' => $tabStar));
		$this->ajouterVar(array('noteImage' => $noteImage));
		$this->ajouterVar(array('tabCommentaires' => $tabCommentaires));
		$this->ajouterVar(array('erreur_comment' => $erreur_comment));

		
		// END code for comment
		$this->view('imageDetail');
	}

	/**
	 * Fonction pour télécharger les images selon les extensions
	 *
	 */
	public function download(){
		$imageDetail = $this->model->get($_GET['params']);
		$tabExtensions = explode(',', $imageDetail->getRepository());

		if (isset($_POST['btn_download'])) {
			if (!empty($_POST['extension'])) {
				for ($i=0; $i < count($tabExtensions); $i++) {	

					$exten = strtolower(  substr(  strrchr( $tabExtensions[$i], '.')  ,1));

					if ($exten == $_POST['extension']) {
						$file = $tabExtensions[$i];
						if (file_exists($file)) {
							header('Content-Description: File Transfer');
						    header('Content-Type: application/octet-stream');
						    header('Content-Disposition: attachment; filename="'.basename($file).'"');
						    header('Expires: 0');
						    header('Cache-Control: must-revalidate');
						    header('Pragma: public');
						    header('Content-Length: ' . filesize($file));
						    readfile($file);
						    exit;
						}
					}
				}
				
			} else {
				echo "Veuillez chosir l'extension que vous voulez télécharger";
			}
		}
	}
	
}
 ?>