<?php 
class Demande_m extends Model{
	/**
	* Fontion pour ajouter une nouvelle demande de postuler
	* à un projet
	* @param Demande $demande
	* 
	*/
	public function add(Demande $demande){
		$q = $this->pdo->prepare("INSERT INTO demande(idUtilisateur, idProjet, message, reponse) VALUES (:idUtilisateur, :idProjet, :message, :reponse) ");

		$q->bindValue(':idUtilisateur', $demande->getIdUtilisateur(), PDO::PARAM_INT);
		$q->bindValue(':idProjet', $demande->getIdProjet(), PDO::PARAM_INT);
		$q->bindValue(':message', $demande->getMessage(), PDO::PARAM_STR);
		$q->bindValue(':reponse', $demande->getReponse());
		$q->execute();

		$demande->hydrater(['id' => $this->pdo->lastInsertId()]);
		$q->closeCursor();
	}

	/**
	 * Fonction pour vérifier si cet utilisateur a déjà
	 * postulé à ce projet
	 * @param idUtilisateur, idProjet
	 *
	 */

	public function exists($idUtilisateur, $idProjet){
		$q = $this->pdo->prepare("SELECT * FROM demande WHERE idUtilisateur = :idUtilisateur AND idProjet = :idProjet");
		$q->bindValue(':idUtilisateur', $idUtilisateur, PDO::PARAM_INT);
		$q->bindValue(':idProjet', $idProjet, PDO::PARAM_INT);
		$q->execute();

		$donnees = $q->fetch(PDO::FETCH_ASSOC);
		return $donnees;
	}
	
	/**
	* Fontion qui retourne une demande pour la liste des demandes
	* dans la page tableauDeBord
	* @param $id
	* @return new Demande
	* 
	*/
	public function get($id){
		$q = $this->pdo->prepare('SELECT * FROM demande WHERE id=:id');
		$q->bindValue(':id', $id, PDO::PARAM_INT);
		$q->execute();
		$donnees = $q->fetch(PDO::FETCH_ASSOC);
		return new Demande($donnees);
	}

	/**
	 * Fonction pour afficher la liste de toutes les demandes
	 * @return $tabDemandes
	 */
	public function getAll(){
		$tabDemandes = [];
		$q = $this->pdo->query("SELECT * FROM demande");
		while ($donnee = $q->fetch(PDO::FETCH_ASSOC)) {
			$tabDemandes[] = new Demande($donnee);
		}
		return $tabDemandes;
	}

	/**
	 * Fonction pour afficher la liste des demandes à répondre
	 * @param @idProjet
	 * @return $tabDemandesARepondre
	 */

	public function getListDemandesRepondre($idProjet){
		$tabDemandesARepondre = array();
		$q = $this->pdo->prepare('SELECT * FROM demande WHERE idProjet =:idProjet AND reponse IS NULL ');
		$q->bindValue(':idProjet', $idProjet, PDO::PARAM_INT);
		$q->execute();

		while ($donnee = $q->fetch(PDO::FETCH_ASSOC)) {
			$tabDemandesARepondre[] = new Demande($donnee); 
		}
		return $tabDemandesARepondre;
	}

	/**
	 * Fonction pour afficher la liste des demandes envoyer
	 * @param idUser
	 * @return $tabDemandes
	 */
	public function getListDemandesEnvoyees($idUser){
		$tabDemandesEnvoyees = array();
		$q = $this->pdo->prepare('SELECT * FROM demande WHERE idUtilisateur = :idUtilisateur');
		$q->bindValue(':idUtilisateur', $idUser, PDO::PARAM_INT);
		$q->execute();
		while ($donnee = $q->fetch(PDO::FETCH_ASSOC)) {
			$tabDemandesEnvoyees[] = new Demande($donnee);
		}
		return $tabDemandesEnvoyees;
	}


	/**
	 * Fonction pour updater les values à une demande
	 * utiliser pour répondre au candidature : refuser ou accepter
	 * @param $column, $value, Demande $demande
	 * 
	 */
	public function update($column, $value, Demande $demande){
		$q = $this->pdo->prepare('UPDATE demande SET '.$column.'=:value WHERE id=:id' );
		$q->bindValue(':value', $value, PDO::PARAM_INT );
		$q->bindValue(':id', $demande->getId(), PDO::PARAM_INT);
		$q->execute();
	}

	/**
	 * Fonction pour effacer les demandes lié à un projet
	 * @param idProjet
	 */
	public function deleteListDemandesOfProjet($idProjet){
		$q = $this->pdo->prepare("DELETE FROM demande WHERE idProjet = :idProjet");
		$q->bindValue(':idProjet', $idProject, PDO::PARAM_INT);
		$q->execute();
	}

}
 ?>