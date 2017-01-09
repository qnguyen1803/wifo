<?php 
/**
* ENTITE Categorie
*
*/

class Categorie extends Entity
{	
	private $_id, $_nom;

	// FUNCTIONS GET
	public function getId(){return $this->_id;}
	public function getNom(){return $this->_nom;}

	//FUNCTIONS SET
	public function setId($id){
		$id = (int)$id;
		if ($id > 0) {
			$this->_id = $id;
		}	
	}

	public function setnom($nom){
		if (is_string($nom)) {
			$this->_nom = $nom;
		} 
	}
}
 ?>