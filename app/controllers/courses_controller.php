<?php
	class CoursesController extends ApplicationController{
		public function index(){
			$courses = Course::find();
			$this->render(array('locals' => get_defined_vars()));
		}
	}
?>	