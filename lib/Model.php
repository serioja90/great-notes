<?php
  class Model{
    protected $table_name = null;
    protected $primary_key = "id";
    protected $connection = null;
    protected function __construct(){
      if(is_null($this->table_name)){
        $this->table_name = strtolower(get_called_class());
      }
      $this->connection = new DatabaseConnection(DBConfig::config());
    }

    public function __call($method, $args){
          if (isset($this->$method)) {
              $func = $this->$method;
              return call_user_func_array($func, $args);
          }
      }

    public function getConnection(){
      return $this->connection;
    }

    public function getTableName(){
      return $this->table_name;
    }


    public static function find($params = null){
      $classname = get_called_class();
      $model = new $classname();
      if(!is_null($params) && !is_array($params)){
        $params = array('conditions' => $model->primary_key." = $1", 'params' => array($params));
      }
      if(!isset($params['select'])){
        $params['select'] = "*";
      }
      if(!isset($params['from'])){
        $params['from'] = $model->getTableName();
      }
      if(!isset($params['params'])){
        $params['params'] = array();
      }
      $records = $model->getConnection()->find($params);
      $result = array();
      foreach($records as $row){
        $record = new $classname();
        foreach ($row as $field => $value) {
          $record->$field = $value;
        }
        array_push($result,$record);
      }
      return $result;
    }

    public static function find_by_sql($params = null){
      $classname = get_called_class();
      $model = new $classname();
      if(!isset($params[1])){
        $params[1] = array();
      }
      $records = $model->getConnection()->find_by_sql($params);
      $result = array();
      foreach($records as $row){
        $record = new $classname();
        foreach ($row as $field => $value) {
          $record->$field = $value;
        }
        array_push($result,$record);
      }
      return $result;
    }

    public static function execute($sql,$params){
      $classname = get_called_class();
      $model = new $classname();
      if(!isset($params)){
        $params = array();  
      }
      return $model->getConnection()->execute($sql,$params);
    }
  }
?>