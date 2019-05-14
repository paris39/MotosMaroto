<?php

	namespace php\controller;
	
	$root = realpath($_SERVER["DOCUMENT_ROOT"]) . "\MotosMaroto";
	require $root.'\php\config\Config.php';
	//require $root.'php\controller\ProductController";
	require $root.'\php\persistence\dao\impl\BaseDao.php';
	require $root.'\php\persistence\dao\impl\AccesoryDao.php';
	require $root.'\php\persistence\dao\impl\BikeDao.php';
	require $root.'\php\persistence\dao\impl\CategoryDao.php';
	require $root.'\php\persistence\dao\impl\EquipmentDao.php';
	require $root.'\php\persistence\dao\impl\MiscellanyDao.php';
	require $root.'\php\persistence\dao\impl\MotoDao.php';
	require $root.'\php\persistence\dao\impl\OtherDao.php';
	require $root.'\php\persistence\dao\impl\ProductDao.php';
	require $root.'\php\form\ProductForm.php';
	require $root.'\php\model\AccesoryTypeDto.php';
	require $root.'\php\model\BikeTypeDto.php';
	require $root.'\php\model\BikeSizeDto.php';
	require $root.'\php\model\CategoryDto.php';
	require $root.'\php\model\ColorDto.php';
	require $root.'\php\model\EquipmentTypeDto.php';
	require $root.'\php\model\GenderDto.php';
	require $root.'\php\model\MotoContaminationDto.php';
	require $root.'\php\model\MotoFuelDto.php';
	require $root.'\php\model\MotoLicenseDto.php';
	require $root.'\php\model\MotoTransmissionDto.php';
	require $root.'\php\model\MotoTypeDto.php';
	require $root.'\php\model\OtherTypeDto.php';
	require $root.'\php\model\ProductDto.php';
	
	use php\controller\ProductController;
	use php\persistence\dao\impl\AccesoryDao;
	use php\persistence\dao\impl\BikeDao;
	use php\persistence\dao\impl\CategoryDao;
	use php\persistence\dao\impl\EquipmentDao;
	use php\persistence\dao\impl\MiscellanyDao;
	use php\persistence\dao\impl\MotoDao;
	use php\persistence\dao\impl\OtherDao;
	use php\persistence\dao\impl\ProductDao;
	use php\form\ProductForm;
	use php\model\AccesoryTypeDto;
	use php\model\BikeTypeDto;
	use php\model\BikeSizeDto;
	use php\model\CategoryDto;
	use php\model\ColorDto;
	use php\model\EquipmentTypeDto;
	use php\model\GenderDto;
	use php\model\MotoContaminationDto;
	use php\model\MotoFuelDto;
	use php\model\MotoLicenseDto;
	use php\model\MotoTransmissionDto;
	use php\model\MotoTypeDto;
	use php\model\OtherTypeDto;
	use php\model\ProductTypeDto;
	
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
		 * Función que devuelve el listado de tipos de accesorios
		 *
		 * @return \ArrayObject
		 */
		public function listAccesoryType() : \ArrayObject {
			$accesoryDao = new AccesoryDao();
			
			return $accesoryDao->listAccesoryType();
		}
		
		/**
		 * Función que devuelve el listado de tipos de accesorios por una categoría
		 *
		 * @param int $category
		 * @return \ArrayObject
		 */
		public function listAccesoryTypeByCategory(int $category) : \ArrayObject {
			$accesoryDao = new AccesoryDao();
			
			return $accesoryDao->listAccesoryTypeByCategory($category);
		}
		
		/**
		 * Función que devuelve el listado de tipos de bicicletas
		 * 
		 * @return \ArrayObject
		 */
		public function listBikeType() : \ArrayObject {
			$bikeDao = new BikeDao();
			
			return $bikeDao->listBikeType();
		}
		
		/**
		 * Función que devuelve el listado de tallas de bicicletas
		 *
		 * @return \ArrayObject
		 */
		public function listBikeSize() : \ArrayObject {
			$bikeDao = new BikeDao();
			
			return $bikeDao->listBikeSize();
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
		 * Función que devuelve el listado de subcategorías de los productos
		 *
		 * @return \ArrayObject
		 */
		public function listSubcategories() : \ArrayObject {
			$categoryDao = new CategoryDao();
			
			return $categoryDao->listSubcategories();
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
		
		/**
		 * Función que devuelve el listado de subcategorías de los productos
		 *
		 * @return \ArrayObject
		 */
		public function listEquipmentType() : \ArrayObject {
			$equipmentDao = new EquipmentDao();
			
			return $equipmentDao->listEquipmentType();
		}
		
		/**
		 * Función que devuelve el listado de subcategorías de los productos
		 *
		 * @param int $category
		 * @return \ArrayObject
		 */
		public function listEquipmentTypeByCategory(int $category) : \ArrayObject {
			$equipmentDao = new EquipmentDao();
			
			return $equipmentDao->listEquipmentTypeByCategory($category);
		}
		
		/**
		 * Función que devuelve el listado de géneros de personas
		 *
		 * @return \ArrayObject
		 */
		public function listGenders() : \ArrayObject {
			$miscellanyDao = new MiscellanyDao();
			
			return $miscellanyDao->listGenders();
		}
		
		/**
		 * Función que devuelve el listado de tipos de otros
		 *
		 * @return \ArrayObject
		 */
		public function listOtherType() : \ArrayObject {
			$otherDao = new OtherDao();
			
			return $otherDao->listOtherType();
		}
		
		/**
		 * Función que devuelve el listado de distintivos anticontaminación de motocicletas
		 *
		 * @return \ArrayObject
		 */
		public function listMotoContamination() : \ArrayObject {
			$motoDao = new MotoDao();
			
			return $motoDao->listMotoContamination();
		}
		
		/**
		 * Función que devuelve el listado de combustibles de motocicletas
		 *
		 * @return \ArrayObject
		 */
		public function listMotoFuel() : \ArrayObject {
			$motoDao = new MotoDao();
			
			return $motoDao->listMotoFuel();
		}
		
		/**
		 * Función que devuelve el listado de perimsos de conducir motocicletas
		 *
		 * @return \ArrayObject
		 */
		public function listMotoLicense() : \ArrayObject {
			$motoDao = new MotoDao();
			
			return $motoDao->listMotoLicense();
		}
		
		/**
		 * Función que devuelve el listado de tipos de transmisión de motocicletas
		 *
		 * @return \ArrayObject
		 */
		public function listMotoTransmission() : \ArrayObject {
			$motoDao = new MotoDao();
			
			return $motoDao->listMotoTransmission();
		}
		
		/**
		 * Función que devuelve el listado de tipos de motocicletas
		 *
		 * @return \ArrayObject
		 */
		public function listMotoType() : \ArrayObject {
			$motoDao = new MotoDao();
			
			return $motoDao->listMotoType();
		}
		

		/**
		 * Función que devuelve el listado de productos
		 * 
		 * @param String $order
		 * @param ProductForm $filters
		 * @return \ArrayObject
		 */
		public function listProduct(String $order, ProductForm $filters) : \ArrayObject {
			$productDao = new ProductDao();
			
			return $productDao->listProduct($order, $filters);
		}
		
	}
	
	// Control de entrada
	if (isset($_POST[''])) {
		$productControlerObj = new InitController();
		
		$productControlerObj->listCategories();
		$productControlerObj->listBikeType();
	}
	
?>