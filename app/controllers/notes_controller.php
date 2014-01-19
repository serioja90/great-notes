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

    public function new_note(){
      if(!user_signed_in()){
        push_error("Accesso negato!");
        header("location: /notes/index");
      }else{
        $this->render(array('locals' => get_defined_vars(), 'action' => 'new'));
      }
    }
  }
?>