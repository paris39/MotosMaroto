<?php
	
	namespace php\persistence\dao;
	
	/**
	 * @author JPD
	 */
	interface IMiscellanyDao {
		
		/**
		 * Función que devuelve el listado de colores
		 *
		 * @return \ArrayObject
		 */
		public function listColors() : \ArrayObject;
		
		/**
		 * Función que devuelve el listado de géneros
		 *
		 * @return \ArrayObject
		 */
		public function listGenders() : \ArrayObject;
		
	}
	
?>