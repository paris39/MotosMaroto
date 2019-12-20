<?php

	namespace php\persistence\dao;
	
	use php\persistence\entities\Accesory;
	
	/**
	 * @author JPD
	 */
	interface IAccesoryDao {
		
		/**
		 * Función que devuelve un Accesorio por su ID
		 * 
		 * @param int $id
		 * @return Accesory
		 */
		public function getAccesoryById (int $id) : Accesory;
		
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
		public function listAccesoryTypeByCategory (int $category) : \ArrayObject;
		
		/**
		 * Función que añade un nuevo accesorio a la base de datos
		 * 
		 * @param int $id
		 * @param Accesory $accesory
		 * @param int $userId
		 */
		public function newAccesory(int $id, Accesory $accesory, int $userId) : void;
		
	}

?>