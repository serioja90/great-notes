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
				array_push($_SESSION['errors'], "Username/Email o password non corretti.");
				$this->render(array('locals' => get_defined_vars(), 'action' => 'sign_in'));
			}else{
				$_SESSION['current_user'] = $user;
				array_push($_SESSION['notice'], "Utente authenticato con successo.");
				$this->render(array('locals' => get_defined_vars(), 'controller' => 'notes', 'action' => 'index'));
			}
		}

		public function sign_out(){
			unset($_SESSION['current_user']);
			$this->render(array('locals' => get_defined_vars(), 'controller' => 'notes', 'action' => 'index'));
		}
	}
?>