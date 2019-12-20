<?php

	namespace php\persistence\dao;
	
	use php\persistence\entities\Bike;

	/**
	 * @author JPD
	 */
	interface IBikeDao {
	
		/**
		 * Función que lista las bicicletas
		 *
		 * @param String $order
		 * @param array $filters
		 * @return \ArrayObject
		 */
		public function bikeList(String $order, Array $filters): \ArrayObject;
		
		/**
		 * Función que devuelve una Bicicleta filtrando por su ID
		 * 
		 * @param int $id
		 * @return Bike
		 */
		public function getBikeById(int $id): Bike;
		
		/**
		 * Función que lista todos los tipos de bicicletas
		 * 
		 * @return \ArrayObject
		 */
		public function listBikeType() : \ArrayObject;
		
		/**
		 * Función que lista todos los tamaños de bicicletas
		 *
		 * @return \ArrayObject
		 */
		public function listBikeSize() : \ArrayObject;
		
		/**
		 * Función que añade una nueva bicicleta en la base de datos
		 * 
		 * @param int $id
		 * @param Bike $bike
		 * @param int $userId
		 */
		public function newBike(int $id, Bike $bike, int $userId) : void;
		
	}

?>