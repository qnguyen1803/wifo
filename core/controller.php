<?php 
/**
* 
*/
abstract class Controller
{	

	protected function view($fichier = ACTION){
		$fichier = 'views/'.CONTROLLER.'/'.ACTION.'.php';
		if (!is_file($fichier)) {
			die (' cette page de view n\'existe pas ');
		}
		include "views/head.php";
		include "views/loadScript.php";
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