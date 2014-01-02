<?php
  class CoursesController extends ApplicationController{
    public function index(){
      $courses = Course::find();
      $this->render(array('locals' => get_defined_vars()));
    }

    public function details(){
      $course = Course::find($this->params['id'])[0];
      $lessons = Lesson::find(array('conditions' => 'course_id=$1', 'params' => array($this->params['id'])));
      $this->render(array('locals' => get_defined_vars()));
    }

    public function add_lesson(){
      if(user_signed_in()){
        $result = Lesson::add_lesson($this->params);
        if($result){
          push_notice("Lezione aggiunta con successo.");
        }
      }else{
        push_error("Accesso negato.");
      }
      header("location: /courses/details?id=".$this->params['course_id']);
    }

    public function new_course(){
      if(!user_signed_in()){
        push_error("Accesso negato.");
        header("location: /courses/index");
      }else{
        $this->render(array('locals' => get_defined_vars(), 'action' => 'new'));
      }
    }

    public function create(){
      if(Course::add_course($this->params)){
        push_notice("Corso aggiunto con successo.");
      }
      header("location: /courses/index");
    }

    public function edit(){
      if(user_signed_in() && current_user()->is_admin()){
        $course = Course::find($this->params['id']);
        if(empty($course)){
          push_error("Corso non trovato.");
          unset($course);
        }else{
          $course = $course[0];
        }
      }else{
        push_error("Accesso negato.");
      }
      $this->render_partial(array('locals' => get_defined_vars()));
    }

    public function update(){
      if(user_signed_in() && current_user()->is_admin()){
        if(Course::update($this->params)){
          push_notice("Il corso '".$this->params['code']."' è stato aggiornato con successo.");
        }
      }else{
        push_error("Accesso negato.");
      }
      header("location: /courses/index");
    }

    public function delete(){
      if(user_signed_in() && current_user()->is_admin()){
        $course = Course::find($this->params['id']);
        $result = Course::delete($this->params['id']);
        if($result){
          push_notice("Il corso '".$course[0]->code."' è stato cancellato con successo.");
        }
      }else{
        push_error("Accesso negato.");
      }
      header("location: /courses/index");
    }
  }
?>  