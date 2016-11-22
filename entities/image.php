<?php 
/**
* Classe Image recupère les caractères dans le tableau 
* Image de la bdd et les hydrater dans l'objet utilisateur
* ENTITE image
*
*/
class Image extends Entity
{	
	private $_id, $_titre, $_description, $_dateDePub, $_repository, $_note, $_idCategorie, $_idUtilisateur;

	public function getId(){return $this->_id;}
	public function getTitre(){return $this->_titre;}
	public function getDescription(){return $this->_description;}
	public function getDateDePub(){return $this->_dateDePub;}
	public function getRepository(){return $this->_repository;}
	public function getNote(){return $this->_note;}
	public function getIdCategorie(){return $this->_idCategorie;}
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

	public function setDateDePub($dateDePub){	
			$this->_dateDePub = $dateDePub;
	} 

	public function setRepository($repository){
			$this->_repository = $repository;
	}

	public function setNote($note){
		$this->_note = $note;
	}
	public function setIdCategorie($idCategorie){
		$idCategorie = (int)$idCategorie;
		if ($idCategorie > 0) {
			$this->_idCategorie = $idCategorie;
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