<?php 
/**
* 
*/
class Image_c extends Controller{

	public function imageDetail(){

		session_start();

		// code for image
		$modelImage = $this->model('image_m');
		if (isset($_GET)) {
			$_SESSION['imageDetail'] = $modelImage->get($_GET['params']);
			$_SESSION['tabExtensions'] = explode(',', $_SESSION['imageDetail']->getRepository());
		}

		// CODE FOR COMMENT
		// add new comment
		$_SESSION['erreur_comment'] = "";
		$modelCommentaire = $this->model('commentaire_m');

		if (isset($_POST['btn_commentaire'])) {
			if (!empty($_POST['nomPrenom']) && !empty($_POST['contentComment'])) {
				$nomPrenom = htmlspecialchars($_POST['nomPrenom']);
				$contentComment = htmlspecialchars($_POST['contentComment']);
				$date = date('Y-m-d H:i:s');
				$idImage = $_SESSION['imageDetail']->getId();

				$comment = new Commentaire(['nomPrenom' => $nomPrenom, 'contenu' => $contentComment, 'dateDePub' => $date, 'idImage' => $idImage]);
				
				// ajouter ce commentaire dans le base de donnée
				$modelCommentaire->add($comment);

			} else {
				$_SESSION['erreur_comment'] = "Veuillez remplir tous les champs";
			}
		}

		// afficher les commentaires qui correspond à l'image
		$_SESSION['tabCommentaires'] = $modelCommentaire->getList($_GET['params'], 'idImage');
		

		// END code for comment


		$this->view('imageDetail');
	}

	public function download(){
		session_start();
		if (isset($_POST['btn_download'])) {
			if (!empty($_POST['extension'])) {
				for ($i=0; $i < count($_SESSION['tabExtensions']); $i++) {	

					$exten = strtolower(  substr(  strrchr( $_SESSION['tabExtensions'][$i], '.')  ,1));

					if ($exten == $_POST['extension']) {
						$file = $_SESSION['tabExtensions'][$i];
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