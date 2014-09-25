<?php
  class CoursesController extends ApplicationController{
    public function index(){
      $courses = Course::find(
        array(
          'select' => 'c.code, c.name, c.professor, COALESCE(l.lessons,0) AS lessons',
          'from' => 'courses AS c
                      LEFT OUTER JOIN
                    (SELECT course_code, COUNT(*) AS lessons
                      FROM lessons AS l
                      GROUP BY course_code
                    ) AS l
                      ON c.code=l.course_code',
          'group' => 'c.code, c.name, c.professor, l.lessons',
          'order' => 'c.name, c.code'
        )
      );
      $this->render(array('locals' => get_defined_vars()));
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
      if(!user_signed_in()){
        push_error("Accesso negato.");
        header("location: /courses/index");
      }else{
        if(Course::add_course($this->params)){
          push_notice("Corso aggiunto con successo.");
          header("location: /courses/index");
        }else{
          $this->render(array('locals' => get_defined_vars(), 'action' => 'new'));
        }
      }
    }

    public function edit(){
      if(user_signed_in() && current_user()->is_admin()){
        $course = Course::find($this->params['course']);
        if(empty($course)){
          push_error("Corso non trovato.");
          unset($course);
        }else{
          $course = $course[0];
        }
      }else{
        push_error("Accesso negato.");
      }
      $this->render(array('locals' => get_defined_vars()));
    }

    public function update(){
      if(user_signed_in() && current_user()->is_admin()){
        if(Course::update($this->params)){
          push_notice("Il corso '".$this->params['code']."' è stato aggiornato con successo.");
          header("location: /courses/index");
        }else{
          $course = Course::find($this->params['course'])[0];
          $this->render(array('locals' => get_defined_vars(), 'action' => 'edit'));
        }
      }else{
        push_error("Accesso negato.");
        header("location: /courses/index");
      }
    }

    public function delete(){
      if(user_signed_in() && current_user()->is_admin()){
        $course = Course::find($this->params['course'])[0];
        if(isset($course)){
          $result = Course::delete($course->code);
          if($result){
            push_notice("Il corso '".$course->code."' è stato cancellato con successo.");
          }
        }else{
          push_error("Impossibile trovare il corso con il codice '".$course->code."'.");
        }
      }else{
        push_error("Accesso negato.");
      }
      header("location: /courses/index");
    }

    public function lessons(){
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
      if(user_signed_in()){

      }else{
        push_error("Accesso negato.");
        header("location: /courses/lessons");
      }
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
      header("location: /courses/index?id=".$this->params['course_id']);
    }
  }
?>
