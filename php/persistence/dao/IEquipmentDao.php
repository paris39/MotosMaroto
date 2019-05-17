<?php

	namespace php\persistence\dao;
	
	/**
	 * @author JPD
	 */
	interface IEquipmentDao {
		
		/**
		 * Función que lista las tallas de equipamiento
		 *
		 * @return \ArrayObject
		 */
		public function listEquipmentSize() : \ArrayObject;
		
		/**
		 * Función que lista los tipos de equipamiento
		 *
		 * @return \ArrayObject
		 */
		public function listEquipmentType() : \ArrayObject;
		
		/**
		 * Función que lista los tipos de equipamiento por categoría
		 *
		 * @param int $category
		 * @return \ArrayObject
		 */
		public function listEquipmentTypeByCategory(int $category) : \ArrayObject;
		
	}

?>