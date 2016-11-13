<?php 
	/**
	* 
	*/
	class Model{
		protected $pdo;
		protected $className;

		public function __construct(){
			// connexion sur window WAMP
			if ($_SERVER['HTTP_HOST'] == 'localhost'){
				$host = 'localhost';
				$bdd = 'wifo';
				$login = 'root';
				$pass = '';	
			} else if ($_SERVER['HTTP_HOST'] == 'localhost:8888') {
				$host = 'localhost';
				$bdd = 'wifo';
				$login = 'root';
				$pass = '';	

				//empecher MAMP met les pages en cache
				opcache_reset();
			}

			// tester si la connexion PDO est déjà établie

			if (!isset($this->pdo)) {
				try {
					//option de connexion
					$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_LOCAL_INFILE =>true, PDO::ATTR_PERSISTENT => true );
					// faire fontionner 'LOAD LOCAL INFILE'


					//etablir la connexion
					$hostLink = 'mysql:host='.$host.';dbname='.$bdd;
					$this->pdo = new PDO($hostLink,$login, $pass, $options);
				} catch (Exception $e) {
					die('Error: Echec de la connexion a la base de donnees'.$e->getMessage());
				}
			}
		}// fin function construct

		// public function add($className){
			
		// 	switch ($className) {
		// 		case 'Utilisateur':
		// 			$q = $this->pdo->prepare('INSERT INTO utilisateur(nom, prenom, pseudo, mdp, email, sexe, favori, telephone, metier, competences, descriptionSup) VALUES (:nom, :prenom, :pseudo, :mdp, :email, :sexe, :favori, :telephone, :metier, :competences, :descriptionSup)');
		// 			$q->bindValue(':nom', $className->getNom(), PDO::PARAM_STR);
		// 			$q->bindValue(':prenom', $className->getPrenom(), PDO::PARAM_STR);
		// 			$q->bindValue(':pseudo', $className->getPseudo(), PDO::PARAM_STR);
		// 			$q->bindValue(':mdp', $className->getMdp() );
		// 			$q->bindValue(':email', $className->getEmail(), PDO::PARAM_STR);

		// 			$q->bindValue(':sexe', $className->getSexe(), PDO::PARAM_STR);
		// 			$q->bindValue(':favori', $className->getFavori(), PDO::PARAM_STR);
		// 			$q->bindValue(':telephone', $className->getTelephone(), PDO::PARAM_INT);
		// 			$q->bindValue(':metier', $className->getMetier(), PDO::PARAM_STR);
		// 			$q->bindValue(':competences', $className->getCompetences(), PDO::PARAM_STR);
		// 			$q->bindValue(':descriptionSup', $className->getDescriptionSup(), PDO::PARAM_STR);
		// 			$q->execute();

		// 			$className->setId($this->pdo->lastInsertId());
		// 			break;

		// 		case 'Demande':
		// 			$q = $this->pdo->prepare('INSERT INTO demande(idUtilisateur, idProjet, message, etat) VALUES (:idUtilisateur, :idProjet, :message, :etat)');
		// 			$q->bindValue(':idUtilisateur', $className->getIdUtilisateur(), PDO::PARAM_INT);
		// 			$q->bindValue(':idProjet', $className->getIdProjet(), PDO::PARAM_INT);
		// 			$q->bindValue(':message', $className->getMessage(), PDO::PARAM_STR);
		// 			$q->bindValue(':etat', $className->getEtat());
		// 			$q->execute();

		// 			$className->setId($this->pdo->lastInsertId());
		// 			break;

		// 		case 'Projet':

		// 			$q = $this->pdo->prepare('INSERT INTO projet(titre, description, dateDePub, imageIllustration, videoIllustration, compteur, membres, idUtilisateur) VALUES (:titre, :description, :dateDePub, :imageIllustration, :videoIllustration, :compteur, :membres, :idUtilisateur)');

		// 			$q->bindValue(':titre', $className->getTitre(), PDO::PARAM_STR);
		// 			$q->bindValue(':description', $className->getDescription(), PDO::PARAM_STR);
		// 			$q->bindValue(':dateDePub', $className->getDateDePub());
		// 			$q->bindValue(':imageIllustration', $className->getImageIllustration());
		// 			$q->bindValue(':videoIllustration', $className->getVideoIllustration());
		// 			$q->bindValue(':compteur', $className->getSexe());
		// 			$q->bindValue(':membres', $className->getMembres());
		// 			$q->bindValue(':idUtilisateur', $className->getIdUtilisateur(), PDO::PARAM_INT);
		// 			$q->execute();

		// 			$className->setId($this->pdo->lastInsertId());
		// 			break;

		// 		case 'Image':

		// 			$q = $this->pdo->prepare('INSERT INTO image(titre, description, dateDePub, format, taille, note, idCategorie, idUtilisateur) VALUES (:titre,:description, :dateDePub, :format, :taille, :note, :idCategorie, :idUtilisateur)');

		// 			$q->bindValue(':titre', $className->getTitre(), PDO::PARAM_STR);
		// 			$q->bindValue(':description', $className->getDescription(), PDO::PARAM_STR);
		// 			$q->bindValue(':dateDePub', $className->getDateDePub());
		// 			$q->bindValue(':format', $className->getFormat());
		// 			$q->bindValue(':taille', $className->getTaille());
		// 			$q->bindValue(':note', $className->getNote());
		// 			$q->bindValue(':idCategorie', $className->getIdCategorie(), PDO::PARAM_INT);
		// 			$q->bindValue(':idUtilisateur', $className->getIdUtilisateur(), PDO::PARAM_INT);
		// 			$q->execute();

		// 			$className->setId($this->pdo->lastInsertId());
		// 			break;
		// 	}
			
		// }

		// public function delete(){

		// }

		// public function update(){

		// }


	


	}
 ?>