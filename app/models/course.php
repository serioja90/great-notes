<?php
	class Course extends Model{
		protected $table_name = "courses";
		protected $primary_key = "id";

		static function add_course($params){
			if(self::validate($params)){
				$result = self::execute(
					"INSERT INTO courses (code,name,year) VALUES ($1,$2,$3)",
					array($params['code'],$params['name'],$params['year'])
				);
				if(is_string($result)){
					push_error($result);
					return false;
				}else{
					return true;
				}
			}else{
				if(!isset($params['code']) || $params['code']==""){
					push_error("Il campo 'Codice' non può essere vuoto.");
				}
				if(!isset($params['name']) || $params['name']==""){
					push_error("Il campo 'Nome' non può essere vuoto.");
				}
				if(!isset($params['year']) || $params['year']==""){
					push_error("Il campo 'Anno' non può essere vuoto.");
				}
				return false;
			}
		}

		static function update($params){
			if(self::validate($params)){
				$result = self::execute(
					"UPDATE courses SET code=$1, name=$2, year=$3 WHERE id=$4",
					array($params['code'],$params['name'],$params['year'],$params['id'])
				);
				if(is_string($result)){
					push_error($result);
					return false;
				}else{
					return true;
				}
			}else{
				if(!isset($params['code']) || $params['code']==""){
					push_error("Il campo 'Codice' non può essere vuoto.");
				}
				if(!isset($params['name']) || $params['name']==""){
					push_error("Il campo 'Nome' non può essere vuoto.");
				}
				if(!isset($params['year']) || $params['year']==""){
					push_error("Il campo 'Anno' non può essere vuoto.");
				}
				return false;
			}
		}

		static function validate($params){
			$valid = isset($params['code']) && $params['code']!="";
			$valid = $valid && isset($params['name']) && $params['name']!="";
			$valid = $valid && isset($params['year']) && $params['year']!="";
			return $valid;
		}

		static function delete($id){
			$result = self::execute(
				"DELETE FROM courses WHERE id=$1",
				array($id)
			);
			if(is_string($result)){
				push_error($result);
				return false;
			}else{
				return true;
			}
		}
	}
?>