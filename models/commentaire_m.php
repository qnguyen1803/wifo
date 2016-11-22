<?php 
/**
* 
*/
class Commentaire_m extends Model{

	/**
	* Fontion pour ajouter un nouveau commentaire au tableau commentaire
	* @param Commentaire comment
	* 
	*/
	public function add(Commentaire $comment){
		$q = $this->pdo->prepare("INSERT INTO commentaire(nomPrenom, contenu, dateDePub, idImage, idProjet) VALUES (:nomPrenom, :contenu, :dateDePub, :idImage, :idProjet)");
		$q->bindValue(':nomPrenom', $comment->getNomPrenom(), PDO::PARAM_STR);
		$q->bindValue(':contenu', $comment->getContenu(), PDO::PARAM_STR);
		$q->bindValue(':dateDePub', $comment->getDateDePub());
		$q->bindValue(':idImage', $comment->getIdImage(), PDO::PARAM_INT);
		$q->bindValue(':idProjet', $comment->getIdProjet(), PDO::PARAM_INT);
		
		$q->execute();

		$comment->hydrater(['id' => $this->pdo->lastInsertId()]);

		$q->closeCursor();
	}

	/**
	* Fontion qui retourne la liste des commentaires qui correspondent l'image
	* @param $id
	* 
	*/
	public function getList($idProprietaire, $column){
		$comments = [];
		$q = $this->pdo->prepare('SELECT * FROM commentaire WHERE '.$column.'=:id');
		$q->bindValue(':id', $idProprietaire, PDO::PARAM_INT);
		$q->execute();
		while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
			$comments[] = new Commentaire($donnees);
		}
		return $comments;
		
		
	}
	
}
 ?>