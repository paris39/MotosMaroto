<?php

	namespace php\config;
	
	/*
	 * Así de sencillo, incluyendo este archivo podemos
	 * usar clases y funciones cargadas
	 * automáticamente por Composer.
	 */
	require_once 'vendor/autoload.php';
	
	class Config {
		/**
		 * Función que configura la Base de Datos
		 *
		 * @return $conection
		 */
		public function configureDatabase() {
			session_start ();
		
			$host = "localhost";
			$user = "root";
			$pass = "root";
			$database = "maroto";
		
			// Conexión a la base de datos
			$conection = mysql_connect ($host, $user, $pass) or die ("No pudo conectarse a Base de datos");
			mysql_select_db ($database, $conection);
			mysql_query ( "SET NAMES 'utf8'" );
		
			return $conection;
		}
	}

?>