<?php

	namespace php\persistence\dao;

	interface ICategoryDao {
	
		/**
		 * Función que lista las categorías
		 *        	
		 * @return ArrayObject
		 */
		public function listCategories(): \ArrayObject;
	}

?>