<?php 
/**
* 
*/
class Accueil_c extends Controller{
	public function index(){
		session_start();
		$this->view();
	}

	public function contact(){
		session_start();
		$this->view('contact');
	}

	public function copyleft(){
		session_start();
		$this->view('copyleft');
	}

	public function search(){

		$this->view('search');
		if (isset($_GET)) {	
		}
	}

	/**
	* vérifier si le btn_upload_img est cliqué
	* 
	*/
	public function upload(){
		session_start();
		$_SESSION['erreur_image'] ="";
		$_SESSION['success_image'] ="";
		$image_m = $this->model('image_m');

		if (isset($_POST['btn_upload_img'])) {
			// veérifier si tout les champs sont rempli
			if (!empty($_POST['image_title']) && !empty($_POST['image_description']) && !empty($_POST['image_categorie'])) {

				if (strlen($_FILES['image1']['name']) > 0 || strlen($_FILES['image2']['name']) > 0 || strlen($_FILES['image3']['name']) > 0 || strlen($_FILES['image4']['name']) > 0 || strlen($_FILES['image5']['name']) > 0 || strlen($_FILES['image6']['name']) > 0) {

					$titre = htmlspecialchars($_POST['image_title']);
					$donnee = $image_m->exists($titre);
					if ($donnee) {
						$_SESSION['erreur_image'] ="Ce titre existe déjà. Veuillez choisir un  autre titre";
					}

					$extensions_valides = ['jpg', 'png', 'gif', 'jpeg', 'svg', 'bnp'];


				// Verifier image1
					if (strlen($_FILES['image1']['name']) > 0) {
						$extension_1 = strtolower(  substr(  strrchr($_FILES['image1']['name'], '.')  ,1));

						if (!in_array($extension_1, $extensions_valides)) $_SESSION['erreur_image'] = "L'extension de l'image numéro 1 n'est pas valide";
						
						if ($_FILES['image1']['error'] > 0 ) $_SESSION['erreur_image'] = "Erreur lors du transfert de l'image numéro 1";

						if ($_FILES['image1']['size'] > 16*1024*1024) $_SESSION['erreur_image'] = "La taille de l'image 1 est trop grande (maximum 4 MB)";
					}

					

				// Verifier image2
					if (strlen($_FILES['image2']['name']) > 0) {
						$extension_2 = strtolower(  substr(  strrchr($_FILES['image2']['name'], '.')  ,1));

						if (!in_array($extension_2, $extensions_valides)) $_SESSION['erreur_image'] = "L'extension de l'image numéro 2 n'est pas valide";
					
						if ($_FILES['image2']['error'] > 0 ) $_SESSION['erreur_image'] = "Erreur lors du transfert de l'image numéro 2";

						if ($_FILES['image2']['size'] > 16*1024*1024) $_SESSION['erreur_image'] = "La taille de l'image 2 est trop grande (maximum 4 MB)";
					}
					

				// Verifier image3
					if (strlen($_FILES['image3']['name']) > 0) {
						$extension_3 = strtolower(  substr(  strrchr($_FILES['image3']['name'], '.')  ,1));

						if (!in_array($extension_3, $extensions_valides)) $_SESSION['erreur_image'] = "L'extension de l'image numéro 3 n'est pas valide";
					
						if ($_FILES['image3']['error'] > 0 ) $_SESSION['erreur_image'] = "Erreur lors du transfert de l'image numéro 3";

						if ($_FILES['image3']['size'] > 16*1024*1024) $_SESSION['erreur_image'] = "La taille de l'image 3 est trop grande (maximum 4 MB)";
					}

				// Verifier image4
					if (strlen($_FILES['image4']['name']) > 0) {
						$extension_4 = strtolower(  substr(  strrchr($_FILES['image4']['name'], '.')  ,1));

						if (!in_array($extension_4, $extensions_valides)) $_SESSION['erreur_image'] = "L'extension de l'image numéro 4 n'est pas valide";
						
						if ($_FILES['image4']['error'] > 0 ) $_SESSION['erreur_image'] = "Erreur lors du transfert de l'image numéro 4";

						if ($_FILES['image4']['size'] > 16*1024*1024) $_SESSION['erreur_image'] = "La taille de l'image 4 est trop grande (maximum 4 MB)";
					}

				// Verifier image5
					if (strlen($_FILES['image5']['name']) > 0) {
						$extension_5 = strtolower(  substr(  strrchr($_FILES['image5']['name'], '.')  ,1));

						if (!in_array($extension_5, $extensions_valides)) $_SESSION['erreur_image'] = "L'extension de l'image numéro 5 n'est pas valide";
					
						if ($_FILES['image5']['error'] > 0 ) $_SESSION['erreur_image'] = "Erreur lors du transfert de l'image numéro 5";

						if ($_FILES['image5']['size'] > 16*1024*1024) $_SESSION['erreur_image'] = "La taille de l'image 5 est trop grande (maximum 4 MB)";
					}

				// Verifier image6
					if (strlen($_FILES['image6']['name']) > 0) {

						$extension_6 = strtolower(  substr(  strrchr($_FILES['image6']['name'], '.')  ,1));

						if (!in_array($extension_6, $extensions_valides)) $_SESSION['erreur_image'] = "L'extension de l'image numéro 6 n'est pas valide";
						
						if ($_FILES['image6']['error'] > 0 ) $_SESSION['erreur_image'] = "Erreur lors du transfert de l'image numéro 6";

						if ($_FILES['image6']['size'] > 16*1024*1024) $_SESSION['erreur_image'] = "La taille de l'image 6 est trop grande (maximum 4 MB)";
					}


					//s'il y a pas de prob du chargement de l'image
					// stocker l'emplacement qui convient REPOSITORY
				
					if ($_SESSION['erreur_image'] == "") {

					$tab_repository = array();

					//stocker image 1
						if (strlen($_FILES['image1']['name']) > 0) {
							$nom1 = $_POST['image_title'].md5(uniqid(rand(), true)).'wifo_createBy'.$_SESSION['perso']->getPseudo();

							if (strtolower(substr(strrchr($_FILES['image1']['name'], '.')  ,1)) == "jpg") {
								$destination_img1 = 'webroot/user_repository/image/jpg/'.$nom1.'.jpg';
								$result1 = move_uploaded_file($_FILES['image1']['tmp_name'], $destination_img1);

							} else if (strtolower(substr(strrchr($_FILES['image1']['name'], '.')  ,1)) == "jpeg") {
								$destination_img1 = 'webroot/user_repository/image/jpeg/'.$nom1.'.jpeg';
								$result1 = move_uploaded_file($_FILES['image1']['tmp_name'], $destination_img1);

							} else if (strtolower(substr(strrchr($_FILES['image1']['name'], '.')  ,1)) == "gif") {
								$destination_img1 = 'webroot/user_repository/image/gif/'.$nom1.'.gif';
								$result1 = move_uploaded_file($_FILES['image1']['tmp_name'], $destination_img1);

							} else if (strtolower(substr(strrchr($_FILES['image1']['name'], '.')  ,1)) == "bnp") {
								$destination_img1 = 'webroot/user_repository/image/bnp/'.$nom1.'.bnp';
								$result1 = move_uploaded_file($_FILES['image1']['tmp_name'], $destination_img1);

							} else if (strtolower(substr(strrchr($_FILES['image1']['name'], '.')  ,1)) == "png") {
								$destination_img1 = 'webroot/user_repository/image/png/'.$nom1.'.png';
								$result1 = move_uploaded_file($_FILES['image1']['tmp_name'], $destination_img1);

							} else if (strtolower(substr(strrchr($_FILES['image1']['name'], '.')  ,1)) == "svg") {
								$destination_img1 = 'webroot/user_repository/image/svg/'.$nom1.'.svg';
								$result1 = move_uploaded_file($_FILES['image1']['tmp_name'], $destination_img1);
							}

							array_push($tab_repository, $destination_img1);
						}

					//stocker image 2
						if (strlen($_FILES['image2']['name']) > 0) {
							$nom2 = $_POST['image_title'].md5(uniqid(rand(), true)).'wifo_createBy'.$_SESSION['perso']->getPseudo();

							if (strtolower(substr(strrchr($_FILES['image2']['name'], '.')  ,1)) == "jpg") {
								$destination_img2 = 'webroot/user_repository/image/jpg/'.$nom2.'.jpg';
								$result2 = move_uploaded_file($_FILES['image2']['tmp_name'], $destination_img2);

							} else if (strtolower(substr(strrchr($_FILES['image2']['name'], '.')  ,1)) == "jpeg") {
								$destination_img2 = 'webroot/user_repository/image/jpeg/'.$nom2.'.jpeg';
								$result2 = move_uploaded_file($_FILES['image2']['tmp_name'], $destination_img2);

							} else if (strtolower(substr(strrchr($_FILES['image2']['name'], '.')  ,1)) == "gif") {
								$destination_img2 = 'webroot/user_repository/image/gif/'.$nom2.'.gif';
								$result2 = move_uploaded_file($_FILES['image2']['tmp_name'], $destination_img2);

							} else if (strtolower(substr(strrchr($_FILES['image2']['name'], '.')  ,1)) == "bnp") {
								$destination_img2 = 'webroot/user_repository/image/bnp/'.$nom2.'.bnp';
								$result2 = move_uploaded_file($_FILES['image2']['tmp_name'], $destination_img2);

							} else if (strtolower(substr(strrchr($_FILES['image2']['name'], '.')  ,1)) == "png") {
								$destination_img2 = 'webroot/user_repository/image/png/'.$nom2.'.png';
								$result2 = move_uploaded_file($_FILES['image2']['tmp_name'], $destination_img2);

							} else if (strtolower(substr(strrchr($_FILES['image2']['name'], '.')  ,1)) == "svg") {
								$destination_img2 = 'webroot/user_repository/image/svg/'.$nom2.'.svg';
								$result2 = move_uploaded_file($_FILES['image2']['tmp_name'], $destination_img2);
							}
							array_push($tab_repository, $destination_img2);
						}

					//stocker image 3
						if (strlen($_FILES['image3']['name']) > 0) {
							$nom3 = $_POST['image_title'].md5(uniqid(rand(), true)).'wifo_createBy'.$_SESSION['perso']->getPseudo();

							if (strtolower(substr(strrchr($_FILES['image3']['name'], '.')  ,1)) == "jpg") {
								$destination_img3 = 'webroot/user_repository/image/jpg/'.$nom3.'.jpg';
								$result3 = move_uploaded_file($_FILES['image3']['tmp_name'], $destination_img3);

							} else if (strtolower(substr(strrchr($_FILES['image3']['name'], '.')  ,1)) == "jpeg") {
								$destination_img3 = 'webroot/user_repository/image/jpeg/'.$nom3.'.jpeg';
								$result3 = move_uploaded_file($_FILES['image3']['tmp_name'], $destination_img3);

							} else if (strtolower(substr(strrchr($_FILES['image3']['name'], '.')  ,1)) == "gif") {
								$destination_img3 = 'webroot/user_repository/image/gif/'.$nom3.'.gif';
								$result3 = move_uploaded_file($_FILES['image3']['tmp_name'], $destination_img3);

							} else if (strtolower(substr(strrchr($_FILES['image3']['name'], '.')  ,1)) == "bnp") {
								$destination_img3 = 'webroot/user_repository/image/bnp/'.$nom3.'.bnp';
								$result3 = move_uploaded_file($_FILES['image3']['tmp_name'], $destination_img3);

							} else if (strtolower(substr(strrchr($_FILES['image3']['name'], '.')  ,1)) == "png") {
								$destination_img3 = 'webroot/user_repository/image/png/'.$nom3.'.png';
								$result3 = move_uploaded_file($_FILES['image3']['tmp_name'], $destination_img3);

							} else if (strtolower(substr(strrchr($_FILES['image3']['name'], '.')  ,1)) == "svg") {
								$destination_img3 = 'webroot/user_repository/image/svg/'.$nom3.'.svg';
								$result3 = move_uploaded_file($_FILES['image3']['tmp_name'], $destination_img3);
							}
							array_push($tab_repository, $destination_img3);
						}

					//stocker image 4
						if (strlen($_FILES['image4']['name']) > 0) {
							$nom4 = $_POST['image_title'].md5(uniqid(rand(), true)).'wifo_createBy'.$_SESSION['perso']->getPseudo();

							if (strtolower(substr(strrchr($_FILES['image4']['name'], '.')  ,1)) == "jpg") {
								$destination_img4 = 'webroot/user_repository/image/jpg/'.$nom4.'.jpg';
								$result4 = move_uploaded_file($_FILES['image4']['tmp_name'], $destination_img4);

							} else if (strtolower(substr(strrchr($_FILES['image4']['name'], '.')  ,1)) == "jpeg") {
								$destination_img4 = 'webroot/user_repository/image/jpeg/'.$nom4.'.jpeg';
								$result4 = move_uploaded_file($_FILES['image4']['tmp_name'], $destination_img4);

							} else if (strtolower(substr(strrchr($_FILES['image4']['name'], '.')  ,1)) == "gif") {
								$destination_img4 = 'webroot/user_repository/image/gif/'.$nom4.'.gif';
								$result4 = move_uploaded_file($_FILES['image4']['tmp_name'], $destination_img4);

							} else if (strtolower(substr(strrchr($_FILES['image4']['name'], '.')  ,1)) == "bnp") {
								$destination_img4 = 'webroot/user_repository/image/bnp/'.$nom4.'.bnp';
								$result4 = move_uploaded_file($_FILES['image4']['tmp_name'], $destination_img4);

							} else if (strtolower(substr(strrchr($_FILES['image4']['name'], '.')  ,1)) == "png") {
								$destination_img4 = 'webroot/user_repository/image/png/'.$nom4.'.png';
								$result4 = move_uploaded_file($_FILES['image4']['tmp_name'], $destination_img4);

							} else if (strtolower(substr(strrchr($_FILES['image4']['name'], '.')  ,1)) == "svg") {
								$destination_img4 = 'webroot/user_repository/image/svg/'.$nom4.'.svg';
								$result4 = move_uploaded_file($_FILES['image4']['tmp_name'], $destination_img4);
							}
							array_push($tab_repository, $destination_img4);
						}

					//stocker image 5
						if (strlen($_FILES['image5']['name']) > 0) {
							$nom5 = $_POST['image_title'].md5(uniqid(rand(), true)).'wifo_createBy'.$_SESSION['perso']->getPseudo();

							if (strtolower(substr(strrchr($_FILES['image5']['name'], '.')  ,1)) == "jpg") {
								$destination_img5 = 'webroot/user_repository/image/jpg/'.$nom5.'.jpg';
								$result5 = move_uploaded_file($_FILES['image5']['tmp_name'], $destination_img5);

							} else if (strtolower(substr(strrchr($_FILES['image5']['name'], '.')  ,1)) == "jpeg") {
								$destination_img5 = 'webroot/user_repository/image/jpeg/'.$nom5.'.jpeg';
								$result5 = move_uploaded_file($_FILES['image5']['tmp_name'], $destination_img5);

							} else if (strtolower(substr(strrchr($_FILES['image5']['name'], '.')  ,1)) == "gif") {
								$destination_img5 = 'webroot/user_repository/image/gif/'.$nom5.'.gif';
								$result5 = move_uploaded_file($_FILES['image5']['tmp_name'], $destination_img5);

							} else if (strtolower(substr(strrchr($_FILES['image5']['name'], '.')  ,1)) == "bnp") {
								$destination_img5 = 'webroot/user_repository/image/bnp/'.$nom5.'.bnp';
								$result5 = move_uploaded_file($_FILES['image5']['tmp_name'], $destination_img5);

							} else if (strtolower(substr(strrchr($_FILES['image5']['name'], '.')  ,1)) == "png") {
								$destination_img5 = 'webroot/user_repository/image/png/'.$nom5.'.png';
								$result5 = move_uploaded_file($_FILES['image5']['tmp_name'], $destination_img5);

							} else if (strtolower(substr(strrchr($_FILES['image5']['name'], '.')  ,1)) == "svg") {
								$destination_img5 = 'webroot/user_repository/image/svg/'.$nom5.'.svg';
								$result5 = move_uploaded_file($_FILES['image5']['tmp_name'], $destination_img5);
							}
							array_push($tab_repository, $destination_img5);
						}

					//stocker image 6
						if (strlen($_FILES['image6']['name']) > 0) {
							$nom6 = $_POST['image_title'].md5(uniqid(rand(), true)).'wifo_createBy'.$_SESSION['perso']->getPseudo();

							if (strtolower(substr(strrchr($_FILES['image6']['name'], '.')  ,1)) == "jpg") {
								$destination_img6 = 'webroot/user_repository/image/jpg/'.$nom6.'.jpg';
								$result6 = move_uploaded_file($_FILES['image6']['tmp_name'], $destination_img6);

							} else if (strtolower(substr(strrchr($_FILES['image6']['name'], '.')  ,1)) == "jpeg") {
								$destination_img6 = 'webroot/user_repository/image/jpeg/'.$nom6.'.jpeg';
								$result6 = move_uploaded_file($_FILES['image6']['tmp_name'], $destination_img6);

							} else if (strtolower(substr(strrchr($_FILES['image6']['name'], '.')  ,1)) == "gif") {
								$destination_img6 = 'webroot/user_repository/image/gif/'.$nom6.'.gif';
								$result6 = move_uploaded_file($_FILES['image6']['tmp_name'], $destination_img6);

							} else if (strtolower(substr(strrchr($_FILES['image6']['name'], '.')  ,1)) == "bnp") {
								$destination_img6 = 'webroot/user_repository/image/bnp/'.$nom6.'.bnp';
								$result6 = move_uploaded_file($_FILES['image6']['tmp_name'], $destination_img6);

							} else if (strtolower(substr(strrchr($_FILES['image6']['name'], '.')  ,1)) == "png") {
								$destination_img6 = 'webroot/user_repository/image/png/'.$nom6.'.png';
								$result6 = move_uploaded_file($_FILES['image6']['tmp_name'], $destination_img6);

							} else if (strtolower(substr(strrchr($_FILES['image6']['name'], '.')  ,1)) == "svg") {
								$destination_img6 = 'webroot/user_repository/image/svg/'.$nom6.'.svg';
								$result6 = move_uploaded_file($_FILES['image6']['tmp_name'], $destination_img6);
							}
							array_push($tab_repository, $destination_img6);
						}

						
						

						// chercher la valeur du repository en prenant les éléments du array $tab_repository et les grouper ensemble
						$repository = "";
						for ($i=0; $i < count($tab_repository) ; $i++) { 
							$element = ','.$tab_repository[$i];
							$repository = $repository.$element;
						}
						$repository = substr($repository, 1);
						
						// idCategorie
						if ($_POST['image_categorie'] == 'Nature') {
							$idCategorie = 1;
						} else if($_POST['image_categorie'] == 'Personne'){
							$idCategorie = 2;
						} else if($_POST['image_categorie'] == 'Infrastructures'){
							$idCategorie = 3;
						} 

						$description = htmlspecialchars($_POST['image_description']);
						$dateDePub = date('Y-m-d');
						$note = 0;
						$idUtilisateur = $_SESSION['perso']->getId();

						$img = new Image(['titre' => $titre, 'description' => $description, 'dateDePub' => $dateDePub,'repository'=> $repository, 'note' => $note, 'idCategorie' => $idCategorie, 'idUtilisateur' => $idUtilisateur] );

						$image_m -> add($img);

						$_SESSION['image'] = $img;

						$_SESSION['success_image'] = "Votre image est bien enregistré";
					}

				} else {
					$_SESSION['erreur_image'] = "Veuillez sélectionner 1 image au minimum";
				}

			} else {
				$_SESSION['erreur_image'] = "Veuillez remplir tous les champs * ";
			}

			//verifier s'il y a au minimum une image qui est publié


		}

		$this->view('upload');
		

		//$_id, $_titre, $_description, $_dateDePub, $_repository, $_taille, $_note, $_idCategorie, $_idUtilisateur;
	}

}
 ?>