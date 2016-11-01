<?php 
/**
* 
*/
class Accueil_c extends Controller{
	public function index(){
		$this->view();
	}

	public function contact(){
		$this->view('contact');
	}

	public function copyleft(){
		$this->view('copyleft');
	}

}
 ?>