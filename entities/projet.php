<?php 
/**
* ENTITE Projet
*
*/

class Projet extends Entity
{	
	private $_id, $_titre, $_idCategorie, $_description, $_dateDePub, $_imageIllustration, $_compteur, $_membres, $_idUtilisateur;
	

	// FUNCTIONS GET
	public function getId(){return $this->_id;}
	public function getTitre(){return $this->_titre;}
	public function getIdCategorie(){return $this->_idCategorie;}
	public function getDescription(){return $this->_description;}
	public function getDateDePub(){return $this->_dateDePub;}
	public function getImageIllustration(){return $this->_imageIllustration;}
	public function getCompteur(){return $this->_compteur;}
	public function getMembres(){return $this->_membres;}
	public function getIdUtilisateur(){return $this->_idUtilisateur;}


	//FUNCTIONS SET
	public function setId($id){
		$id = (int)$id;
		if ($id > 0) {
			$this->_id = $id;
		}	
	}

	public function setTitre($titre){
		$this->_titre = $titre;
	}

	public function setIdCategorie($idCategorie){
		$this->_idCategorie = $idCategorie;
	}

	public function setDescription($description){
		if (is_string($description)) {
			$this->_description = $description;
		} 
	}

	public function setDateDePub($dateDePub){	
			$this->_dateDePub = $dateDePub;
	} 

	public function setImageIllustration($imageIllustration){
			$this->_imageIllustration = $imageIllustration;
	}

	public function setCompteur($compteur){
		$this->_compteur = $compteur;
	}
	public function setMembres($membres){
		$this->_membres = $membres;
	}
	public function setIdUtilisateur($idUtilisateur){
		$idUtilisateur = (int)$idUtilisateur;
		if ($idUtilisateur > 0) {
			$this->_idUtilisateur = $idUtilisateur;
		}
	}
}
 ?>