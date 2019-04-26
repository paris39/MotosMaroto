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
		private const SUBCATEGORY_OTHER = 3;
		
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
					case 1:
						$id = $this->addNewProduct($this->marshallProduct(self::SUBCATEGORY_BIKE));
						
						break;
					case 2: 
						$id = $this->addNewProduct($this->marshallProduct(self::SUBCATEGORY_MOTO));

						break;
					case 3:
						$id = $this->addNewProduct($this->marshallProduct($_POST['equipmentKind']));
						
						break;
					case 4:
						$id = $this->addNewProduct($this->marshallProduct($_POST['equipmentKind']));
						
						break;
					case 5:
						$id = $this->addNewProduct($this->marshallProduct(self::SUBCATEGORY_OTHER));
						
						break;
					default;
				}
			}
		}
		
		/**
		 * @return ProductDto
		 */
		private function marshallProduct(int $category) : ProductDto {
			$productDto = new ProductDto();
			
			$productDto->setName($_POST["name"]); // Nombre
			$productDto->setMark($_POST["mark"]); // Marca
			$productDto->setModel($_POST["model"]); // Modelo
			$productDto->setDescription($_POST["description"]); // Descripción
			$productDto->setPrice($_POST["price"]); // Precio
			$productDto->setCategory($category); // Categoría
			$productDto->setSubcategory($_POST["productCategory"]); // Subategoría
			$productDto->setStock($_POST["stock"]); // Existencias
			$productDto->setRent($_POST["rent"]); // Alquiler
			$productDto->setObservations($_POST["observations"]); // Observaciones
			if (null != $_POST["active"]) {  // Activo en la web
				if (strcasecmp("on", $_POST["active"]) == 0) {
					$productDto->setActive(1);	
				} else {
					$productDto->setActive(0); // No está activo
				}
			} else {
				$productDto->setActive(null);			
			} 
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
		
		/**
		 * 
		 */
		private function productList() {
			$productDao = new ProductDao();
			
			return $productDao->listProducts();
		}
	}
	
	// Control de entrada
	if (isset($_POST['newProductButton'])) {
		$productControlerObj = new ProductController();
		$productControlerObj->newProduct();
	}

?>