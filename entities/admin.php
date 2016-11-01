<?php 
/**
* Classe Utilisateur recupère les caractères dans le tableau 
* Utilisateur de la bdd et les hydrater dans l'objet utilisateur
*
* 
*/
class Admin extends Entity
{	
	private $_id, $_nom, $_prenom, $_pseudo, $_mdp, $_email;
	
	// FUNCTIONS GET
	public function getId(){return $this->_id;}
	public function getNom(){return $this->_nom;}
	public function getPrenom(){return $this->_prenom;}
	public function getPseudo(){return $this->_pseudo;}
	public function getMdp(){return $this->_mdp;}
	public function getEmail(){return $this->_email;}

	//FUNCTIONS SET
	public function setId($id){
		$id = (int)$id;
		if ($id > 0) {
			$this->_id = $id;
		}	
	}

	public function setNom($nom){
		if (is_string($nom)) {
			$this->_nom = $nom;
		} 
	}

	public function setPrenom($prenom){
		if (is_string($prenom)) {
			$this->_prenom = $prenom;
		} 
	}

	public function setPseudo($pseudo){	
		if (is_string($pseudo)) {
			$this->_pseudo = $pseudo;
		}
	} 

	public function setMdp($mdp){
		$this->_mdp = $mdp;
	}

	public function setEmail($email){
		if (is_string($email)) {
			$this->_email = $email;
		}
		
	}

}
 ?>