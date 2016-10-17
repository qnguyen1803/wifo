<?php 
/**
* 
*/
class Accueil extends Controller{
	public function index(){
		$this->view();
	}

	public function contact(){
		$this->view('contact');
	}
}
 ?>