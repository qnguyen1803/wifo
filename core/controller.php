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
		require $fichier;
	}

	protected function model($nomModel){
		$file = 'models/'.$nomModel.'.php';
		return new $nomModel;
	}
}
 ?>