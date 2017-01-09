<?php 
class Projet_m extends Model{
	/**
	* Fontion pour ajouter un nouveau Projet 
	* de la page upload Projet
	* @param Projet $project
	* 
	*/
	public function add(Projet $project){
		$q = $this->pdo->prepare("INSERT INTO projet(titre, description, dateDePub, imageIllustration, compteur, membres, idUtilisateur) VALUES (:titre, :description, :dateDePub, :imageIllustration, :compteur, :membres, :idUtilisateur)");
		$q->bindValue(':titre', $project->getTitre(), PDO::PARAM_STR);
		$q->bindValue(':description', $project->getDescription(), PDO::PARAM_STR);
		$q->bindValue(':dateDePub', $project->getDateDePub());
		$q->bindValue(':imageIllustration', $project->getImageIllustration(), PDO::PARAM_STR);
		$q->bindValue(':compteur', $project->getCompteur());
		$q->bindValue(':membres', $project->getMembres(), PDO::PARAM_STR);
		$q->bindValue(':idUtilisateur', $project->getIdUtilisateur(), PDO::PARAM_INT);
		$q->execute();

		$project->hydrater(['id' => $this->pdo->lastInsertId()]);

		$q->closeCursor();
	}

	/**
	 * Fonction pour get a liste des derniers projets
	 * pour la page d'accueil
	 * 
	 */
	public function getListRecents(){
		$resultsProjets = [];
		$q = $this->pdo->query('SELECT * FROM projet ORDER BY dateDePub DESC LIMIT 4');
		while ($donnee = $q->fetch(PDO::FETCH_ASSOC)) {
			$resultsProjets[] = new Projet($donnee);
		}
		return $resultsProjets;
	}

	/**
	* Fontion pour vérifier si le titre du projet exite déjà 
	* pour la page upload Projet
	* @param $title
	*
	*/

	public function exists($title){
		$q = $this->pdo->query("SELECT * FROM projet WHERE titre='".$title."'");
		$donnees = $q->fetch(PDO::FETCH_ASSOC);
		return $donnees;
	}
	

}
 ?>