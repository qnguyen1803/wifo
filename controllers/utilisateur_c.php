	<?php 

class Utilisateur_c extends Controller{

	/**
	 * Fonction d'inscription
	 * 
	 */
	public function inscription(){

		$message_error = "";

		if (isset($_POST['btn_inscription'])) {
			// si les 4 premiers champs sont remplis
			if (!empty($_POST['pseudo_inscription']) &&!empty($_POST['email_inscription']) &&
				!empty($_POST['mdp_inscription']) && !empty($_POST['mdp2_inscription'])){

				// vérifier si le mdp et le mdp sont ressemble
				if ($_POST['mdp_inscription'] == $_POST['mdp2_inscription']) {
						
					//vérifier si cette personnage qui existe deja dans la bdd
					$email = htmlspecialchars($_POST['email_inscription']);
					$pseudo = htmlspecialchars($_POST['pseudo_inscription']);
					$mdp = sha1($_POST['mdp_inscription']);

					$existsEmail = $this->model->existsEmail($email);
					$existsPseudo = $this->model->existsPseudo($pseudo);

					if ($existsEmail || $existsPseudo) {
						$message_error = "Ce personnage est déjà inscrit, veuillez modifier votre email ou votre pseudo";
					} else {
						// s'il n'existe pas encore, l'ajouter dans la bdd
						$pseudo = str_replace(' ', '-', htmlspecialchars($_POST['pseudo_inscription']) );
						$nom = htmlspecialchars($_POST['nom_inscription']);
						$prenom = htmlspecialchars($_POST['prenom_inscription']);
						$telephone = (int)$_POST['telephone'];
						$metier = htmlspecialchars($_POST['metier']);
						$competences = htmlspecialchars($_POST['competences']);
						$descriptionSup = htmlspecialchars($_POST['description_sup']);
						$sexe = $_POST['sexe'];
						$favori = htmlspecialchars($_POST['favori']);
						$dateCreation = date('Y-m-d');
						$derniereConnexion = date('Y-m-d');
						$avatar = 'webroot/user_repository/avatar/avatar-default.png';

						$perso = new Utilisateur(['pseudo'=>$pseudo, 'nom'=>$nom, 'prenom'=>$prenom, 'email'=>$email,'mdp' =>$mdp, 'sexe'=>$sexe, 'favori'=>$favori, 'telephone'=>$telephone, 'metier'=>$metier , 'competences'=>$competences, 'descriptionSup'=>$descriptionSup, 'derniereConnexion'=>$derniereConnexion, 'dateCreation'=>$dateCreation, 'avatar' => $avatar]);
						$this->model->add($perso);

						//commencer la session de l'utilisateur
						$_SESSION['perso'] = $perso;
		
						echo "<meta http-equiv=refresh content=1;url=".WEBROOT."utilisateur/tabDeBord".">";
					}
				} else {
					$message_error = "Les deux mdp ne se ressemblent pas";
				}
			} else {
				$message_error = "Veuillez remplir tous les champs * ";
			}
		} // isset btn_inscription

		$this->ajouterVar(array('message_error' => $message_error));

		if (isset($_SESSION['perso'])) {
			echo "Attention: Vous êtes déjà connectés";
		} else {
			$this->view('inscription');
		}	
	}// fin inscription()


	/**
	 * Fonction connexion
	 *
	 */

	public function connexion(){
		$connexion_error = "";
		
		// si l'utilsateur clique sur le bouton se connecter
		if (isset($_POST['btn_connexion'])) {
			// si les deux champs sont rempli
			if (!empty($_POST['email']) && !empty($_POST['mdp'])) {
				$email = htmlspecialchars($_POST['email']);
				$mdp = sha1($_POST['mdp']);
				$derniereConnexion = date('Y-m-d');
				echo ($derniereConnexion);
				// verifier si la personne existe dans la bdd

				$perso = $this->model->connexion($email, $mdp);
				
				// si la personne n'existe pas
				 if (!$perso) {
				 	$connexion_error = "email ou mdp n'est pas correct ";
				 } else {
				  	$this->model->update('derniereConnexion', $derniereConnexion, $perso);
				  	$perso = $this->model->connexion($email, $mdp);
				 	
					$_SESSION['perso'] = $perso; 
					header('Location: '.WEBROOT."utilisateur/tabDeBord"); 	
				}
			} else {
				$connexion_error = "Veuillez remplir tous les champs * ";
			}
		} // fin btn_connexion

		$this->ajouterVar(array('connexion_error' => $connexion_error));

		if (isset($_SESSION['perso'])) {
			header('Location: '.WEBROOT."utilisateur/tabDeBord");
		} else {
			$this->view('connexion');
		}		
	}// fin connexion()

	/**
	 * Fonction deconnexion
	 *
	 */
	public function deconnexion(){
		session_destroy();
		header('location:'.WEBROOT);
		exit;
	}

