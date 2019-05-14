<?php

	namespace php\persistence\dao;

	interface ICategoryDao {
	
		/**
		 * Función que lista las categorías
		 *        	
		 * @return ArrayObject
		 */
		public function listCategories(): \ArrayObject;
		
		/**
		 * Función que lista las subcategorías
		 *
		 * @return ArrayObject
		 */
		public function listSubcategories(): \ArrayObject;
	}

?>