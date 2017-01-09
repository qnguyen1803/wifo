<?php 

class Accueil_c extends Controller{

	/**
	* Fonction pour afficher la page d'accueil du site
	*
	*/
	public function index(){
		// affichage de la liste des images récents
		$image_m = $this->model('image_m');
		$listImagesRecents = $image_m->getListRecents();

		// auteur des images
		$utilisateur_m = $this->model('utilisateur_m');
		$tabImagesAuthor = array();
		foreach ($listImagesRecents as $key => $value) {
			$auteur = $utilisateur_m->get($value->getIdUtilisateur());
			array_push($tabImagesAuthor, $auteur);
		}

		// path des images
		$tabImgPaths = array();
		foreach ($listImagesRecents as $key => $value) {
			$path = explode(',', $value->getRepository());
			array_push($tabImgPaths, $path[0]);
		}

		// affichage la liste des projets récents
		$projet_m = $this->model('projet_m');
		$listProjetsRecents = $projet_m->getListRecents();
		$tabProjectsAuthor = array();
		foreach ($listProjetsRecents as $key => $value) {
			$auteur = $utilisateur_m->get($value->getIdUtilisateur());
			array_push($tabProjectsAuthor, $auteur);
		}
		
		// affichage de la liste des derniers utilisateurs
		$listUsersRecents = $utilisateur_m->getListRecents();

		$this->ajouterVar(array('tabProjectsAuthor' => $tabProjectsAuthor));
		$this->ajouterVar(array('tabImagesAuthor'=>$tabImagesAuthor));
		$this->ajouterVar(array('listProjetsRecents' => $listProjetsRecents));
		$this->ajouterVar(array('listUsersRecents' => $listUsersRecents));
		$this->ajouterVar(array('listImagesRecents' => $listImagesRecents));
		$this->ajouterVar(array('tabImgPaths'=> $tabImgPaths));

		$this->view();
	}

