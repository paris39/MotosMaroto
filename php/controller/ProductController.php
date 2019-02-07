<?php

	namespace php\controller;
	
	require '../model/ProductDto.php';
	require '../persistence/dao/impl/ProductDao.php';
	
	use php\model\ProductDto;
	use php\persistence\dao\impl\ProductDao;
	
	/**
	 * @author JPD
	 */
	class ProductController {
		
		/* CONSTANTES DE SUBCATEGORÍA DE PRODUCTO */
		private const SUBCATEGORY_BIKE = 1;
		private const SUBCATEGORY_MOTO = 2;
		private const SUBCATEGORY_EQUIPMENT = 3;
		private const SUBCATEGORY_ACCESORY = 4;
		private const SUBCATEGORY_OTHER = 5;
		
		/**
		 * Constructor de la clase
		 */
		public function __construct() {
		}
		
		/**
		 * 
		 */
		public function newProduct() {
			if (null != $_POST['productCategory']) {
				switch ($_POST['productCategory']) {
					case 'bikeType':
						$id = $this->addNewProduct($this->marshallProduct(self::SUBCATEGORY_BIKE));
						
						break;
					case 'motoType': 
						$id = $this->addNewProduct($this->marshallProduct(self::SUBCATEGORY_MOTO));

						break;
					case 'equipmentType':
						$id = $this->addNewProduct($this->marshallProduct(self::SUBCATEGORY_EQUIPMENT));
						
						break;
					case 'accesoryType':
						$id = $this->addNewProduct($this->marshallProduct(self::SUBCATEGORY_ACCESORY));
						
						break;
					case 'otherType':
						$id = $this->addNewProduct($this->marshallProduct(self::SUBCATEGORY_OTHER));
						
						break;
					default;
				}
			}
		}
				
		
		/**
		 * @return ProductDto
		 */
		private function marshallProduct(int $subcategory) : ProductDto {
			$productDto = new ProductDto();
			
			$productDto->setName($_POST["name"]); // Nombre
			$productDto->setMark($_POST["mark"]); // Marca
			$productDto->setModel($_POST["model"]); // Modelo
			$productDto->setDescription($_POST["description"]); // Descripción
			$productDto->setPrice($_POST["price"]); // Precio
			$productDto->setCategory($_POST["productCategory"]); // Categoría
			$productDto->setSubcategory($subcategory); // Subcategoría
			$productDto->setStock($_POST["stock"]); // Existencias
			$productDto->setRent($_POST["rent"]); // Alquiler
			$productDto->setObservations($_POST["observations"]); // Observaciones
			$productDto->setActive($_POST["active"]); // Activo en la web
			$productDto->setProductDate($_POST["year"]); // Fecha de producto
						
			return $productDto;
		}
		
		
		/**
		 * Inserta un nuevo producto en Base de Datos
		 * 
		 * @param ProductDto $productDto
		 * @return int
		 */
		private function addNewProduct(ProductDto $productDto) : int {
			$productDao = new ProductDao();
			
			return $productDao->newProduct($productDto);
		}
	}
	
	// Control de entrada
	if (isset($_POST['newProductButton'])) {
		$productControlerObj = new ProductController();
		$productControlerObj->newProduct();
	}

?>