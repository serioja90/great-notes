<?php
	class Lesson extends Model{
		protected $table_name = "lessons";
		protected $primary_key = "id";

		public static function add_lesson($params){
			if(self::validate($params)){
				$result = self::execute(
					"INSERT INTO lessons (date,course_id) VALUES ($1,$2)",
					array($params['date'],$params['course_id'])
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

		public static function validate($params){
			$valid = true;
			if(!isset($params['course_id']) || $params['course_id']==""){
				push_error("ID corso non valido.");
				$valid = false;
			}
			if(!isset($params['date']) || $params['date']==""){
				push_error("Il campo 'Data Lezione' non può essere vuoto.");
				$valid = false;
			}
			return $valid;
		}
	}
?>