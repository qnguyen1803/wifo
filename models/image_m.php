<?php 
/**
* class Image manager
*/
class Image_m extends Model{
	/**
	* Fontion pour ajouter une nouvelle d'image (contient
	* plusieurs extensions) au tableau image
	* @param Image $img
	* 
	*/
	public function add(Image $img){
		$q = $this->pdo->prepare("INSERT INTO image(titre, description, dateDePub, repository, note, idCategorie, idUtilisateur) VALUES (:titre, :description, :dateDePub, :repository, :note, :idCategorie, :idUtilisateur)");
		$q->bindValue(':titre', $img->getTitre(), PDO::PARAM_STR);
		$q->bindValue(':description', $img->getDescription(), PDO::PARAM_STR);
		$q->bindValue(':dateDePub', $img->getDateDePub());
		$q->bindValue(':repository', $img->getRepository(), PDO::PARAM_STR);
		$q->bindValue(':note', $img->getNote());
		$q->bindValue(':idCategorie', $img->getIdCategorie(), PDO::PARAM_INT);
		$q->bindValue(':idUtilisateur', $img->getIdUtilisateur(), PDO::PARAM_INT);
		$q->execute();

		$img->hydrater(['id' => $this->pdo->lastInsertId()]);

		$q->closeCursor();
	}

	/**
	* Fontion pour vérifier si le titre de l'image exite déjà 
	* dans la base de données
	* @param $title
	*
	*/

	public function exists($title){
		$q = $this->pdo->query("SELECT * FROM image WHERE titre='".$title."'");
		$donnees = $q->fetch(PDO::FETCH_ASSOC);
		return $donnees;
	}


	/**
	* Fontion qui retourne une image pour la page ImageDetail
	* @param $id
	* @return new Image
	* 
	*/
	public function get($id){
		$q = $this->pdo->prepare('SELECT * FROM image WHERE id=:id');
		$q->bindValue(':id', $id, PDO::PARAM_INT);
		$q->execute();
		$donnees = $q->fetch(PDO::FETCH_ASSOC);
		return new Image($donnees);
	}

	/**
	* Fonction qui retourne la liste des images pour la 
	* fonction Search
	* @param $motClef
	* @return resultsImage[]
	*/
	public function getList($motClef){
		$resultsImage = [];
		$q = $this->pdo->prepare('SELECT * FROM image WHERE (titre LIKE :motClef) OR (description LIKE :motClef)');
		$q->bindValue(':motClef', '%'.$motClef.'%');
		$q->execute();

		while ($donnee = $q->fetch(PDO::FETCH_ASSOC)) {
			$resultsImage[] = new Image($donnee);
		}
		return $resultsImage;
	}

	/**
	* Fonction qui retourne la liste de 5 images pour la 
	* l'affichage dans la page d'accueil
	* @return resultsImage[]
	*/

	public function getListRecents(){
		$resultsImage = [];
		$q = $this->pdo->query('SELECT * FROM image ORDER BY dateDePub DESC LIMIT 4');
		while ($donnee = $q->fetch(PDO::FETCH_ASSOC)) {
			$resultsImage[] = new Image($donnee);
		}
		return $resultsImage;
	}

	/**
	 * Fonction pour get liste des images d'un auteur
	 *
	 */
	public function getListImagesOfPerson($idUtilisateur){
		$resultsImage = [];
		$q = $this->pdo->prepare('SELECT * FROM image WHERE idUtilisateur = :idUtilisateur');
		$q->bindValue(':idUtilisateur', $idUtilisateur, PDO::PARAM_INT);
		$q->execute();

		while ($donnee = $q->fetch(PDO::FETCH_ASSOC)) {
			$resultsImage[] = new Image($donnee);
		}
		return $resultsImage;
	}



	/**
	 * Fonction qui retourne toutes les images pour la page 
	 * imageCollection
	 * @return tableau de toutes les images
	 */

	public function getAll(){
		$resultsImage = [];
		$q = $this->pdo->query('SELECT * FROM image');
		while ($donnee = $q->fetch(PDO::FETCH_ASSOC)) {
			$resultsImage[] = new Image($donnee);
		}
		return $resultsImage;
	}

	/**
	 * Fonction qui retourne la liste des images selon la categorie
	 * dans la page imageCollection
	 * @param idCategorie
	 * @return tableau des images selon la catégorie
	 */
	public function getListCate($idCategorie){
		$resultsImage = [];
		$q = $this->pdo->prepare('SELECT * FROM image WHERE idCategorie = :idCategorie');
		$q->bindValue(':idCategorie', $idCategorie, PDO::PARAM_INT);
		$q->execute();

		while ($donnee = $q->fetch(PDO::FETCH_ASSOC)) {
			$resultsImage[] = new Image($donnee);
		}
		return $resultsImage;
	}


	/**
	 * Fonction pour updater les infos d'une image
	 * @param $column, $value, $idImg
	 */
	public function update($column, $value, $idImg){
		$q = $this->pdo->prepare('UPDATE image SET '.$column. '=:value WHERE id = :id');
		$q->bindValue(':value', $value);
		$q->bindValue(':id', $idImg, PDO::PARAM_INT);
		$q->execute();
	}

	/**
	 * Fonction pour effacer une image
	 * @param 
	 */
	public function delete($idImg){
		$q = $this->pdo->prepare("DELETE FROM image WHERE id = :id");
		$q->bindValue(':id', $idImg, PDO::PARAM_INT);
		$q->execute();
	}


}
 ?>