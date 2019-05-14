<?php

	namespace php\persistence\dao;
	
	/**
	 * @author JPD
	 */
	interface IOtherDao {
	
		/**
		 * Función que lista todos los tipos de otros
		 * 
		 * @return \ArrayObject
		 */
		public function listOtherType() : \ArrayObject;

	}

?>