<?php
	class Course extends Model{
		protected $table_name = "courses";
		protected $primary_key = "code";

		static function add_course($params){
			if(self::validate($params)){
				// check if the 'code' is unique
				$courses = self::find($params['code']);
				if(count($courses) > 0){
					push_error("Esiste già un corso con il codice '".$params['code']."'!");
					return false;
				}
				$result = self::execute(
					"INSERT INTO courses (code,name,professor) VALUES ($1,$2,$3)",
					array($params['code'],$params['name'],$params['professor'])
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

		static function update($params){
			if(self::validate($params)){
				$result = self::execute(
					"UPDATE courses SET name=$1, professor=$2 WHERE code=$3",
					array($params['name'],$params['professor'],$params['code'])
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

		static function delete($id){
			self::execute("BEGIN");
			$result = self::execute("DELETE FROM courses WHERE code=$1",array($id));
			if(is_string($result)){
				push_error($result);
				self::execute("ROLLBACK");
				return false;
			}else{
				self::execute("COMMIT");
				return true;
			}
		}

		static function validate($params){
			// validate the passed parameters
			if(!isset($params['code']) || trim($params['code'])==""){
				push_error("Il campo 'Codice Corso' non può essere vuoto!");
				return false;
			}
			if(!isset($params['name']) || trim($params['name'])==""){
				push_error("Il campo 'Nome Corso' non può essere vuoto!");
				return false;
			}
			if(!isset($params['professor']) || trim($params['professor'])==""){
				push_error("Il campo 'Nome Docente' non può essere vuoto!");
				return false;
			}
			return true;
		}
	}
?>