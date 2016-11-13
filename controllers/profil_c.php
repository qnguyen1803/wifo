<?php 
/**
* 
*/
class Profil_c extends Controller{
	public function index(){
		$this->view('index');
	}



	// LES FONCTIONS DANS LA PAGE MODIFIER DU PROFIL

	/**
	*
	*/

	public function modifier(){
		session_start();
		$this->view('modifier');
		$this->profilChange();
	}

	/**
	* @fontion changer photo profil
	* @fonction changer les infos du profil
	*/
	public function profilChange(){
		if (!isset($_SESSION['perso'])) {
			echo "vous etes pas encore connectés";
		} else {

			$utilisateur_m = $this->model('utilisateur_m');
			if (isset($_POST['btn_avatar'])) {
				if (!empty($_FILES['avatar'])) {

					$error = 'non erreur';

					// verifier l'erreur lors du transfert
					if ($_FILES['avatar']['error'] > 0) $error = 'Erreur lors du transfert';

					// verifier le poids le l'image
					if ($_FILES['avatar']['size'] > 1048576) $error = 'le fichier est trop lourd';

					//verifier l'extension de l'image
					$extensions_valides = ['jpg', 'png', 'gif', 'jpeg'];
					$extension_file = strtolower(  substr(  strrchr($_FILES['avatar']['name'], '.')  ,1));
					if (!in_array($extension_file, $extensions_valides)) $error = "l'extension n'est pas supporté" ;
					echo $error.'</br>';


					if ( $error == 'non erreur') {
						// changer l'emplacement de destination
						$destination = 'webroot/user_repository/avatar/'.$_SESSION['perso']->getId().'.'.$extension_file;
						$result = move_uploaded_file($_FILES['avatar']['tmp_name'],$destination);

						if ($result) {
							echo "Votre changement est bien pris en compte";
							$utilisateur_m->update('avatar',$destination, $_SESSION['perso']);		

						}
					}


					// updater la bdd


				} else {
					echo "Vous avez pas encore choisi votre photo";
				}

				
				

				// // verifier les dimensions de l'image
				// $image_size = getimagesize($_FILE['avatar']['tmp_name']);
				// var_dump($image_size);
				// if ($image_size[0] > 1000 OR $image_size[1]> 1000) echo "la taille de l'image est trop grande" ;

				
			// }

			if (isset($_POST['btn_changed_profil'])) {
				if (!empty($_POST['nom'])) {
					$nom = htmlspecialchars($_POST['nom']);
					$utilisateur_m->update('nom', $nom, $_SESSION['perso']);
				}

				if (!empty($_POST['prenom'])) {
					$prenom = htmlspecialchars($_POST['prenom']);
					$utilisateur_m->update('prenom', $prenom, $_SESSION['perso']);
				}

				if (isset($_POST['sexe'])) {
					$sexe = htmlspecialchars($_POST['sexe']);
					$utilisateur_m->update('sexe', $sexe, $_SESSION['perso']);
				}

				if (!empty($_POST['telephone'])) {
					$telephone = htmlspecialchars($_POST['telephone']);
					$utilisateur_m->update('telephone', $telephone, $_SESSION['perso']);
				}

				if (!empty($_POST['metier'])) {
					$metier = htmlspecialchars($_POST['metier']);
					$utilisateur_m->update('metier', $metier, $_SESSION['perso']);
				}

				if (!empty($_POST['competences'])) {
					$competences = htmlspecialchars($_POST['competences']);
					$utilisateur_m->update('competences', $competences, $_SESSION['perso']);
				}

				if (!empty($_POST['favori'])) {
					$favori = htmlspecialchars($_POST['favori']);
					$utilisateur_m->update('favori', $telephone, $_SESSION['perso']);
				}

				if (!empty($_POST['description_sup'])) {
					$description_sup = htmlspecialchars($_POST['description_sup']);
					$utilisateur_m->update('descriptionSup', $description_sup, $_SESSION['perso']);
				}

				echo "Votre changement est bien enregistré";

				}
			}
		}// fin else
	}// fin function profilChagne


	


	// LES FONCTIONS DANS LA PAGE PARAMETRES DE PROFIL

	/**
	* La fonction générale de la page Parametres du profil
	*/
	public function parametre(){
		session_start();
		$this->view('parametre');
		$this->paramsChange();
	}

	/**
	* Fonction pour changer les parametres email, mdp
	* de l'utilisateur 
	*/

	public function paramsChange(){
		if (!isset($_SESSION['perso'])) {
			echo "vous êtes pas encore connecté";
		} else {

			// changer email
			if (isset($_POST['btn_email'])) {
				if (!empty($_POST['old_email']) && !empty($_POST['new_email']) ) {
					$old_email = htmlspecialchars($_POST['old_email']);
					$new_email = htmlspecialchars($_POST['new_email']);

					if ($old_email == $_SESSION['perso']->getEmail()) {
						$this->model('utilisateur_m')->update('email', $new_email, $_SESSION['perso'] );
						echo "Votre nouveau email est bien enregistré";

					} else {
						echo "Votre email actuel n'est pas correct";
					}
				} else {
					echo "Veillez remplir tous les champs";
				}
			}

			// changer mdp
			if (isset($_POST['btn_mdp'])) {
				if (!empty($_POST['old_mdp']) && !empty($_POST['new_mdp']) && !empty($_POST['new_mdp2']) ) {
					if ($_POST['new_mdp'] == $_POST['new_mdp2']) {
						$old_mdp = sha1($_POST['old_mdp']);
						$new_mdp = sha1($_POST['new_mdp2']);

						if ($old_mdp == $_SESSION['perso']->getMdp()) {
							$this->model('utilisateur_m')->update('mdp', $new_mdp, $_SESSION['perso']);
							echo "Votre nouveau mdp est bien enregistré";
						}
					} else {
						echo "Votre confirmation de mdp n'est pas correct";
					}

				} else {
					echo "Veillez remplir tous les champs";
				}
			}

		}

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