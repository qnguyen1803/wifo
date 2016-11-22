<?php 
/**
* la classe Utilisateur_m gere les actions input 
* output des donnees du tableau utilsateur dans la * bdd en manipulant la classe utilisteur dans 
* classes/utilsateur.php
* 
* @param Utilsateur
*/
class Utilisateur_m extends Model
{
	/**requete inscription
	*
	* 
	*/
	public function add(Utilisateur $user){
		$q = $this->pdo->prepare("INSERT INTO utilisateur(nom, prenom, pseudo, mdp, email, sexe, favori, telephone, metier, competences, descriptionSup, dateCreation, derniereConnexion, avatar) VALUES (:nom, :prenom, :pseudo, :mdp, :email, :sexe, :favori, :telephone, :metier, :competences, :descriptionSup, :dateCreation, :derniereConnexion, :avatar)");
		$q->bindValue(':nom', $user->getNom(), PDO::PARAM_STR);
		$q->bindValue(':prenom', $user->getPrenom(), PDO::PARAM_STR);
		$q->bindValue(':pseudo', $user->getPseudo(), PDO::PARAM_STR);
		$q->bindValue('mdp', $user->getMdp());
		$q->bindValue(':email', $user->getEmail(), PDO::PARAM_STR);
		$q->bindValue(':sexe', $user->getSexe(), PDO::PARAM_STR);
		$q->bindValue(':favori', $user->getFavori(), PDO::PARAM_STR);
		$q->bindValue(':telephone', $user->getTelephone(), PDO::PARAM_INT);
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

	public function recupMdp($mail){
		$q = $this->pdo->prepare('SELECT mdp FROM utilisateur WHERE email = :email');
		$q->bindValue(':email', $mail, PDO::PARAM_STR);
		$q->execute();
		$res = $q->fetch(PDO::FETCH_ASSOC);
		return $res;
	}

	public function get($id){
		$q = $this->pdo->prepare('SELECT * FROM utilisateur WHERE id=:id');
		$q->bindValue(':id', $id, PDO::PARAM_INT);
		$q->execute();
		$donnees = $q->fetch(PDO::FETCH_ASSOC);
		return new Utilisateur($donnees);
	}

	public function getList(){

	}

	public function delete(Utilisateur $user){
		$q = $this->pdo->query('DELETE FROM utilisateur WHERE id = '.$user->getId());
		$q->execute();
	}

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
		return $donnees;
		
	}// fin function 

/**
* function to verifie if user exist in dbb
*/
	public function exists($email){
		$q = $this->pdo->query("SELECT * FROM utilisateur WHERE email='".$email."'");
		$donnees = $q->fetch(PDO::FETCH_ASSOC);
		return $donnees;
	}// fin function

}



 ?>

