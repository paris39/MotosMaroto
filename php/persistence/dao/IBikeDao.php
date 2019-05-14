<?php

	namespace php\persistence\dao;

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
	}

?>