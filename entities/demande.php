<?php 
/**
* 
*/
class Demande extends Entity{
	private $_id, $_idUtilisateur, $_idProjet, $_message, $_reponse;

	public function getId(){return $this->_id;}
	public function getMessage(){return $this->_message;}
	public function getIdProjet(){return $this->_idProjet;}
	public function getIdUtilisateur(){return $this->_idUtilisateur;}
	public function getReponse(){return $this->_reponse;}


	//FUNCTIONS SET
	public function setId($id){
		$this->_id = $id;
	}

	public function setMessage($message){
		$this->_message = $message;
	}

	public function setIdProjet($idProjet){
		$this->_idProjet = $idProjet;
	}

	public function setIdUtilisateur($idUtilisateur){
		$this->_idUtilisateur = $idUtilisateur;
	}

	public function setReponse($reponse){
		$this->_reponse = $reponse;
	}
}// fin class
 ?>