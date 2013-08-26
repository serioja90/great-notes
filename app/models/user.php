<?php
	class User extends Model{
		protected $table_name = "users.users";
		protected $primary_key = "id";

		function is_admin(){
			$role = Role::find($this->role_id);
			return $role[0]->role=="Admin";
		}
	}
?>