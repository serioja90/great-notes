<?php
	class Lesson extends Model{
		protected $table_name = "lessons";
		protected $primary_key = "id";

		public static function add_lesson($params){
			if(self::validate($params)){
				$result = self::execute(
					"INSERT INTO lessons (course_code,date,lesson_start,lesson_end,classroom) VALUES ($1,$2,$3,$4,$5)",
					array($params['course'],$params['date'],$params['lesson_start'],$params['lesson_end'],$params['classroom'])
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

		public static function update($params){
			if(self::validate($params)){
				$result = self::execute(
					"UPDATE lessons SET
						date = $1,
						lesson_start = $2,
						lesson_end = $3,
						classroom = $4
					WHERE id=$5",
					array($params['date'],$params['lesson_start'],$params['lesson_end'],$params['classroom'],$params['id'])
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
			if(!isset($params['course']) || $params['course']==""){
				push_error("Codice corso non valido.");
				$valid = false;
			}
			if(!isset($params['date']) || $params['date']==""){
				push_error("Il campo 'Data Lezione' non può essere vuoto.");
				$valid = false;
			}
			if(!isset($params['lesson_start']) || $params['lesson_start']==""){
				push_error("Il campo 'Inizio Lezione' non può essere vuoto.");
				$valid = false;
			}
			if(!isset($params['lesson_end']) || $params['lesson_end']==""){
				push_error("Il campo 'Fine Lezione' non può essere vuoto.");
				$valid = false;
			}
			if(isset($params['lesson_start']) && $params['lesson_start']!="" && isset($params['lesson_end']) && $params['lesson_end']!=""){
				$lesson_start = new DateTime($params['lesson_start']);
				$lesson_end = new DateTime($params['lesson_end']);
				if($lesson_start > $lesson_end){
					push_error("L'ora di inizio della lezione deve essere inferiore a quella della fine della lezione.");
					$valid = false;
				}
			}
			if(!isset($params['classroom']) || $params['classroom']==""){
				push_error("Il campo 'Aula' non può essere vuoto.");
				$valid = false;
			}
			return $valid;
		}
	}
?>