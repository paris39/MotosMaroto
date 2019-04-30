<?php

	namespace php\persistence\dao\impl;
	
	use php\config\Config;

	/**
	 * @author PIC1813
	 */
	class BaseDao {
		
		/**
		 * Configuración de la Base de Datos
		 *
		 * @var unknown
		 */
		protected $connection;
	
		/**
		 */
		public function __construct() {
		}
		
		/**
		 * Función que configura la conexión a la base de datos
		 */
		protected function getConnection() {
			// Conexión de la base de datos
			$configObj = new Config();
			$this->connection = $configObj->getConnection();
		}
	}

?>