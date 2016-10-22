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
		$q = $this->pdo->prepare("INSERT INTO utilisateur(nom, prenom, pseudo, mdp, email, sexe, favori, telephone, metier, competences, description_sup) VALUES (:nom, :prenom, :pseudo, :mdp, :email, :sexe, :favori, :telephone, :metier, :competences, :description_sup)");
		$q->bindValue(':nom', $user->getNom(), PDO::PARAM_STR);
		$q->bindValue(':prenom', $user->getPrenom(), PDO::PARAM_STR);
		$q->bindValue(':pseudo', $user->getPseudo(), PDO::PARAM_STR);
		$q->bindValue('mdp', $user->getMdp());
		$q->bindValue(':email', $user->getEmail(), PDO::PARAM_STR);
		$q->bindValue(':sexe', $user->getSexe(), PDO::PARAM_STR);
		$q->bindValue(':favori', $user->getFavori(), PDO::PARAM_STR);
		$q->bindValue(':telephone', $user->getTelephone(), PDO::PARAM_INT);
		$q->bindValue(':metier', $user->getMetier(), PDO::PARAM_STR);
		$q->bindValue(':competences', $user->getCompetences());
		$q->bindValue(':description_sup', $user->getDescription_sup());

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

	public function get(){

	}

	public function getList(){

	}

	public function delete(){

	}

	public function update(){
		
	}
}
 ?>