<?php 

	/**
	* LE ROOTER DU SITE
	*/

	// recuperer le lien URL
	$controller = empty($_GET['controller']) ? 'accueil' : $_GET['controller'];
	$action = empty($_GET['action']) ? 'index' : $_GET['action'];
	$params = empty($_GET['params']) ? array() : array_filter(explode('/', $_GET['params']));

	
	
	// si le controller ou l'action n'existe pas
	// redirectionner vers la racine du site
	// controller = accueil action= index
	if (!is_file('controllers/'.$controller.'_c.php')) {
		$controller = 'accueil';
		if (!method_exists($controller, $action)) {
			$action = 'index';
		} 
	}

	
	include 'core/controller.php';
	include 'core/model.php';
	include 'core/entity.php';
	include 'controllers/'.$controller.'_c.php';
	
	function chargerClasse($className){
		include 'entities/'.$className.'.php';
	}

	spl_autoload_register('chargerClasse');

	define('CONTROLLER', $controller);
	define('ACTION', $action);
	define('WEBROOT', str_replace('index.php', '', $_SERVER['SCRIPT_NAME'] ));


	$controllerName = ucfirst($controller).'_c';

	//executer les elements de url
	call_user_func_array([new $controllerName, $action], $params);




	
 