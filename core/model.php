<?php 
	/**
	* 
	*/
	abstract class Model
	{
		protected $pdo;
		protected $tabName;
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
					echo "connexion succes";
				} catch (Exception $e) {
					die('Error: Echec de la connexion a la base de donnees'.$e->getMessage());
				}
			}
		}// fin function construct


	


	}
 ?>