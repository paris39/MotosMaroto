<?php
	
	namespace php\persistence\dao;
	
	/**
	 * @author PIC1813
	 */
	interface IMiscellanyDao {
		
		/**
		 * Función que devuelve el listado de colores
		 *
		 * @return \ArrayObject
		 */
		public function listColors() : \ArrayObject;
		
	}
	
?>