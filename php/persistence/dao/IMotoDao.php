<?php

	namespace php\persistence\dao;
	
	use php\persistence\entities\Moto;
	
	/**
	 * @author JPD
	 */
	interface IMotoDao {
		
		/**
		 * Función que lista las motocicletas
		 *
		 * @param String $order
		 * @param
		 *        	$filters
		 *
		 * @return Array
		 */
		public function motoList($order, $filters): Array;
		
		/**
		 * Función que devuelve una Motocicleta filtrando por su ID
		 *
		 * @param int $id
		 * @return Moto
		 */
		public function getMotoById(int $id): Moto;
		
		/**
		 * Función que lista todos los distintivos anticontaminación de motocicletas
		 *
		 * @return \ArrayObject
		 */
		public function listMotoContamination() : \ArrayObject;
		
		/**
		 * Función que lista todos los combustibles de motocicletas
		 *
		 * @return \ArrayObject
		 */
		public function listMotoFuel() : \ArrayObject;
		
		/**
		 * Función que lista todos los permisos de conducir motocicletas
		 *
		 * @return \ArrayObject
		 */
		public function listMotoLicense() : \ArrayObject;
		
		/**
		 * Función que lista todos los tipos de transmisión de motocicletas
		 *
		 * @return \ArrayObject
		 */
		public function listMotoTransmission() : \ArrayObject;
		
		/**
		 * Función que lista todos los tipos de motocicletas
		 *
		 * @return \ArrayObject
		 */
		public function listMotoType() : \ArrayObject;
		
		/**
		 * Función que guarda una nueva moto en la base de datos
		 * 
		 * @param int $id
		 * @param Moto $moto
		 * @param int $userId
		 */
		public function newMoto(int $id, Moto $moto, int $userId) : void;
		
	}

?>