<?
	define("SECRET_TOKEN","neatVofPaShogheijEacBiWiepAnAmhylfAtvamigfoovAkjiWrypsUsUbAjVeb3");
	define("BASE_URI","/");
	define("DEFAULT_CONTROLLER","notes");

	class DBConfig{
		public static function config(){
			return array(
				'host' => 'localhost',
				'port' => '5432',
				'adapter' => 'postgresql',
				'database' => 'great_notes',
				'username' => 'postgres',
				'password' => ''
			);
		}
	}
?>