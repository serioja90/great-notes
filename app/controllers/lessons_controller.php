<?php
  class LessonsController extends ApplicationController{
    public function index(){
      $course = Course::find($this->params['course'])[0];
      if(isset($this->params['course']) && trim($this->params['course'])!="" && isset($course)){
        $lessons = Lesson::find(
          array(
            'conditions' => 'course_code=$1',
            'params' => array($this->params['course']),
            'order' => 'date, lesson_start, classroom'
          )
        );
        $this->render(array('locals' => get_defined_vars()));
      }else{
        push_error("Impossibile trovare il corso con il codice '".$this->params['course']."'.");
        header("location: /courses/index");
      }
    }

    public function new_lesson(){
      if(!user_signed_in()){
        push_error("Accesso negato");
        header("location: courses/index");
      }else{
        $this->render(array('locals' => get_defined_vars(), 'action' => 'new'));
      }
    }
  }
?>