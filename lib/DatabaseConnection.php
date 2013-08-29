<?php
	class DatabaseConnection{
		protected $adapter = null;
		protected $host = null;
		protected $database = null;
		protected $username = null;
		protected $password = null;
		public function __construct($config){
			// validate the provided database connection configurations and
			// throw exception if any of them is not good.
			if(!isset($config)){
				throw new EmptyDatabaseConfigurationException();
			}
			if(!is_array($config)){
				throw new WrongDatabaseConfigurationFormatException();
			}
			if(!isset($config['adapter'])){
				throw new EmptyDatabaseAdapterExeption();
			}
			if(!isset($config['host'])){
				throw new EmptyDatabaseHostException();
			}
			if(!isset($config['port'])){
				throw new EmptyDatabasePortException();
			}
			if(!isset($config['database'])){
				throw new EmptyDatabaseNameException();
			}

			// The database configurations are ok, so we can proceed with 
			// connecting to the database by using the require_onced database adapter.
			// For now only the postgresql adapter can be used.
			if($config['adapter']=='postgresql'){
				// use the postgresql adapter to connect to the database
				$this->adapter = new PostgresqlAdapter($config);
			}else{
				throw new InvalidDatabaseAdapterException();
			}
		}

		public function find($params){
			return $this->adapter->find($params);
		}

		public function find_by_sql($params){
			return $this->adapter->find_by_sql($params);
		}

		public function execute($sql,$params){
			return $this->adapter->execute($sql,$params);
		}
	}
?>