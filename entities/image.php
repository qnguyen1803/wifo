<?php 
/**
* Classe Image recupère les caractères dans le tableau 
* Image de la bdd et les hydrater dans l'objet utilisateur
* ENTITE image
*
*/
class Image
{	
	private $_id, $_nom, $_prenom, $_pseudo, $_mdp, $_email, $_sexe, $_favori, $_telephone, $_metier, $_competences, $_description_sup;
	
	function __construct($donnees){
		$this->hydrater($donnees);
	}

	public function hydrater(array $donnees){
		foreach ($donnees as $key => $value) {
			$method = 'set'.ucfirst($key);
			if (method_exists($this, $method)) {
				$this->$method($value);
			}
		}
	}

	// FUNCTIONS GET
	public function getId(){return $this->_id;}
	public function getNom(){return $this->_nom;}
	public function getPrenom(){return $this->_prenom;}
	public function getPseudo(){return $this->_pseudo;}
	public function getMdp(){return $this->_mdp;}
	public function getEmail(){return $this->_email;}
	public function getSexe(){return $this->_sexe;}
	public function getFavori(){return $this->_favori;}
	public function getTelephone(){return $this->_telephone;}
	public function getMetier(){return $this->_metier;}
	public function getCompetences(){return $this->_competences;}
	public function getDescription_sup(){return $this->sup;}

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
		$this->_email = $email;
	}

	public function setSexe($sexe){
		$this->_sexe= $sexe;
	}

	public function setFavori($favori){
		$this->_favori = $favori;
	}

	public function setTelephone($telephone){
		$this->_telephone = $telephone;
	}

	public function setMetier($metier){

		$this->_metier= $metier;
	}

	public function setCompetences($competences){
		$this->_competences = $competences;
	}

	public function setDescription_sup($description_sup){
		$this->_description_sup = $description_sup;
	}
}
 ?>