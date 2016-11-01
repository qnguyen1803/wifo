<?php 
/**
* ENTITE Projet
*
*/

class Projet extends Entity
{	
	private $_id, $_titre, $_description, $_dateDePub, $_imageIllustration, $_videoIllustration, $_compteur, $membres, $_idUtilisateur;
	

	// FUNCTIONS GET
	public function getId(){return $this->_id;}
	public function getTitre(){return $this->_titre;}
	public function getDescription(){return $this->_description;}
	public function getDateDePub(){return $this->_dateDePub;}
	public function getImageIllustration(){return $this->_imageIllustration;}
	public function getVideoIllustration(){return $this->_videoIllustration;}
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
		if (is_string($titre)) {
			$this->_titre = $titre;
		} 
	}

	public function setDescription($description){
		if (is_string($description)) {
			$this->_description = $description;
		} 
	}

	public function getDateDePub($dateDePub){	
			$this->_dateDePub = $dateDePub;
	} 

	public function setImageIllustration($imageIllustration){
			$this->_imageIllustration = $imageIllustration;
	}

	public function setVideoIllustration($videoIllustration){
			$this->_videoIllustration = $videoIllustration;}

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