<?php
	class NotesController extends ApplicationController{
		public function index(){
			$this->render(array('locals' => get_defined_vars()));
		}
	}
?>