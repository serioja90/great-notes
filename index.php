<?php
	session_start();
	if(!isset($_SESSION['errors'])){
		$_SESSION['errors'] = array();
	}
	if(!isset($_SESSION['notice'])){
		$_SESSION['notice'] = array();
	}
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
    
    foreach (glob("app/helpers/*.php") as $file) {
    	require_once($file);
    }

	foreach(glob("app/controllers/*.php") as $file){
    	require_once($file);
	}

	foreach(glob("app/models/*.php") as $file){
    	require_once($file);
	}

	$parser = new URLParser(BASE_URI);
	$_SESSION['parser'] = $parser;
	if($parser->getController()==''){
		$_SESSION['controller'] = DEFAULT_CONTROLLER;
		$_SESSION['action'] = 'index';
	}else{
		$_SESSION['controller'] = $parser->getController();
		if($parser->getAction()==''){
			$_SESSION['action'] = 'index';
		}else{
			$_SESSION['action'] = $parser->getAction();
		}
	}
	if(class_exists(ucfirst($_SESSION['controller']).'Controller')){
		$classname = ucfirst($_SESSION['controller']).'Controller';
		$methodname = $_SESSION['action'];
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