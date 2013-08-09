<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	register_shutdown_function(function() {
	    $lastError = error_get_last();

	    if (!empty($lastError) && $lastError['type'] == E_ERROR) {
	        header('Status: 500 Internal Server Error');
	        header('HTTP/1.0 500 Internal Server Error');
	    }
	});

	require_once('config/constants.php');
	foreach(glob("lib/*.php") as $file){
    	require_once($file);
	}
	foreach(glob("app/controllers/*.php") as $file){
    	require_once($file);
	}
	foreach(glob("app/models/*.php") as $file){
    	require_once($file);
	}
	$parser = new URLParser(BASE_URI);
	if($parser->getController()==''){
		define('CONTROLLER',ucfirst(DEFAULT_CONTROLLER).'Controller');
		define('ACTION','index');
	}else{
		define('CONTROLLER',ucfirst($parser->getController()).'Controller');
		if($parser->getAction()==''){
			define('ACTION','index');
		}else{
			define('ACTION',$parser->getAction());
		}
	}
	if(class_exists(CONTROLLER)){
		$classname = CONTROLLER;
		$methodname = ACTION;
		$controller = new $classname();
		if(method_exists($controller, $methodname)){
			$controller->$methodname();
		}else{
			require_once('404.html');
		}
	}else{
		require_once('404.html');
	}
?>