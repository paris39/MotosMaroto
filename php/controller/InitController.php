<?php

	namespace php\controller;
	
	require '../model/dao/impl/CategoryDto.php';
	require '../persistence/dao/impl/CategoryDao.php';
	
	use php\persistence\dao\impl\CategoryDao;
	
	/**
	 * @author JPD
	 */
	class InitController {
		
		/**
		 * Constructor de la clase
		 */
		public function __construct() {
		}
		
		/**
		 * Función que devuelve el listado de categorías de los productos
		 *
		 * @return \ArrayObject
		 */
		public function listCategories() {
			$categoryDao = new CategoryDao();
			
			return $categoryDao->listCategories();
		}
	}
	
	// Control de entrada
	if (isset($_POST[''])) {
		$productControlerObj = new InitController();
		$productControlerObj->listCategories();
	}
	
?>