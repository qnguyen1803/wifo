<?php 
/**
* 
*/
abstract class Controller
{	
	protected $vars = array();
	protected $model = NULL;

	/** 
	 * constructeur (charger le model principal)
	 *
	 */
	public function __construct(){

		session_start();
		$modelName = substr(get_class($this), 0, -1);
		$modelName = $modelName.'m';

		if (file_exists(strtolower('models/'.$modelName.'.php'))) {
			include(strtolower('models/'.$modelName.'.php'));
			$this->model = new $modelName();
		}
	}

	/**
	 * Fonction merger tableaux
	 *
	 * @param array $tab
	 */
	public function ajouterVar($tab){
		$this->vars = array_merge($this->vars, $tab);
	}


	/**
	 * Fonction appeller la vue correspondante
	 *
	 * @param $fichierView
	 */
	protected function view($fichier = ACTION){
		$fichier = 'views/'.CONTROLLER.'/'.ACTION.'.php';
		if (!is_file($fichier)) {
			die (' cette page de view n\'existe pas ');
		}
	
		include "views/loadScript.php";
		include 'views/navigation.php';
		include $fichier;
		include 'views/footer.php';
	}

	/**
	 * Fonction appeller le model qui correspond
	 *
	 * @param $nomModel
	 */
	protected function model($nomModel){
		// accéder au fichier qui contient le model
		$file = 'models/'.$nomModel.'.php';
		include $file;

		// charger la classe du model
		$modelName = ucfirst($nomModel);
		return new $modelName;
	}
}
 ?>