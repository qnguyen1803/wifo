<?php 
/**
* ENTITE Commentaire
*
*/

class Commentaire extends Entity
{	
	private private $_id, $_contenu, $_date, $_idUtilisateur;

	// FUNCTIONS GET
	public function getId(){return $this->_id;}
	public function getContenu(){return $this->_contenu;}
	public function getDate(){return $this->_date;}
	public function getIdUtilisateur(){return $this->_idUtilisateur;}


	//FUNCTIONS SET
	public function setId($id){
		$id = (int)$id;
		if ($id > 0) {
			$this->_id = $id;
		}	
	}

	public function setContenu($contenu){
		if (is_string($contenu)) {
			$this->_contenu = $contenu;
		} 
	}

	public function setDate($date){
		if (is_string($date)) {
			$this->_date = $date;
		} 
	}

	}
	public function setIdUtilisateur($idUtilisateur){
		$idUtilisateur = (int)$idUtilisateur;
		if ($idUtilisateur > 0) {
			$this->_idUtilisateur = $idUtilisateur;
		}
	}
}
 ?>