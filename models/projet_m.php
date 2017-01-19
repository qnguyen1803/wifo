<?php 
class Projet_m extends Model{
	/**
	* Fontion pour ajouter un nouveau Projet 
	* de la page upload Projet
	* @param Projet $project
	* 
	*/
	public function add(Projet $project){
		$q = $this->pdo->prepare("INSERT INTO projet(titre, idCategorie, description, dateDePub, imageIllustration, compteur, membres, idUtilisateur) VALUES (:titre,:idCategorie , :description, :dateDePub, :imageIllustration, :compteur, :membres, :idUtilisateur)");
		$q->bindValue(':titre', $project->getTitre(), PDO::PARAM_STR);
		$q->bindValue(':idCategorie', $project->getIdCategorie(), PDO::PARAM_INT);
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
	 * Fonction pour récupérer le projet selon id
	 * @param $idProject
	 * @return new Project
	 */
	public function get($idProject){
		$q = $this->pdo->prepare('SELECT * FROM projet WHERE id = :id');
		$q->bindValue(':id', $idProject, PDO::PARAM_INT);
		$q->execute();
		$donnee = $q->fetch(PDO::FETCH_ASSOC);
		return new Projet($donnee);
	}

	/**
	* Fonction qui retourne la liste des projets pour la 
	* fonction Search
	* @param $motClef
	* @return resultsProjects[]
	*/
	public function getList($motClef){
		$resultsProjects = [];
		$q = $this->pdo->prepare('SELECT * FROM projet WHERE (titre LIKE :motClef) OR (description LIKE :motClef)');
		$q->bindValue(':motClef', '%'.$motClef.'%');
		$q->execute();

		while ($donnee = $q->fetch(PDO::FETCH_ASSOC)) {
			$resultsProjets[] = new Projet($donnee);
		}
		return $resultsProjects;
	}

	/**
	 * Fonction pour get tous les projets
	 * @return $resultsProjets[]
	 */
	public function getAll(){
		$resultsProjets = [];
		$q = $this->pdo->query('SELECT * FROM projet');
		while ($donnee = $q->fetch(PDO::FETCH_ASSOC)) {
			$resultsProjets[] = new Projet($donnee);
		}
		return $resultsProjets;
	}

	/**
	 * Fonction qui retourne la liste des projets selon la categorie
	 * dans la page projetCollection
	 * @param idCategorie
	 * @return tableau des images selon la catégorie
	 */
	public function getListCate($idCategorie){
		$resultsProjets = [];
		$q = $this->pdo->prepare('SELECT * FROM projet WHERE idCategorie = :idCategorie');
		$q->bindValue(':idCategorie', $idCategorie, PDO::PARAM_INT);
		$q->execute();

		while ($donnee = $q->fetch(PDO::FETCH_ASSOC)) {
			$resultsProjets[] = new Projet($donnee);
		}
		return $resultsProjets;
	}

	/**
	 * Fonction pour get a liste des derniers projets
	 * pour la page d'accueil
	 * @return $resultsProjets[]
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
	 * Fonction pour get a list des projets d'un utilisateur
	 * @param $idUtilisateur
	 * @return $resultsProjets[]
	 */
	public function getListProjectsOfUser($idUtilisateur){
		$resultsProjets = [];
		$q = $this->pdo->prepare('SELECT * FROM projet WHERE idUtilisateur = :idUtilisateur');
		$q->bindValue(':idUtilisateur', $idUtilisateur, PDO::PARAM_INT);
		$q->execute();
		while ($donnee = $q->fetch(PDO::FETCH_ASSOC)) {
			$resultsProjets[] = new Projet($donnee);
		}
		return $resultsProjets;
	}

	/**
	* Fontion pour vérifier si le titre du projet exite déjà 
	* pour la page upload Projet
	* @param $title
	* @return array $donnees
	*/
	public function exists($title){
		$q = $this->pdo->query("SELECT * FROM projet WHERE titre='".$title."'");
		$donnees = $q->fetch(PDO::FETCH_ASSOC);
		return $donnees;
	}

	/**
	 * Fonction pour updater les infos d'une image
	 * pour update compteur
	 */
	public function update($column, $value, $idProject){
		$q = $this->pdo->prepare('UPDATE projet SET '.$column. '=:value WHERE id = :id');
		$q->bindValue(':value', $value);
		$q->bindValue(':id', $idProject, PDO::PARAM_INT);
		$q->execute();
	}

	/**
	 * Fonction pour effacer une Projet
	 * @param $idProject
	 */
	public function delete($idProject){
		$q = $this->pdo->prepare("DELETE FROM projet WHERE id = :id");
		$q->bindValue(':id', $idProject, PDO::PARAM_INT);
		$q->execute();
	}
	

}
 ?>