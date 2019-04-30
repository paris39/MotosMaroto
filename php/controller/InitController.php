<?php

	namespace php\controller;
	
	$root = realpath($_SERVER["DOCUMENT_ROOT"]) . "\MotosMaroto";
	require $root.'\php\config\Config.php';
	//require $root.'php\controller\ProductController";
	require $root.'\php\controller\BikeController.php';
	require $root.'\php\persistence\dao\impl\BaseDao.php';
	require $root.'\php\persistence\dao\impl\CategoryDao.php';
	require $root.'\php\persistence\dao\impl\MiscellanyDao.php';
	require $root.'\php\model\BikeTypeDto.php';
	require $root.'\php\model\CategoryDto.php';
	require $root.'\php\model\ColorDto.php';
	
	use php\controller\ProductController;
	use php\controller\BikeController;
	use php\persistence\dao\impl\MiscellanyDao;
	use php\persistence\dao\impl\CategoryDao;
	use php\model\CategoryDto;
	use php\model\BikeTypeDto;
	use php\model\ColorDto;
	
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
		
		/**
		 * Función que devuelve el listado de tipos de bicicletas
		 * 
		 * @return \ArrayObject
		 */
		public function listBikeType() : \ArrayObject {
			$bikeController = new BikeController();
			
			return $bikeController->listBikeType();
		}
		
		/**
		 * Función que devuelve el listado de colores
		 * 
		 * @return \ArrayObject
		 */
		public function listColors() : \ArrayObject {
			$miscellanyDaoObj = new MiscellanyDao();
			
			return $miscellanyDaoObj->listColors();
		}
	}
	
	// Control de entrada
	if (isset($_POST[''])) {
		$productControlerObj = new InitController();
		
		$productControlerObj->listCategories();
		$productControlerObj->listBikeType();
	}
	
?>