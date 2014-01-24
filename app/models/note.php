<?php
  class Note extends Model{
    protected $table_name = "notes";
    protected $primary_key = "id";

    public static function add_note($params){
      if(self::validate($params)){
        $result = self::execute(
          "INSERT INTO notes (lesson_id,user_id,content,created_at,updated_at) VALUES($1,$2,$3,NOW(),NOW())",
          array($params['lesson'],current_user()->id,$params['content'])
        );
        if(is_string($result)){
          push_error($result);
          return false;
        }else{
          return true;
        }
      }else{
        return false;
      }
    }

    static function validate($params){
      $valid = true;
      if(!isset($params['course']) || trim($params['course'])==''){
        push_error("Il 'Corso' non può essere vuoto!");
        $valid = false;
      }
      if(!isset($params['lesson']) || trim($params['lesson'])==''){
        push_error("La 'Lezione' non può essere vuota!");
        $valid = false;
      }
      if($valid){
        $lesson = Lesson::find(array(
          'conditions' => 'id=$1 AND course_code=$2',
          'params' => array($params['lesson'],$params['course'])
        ));
        if(count($lesson)==0){
          push_error("Lezione non valida per il corso selezionato!");
          $valid = false;
        }
      }
      return $valid;
    }
  }
?>