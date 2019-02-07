<?php

	namespace php\config;
	
	use mysqli;
	
	class Config {
		
		private $connection;
		
		/**
		 * Constructor de la clase
		 */
		public function __construct() {
			$this->connectDatabase();
		}
	
		/**
		 * Función que configura la Base de Datos
		 *
		 * @return $conection
		 */
		private function configureDatabase() {
			$host = "localhost";
			$user = "root";
			$pass = "root";
			$database = "maroto";
		
			// Conexión a la base de datos
			$conection = mysql_connect($host, $user, $pass) or die ("No pudo conectarse a Base de datos");
			mysql_select_db ($database, $conection);
			mysql_query ( "SET NAMES 'utf8'" );
			
			return $conection;
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
			
			$link = mysqli_connect($host, $user, $pass, $database, $port, null);
			$this->setConnection(connection);
			
			mysqli_query($link, $query);
		}
		
		/**
		 * Devuelve la conexión a la Base de Datos
		 * 
		 * @return mixed
		 */
		public function getConnection() {
			// Comprueba de que connection no sea nulo
			if (null != this.$connection) {
				$this.connectDatabase();
			}
			
			return $this.connection;
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