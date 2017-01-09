<?php 
/**
* CLASS POUR GERER LE PROFIL DE L'UTILISATEUR
*/
class Profil_c extends Controller{
	
	/**
	 * Fonction qui affiche la page a propos de l'auteur du Profil
	 *
	 */
	public function index(){
		$utilisateur_m = $this->model('utilisateur_m');

		if (isset($_GET)) {
			$persoRefPseu = str_replace(' ', '', $_GET['params']);
			$persoRef = $utilisateur_m->getByPseudo($persoRefPseu);
		}
		$this->ajouterVar(array('persoRef' => $persoRef));
		$this->view('index');
	}

	/**
	* FONCTION MODIFIER LE PROFIL (AVATAR && INFOS)
	* 
	*/

	public function modifier(){
		$utilisateur_m = $this->model('utilisateur_m');

		// récuperer le param d'user du URL pour l'affichage des données du profil
		if (isset($_GET)) {
			$persoRefPseu = str_replace(' ', '', $_GET['params']);
			$persoRef = $utilisateur_m->getByPseudo($persoRefPseu);
		}
		
		// PROGRAMME POUR CHANGER AVATAR ET INFOS

		$errorAvatar = "";
		$succesAvatar = "";

		// changement d'avatar
		if (isset($_POST['btn_avatar'])) {
			if (!empty($_FILES['avatar'])) {

				// verifier l'erreur lors du transfert
				if ($_FILES['avatar']['error'] > 0) $errorAvatar = 'Erreur lors du transfert';

				// verifier le poids le l'image
				if ($_FILES['avatar']['size'] > 1048576) $errorAvatar = 'Le fichier est trop lourd';

				//verifier l'extension de l'image
				$extensions_valides = ['jpg', 'png', 'gif', 'jpeg', 'svg'];
				$extension_file = strtolower(  substr(  strrchr($_FILES['avatar']['name'], '.')  ,1));
				if (!in_array($extension_file, $extensions_valides)) $errorAvatar = "l'extension n'est pas supporté" ;

				if ( $errorAvatar == "") {
					// changer l'emplacement de destination
					$destination = 'webroot/user_repository/avatar/'.$_SESSION['perso']->getId().'.'.$extension_file;
						$result = move_uploaded_file($_FILES['avatar']['tmp_name'],$destination);

					if ($result) {
						$succesAvatar = "Votre changement est bien pris en compte";
						$utilisateur_m->update('avatar',$destination, $persoRef );	
						$_SESSION['perso'] = $utilisateur_m->get($_SESSION['perso']->getId());
						$persoRef = $utilisateur_m->get($_SESSION['perso']->getId());

						header( "refresh:2;url=".WEBROOT.'profil/index/'.$_SESSION['perso']->getPseudo()."" );		
					}
				}
			} else {
				$errorAvatar = "Vous avez pas encore choisi votre photo";
			}
		}// fin POST['btn_avatar']

		$errorInfos = "";
		$succesInfos = "";	
		// changement des infos profil
		if (isset($_POST['btn_changed_profil'])) {
				
				if (!empty($_POST['nom'])) {
					$nom = htmlspecialchars($_POST['nom']);
					$utilisateur_m->update('nom', $nom, $_SESSION['perso']);
					$_SESSION['perso'] = $utilisateur_m->get($_SESSION['perso']->getId());
					$persoRef = $utilisateur_m->get($_SESSION['perso']->getId());
				}

				if (!empty($_POST['prenom'])) {
					$prenom = htmlspecialchars($_POST['prenom']);
					$utilisateur_m->update('prenom', $prenom, $persoRef);
					$_SESSION['perso'] = $utilisateur_m->get($_SESSION['perso']->getId());
					$persoRef = $utilisateur_m->get($_SESSION['perso']->getId());
				} 

				if (!empty($_POST['pseudo'])) {
					$pseudoExist = $utilisateur_m->existsPseudo($_POST['pseudo']);

					if ($pseudoExist) {
						$errorInfos = "Ce pseudo exite déjà";
					} else {
						$pseudo = htmlspecialchars($_POST['pseudo']);
						$utilisateur_m->update('pseudo', $pseudo, $persoRef);
						$_SESSION['perso'] = $utilisateur_m->get($_SESSION['perso']->getId());
						$persoRef = $utilisateur_m->get($_SESSION['perso']->getId());
						header('Location:'.WEBROOT.'profil/modifier/'.$_SESSION['perso']->getPseudo());
					}
					
				} 

				if (isset($_POST['sexe'])) {
					$sexe = htmlspecialchars($_POST['sexe']);
					$utilisateur_m->update('sexe', $sexe, $persoRef);
					$_SESSION['perso'] = $utilisateur_m->get($_SESSION['perso']->getId());
					$persoRef = $utilisateur_m->get($_SESSION['perso']->getId());
				}

				if (!empty($_POST['telephone'])) {
					$telephone = htmlspecialchars($_POST['telephone']);
					$utilisateur_m->update('telephone', $telephone, $persoRef);
					$_SESSION['perso'] = $utilisateur_m->get($_SESSION['perso']->getId());
					$persoRef = $utilisateur_m->get($_SESSION['perso']->getId());
				}

				if (!empty($_POST['metier'])) {
					$metier = htmlspecialchars($_POST['metier']);
					$utilisateur_m->update('metier', $metier, $persoRef);
					$_SESSION['perso'] = $utilisateur_m->get($_SESSION['perso']->getId());
					$persoRef = $utilisateur_m->get($_SESSION['perso']->getId());
				}

				if (!empty($_POST['competences'])) {
					$competences = htmlspecialchars($_POST['competences']);
					$utilisateur_m->update('competences', $competences, $persoRef);
					$_SESSION['perso'] = $utilisateur_m->get($_SESSION['perso']->getId());
					$persoRef = $utilisateur_m->get($_SESSION['perso']->getId());
				}

				if (!empty($_POST['favori'])) {
					$favori = htmlspecialchars($_POST['favori']);
					$utilisateur_m->update('favori', $favori, $persoRef);
					$_SESSION['perso'] = $utilisateur_m->get($_SESSION['perso']->getId());
					$persoRef = $utilisateur_m->get($_SESSION['perso']->getId());
				}

				if (!empty($_POST['description_sup'])) {
					$description_sup = htmlspecialchars($_POST['description_sup']);
					$utilisateur_m->update('descriptionSup', $description_sup, $persoRef);
					$_SESSION['perso'] = $utilisateur_m->get($_SESSION['perso']->getId());
					$persoRef = $utilisateur_m->get($_SESSION['perso']->getId());
						
				}

				if ($errorInfos == "") {
					$succesInfos = "Vos enregistrements sont bien enregistrés";

				}
				
			}// fin if $_POST['btn_changed_profil']
		$this->ajouterVar(array('persoRef' => $persoRef));
		$this->ajouterVar(array('errorAvatar' => $errorAvatar));
		$this->ajouterVar(array('succesAvatar' => $succesAvatar));
		$this->ajouterVar(array('succesInfos' => $succesInfos));
		$this->ajouterVar(array('errorInfos' => $errorInfos));

		$this->view('modifier');
	}




