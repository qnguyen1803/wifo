<?php 
class Projet_c extends Controller{

	/**
	 * Fonction pour afficher la page collectionProjet
	 * 
	 */
	public function projetCollection(){
		// liste de tous les projets
		$tabProjets = $this->model->getAll();

		// liste de tous les catégories
		$categorie_m = $this->model('categorie_m');
		$tabCategories = $categorie_m->getAllCatpro();

		$this->ajouterVar(array('tabCategories' => $tabCategories));
		$this->ajouterVar(array('tabProjets' => $tabProjets));
		$this->view('projetCollection');
	}

	/**
	 * Fonction pour renvoyer la liste des images selon des
	 * critères sélectionnés en évitant la répétition
	 * de la page complète imageCollection
	 * 
	 */
	public function projetCollectionAjax(){
		if (!empty($_POST)) {
			if ($_POST['categorie'] == 'all') {
				$tabProjets = $this->model->getAll();
			} elseif ($_POST['categorie'] == 'Site web') {
				$tabProjets = $this->model->getListCate(25);
			} elseif ($_POST['categorie'] == 'Application web') {
				$tabProjets = $this->model->getListCate(26);
			} elseif ($_POST['categorie'] == 'Application Mobile') {
				$tabProjets = $this->model->getListCate(27);
			} elseif ($_POST['categorie'] == 'Print') {
				$tabProjets = $this->model->getListCate(28);
			} elseif ($_POST['categorie'] == 'Bande dessinée') {
				$tabProjets = $this->model->getListCate(29);
			} elseif ($_POST['categorie'] == 'Vidéo') {
				$tabProjets = $this->model->getListCate(30);
			} elseif ($_POST['categorie'] == 'Peinture') {
				$tabProjets = $this->model->getListCate(31);
			} elseif ($_POST['categorie'] == 'Activités') {
				$tabProjets = $this->model->getListCate(32);
			} elseif ($_POST['categorie'] == 'Autres') {
				$tabProjets = $this->model->getListCate(33);
			}
		}

		foreach ($tabProjets as $key => $value) {
			echo("<li><a href='".WEBROOT.'projet/projetDetail/'.$value->getId()."'><img style='height: 150px; width: 200px' src='".WEBROOT.$value->getImageIllustration()."' alt='imageElement' class='img-responsive'><div class='tab_desc' style='text-align: center;'><strong>".$value->getTitre()."</strong><hr><p><strong> Date de publication: </strong></p><p>".$value->getDateDePub()."</p></div></a></li>");
		}
	}

