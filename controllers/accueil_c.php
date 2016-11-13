<?php 
/**
* 
*/
class Accueil_c extends Controller{
	public function index(){
		session_start();
		$this->view();
	}

	public function contact(){
		session_start();
		$this->view('contact');
	}

	public function copyleft(){
		session_start();
		$this->view('copyleft');
	}

}
 ?>