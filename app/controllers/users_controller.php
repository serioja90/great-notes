<?php
	class UsersController extends ApplicationController{
		public function sign_in(){
			$this->render(array('locals' => get_defined_vars()));
		}

		public function authenticate(){
			$user = User::find(
				array(
					"conditions" => "(username=$1 OR email=$2) AND password=$3", 
					"params" => array(
						$this->params["login"],
						$this->params["login"],
						hash('sha1',$this->params["password"].SECRET_TOKEN)
					),
					"limit" => 1
				)
			);
			if(empty($user)){
				$login = $this->params["login"];
				push_error("Username/Email o password non corretti.");
				$this->render(array('locals' => get_defined_vars(), 'action' => 'sign_in'));
			}else{
				$_SESSION['current_user'] = serialize($user[0]);
				push_notice("Utente entrato con successo.");
				header("location: /notes/index");
			}
		}

		public function sign_out(){
			unset($_SESSION['current_user']);
			if(!user_signed_in()){
				push_notice("Utente uscito con successo.");
			}else{
				push_error("Si è verrificato un errore durante l'operazione di uscita.");
			}
			header("location: /notes/index");
		}

		public function sign_up(){
			$this->render(array('locals' => get_defined_vars()));
		}

		public function register(){
			$username = $this->params['username'];
			$email = $this->params['email'];
			$result = User::create($this->params);
			if($result){
				$this->params['login'] = $username;
				$user = User::find(
					array(
						"conditions" => "username=$1", 
						"params" => array($username),
						"limit" => 1
					)
				);
				$this->authenticate();
			}else{
				$this->render(array('locals' => get_defined_vars(), 'action' => 'sign_up'));
			}
		}

		public function profile(){
			if(!user_signed_in()){
				$this->render(array('locals' => get_defined_vars(), 'action' => 'sign_up'));
			}else{
				$user = current_user();
				$role = Role::find($user->role_id)[0];
				$notes = Note::find(array('conditions' => 'user_id=$1', 'params' => array($user->id)));
				$this->render(array('locals' => get_defined_vars(), 'action' => 'profile'));
			}
		}
	}
?>