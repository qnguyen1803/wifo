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
		session_start();
		session_destroy();
		header('location:'.WEBROOT);
		exit;
	}

	/**
	 * Fonction tabDeBord
	 *
	 */
	public function tabDeBord(){
		$this->view('tabDeBord');
	}

	public function profil(){
		$this->view('profil');
	}

	public function authorsCollection(){
		$this->view('authorsCollection');
	}

	
}// fin class
 
?>