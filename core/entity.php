<?php 
/**
* 
*/
class Entity{
	
	function __construct($donnees){
		$this->hydrater($donnees);
	}

	public function hydrater(array $donnees){
		foreach ($donnees as $key => $value) {
			$method = 'set'.ucfirst($key);
			if (method_exists($this, $method)) {
				$this->$method($value);
			}
		}
	}
}
 ?>