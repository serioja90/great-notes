<?php
  class NotesController extends ApplicationController{
    public function index(){
      $find_conditions = array(
        'select' => 'n.*, l.date, l.classroom, c.code, c.name, u.username',
        'from' => "notes AS n
                   JOIN lessons AS l ON n.lesson_id=l.id
                   JOIN courses AS c ON l.course_code=c.code
                   JOIN users AS u ON n.user_id=u.id",
        'order' => 'n.created_at'
      );
      if(isset($this->params['lesson'])){
        $find_conditions['conditions'] = 'lesson_id=$1';
        $find_conditions['params'] = array($this->params['lesson']);
      }
      $notes = Note::find($find_conditions);
      $this->render(array('locals' => get_defined_vars()));
    }

    public function show(){
      $note = Note::find($this->params['note'])[0];
      if(!isset($note)){
        push_error("Appunti con id='".$this->params['note']."' non trovati!");
        header("location: /notes/index");
      }else{
        $lesson = Lesson::find($note->lesson_id)[0];
        $course = Course::find($lesson->course_code)[0];
        $this->render(array('locals' => get_defined_vars()));
      }
    }

    public function refresh_lessons(){
      $lessons = Lesson::find(array('conditions' => 'course_code=$1', 'params' => array($this->params['course'])));
      $this->render_partial(array('locals' => get_defined_vars()));
    }

    public function new_note(){
      if(!user_signed_in()){
        push_error("Accesso negato!");
        header("location: /notes/index");
      }else{
        $courses = Course::find(array('order' => 'name,code'));
        $lessons = [];
        if(count($courses) > 0){
          $lessons = Lesson::find(
            array(
              'conditions' => 'course_code=$1',
              'params' => array($courses[0]->code),
              'order' => 'date,lesson_start,lesson_end'
            )
          );
        }
        $this->render(array('locals' => get_defined_vars(), 'action' => 'new'));
      }
    }

    public function create(){
      if(!user_signed_in()){
        push_error("Accesso negato!");
        header("location: /notes/index");
      }else{
        if(Note::add_note($this->params)){
          push_notice("Appunti aggiunti con successo!");
          header("location: /notes/index?lesson=".$this->params['lesson']);
        }else{
          $this->render(array('locals' => get_defined_vars(), 'action' => 'new'));
        }
      }
    }

    public function edit(){
      if(!user_signed_in()){
        push_error("Accesso negato!");
        header("location: /notes/index");
      }else{
        $note = Note::find($this->params['note'])[0];
        if(isset($note)){
          if(current_user()->id==$note->user_id || current_user()->is_admin()){
            $courses = Course::find();
            $lesson = Lesson::find($note->lesson_id)[0];
            $lessons = Lesson::find(array('conditions' => 'course_code=$1', 'params' => array($lesson->course_code)));
            $this->render(array('locals' => get_defined_vars()));
          }else{
            push_error("Non hai i permessi necessari per modificare questi appunti!");
            header("location: /notes/index");
          }
        }else{
          push_error("Appunti da modificare non trovati!");
          header("location: /notes/index");
        }
      }
    }

    public function update(){
      if(!user_signed_in()){
        push_error("Accesso negato!");
        header("location: /notes/index");
      }else{
        $note = Note::find($this->params['note'])[0];
        if(isset($note)){
          if(current_user()->id==$note->user_id || current_user()->is_admin()){
            if(Note::update($this->params)){
              push_notice("Appunti aggiornati con successo!");
              header("location: /notes/show?note=".$this->params['note']);
            }else{
              $courses = Course::find();
              $lesson = Lesson::find($note->lesson_id)[0];
              $lessons = Lesson::find(array('conditions' => 'course_code=$1', 'params' => array($lesson->course_code)));
              $this->render(array('locals' => get_defined_vars(), 'action' => 'edit'));
            }
          }else{
            push_error("Non hai i permessi necessari per modificare questi appunti!");
            header("location: /notes/index");
          }
        }else{
          push_error("Appunti da modificare non trovati!");
          header("location: /notes/index");
        }
      }
    }

    public function delete(){
      if(!user_signed_in()){
        push_error("Accesso negato!");
      }else{
        Note::delete($this->params['note']);
      }
      header("location: /notes/index");
    }
  }
?>