<?php

	namespace php\controller;
	
	$root = realpath($_SERVER["DOCUMENT_ROOT"]) . "\MotosMaroto";
	//require $root.'\php\controller\ProductController';
	require $root.'\php\config\Config.php';
	require $root.'\php\form\ProductForm.php';
	require $root.'\php\model\AccesoryDto.php';
	require $root.'\php\model\AccesoryTypeDto.php';
	require $root.'\php\model\BikeTypeDto.php';
	require $root.'\php\model\BikeSizeDto.php';
	require $root.'\php\model\CategoryDto.php';
	require $root.'\php\model\ColorDto.php';
	require $root.'\php\model\EquipmentDto.php';
	require $root.'\php\model\EquipmentSizeDto.php';
	require $root.'\php\model\EquipmentTypeDto.php';
	require $root.'\php\model\GenderDto.php';
	require $root.'\php\model\ImageDto.php';
	require $root.'\php\model\MotoContaminationDto.php';
	require $root.'\php\model\MotoFuelDto.php';
	require $root.'\php\model\MotoLicenseDto.php';
	require $root.'\php\model\MotoTransmissionDto.php';
	require $root.'\php\model\MotoTypeDto.php';
	require $root.'\php\model\OtherTypeDto.php';
	require $root.'\php\model\ProductDto.php';
	require $root.'\php\model\ProductImageDto.php';
	require $root.'\php\persistence\dao\impl\BaseDao.php';
	require $root.'\php\persistence\dao\impl\AccesoryDao.php';
	require $root.'\php\persistence\dao\impl\BikeDao.php';
	require $root.'\php\persistence\dao\impl\CategoryDao.php';
	require $root.'\php\persistence\dao\impl\EquipmentDao.php';
	require $root.'\php\persistence\dao\impl\MiscellanyDao.php';
	require $root.'\php\persistence\dao\impl\MotoDao.php';
	require $root.'\php\persistence\dao\impl\OtherDao.php';
	require $root.'\php\persistence\dao\impl\ProductDao.php';
	require $root.'\php\utility\Utility.php';
	
	//use ProductController;
	use php\form\ProductForm;
	use php\model\AccesoryDto;
	use php\model\AccesoryTypeDto;
	use php\model\BikeTypeDto;
	use php\model\BikeSizeDto;
	use php\model\CategoryDto;
	use php\model\ColorDto;
	use php\model\EquipmentDto;
	use php\model\EquipmentSizeDto;
	use php\model\EquipmentTypeDto;
	use php\model\GenderDto;
	use php\model\ImageDto;
	use php\model\MotoContaminationDto;
	use php\model\MotoFuelDto;
	use php\model\MotoLicenseDto;
	use php\model\MotoTransmissionDto;
	use php\model\MotoTypeDto;
	use php\model\OtherTypeDto;
	use php\model\ProductDto;
	use php\model\ProductImageDto;
	use php\model\ProductTypeDto;
	use php\persistence\dao\impl\AccesoryDao;
	use php\persistence\dao\impl\BikeDao;
	use php\persistence\dao\impl\CategoryDao;
	use php\persistence\dao\impl\EquipmentDao;
	use php\persistence\dao\impl\MiscellanyDao;
	use php\persistence\dao\impl\MotoDao;
	use php\persistence\dao\impl\OtherDao;
	use php\persistence\dao\impl\ProductDao;
	use php\utility\Utility;

	
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
		 * Función que devuelve un producto en función de su ID
		 * 
		 * @param int $productId
		 * @return ProductDto
		 */
		public function getProductById (int $productId) : ProductDto {
			$productDao = new ProductDao();
			$utility = new Utility();
			
			$productDtoAux = new ProductDto();
			$productDtoAux = $utility->productToProductDto($productDao->getProductById($productId));
			
			return $productDtoAux;
		}
		
		/**
		 * Función que devuelve el listado de tipos de accesorios
		 *
		 * @return \ArrayObject
		 */
		public function listAccesoryType() : \ArrayObject {
			$accesoryDao = new AccesoryDao();
			
			$accesoryTypeDtoList = new \ArrayObject();
			$accesoryTypeList = $accesoryDao->listAccesoryType();
			for ($i = 0; $i < $accesoryTypeList->count(); $i++) {
				$utility = new Utility();
				$accesoryTypeDtoList->append($utility->accesoryTypeToAccesoryTypeDto($accesoryTypeList->offsetGet($i)));
			}
			
			return $accesoryTypeDtoList;
		}
		
		/**
		 * Función que devuelve el listado de tipos de accesorios por una categoría
		 *
		 * @param int $category
		 * @return \ArrayObject
		 */
		public function listAccesoryTypeByCategory(int $category) : \ArrayObject {
			$accesoryDao = new AccesoryDao();
			
			$accesoryTypeDtoList = new \ArrayObject();
			$accesoryTypeList = $accesoryDao->listAccesoryTypeByCategory($category);
			for ($i = 0; $i < $accesoryTypeList->count(); $i++) {
				$utility = new Utility();
				$accesoryTypeDtoList->append($utility->accesoryTypeToAccesoryTypeDto($accesoryTypeList->offsetGet($i)));
			}
			
			return $accesoryTypeDtoList;
		}
		
		/**
		 * Función que devuelve el listado de tallas de bicicletas
		 *
		 * @return \ArrayObject
		 */
		public function listBikeSize() : \ArrayObject {
			$bikeDao = new BikeDao();
			
			$bikeSizeDtoList = new \ArrayObject();
			$bikeSizeList = $bikeDao->listBikeSize();
			for ($i = 0; $i < $bikeSizeList->count(); $i++) {
				$utility = new Utility();
				$bikeSizeDtoList->append($utility->bikeSizeToBikeSizeDto($bikeSizeList->offsetGet($i)));
			}
			
			return $bikeSizeDtoList;
		}
		
		/**
		 * Función que devuelve el listado de tipos de bicicletas
		 * 
		 * @return \ArrayObject
		 */
		public function listBikeType() : \ArrayObject {
			$bikeDao = new BikeDao();
			
			$bikeTypeDtoList = new \ArrayObject();
			$bikeTypeList = $bikeDao->listBikeType();
			for ($i = 0; $i < $bikeTypeList->count(); $i++) {
				$utility = new Utility();
				$bikeTypeDtoList->append($utility->bikeTypeToBikeTypeDto($bikeTypeList->offsetGet($i)));
			}
			
			return $bikeTypeDtoList;
		}
		
		/**
		 * Función que devuelve el listado de categorías de los productos
		 *
		 * @return \ArrayObject
		 */
		public function listCategories() : \ArrayObject {
			$categoryDao = new CategoryDao();
			
			$categoryDtoList = new \ArrayObject();
			$categoryList = $categoryDao->listCategories();
			for ($i = 0; $i < $categoryList->count(); $i++) {
				$utility = new Utility();
				$categoryDtoList->append($utility->categoryToCategoryDto($categoryList->offsetGet($i)));
			}
			
			return $categoryDtoList;
		}
		
		/**
		 * Función que devuelve el listado de subcategorías de los productos
		 *
		 * @return \ArrayObject
		 */
		public function listSubcategories() : \ArrayObject {
			$categoryDao = new CategoryDao();
			
			$subcategoryDtoList = new \ArrayObject();
			$subcategoryList = $categoryDao->listSubcategories();
			for ($i = 0; $i < $subcategoryList->count(); $i++) {
				$utility = new Utility();
				$subcategoryDtoList->append($utility->categoryToCategoryDto($subcategoryList->offsetGet($i)));
			}
			
			return $subcategoryDtoList;
		}
		
		/**
		 * Función que devuelve el listado de colores
		 *
		 * @return \ArrayObject
		 */
		public function listColors() : \ArrayObject {
			$miscellanyDao = new MiscellanyDao();
			
			$colorDtoList = new \ArrayObject();
			$colorList = $miscellanyDao->listColors();
			for ($i = 0; $i < $colorList->count(); $i++) {
				$utility = new Utility();
				$colorDtoList->append($utility->colorToColorDto($colorList->offsetGet($i)));
			}
			
			return $colorDtoList;
		}
		
		/**
		 * Función que devuelve el listado de tallas de equipación
		 *
		 * @return \ArrayObject
		 */
		public function listEquipmentSize() : \ArrayObject {
			$equipmentDao = new EquipmentDao();
			
			$equipmentSizeDtoList = new \ArrayObject();
			$equipmentSizeList = $equipmentDao->listEquipmentSize();
			for ($i = 0; $i < $equipmentSizeList->count(); $i++) {
				$utility = new Utility();
				$equipmentSizeDtoList->append($utility->equipmentSizeToEquipmentSizeDto($equipmentSizeList->offsetGet($i)));
			}
			
			return $equipmentSizeDtoList;
		}
		
		/**
		 * Función que devuelve el listado de subcategorías de los productos
		 *
		 * @return \ArrayObject
		 */
		public function listEquipmentType() : \ArrayObject {
			$equipmentDao = new EquipmentDao();
			
			$equipmentTypeDtoList = new \ArrayObject();
			$equipmentTypeList = $equipmentDao->listEquipmentType();
			for ($i = 0; $i < $equipmentTypeList->count(); $i++) {
				$utility = new Utility();
				$equipmentTypeDtoList->append($utility->equipmentTypeToEquipmentTypeDto($equipmentTypeList->offsetGet($i)));
			}
			
			return $equipmentTypeDtoList;
		}
		
		/**
		 * Función que devuelve el listado de subcategorías de los productos
		 *
		 * @param int $category
		 * @return \ArrayObject
		 */
		public function listEquipmentTypeByCategory(int $category) : \ArrayObject {
			$equipmentDao = new EquipmentDao();
			
			$equipmentTypeDtoList = new \ArrayObject();
			$equipmentTypeList = $equipmentDao->listEquipmentTypeByCategory($category);
			for ($i = 0; $i < $equipmentTypeList->count(); $i++) {
				$utility = new Utility();
				$equipmentTypeDtoList->append($utility->equipmentTypeToEquipmentTypeDto($equipmentTypeList->offsetGet($i)));
			}
			
			return $equipmentTypeDtoList;
		}
		
		/**
		 * Función que devuelve el listado de géneros de personas
		 *
		 * @return \ArrayObject
		 */
		public function listGenders() : \ArrayObject {
			$miscellanyDao = new MiscellanyDao();
			
			$genderDtoList = new \ArrayObject();
			$genderList = $miscellanyDao->listGenders();
			for ($i = 0; $i < $genderList->count(); $i++) {
				$utility = new Utility();
				$genderDtoList->append($utility->genderToGenderDto($genderList->offsetGet($i)));
			}
			
			return $genderDtoList;
		}
		
		/**
		 * Función que devuelve el listado de distintivos anticontaminación de motocicletas
		 *
		 * @return \ArrayObject
		 */
		public function listMotoContamination() : \ArrayObject {
			$motoDao = new MotoDao();
			
			$motoContaminationDtoList = new \ArrayObject();
			$motoContaminationList = $motoDao->listMotoContamination();
			for ($i = 0; $i < $motoContaminationList->count(); $i++) {
				$utility = new Utility();
				$motoContaminationDtoList->append($utility->motoContaminationToMotoContaminationDto($motoContaminationList->offsetGet($i)));
			}
			
			return $motoContaminationDtoList;
		}
		
		/**
		 * Función que devuelve el listado de combustibles de motocicletas
		 *
		 * @return \ArrayObject
		 */
		public function listMotoFuel() : \ArrayObject {
			$motoDao = new MotoDao();
			
			$motoFuelDtoList = new \ArrayObject();
			$motoFuelList = $motoDao->listMotoFuel();
			for ($i = 0; $i < $motoFuelList->count(); $i++) {
				$utility = new Utility();
				$motoFuelDtoList->append($utility->motoFuelToMotoFuelDto($motoFuelList->offsetGet($i)));
			}
			
			return $motoFuelDtoList;
		}
		
		/**
		 * Función que devuelve el listado de perimsos de conducir motocicletas
		 *
		 * @return \ArrayObject
		 */
		public function listMotoLicense() : \ArrayObject {
			$motoDao = new MotoDao();
			
			$motoLicenseDtoList = new \ArrayObject();
			$motoLicenseList = $motoDao->listMotoLicense();
			for ($i = 0; $i < $motoLicenseList->count(); $i++) {
				$utility = new Utility();
				$motoLicenseDtoList->append($utility->motoLicenseToMotoLicenseDto($motoLicenseList->offsetGet($i)));
			}
			
			return $motoLicenseDtoList;
		}
		
		/**
		 * Función que devuelve el listado de tipos de transmisión de motocicletas
		 *
		 * @return \ArrayObject
		 */
		public function listMotoTransmission() : \ArrayObject {
			$motoDao = new MotoDao();
			
			$motoTransmissionDtoList = new \ArrayObject();
			$motoTransmissionList = $motoDao->listMotoTransmission();
			for ($i = 0; $i < $motoTransmissionList->count(); $i++) {
				$utility = new Utility();
				$motoTransmissionDtoList->append($utility->motoTransmissionToMotoTransmissionDto($motoTransmissionList->offsetGet($i)));
			}
			
			return $motoTransmissionDtoList;
		}
		
		/**
		 * Función que devuelve el listado de tipos de motocicletas
		 *
		 * @return \ArrayObject
		 */
		public function listMotoType() : \ArrayObject {
			$motoDao = new MotoDao();
			
			$motoTypeDtoList = new \ArrayObject();
			$motoTypeList = $motoDao->listMotoType();
			for ($i = 0; $i < $motoTypeList->count(); $i++) {
				$utility = new Utility();
				$motoTypeDtoList->append($utility->motoTypeToMotoTypeDto($motoTypeList->offsetGet($i)));
			}
			
			return $motoTypeDtoList;
		}
		
		/**
		 * Función que devuelve el listado de tipos de otros
		 *
		 * @return \ArrayObject
		 */
		public function listOtherType() : \ArrayObject {
			$otherDao = new OtherDao();
			
			$otherTypeDtoList = new \ArrayObject();
			$otherTypeList = $otherDao->listOtherType();
			for ($i = 0; $i < $otherTypeList->count(); $i++) {
				$utility = new Utility();
				$otherTypeDtoList->append($utility->otherTypeToOtherTypeDto($otherTypeList->offsetGet($i)));
			}
			
			return $otherTypeDtoList;
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
			//$productController = new ProductController();
			
			return $productDao->listProduct($order, $filters);
		}
		
	} // End InitController
	
	// Control de entrada
	if (isset($_POST[''])) {
		$productControlerObj = new InitController();
		
		$productControlerObj->listCategories();
		$productControlerObj->listBikeType();
	}
	
?>