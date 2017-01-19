<?php 
class Utilisateur_m extends Model{
	/**
	* fonction ajouter un nouveau utilisateur dans la bdd
	* 
	* @param $user
	*/
	public function add(Utilisateur $user){
		$q = $this->pdo->prepare("INSERT INTO utilisateur(nom, prenom, pseudo, mdp, email, sexe, favori, telephone, metier, competences, descriptionSup, dateCreation, derniereConnexion, avatar) VALUES (:nom, :prenom, :pseudo, :mdp, :email, :sexe, :favori, :telephone, :metier, :competences, :descriptionSup, :dateCreation, :derniereConnexion, :avatar)");
		$q->bindValue(':nom', $user->getNom(), PDO::PARAM_STR);
		$q->bindValue(':prenom', $user->getPrenom(), PDO::PARAM_STR);
		$q->bindValue(':pseudo', $user->getPseudo(), PDO::PARAM_STR);
		$q->bindValue(':mdp', $user->getMdp());
		$q->bindValue(':email', $user->getEmail(), PDO::PARAM_STR);
		$q->bindValue(':sexe', $user->getSexe(), PDO::PARAM_STR);
		$q->bindValue(':favori', $user->getFavori(), PDO::PARAM_STR);
		$q->bindValue(':telephone', $user->getTelephone());
		$q->bindValue(':metier', $user->getMetier(), PDO::PARAM_STR);
		$q->bindValue(':competences', $user->getCompetences(), PDO::PARAM_STR);
		$q->bindValue(':descriptionSup', $user->getDescriptionSup(), PDO::PARAM_STR);
		$q->bindValue(':dateCreation', $user->getDateCreation());
		$q->bindValue(':derniereConnexion', $user->getDerniereConnexion());
		$q->bindValue(':avatar', $user->getAvatar());

		$q->execute();

		$user->hydrater(['id' => $this->pdo->lastInsertId()]);

		$q->closeCursor();
	}

	/**
	* 
	* @param $mail
	*/

	public function recupMdp($mail){
		$q = $this->pdo->prepare('SELECT mdp FROM utilisateur WHERE email = :email');
		$q->bindValue(':email', $mail, PDO::PARAM_STR);
		$q->execute();
		$res = $q->fetch(PDO::FETCH_ASSOC);
		return $res;
	}

	/**
	* Fonction qui retourne Utilisateur grace à son id
	* @param $id
	*/
	public function get($id){
		$q = $this->pdo->prepare('SELECT * FROM utilisateur WHERE id=:id');
		$q->bindValue(':id', $id, PDO::PARAM_INT);
		$q->execute();
		$donnees = $q->fetch(PDO::FETCH_ASSOC);
		return new Utilisateur($donnees);
	}

	/**
	 * Fonction get User par pseudo pour voir le profil d'un 
	 * auteur
	 *
	 * @param $pseudo
	 */
	public function getByPseudo($pseudo){
		$q = $this->pdo->prepare('SELECT * FROM utilisateur WHERE pseudo=:pseudo');
		$q->bindValue(':pseudo', $pseudo, PDO::PARAM_INT);
		$q->execute();
		$donnees = $q->fetch(PDO::FETCH_ASSOC);
		return new Utilisateur($donnees);
	}

	/**
	* Fonction qui retourne la liste de 5 derniers 
	* utilisateurs pour 
	* l'affichage dans la page d'accueil
	* @return resultsUsers[]
	*/

	public function getListRecents(){
		$resultsUsers = [];
		$q = $this->pdo->query('SELECT * FROM utilisateur ORDER BY dateCreation DESC LIMIT 4');
		while ($donnee = $q->fetch(PDO::FETCH_ASSOC)) {
			$resultsUsers[] = new Utilisateur($donnee);
		}
		return $resultsUsers;
	}

	/**
	* Fonction qui retourne la liste de tous 
	* les utilisateurs 
	* l'affichage dans la page authorsCollection
	* @return resultsUsers[]
	*/
	public function getList(){
		$resultsUsers = [];
		$q = $this->pdo->query('SELECT * FROM utilisateur');
		while ($donnee = $q->fetch(PDO::FETCH_ASSOC)) {
			$resultsUsers[] = new Utilisateur($donnee);
		}
		return $resultsUsers;
	}

	public function delete(Utilisateur $user){
		$q = $this->pdo->query('DELETE FROM utilisateur WHERE id = '.$user->getId());
		$q->execute();
	}

	/**
	 * Fonction pour updater les infos de l'utilisateur
	 * @param $column, $value, Utilisateur $user
	 * 
	 */
	public function update($column, $value, Utilisateur $user){
		$q = $this->pdo->prepare('UPDATE utilisateur SET '.$column.'=:value WHERE id=:id' );
		$q->bindValue(':value', $value );
		$q->bindValue(':id', $user->getId(), PDO::PARAM_INT);
		$q->execute();
	}

	/**
	*requete de connexion
	*
	* @param string $mail
	* @param string $mdp
	* @return les infos de l'utilisateur
	*/

	public function connexion($email, $mdp){
		$q = $this->pdo->query("SELECT * FROM utilisateur WHERE email='".$email."'AND mdp='".$mdp."'");
		$donnees = $q->fetch(PDO::FETCH_ASSOC);
		return new Utilisateur($donnees);	
	}// fin function 


	/**
	* fonction verifie si email existe déjà dans la bdd (pour 
	* l'inscription)
	* 
	* @param $email
	* @return user OR null
	*/
	public function existsEmail($email){
		$q = $this->pdo->query("SELECT * FROM utilisateur WHERE email='".$email."'");
		$donnees = $q->fetch(PDO::FETCH_ASSOC);
		return $donnees;
	}// fin function


	/**
	* fonction verifie si pseudo existe déjà dans la bdd (pour 
	* l'inscription)
	* 
	* @param $pseudo
	* @return user OR null
	*/
	public function existsPseudo($pseudo){
		$q = $this->pdo->query("SELECT * FROM utilisateur WHERE pseudo='".$pseudo."'");
		$donnees = $q->fetch(PDO::FETCH_ASSOC);
		return $donnees;
	}// fin function

}



 ?>

