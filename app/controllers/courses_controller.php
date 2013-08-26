<?php
	class CoursesController extends ApplicationController{
		public function index(){
			$courses = Course::find();
			$this->render(array('locals' => get_defined_vars()));
		}

		public function create(){
			push_notice("Corso aggiunto con successo. [Codice: $this->params['code']]");
			header("location: /courses/index");
		}
	}
?>	