<?php
	class NotesController extends ApplicationController{
		public function index(){
			$notes = Note::find();
			$this->render(array('locals' => get_defined_vars()));
		}
	}
?>