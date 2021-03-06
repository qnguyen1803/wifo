<?php 
	class Categorie_m extends Model{

		/**
		 * Fonction qui retourne le categorie pour l'affichage * l'infos de l'image
		 * @param  idImage
		 * @return new Categorie
		 *
		 */
		public function get($idImage){
			$q = $this->pdo->prepare('SELECT * FROM categorie WHERE id=:id');
			$q->bindValue(':id', $idImage, PDO::PARAM_INT);
			$q->execute();
			$donnees = $q->fetch(PDO::FETCH_ASSOC);
			return new Categorie($donnees);
		}

		/**
		 * Fonction qui retourne la liste de tous les catégories
		 * affichage dans la page uploadImage et imageCollection
		 * @return tableau de tous les catégories
		 *
		 */
		public function getAll(){
			$resultsCate = [];
			$q = $this->pdo->query('SELECT * FROM categorie');
			while ($donnee = $q->fetch(PDO::FETCH_ASSOC)) {
				$resultsCate[] = new Categorie($donnee);
			}
			return $resultsCate;
		}

		/** 
		 * Fonction qui retourne la liste des catégories
		 * pour les Images
		 * @return $results[]
		 */
		public function getAllCatImg(){
			$results = [];
			$q= $this->pdo->query('SELECT * FROM categorie LIMIT 0,24');
			while ($donnee = $q->fetch(PDO::FETCH_ASSOC)) {
				$results[] = new Categorie($donnee);
			}
			return $results;
		}

		/**
		 * Fonction qui retourne la liste des catégories
		 * pour les projets
		 * @return $results[]
		 *
		 */
		public function getAllCatPro(){
			$results = [];
			$q= $this->pdo->query('SELECT * FROM categorie LIMIT 25,8');
			while ($donnee = $q->fetch(PDO::FETCH_ASSOC)) {
				$results[] = new Categorie($donnee);
			}
			return $results;
		}

	} //class Categorie
 ?>