	/**
	 * Fonction pour afficher l'information d'un projet en 
	 * détail
	 *
	 */
	public function projetDetail(){

		// AFFICHER PROJET DETAIL
		$utilisateur_m = $this->model('utilisateur_m');
		$categorie_m = $this->model('categorie_m');
		$tabMembres = array();
		$projetDetail = $this->model->get($_GET['params']);

		// récupérer Id du projet du URL 
		// retrouver le projet dans la table image
		// retrouver l'auteur de cette ce projet dans la table utilsateur
		if (isset($_GET)) {	
			$projectAuthor =  $utilisateur_m->get($projetDetail->getIdUtilisateur());
			$projectCate = $categorie_m->get($projetDetail->getIdCategorie());
			$tabIdMembres = explode(',', $projetDetail->getMembres());
			$tabCompteurs = explode('/', $projetDetail->getCompteur());
			foreach ($tabIdMembres as $key => $value) {
				$person = $utilisateur_m->get($value);
				array_push($tabMembres, $person);
			}
		}

		$this->ajouterVar(array('tabCompteurs' => $tabCompteurs));
		$this->ajouterVar(array('projetDetail' => $projetDetail));
		$this->ajouterVar(array('tabMembres' => $tabMembres));
		$this->ajouterVar(array('projectAuthor' => $projectAuthor));
		$this->ajouterVar(array('projectCate' => $projectCate));

		// LES COMMENTAIRES
		// add new comment
		$erreur_comment = "";
		$modelCommentaire = $this->model('commentaire_m');

		if (isset($_POST['btn_commentaire'])) {
			if (!empty($_POST['sujetCommentaire']) && !empty($_POST['contentComment'])) {
				$idUtilisateur = $_SESSION['perso']->getId();
				$sujetCommentaire = htmlspecialchars($_POST['sujetCommentaire']);
				$contentComment = htmlspecialchars($_POST['contentComment']);
				$date = date('Y-m-d H:i:s');
				$idProject = $projetDetail->getId();
				// créer un nouveau objet commentaire
				$comment = new Commentaire(array('idUtilisateur'=>$_SESSION['perso']->getId(), 'sujet'=> $sujetCommentaire, 'contenu' => $contentComment, 'dateDePub' => $date, 'idProjet' => $idProject));
				// ajouter ce commentaire dans la BDD
				$modelCommentaire->add($comment);
			} else {
				$erreur_comment = "Veuillez remplir tous les champs";
			}
		} 		

		// afficher les commentaires qui correspond à l'image
		$tabCommentaires = $modelCommentaire->getList($_GET['params'], 'idProjet');

		// afficher les auteurs de ces commentaires
		$tabAuteurComment = array();
		foreach ($tabCommentaires as $key => $value) {
		 	$commentAuthor =  $utilisateur_m->get($value->getIdUtilisateur());
			array_push($tabAuteurComment, $commentAuthor);
		}

		$this->ajouterVar(array('tabAuteurComment' => $tabAuteurComment));
		$this->ajouterVar(array('tabCommentaires' => $tabCommentaires));
		$this->ajouterVar(array('erreur_comment' => $erreur_comment));

		// POSTULER A UN PROJET
		$demande_m = $this->model('demande_m');
		$erreur_demande = "";
		$succes_demande = "";
		
		// vérifier si l'utilsateur a déjà envoyé la demande pour ce projet
		if (isset($_SESSION['perso'])) {
			$demandeExist = $demande_m->exists($_SESSION['perso']->getId(),$projetDetail->getId());	
		}
		$this->ajouterVar(array('demandeExist' => $demandeExist));
		
		if (isset($_POST['btn_demande'])) {
			if (!empty($_POST['motivations'])) {
				$message = $_POST['motivations'];
				$idProjet = $projetDetail->getId();
				$idUtilisateur = $_SESSION['perso']->getId();

				$demande = new Demande(array('message' => $message, 'idProjet' => $idProjet, 'idUtilisateur' => $idUtilisateur ));
				$demande_m->add($demande);
				$succes_demande = "Votre demande est envoyée avec succès";
			} else {
				$erreur_demande = "Veuillez remplir tous les champs * ";
			}
		}
		$this->ajouterVar(array('erreur_demande' => $erreur_demande));
		$this->ajouterVar(array('succes_demande' => $succes_demande));
		$this->view('projetDetail');

	}	

	/**
	 * FOncion pour afficher le nombre de like et dislike d'un projet 
	 * par ajax
	 *
	 */
	public function projetDetailVoteAjax(){
		// récupérer le vote actuel du projet dans la BDD
		$projetDetail = $this->model->get($_GET['params']);
		// couper la chaine compteur et le met dans un array
		$tabCompteurs = explode('/', $projetDetail->getCompteur());
		$like = $tabCompteurs[0];

		$dislike = $tabCompteurs[1];
		//echo(json_encode(array('like' => $like, 'dislike' => $dislike)));
		//($tabCompteurs);
		if (isset($_POST['vote'])) {
			if ($_POST['vote'] == 'dislike') {
				$tabCompteurs[1]+=1;
			} elseif ($_POST['vote'] == 'like') {
				$tabCompteurs[0]+=1;
			}
			// reconstruire le string à partir du array et l'ajoute dans la BDD
			$compteurResult = implode('/',$tabCompteurs);
			$this->model->update('compteur',$compteurResult,$projetDetail->getId());
		}
		echo(json_encode($tabCompteurs));
	}
}
 ?>