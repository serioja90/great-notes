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
        push_error("Accesso negato.");
        header("location: /lessons/index?course=".$this->params['course']);
      }else{
        $this->render(array('locals' => get_defined_vars(), 'action' => 'new'));
      }
    }

    public function create(){
      if(!user_signed_in()){
        push_error("Accesso negato.");
        header("location: /lessons/index?course=".$this->params['course']);
      }else{
        if(Lesson::add_lesson($this->params)){
          push_notice("Lezione aggiunta con successo!");
          header("location: /lessons/index?course=".$this->params['course']);
        }else{
          $this->render(array('locals' => get_defined_vars(), 'action' => 'new'));
        }
      }
    }

    public function edit(){
      $lesson = Lesson::find($this->params['id'])[0];
      if(!user_signed_in()){
        push_error("Accesso negato.");
        header("location: /lessons/index?course=".$this->params['course']);
      }else{
        if(isset($lesson)){
          $this->render(array('locals' => get_defined_vars()));
        }else{
          push_error("Impossibile trovare la lezione con id='".$this->params['id']."'!");
          header("location: /lessons/index?course=".$this->params['course']);
        }
      }
    }

    public function update(){
      if(!user_signed_in()){
        push_error("Accesso negato.");
        header("location: /lessons/index?course=".$this->params['course']);
      }else{
        if(Lesson::update($this->params)){
          push_notice("Lezione aggiornata con successo!");
          header("location: /lessons/index?course=".$this->params['course']);
        }else{
          $lesson = Lesson::find($this->params['id'])[0];
          $this->render(array('locals' => get_defined_vars(), 'action' => 'edit'));
        }
      }
    }

    public function delete(){
      if(!user_signed_in()){
        push_error("Accesso negato!");
      }else{
        if(Lesson::delete($this->params['id'])){
          push_notice("Lezione cancellata con successo!");
        }
      }
      header("location: /lessons/index?course=".$this->params['course']);
    }
  }
?>