	/**
	 * Fonction tabDeBord pour voir historiques des actions 
	 * de l'utilisateur
	 * Les listes de demandes postulées et à répondre
	 *
	 */
	public function tabDeBord(){
		$demande_m = $this->model('demande_m');
		$projet_m = $this->model('projet_m');
		$image_m = $this->model('image_m');
		$categorie_m = $this->model('categorie_m');

	//--- LISTE DES IMAGES PUBLIEES ---
		//liste des Images
		$tabImagesOfPerson = $image_m->getListImagesOfPerson($_SESSION['perso']->getId());
		// liste des Categories
		$tabCategories = array();
		foreach ($tabImagesOfPerson as $key => $value) {
			$categorie = $categorie_m->get($value->getIdCategorie());
			array_push($tabCategories, $categorie->getNom());	
		}

		// liste des Path de l'image
		$tabPaths = array();
		foreach ($tabImagesOfPerson as $key => $value) {
			$path = explode(',', $value->getRepository());
			array_push($tabPaths, $path[0]);
		}

		// modifier ou supprimer une image
		if (isset($_POST['btnSupprimerImage'])) {
			$image_m->delete((int)$_POST['btnSupprimerImage']);
		} 
		

	//--- LISTE DES PROJETS PUBLIES ---
		//liste des Projets
		$listProjectOfThisPerson = $projet_m->getListProjectsOfUser($_SESSION['perso']->getId());
		$tabImagesIllustration = array();
		foreach ($listProjectOfThisPerson as $key => $value) {
			$image = $value->getImageIllustration();
			array_push($tabImagesIllustration, $image);
		}

		// modifier ou supprimer un projet
		if (isset($_POST['btnSupprimerProjet'])) {
			// supprimer le projet qui concerne
			$projet_m->delete((int)$_POST['btnSupprimerProjet']);
			// supprimer la liste de toutes les demandes concernées
			$demande_m->deleteListDemandesOfProjet((int)$_POST['btnSupprimerProjet']);
		} 

	//--- LISTE DES DEMANDES ENVOYES ---
		//liste des demandes
		$tabDemandesEnvoyees = $demande_m->getListDemandesEnvoyees($_SESSION['perso']->getId());
		// liste des noms de projet
		$tabProjets = array();
		foreach ($tabDemandesEnvoyees as $key => $value) {
			$project = $projet_m->get($value->getIdProjet());
			array_push($tabProjets, $project);
		}


	//LISTE DES DEMANDES A REPONDRE 
		$tabDemandesARepondre = array();
		foreach ($listProjectOfThisPerson as $key => $value) {
			$demandesARepondrePourUnProjet = $demande_m->getListDemandesRepondre($value->getId());
			$tabDemandesARepondre = array_merge($tabDemandesARepondre, $demandesARepondrePourUnProjet);
		}
		
		// afficher la liste Candidat
		$tabUsersCandidate = array();
		foreach ($tabDemandesARepondre as $key => $value) {
			$user = $this->model->get($value->getIdUtilisateur());
			array_push($tabUsersCandidate,$user);
		}

		//afficher la liste Des Projets
		$tabProjects = array();
		foreach ($tabDemandesARepondre as $key => $value) {
			$project = $projet_m->get($value->getIdProjet());
			array_push($tabProjects, $project);
		}

		// les boutons pour répondre à une demande
		// dans la liste des demandes à répondre
		if (isset($_POST['btnAccept']) || isset($_POST['btnRefuse'])) {

			if (isset($_POST['btnAccept'])) {
				$idDemande = (int) $_POST['btnAccept'];
				$demande = $demande_m->get($idDemande);
				$demande_m->update('reponse', 1 , $demande);
				//ajouter cette personne au projet

				$idCandidat = $demande->getIdUtilisateur();
				$projetUpdateMembres = $projet_m->get($demande->getIdProjet());
				$oldersMembers = $projetUpdateMembres->getMembres(); 
				$newMembers = $oldersMembers.",".strval($idCandidat);
				$projet_m->update('membres', $newMembers, $demande->getIdProjet());

			} else if (isset($_POST['btnRefuse'])) {
				$idDemande = (int) $_POST['btnRefuse'];
				$demande = $demande_m->get($idDemande);
				$demande_m->update('reponse', 0 , $demande);
			}
		}

		// for images
		$this->ajouterVar(array('tabImagesOfPerson' => $tabImagesOfPerson));
		$this->ajouterVar(array('tabPaths' => $tabPaths));
		$this->ajouterVar(array('tabCategories' => $tabCategories));
		//for project
		$this->ajouterVar(array('listProjectOfThisPerson' => $listProjectOfThisPerson));
		$this->ajouterVar(array('tabImagesIllustration' => $tabImagesIllustration));
		//for demandes envoyées
		$this->ajouterVar(array('tabDemandesEnvoyees' => $tabDemandesEnvoyees));
		$this->ajouterVar(array('tabProjets' => $tabProjets));
		$this->ajouterVar(array('tabProjects' => $tabProjects));
		
		//for demande à répondre
		$this->ajouterVar(array('tabDemandesARepondre' => $tabDemandesARepondre));
		$this->ajouterVar(array('tabUsersCandidate' => $tabUsersCandidate));
		$this->view('tabDeBord');
	}

	/**
	 * Fonction authorsCollection pour afficher la page
	 * authorsCollection
	 *
	 */
	public function authorsCollection(){
		$tabUsers = $this->model->getList();
		$this->ajouterVar(array('tabUsers' => $tabUsers));
		$this->view('authorsCollection');
	}

}// fin class
 
?>