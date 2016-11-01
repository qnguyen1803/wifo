<?php 
/**
* 
*/
class Demande extends Entity{
	private $_id, $_idUtilisateur, $_idProjet, $_message, $_etat;

	public function getId(){return $this->_id;}
	public function getEtat(){return $this->_titre;}
	public function getMessage(){return $this->_message;}
	public function getIdProjet(){return $this->_idProjet;}
	public function getIdUtilisateur(){return $this->_idUtilisateur;}


	//FUNCTIONS SET
	public function setId($id){
		$id = (int)$id;
		if ($id > 0) {
			$this->_id = $id;
		}	
	}

	public function setEtat($etat){
		if (is_bool($etat)) {
			$this->_etat = $etat;
		} 
	}

	public function setMessage($message){
		if (is_string($message)) {
			$this->_message = $message;
		}
	}

	public function setIdProjet($idProjet){
		$idProjet = (int)$idProjet;
		if ($idProjet > 0) {
			$this->_idProjet = $idProjet;
		}
	}

	public function setIdUtilisateur($idUtilisateur){
		$idUtilisateur = (int)$idUtilisateur;
		if ($idUtilisateur > 0) {
			$this->_idUtilisateur = $idUtilisateur;
		}
	}
}// fin class
 ?>