	/**
	* Fonction pour afficher la page contact
	*
	*/
	public function contact(){
		$message_m = $this->model('message_m');
		$errorMessage = "";
		$succesMessage = "";
		if (isset($_POST['btn_message'])) {
			if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['contentMessage'])) {
				$name = htmlspecialchars($_POST['name']);
				$email = htmlspecialchars($_POST['email']);
				$subject = htmlspecialchars($_POST['subject']);
				$contentMessage = htmlspecialchars($_POST['contentMessage']);

				$message = new Message(['name' => $name, 'email' => $email , 'subject' => $subject, 'contentMessage' => $contentMessage]);
				$message_m->add($message);
				$succesMessage = "Votre message est bien enregistré";
			} else {
				$errorMessage = "Veuillez remplir tous les champs";
			}
		}
		
		$this->ajouterVar(array('succesMessage' => $succesMessage));
		$this->ajouterVar(array('errorMessage' => $errorMessage));
		$this->view('contact');
	}

	/**
	* Fonction pour afficher la page copyleft
	*
	*/
	public function copyleft(){

		$this->view('copyleft');
	}

	/**
	* Fonction lancer des recherches
	*
	*/
	public function search(){
		$image_m = $this->model('image_m');
		$projet_m = $this->model('projet_m');
		$search_error = "";
		$motClef = "";
		$tabResultsImg = array();

		if (isset($_POST['search-btn'])) {
			if ($_POST['search-content']) {
				if (strlen($_POST['search-content']) >= 2 ) {
					$motClef = trim(htmlspecialchars($_POST['search-content']));
					$motClef = addcslashes($motClef, '%_');

					if ($_POST['search-param'] == "image") {
						$tabResultsImg = $image_m->getList($motClef);

					} else {
						echo "projet";
					}

				} else {
					$search_error = "Le mot clé doit contenir 2 caracteres au minimum";
				}
			} else {
				$search_error = "Veuillez ecrire votre mot clef";
			}
		}

		$this->ajouterVar(array('motClef' => $motClef));
		$this->ajouterVar(array('tabResultsImg' => $tabResultsImg));
		$this->ajouterVar(array('search_error' => $search_error));
		$this->view('search');
	}



	/**
	* Fonction pour uploader image
	* 
	*/
	public function upload(){
		// liste des catégories d'image
		$categorie_m = $this->model('categorie_m');
		$tabCategories = $categorie_m->getAll();
		$this->ajouterVar(array('tabCategories'=>$tabCategories));

		// -- UPLOADER IMAGE
		$image_m = $this->model('image_m');
		$errorImage ="";
		$succesImage ="";
		$tab_extensions = array();
		

		if (isset($_POST['btn_upload_img'])) {

			// vérifier si tout les champs sont rempli
			if (!empty($_POST['image_title']) && !empty($_POST['image_description']) && !empty($_POST['image_categorie'])){
				
				
				//verifier si ce titre existe déjà
					$titre = htmlspecialchars($_POST['image_title']);
					$donnee = $image_m->exists($titre);
					if ($donnee) $errorImage ="Ce titre existe déjà. Veuillez choisir un  autre titre";

				// vérifier si au moins une image est choisie
					foreach ($_FILES['image1']['name'] as $key => $value) {
						if (strlen($value) < 1) {
							$errorImage = "Veuillez sélectionner une image au minimum à uploader";
						}
					}

				// si la table d'image n'est pas vide
					if ($errorImage == "") {

						// vérifier si l'extension valide
							$extensions_valides = ['jpg', 'png', 'gif','svg'];
							foreach ($_FILES['image1']['name'] as $key => $value) {

								$extensionImg = strtolower(  substr(  strrchr($value, '.')  ,1));

								if (!in_array($extensionImg, $extensions_valides)) {
									$errorImage = "L'extension n'est pas validée";
								}
							// pour vérifier la redondante des extensions
								array_push($tab_extensions, $extensionImg);
							}

						// vérifier si les extensions sont redondantes
							foreach (array_count_values($tab_extensions) as $key => $value) {
								if ($value > 1) {
									$errorImage = " Les extensions ne doivent pas etre redondantes";
								}
							}

						// vérifier erreur lors du chargement
							foreach ($_FILES['image1']['error'] as $key => $value) {
								if ($value > 0 ) $errorImage = "Erreur lors du transfert de l'image";
							}

						// vérifier la taille des images
							foreach ($_FILES['image1']['size'] as $key => $value) {
								if ($value > 16*1024*1024) $errorImage = "La taille de l'image 1 est trop grande (maximum 4 MB)";
							}

						//s'il y a pas de prob du chargement de l'image
		                // stocker l'emplacement qui convient REPOSITORY en renommant le nom de l'image
							if ($errorImage == "") {
								// tableau qui stocke le path des images
		                    	$tab_repository = array();
		                    	foreach ($_FILES['image1']['name'] as $key => $value) {
		                    		
		                    		// renommer le nom de l'image (sans extension)
		                    		$nom1 = trim(str_replace(' ', '', $_POST['image_title'])).'_WifoCopyleft_createBy'.$_SESSION['perso']->getPseudo().md5(uniqid(rand(), true));

				                    // stocker dans les repositories diffs
				                    if (strtolower(substr(strrchr($value, '.')  ,1)) == "jpg") {
				                        
				                        $destination_img1 = 'webroot/user_repository/image/jpg/'.$nom1.'.jpg';
				                        $result1 = move_uploaded_file($_FILES['image1']['tmp_name'][$key], $destination_img1);

				                    } else if (strtolower(substr(strrchr($value, '.')  ,1)) == "gif") {
				                        $destination_img1 = 'webroot/user_repository/image/gif/'.$nom1.'.gif';
				                        $result1 = move_uploaded_file($_FILES['image1']['tmp_name'][$key], $destination_img1);

				                    } else if (strtolower(substr(strrchr($value, '.')  ,1)) == "png") {
				                        $destination_img1 = 'webroot/user_repository/image/png/'.$nom1.'.png';
				                        $result1 = move_uploaded_file($_FILES['image1']['tmp_name'][$key], $destination_img1);

				                    } else if (strtolower(substr(strrchr($value, '.')  ,1)) == "svg") {
				                        $destination_img1 = 'webroot/user_repository/image/svg/'.$nom1.'.svg';
				                        $result1 = move_uploaded_file($_FILES['image1']['tmp_name'][$key], $destination_img1);
				                    }

				                    // add paths to $tab_repository
		                    		array_push($tab_repository, $destination_img1);
		                    	} // fin foreach

		                    //chercher la valeur du repository en prenant les éléments du array $tab_repository et les grouper ensemble dans une chaine de caracteres
				                $repository = implode(",", $tab_repository);
				                $idCategorie = (int)($_POST['image_categorie']);
				                $description = htmlspecialchars($_POST['image_description']);
				                $dateDePub = date('Y-m-d');
				                $note = 0;
				                $idUtilisateur = $_SESSION['perso']->getId();
		                   		$img = new Image(['titre' => $titre, 'description' => $description, 'dateDePub' => $dateDePub,'repository'=> $repository, 'note' => $note, 'idCategorie' => $idCategorie, 'idUtilisateur' => $idUtilisateur] );
		                   		$this->ajouterVar(array('img' => $img));
		                   		$image_m -> add($img);
		                   		$succesImage = "Votre image est bien enregistré";
							} // fin stockage d'image
					} // fin si table image n'est pas vide

			} else {
				$errorImage = "Veuillez remplir tous les champs * ";
			}
			// verifier s'il y a au minimum une image qui est publié
		} // fin upload image


		// -- UPLOADER PROJET
		$projet_m = $this->model('projet_m');
		$errorProject = "";
		$succesProject = "";

		// project_title
		// project_description
		// imageIllusProject

		if (isset($_POST['btn_upload_projet'])) {

			// vérifier si tous les champs sont remplis
			if (!empty($_POST['project_title']) && !empty($_POST['project_description'])) {
				
				// vérifier si le titre du projet existe déjà
				$titreProjet = htmlspecialchars($_POST['project_title']);
				$existProject = $projet_m->exists($titreProjet);
				if($existProject) {
					$errorProject = "Ce titre de projet existe déjà. Veuillez choisir un autre titre";
				} else {
					// s'il y a une image d'illustration
					if (strlen($_FILES['imageIllusProject']['name']) > 0) {

						// vérifier les extensions valides
						$extensions_valides = ['jpg', 'png', 'gif','svg'];
						$extensionProject = strtolower(  substr(  strrchr($_FILES['imageIllusProject']['name'], '.')  ,1));
						if (!in_array($extensionProject, $extensions_valides)) $errorProject = "L'extension n'est pas validée";

						// vérifier erreur lors du chargement
						if ($_FILES['imageIllusProject']['error'] > 0) $errorProject = "Erreur lors du transfert de l'image";

						// vérifier la taille de imageIllusProject
						if ($_FILES['imageIllusProject']['size'] > 16*1024*1024) $errorProject = "La taille de l'image 1 est trop grande (maximum 4 MB)";

						// S'il y a pas de prob de l'image
						if ($errorProject == "") {
							// renommer l'image
							$nomImgIllus = trim(str_replace(' ','',$_POST['project_title'])).'_WifoCopyleft_ProjectOf'.$_SESSION['perso']->getPseudo();

							// choisir l'emplacement de l'image
							$destination_project = 'webroot/user_repository/projet/'.$nomImgIllus.'.'.$extensionProject;
							$result2 = move_uploaded_file($_FILES['imageIllusProject']['tmp_name'], $destination_project);

							// enregistrement du projet dans la bdd
							$descriptionProjet = htmlspecialchars($_POST['project_description']);
							$dateDePubProjet = date('Y-m-d');
							$compteur = '0/0';
							$membres = strval($_SESSION['perso']->getId());
							$idUser = $_SESSION['perso']->getId();

							$projet = new Projet(['titre' => $titreProjet, 'description' => $descriptionProjet, 'dateDePub' => $dateDePubProjet, 'imageIllustration' => $destination_project, 'compteur' => $compteur, 'membres' => $membres, 'idUtilisateur' => $idUser]);
							$this->ajouterVar(array('projet' => $projet));	
							$projet_m->add($projet);
							$succesProject = "Votre projet est bien enregistré";
						}
					}
				}

			} else {
				$errorProject = "Veuillez remplir tous les champs * ";
			}
		}



		$this->ajouterVar(array('errorProject' => $errorProject));
		$this->ajouterVar(array('succesProject' => $succesProject));
		$this->ajouterVar(array('errorImage' => $errorImage));
		$this->ajouterVar(array('succesImage' => $succesImage));
		$this->view('upload');	
	}// fin function upload
}




				 	

 ?>