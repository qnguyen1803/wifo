<?php 
/**
* ENTITE Commentaire
*
*/

class Commentaire extends Entity
{	
	private $_id, $_nomPrenom, $_contenu, $_dateDePub, $_idImage, $_idProjet;

	// FUNCTIONS GET
	public function getId(){return $this->_id;}
	public function getNomPrenom(){return $this->_nomPrenom;}
	public function getContenu(){return $this->_contenu;}
	public function getDateDePub(){return $this->_dateDePub;}
	public function getIdImage(){return $this->_idImage;}
	public function getIdProjet(){return $this->_idProjet;}


	//FUNCTIONS SET
	public function setId($id){
		$this->_id = $id;
	}

	public function setNomPrenom($nomPrenom){
		$this->_nomPrenom = $nomPrenom;
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

	public function setProjet($idProjet){
		$this->_idProjet = $idProjet;
	}

}
 ?>