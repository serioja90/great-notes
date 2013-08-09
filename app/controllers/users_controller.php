<?php
	class UsersController extends ApplicationController{
		public function index(){
			$this->render(array('locals' => get_defined_vars()));	
		}
	}
?>