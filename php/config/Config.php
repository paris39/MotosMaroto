<?php

	namespace php\config;

	use \mysqli;
	
	/**
	 * @author JPD
	 */
	class Config {
		
		private $connection;
		
		/**
		 * Constructor de la clase
		 */
		public function __construct() {
			$this->connectDatabase();
		}
		
		/**
		 * Función que configura la conexión a la Base de Datos
		 */
		private function connectDatabase() {
			//mysqli_init();
			
			$host = "localhost";
			$user = "root";
			$pass = "root";
			$database = "maroto";
			$port = 3306;
			
			//$link = new mysqli($host, $user, $pass, $database);
			//$link->set_charset("utf8");
			
			$link = new mysqli($host, $user, $pass, $database, $port, null);
			
			//$link = mysqli_connect($host, $user, $pass, $database, $port, null);
			$this->setConnection($link);
			
			//mysqli_query($link, $query);
		}
		
		/**
		 * Devuelve la conexión a la Base de Datos
		 * 
		 * @return mixed
		 */
		public function getConnection() {
			// Comprueba de que connection no sea nulo
			if (null != $this->connection) {
				$this->connectDatabase();
			}
			
			return $this->connection;
		}
		
		/**
		 * Establece la conexión a la variable $connection
		 * 
		 * @param unknown $connection
		 */
		private function setConnection($connection) {
			$this->connection = $connection;
		}
		
	}

?>