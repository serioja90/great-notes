<?php
  class NotesController extends ApplicationController{
    public function index(){
      $notes = Note::find();
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