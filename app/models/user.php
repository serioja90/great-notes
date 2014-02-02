<?php
  class User extends Model{
    protected $table_name = "users";
    protected $primary_key = "id";

    function is_admin(){
      $role = Role::find($this->role_id);
      return $role[0]->role=="Admin";
    }

    static function create($params){
      $username = $params['username'];
      $email = $params['email'];
      $password = $params['password'];
      if(self::validate($params)){
        $role = Role::find(array('conditions' => 'role=$1', 'params' => array('User')));
        $result = self::execute(
          "INSERT INTO users (username,email,password,role_id) VALUES ($1,$2,$3,$4)",
          array($username,$email,hash('sha1',$password.SECRET_TOKEN),$role[0]->id)
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
      $username = $params['username'];
      $email = $params['email'];
      $password = $params['password'];
      $confirm_password = $params['confirm_password'];
      $valid = true;
      if(!isset($params['username']) || $params['username']==""){
        push_error("Il campo 'Username' non può essere vuoto.");
        $valid = false;
      }
      if(!isset($params['email']) || $params['email']==""){
        push_error("Il campo 'Email' non può essere vuoto.");
        $valid = false;
      }
      $user = self::find(array(
        'conditions' => 'username=$1 OR email=$2',
        'params' => array($username,$email)
      ));
      if(count($user) > 0){
        if($user[0]->username==$username){
          push_error("Lo username '".$username."' è già stato preso.");
          $valid = false;
        }
        if($user[0]->email==$email){
          push_error("L'email '".$email."' è già stata usata.");
          $valid = false;
        }
      }
      if($password!=$confirm_password){
        push_error("La password inserita non corrisponde a quella di conferma.");
        $valid = false;
      }
      return $valid;
    }
  }
?>