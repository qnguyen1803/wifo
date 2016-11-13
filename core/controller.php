<?php 
/**
* 
*/
abstract class Controller
{	
	// public function __construct($foo = null)
	// {
	// 	$this->foo = $foo;
	// }
	protected function view($fichier = ACTION){
		$fichier = 'views/'.CONTROLLER.'/'.ACTION.'.php';
		if (!is_file($fichier)) {
			die (' cette page de view n\'existe pas ');
		}
		include $fichier;
	}

	protected function model($nomModel){
		$file = 'models/'.$nomModel.'.php';
		include $file;
		$modelName = ucfirst($nomModel);
		return new $modelName;
	}
}
 ?>