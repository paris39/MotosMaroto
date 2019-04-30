<?php

	namespace php\controller;
	
	$root = realpath($_SERVER["DOCUMENT_ROOT"]) . "\MotosMaroto";
	require "$root\php\persistence\dao\impl\CategoryDao.php";
	
	//require '../persistence/dao/impl/CategoryDao.php';
	require "$root\php\model\CategoryDto.php";
	
	use php\persistence\dao\impl\CategoryDao;
	use php\model\CategoryDto;
	
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
		public function listCategories() : \ArrayObject {
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