	// LES FONCTIONS DANS LA PAGE PARAMETRES DE PROFIL

	/**
	* La fonction générale de la page Parametres du profil
	*
	*/
	public function parametre(){
		$utilisateur_m = $this->model('utilisateur_m');
		if (isset($_GET)) {
			$persoRefPseu = str_replace(' ', '', $_GET['params']);
			$persoRef = $utilisateur_m->getByPseudo($persoRefPseu);
		}
		$this->ajouterVar(array('persoRef' => $persoRef));

		// CHANGER EMAIL & MDP

		$errorEmail = "";
		$succesEmail = "";
		// changer email
		if (isset($_POST['btn_email'])) {
			if (!empty($_POST['old_email']) && !empty($_POST['new_email']) ) {
				$old_email = htmlspecialchars($_POST['old_email']);
				$new_email = htmlspecialchars($_POST['new_email']);

				if ($old_email == $_SESSION['perso']->getEmail()) {
					if ($utilisateur_m->existsEmail($new_email)) {
						$errorEmail = "Cet email existe déjà";
					} else {
						$utilisateur_m->update('email', $new_email, $persoRef );
						$_SESSION['perso'] = $utilisateur_m->get($_SESSION['perso']->getId());
						$persoRef = $utilisateur_m->get($_SESSION['perso']->getId());
						$succesEmail = "Votre nouveau email est bien enregistré";
					}

				} else {
					$errorEmail = "Votre email actuel n'est pas correct";
				}
			} else {
				$errorEmail = "Veillez remplir tous les champs";
			}
		}
		$this->ajouterVar(array('errorEmail' => $errorEmail));
		$this->ajouterVar(array('succesEmail' => $succesEmail));

		$errorMdp = "";
		$succesMdp = "";
		// changer mdp
		if (isset($_POST['btn_mdp'])) {
			if (!empty($_POST['old_mdp']) && !empty($_POST['new_mdp']) && !empty($_POST['new_mdp2']) ) {
				if ($_POST['new_mdp'] == $_POST['new_mdp2']) {
						$old_mdp = sha1($_POST['old_mdp']);
						$new_mdp = sha1($_POST['new_mdp2']);

					if ($old_mdp == $_SESSION['perso']->getMdp()) {
						$this->model('utilisateur_m')->update('mdp', $new_mdp, $persoRef);
						$_SESSION['perso'] = $utilisateur_m->get($_SESSION['perso']->getId());
						$persoRef = $utilisateur_m->get($_SESSION['perso']->getId());
							$succesMdp = "Votre nouveau mdp est bien enregistré";
					}
				} else {
					$errorMdp = "Votre confirmation de mdp n'est pas correct";
				}

			} else {
				$errorMdp = "Veillez remplir tous les champs";
			}
		}
		$this->ajouterVar(array('errorMdp' => $errorMdp));
		$this->ajouterVar(array('succesMdp' => $succesMdp));
		
		$this->view('parametre');
	}


		
	

	/**
	* Fonction pour supprimer mon compte
	*/
	public function deleteAccount(){
		session_start();
		$this->model('utilisateur_m')->delete($_SESSION['perso']);
		header('Location: '.WEBROOT.'accueil/index');
	}
	
}
 ?>