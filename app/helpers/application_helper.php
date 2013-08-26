<?php
	function user_signed_in(){
		return isset($_SESSION['current_user']);
	}

	function current_user(){
		return $_SESSION['current_user'];
	}

	function controller(){
		return $_SESSION['controller'];
	}

	function action(){
		return $_SESSION['action'];
	}

	function push_error($msg){
		array_push($_SESSION['errors'],$msg);
	}

	function push_notice($msg){
		array_push($_SESSION['notice'],$msg);
	}

	function errors_empty(){
		return empty($_SESSION['errors']);
	}

	function get_errors(){
		return $_SESSION['errors'];
	}

	function notice_empty(){
		return empty($_SESSION['notice']);
	}

	function get_notice(){
		return $_SESSION['notice'];
	}

	function reset_errors(){
		$_SESSION['errors'] = array();
	}

	function reset_notice(){
		$_SESSION['notice'] = array();
	}
?>