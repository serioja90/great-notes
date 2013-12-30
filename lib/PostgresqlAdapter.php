<?php
	class PostgresqlAdapter implements DatabaseAdapter{
		protected $host = null;
		protected $database = null;
		protected $username = null;
		protected $password = null;
		protected $connection = null;
		public function __construct($config){
			$connection_str  = "host=".$config['host'];
			$connection_str .= " port=".$config['port'];
			$connection_str .= " dbname=".$config['database'];
			if(isset($config['username'])){
				$connection_str .= " user=".$config['username'];
			}
			if(isset($config['password'])){
				$connection_str .= " password=".$config['password'];
			}
			$this->connection = pg_connect($connection_str) or die("Failed to connect to the database.");
		}

		public function find($params){
			$query = "SELECT ".$params['select']." FROM ".$params['from'];
			if(isset($params['conditions'])){
				$query .= " WHERE ".$params['conditions'];
			}
			if(isset($params['group'])){
				$query .= " GROUP BY ".$params['group'];
			}
			if(isset($params['having'])){
				$query .= " HAVING ".$params['having'];
			}
			if(isset($params['order'])){
				$query .= " ORDER BY ".$params['order'];
			}
			if(isset($params['limit'])){
				$query .= " LIMIT ".$params['limit'];
			}
			if(isset($params['offset'])){
				$query .= " OFFSET ".$params['offset'];
			}
			if(isset($params['lock']) && $params['lock']){
				$query .= " FOR UPDATE";
			}
			pg_prepare($this->connection,null,$query);
			$result = pg_execute($this->connection,null,$params['params']);
			$records = pg_fetch_all($result);
			return $records ? $records : array();
		}

		public function find_by_sql($params){
			$query = $params[0];
			pg_prepare($this->connection,null,$query);
			$result = pg_execute($this->connection,null,array_slice($params,1));
			$records = pg_fetch_all($result);
			return $records ? $records : array();
		}
		public function execute($sql,$params){
			pg_prepare($this->connection,null,$sql);
			$result = pg_execute($this->connection,null,$params);
			return $result ? $result : pg_last_error();
		}
	}

?>	