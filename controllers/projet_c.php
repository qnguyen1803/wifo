<?php 
class Projet_c extends Controller{

	/**
	 * Fonction pour afficher la page collectionProjet
	 * 
	 */
	public function projetCollection(){
		$this->view('projetCollection');
	}

	/**
	 * Fonction pour renvoyer la liste des images selon des
	 * critères sélectionnés en évitant la répétition
	 * de la page complète imageCollection
	 * 
	 */
	public function projetCollectionAjax(){
	}

	/**
	 * Fonction pour afficher l'information d'un projet en 
	 * détail
	 *
	 */
	public function projetDetail(){
		$this->view('projetDetail');
	}	
}
 ?>