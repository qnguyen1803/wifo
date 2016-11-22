	<?php 
/**
* 
*/
class Utilisateur_c extends Controller{
	

	public function connexion(){
		session_start();
		$_SESSION['connexion_erreur'] = "";
		//acces unique a la personne non connecté
		
		// si l'utilsateur clique sur le bouton se connecter
		if (isset($_POST['btn_connexion'])) {
			// si les deux champs sont rempli
			if (!empty($_POST['email']) && !empty($_POST['mdp'])) {
				$email = htmlspecialchars($_POST['email']);
				$mdp = sha1($_POST['mdp']);
				// le controller appelle la fonction connexion dans le model 

				//verifier si la personne existe dans la bdd

				$perso = $this->model('utilisateur_m')->connexion($email, $mdp);
				
				// si la personne n'existe pas
				 if (!$perso) {
				 	$_SESSION['connexion_erreur'] = "email ou mdp n'est pas correct ";
				 } else {
					$_SESSION['perso'] = new Utilisateur($perso); 
					// echo "<meta http-equiv=refresh content=1;url=".WEBROOT."utilisateur/tabDeBord".">";
					header('Location: '.WEBROOT."utilisateur/tabDeBord");
					
				}
			}
		} 

		$this->view('connexion');		
	}// fin connexion()

	public function deconnexion(){
		session_start();
		session_destroy();
		header('location:'.WEBROOT);
		exit;
	}

	public function tabDeBord(){
		$this->view('tabDeBord');
	}

	public function profil(){
		$this->view('profil');
	}

	public function inscription(){
		session_start();
		// acces unique a la personne non connectée
		
		if (isset($_POST['btn_inscription'])) {
			// si les 4 premiers champs sont remplis
			if (!empty($_POST['pseudo_inscription']) &&!empty($_POST['email_inscription']) &&
				!empty($_POST['mdp_inscription']) && !empty($_POST['mdp2_inscription'])){

				// vérifier si le mdp et le mdp sont ressemble
					if ($_POST['mdp_inscription'] == $_POST['mdp2_inscription']) {
						$utilisateur_m = $this->model('utilisateur_m');
						//vérifier si cette personnage qui existe deja dans la bdd
						$email = htmlspecialchars($_POST['email_inscription']);
						$mdp = sha1($_POST['mdp_inscription']);

						$exist = $utilisateur_m->exists($email);
						if ($exist) {
							echo "Cet email est déjà inscrit";
						} else {
							// s'il n'existe pas encore, l'ajouter dans la bdd
							$pseudo = htmlspecialchars($_POST['pseudo_inscription']);
							
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

							$utilisateur_m->add($perso);
							$_SESSION['perso'] = $perso;
		
							echo "<meta http-equiv=refresh content=1;url=".WEBROOT."utilisateur/tabDeBord".">";
						}

					} else {
						echo "mdp non correct";
					}
			}
	
		}

		if (isset($_SESSION['id'])) {
			echo "Attention: Vous etes déjà connectés";
		} else {
			$this->view('inscription');
		}	
	}// fin inscription()
}// fin class
 
?>