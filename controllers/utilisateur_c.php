<?php 
/**
* 
*/
class Utilisateur_c extends Controller{
	

	public function connexion(){
		//acces unique a la personne non connecté
		if (isset($_SESSION['pseudo'])) {
			echo "Attention: Vous etes deja connectés";
		}

		// si l'utilisateur clique sur le bouton se connecter
		if (isset($_POST['btn_connexion'])) {
			$email = htmlspecialchars($_POST['email']);
			$mdp = htmlspecialchars($_POST['mdp']);

			// si les deux champs sont rempli
			if (!empty($email) && !empty($mdp)) {
				// $mdp = sha1($mdp);
				// le controller appelle la fonction connexion dans le model 
				$perso_connect = $this->model('utilisateur_m')->connexion($email, $mdp);
				// si la personne n'existe pas
				if (!$perso_connect) {
					echo "email ou mdp incorrect";
				} else {
					session_start();
					$_SESSION['perso'] = $perso_connect; 
					var_dump($_SESSION['perso']);
					echo "<meta http-equiv=refresh content=1;url=".WEBROOT."utilisateur/tabDeBord".">";
					
				}
			}
		}

		$this->view('connexion');
	}// fin connexion()

	public function tabDeBord(){
		$this->view('tabDeBord');
	}

	public function profil(){
		$this->view('profil');
	}

	public function inscription(){
		// acces unique a la personne non connectée
		if (isset($_SESSION['id'])) {
			echo "Attention: Vous etes déjà connectés";
		}
		$this->view('inscription');
	}// fin inscription()
}// fin class
 ?>