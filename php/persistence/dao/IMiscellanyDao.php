<?php
	
	namespace php\persistence\dao;
	
	use php\persistence\entities\User;
	
	/**
	 * @author JPD
	 */
	interface IMiscellanyDao {
	    
	    /**
	     * Función que devuelve un usuario buscando por su id
	     *
	     * @param int $id
	     * @return User
	     */
	    public function getUserById(int $id) : User;
	    
	    /**
	     * Función que devuelve un usuario buscando por su nick
	     *
	     * @param String $nick
	     * @return User
	     */
	    public function getUserByNick(String $nick) : User;
		
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