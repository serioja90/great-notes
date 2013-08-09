<?php
	
	class ApplicationController{
		protected $params = null;
		protected $layout = "application";
		public function __construct(){
			$this->params = array_merge($_GET,$_POST);
			// authenticate user
			// save user's info to the session
		}

		protected function render($args){
			list(,$caller) = debug_backtrace(false);
			$action = $caller['function'];
			$controller = preg_replace('/controller$/','',strtolower($caller['class']));
			if(isset($args)){
				if(isset($args['action'])){
					$action = $args['action'];
				}
				if(isset($args['controller'])){
					$controller = $args['controller'];
				}
				if(isset($args['locals'])){
					extract($args['locals']);
				}
			}	
			ob_start();
			if(file_exists('app/views/'.$controller.'/'.$action.'.php')){
				require_once('app/views/'.$controller.'/'.$action.'.php');
			}else{
				require_once('404.html');
			}
			$output = ob_get_clean();
			if(file_exists('app/views/layouts/'.$this->layout.'.php')){
				require_once('app/views/layouts/'.$this->layout.'.php');
			}else{
				require_once('404.html');
			}
		}

		protected function render_partial($args){
			list(,$caller) = debug_backtrace(false);
			$action = $caller['function'];
			$controller = preg_replace('/controller$/','',strtolower($caller['class']));
			if(isset($args)){
				if(isset($args['action'])){
					$action = $args['action'];
				}
				if(isset($args['controller'])){
					$controller = $args['controller'];
				}
				if(isset($args['locals'])){
					extract($args['locals']);
				}
			}
			if(file_exists('app/views/'.$controller.'/'.$action.'.php')){
				require_once('app/views/'.$controller.'/'.$action.'.php');
			}else{
				require_once('404.html');
			}
		}
	}
?>