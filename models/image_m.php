<?php 
/**
* 
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
		$q->bindValue('repository', $img->getRepository(), PDO::PARAM_STR);
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
	* Fontion qui retourne une image
	* @param $id
	* 
	*/
	public function get($id){
		$q = $this->pdo->prepare('SELECT * FROM image WHERE id=:id');
		$q->bindValue(':id', $id, PDO::PARAM_INT);
		$q->execute();
		$donnees = $q->fetch(PDO::FETCH_ASSOC);
		return new Image($donnees);
	}

}
 ?>