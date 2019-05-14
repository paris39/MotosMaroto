<?php

	namespace php\persistence\dao;
	
	/**
	 * @author JPD
	 */
	interface IAccesoryDao {
		
		/**
		 * Función que lista los tipos de accesorios
		 *
		 * @return \ArrayObject
		 */
		public function listAccesoryType() : \ArrayObject;
		
		/**
		 * Función que lista los tipos de accesorios por categoría
		 *
		 * @param int $category
		 * @return \ArrayObject
		 */
		public function listAccesoryTypeByCategory(int $category) : \ArrayObject;
		
	}

?>