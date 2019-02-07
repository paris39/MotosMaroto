<?php

	namespace php\persistence\dao;

	interface IBikeDao {
	
		/**
		 * Función que lista las bicicletas
		 *
		 * @param String $order
		 * @param
		 *        	$filters
		 *        	
		 * @return Array
		 */
		public function bikeList($order, $filters): Array;
	}

?>