<?php 
/**
* ENTITE Commentaire
*
*/

class Commentaire extends Entity
{	
	private $_id, $_idUtilisateur, $_vote, $_sujet, $_contenu, $_dateDePub, $_idImage, $_idProjet;

	// FUNCTIONS GET
	public function getId(){return $this->_id;}
	public function getIdUtilisateur(){return $this->_idUtilisateur;}
	public function getSujet(){return $this->_sujet;}
	public function getVote(){return $this->_vote;}
	public function getContenu(){return $this->_contenu;}
	public function getDateDePub(){return $this->_dateDePub;}
	public function getIdImage(){return $this->_idImage;}
	public function getIdProjet(){return $this->_idProjet;}


	//FUNCTIONS SET
	public function setId($id){
		$this->_id = $id;
	}

	public function setIdUtilisateur($idUtilisateur){
		$this->_idUtilisateur = $idUtilisateur;
	}

	public function setVote($vote){
		$this->_vote = $vote;
	}

	public function setSujet($sujet){
		$this->_sujet = $sujet;
	}

	public function setContenu($contenu){
		$this->_contenu = $contenu;
	}

	public function setDateDePub($dateDePub){
		$this->_dateDePub = $dateDePub;
	}

	public function setIdImage($idImage){
		$this->_idImage = $idImage;
	}

	public function setIdProjet($idProjet){
		$this->_idProjet = $idProjet;
	}

}
 ?>