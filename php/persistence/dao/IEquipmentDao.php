<?php

	namespace php\persistence\dao;
	
	use php\persistence\entities\Equipment;
	
	/**
	 * @author JPD
	 */
	interface IEquipmentDao {
		
		/**
		 * Función que devuelve un Equipamiento por su ID
		 * 
		 * @param int $id
		 * @return Equipment
		 */
		public function getEquipmentyById (int $id) : Equipment;
		
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
		
		/**
		 * Función que añade un nuevo equipamiento en la base de datos
		 * 
		 * @param int $id
		 * @param Equipment $equipment
		 * @param int $userId
		 */
		public function newEquipment(int $id, Equipment $equipment, int $userId) : void;
		
	}

?>