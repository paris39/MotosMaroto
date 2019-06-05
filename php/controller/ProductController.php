<?php

	namespace php\controller;
	
	$root = realpath($_SERVER["DOCUMENT_ROOT"]) . "\MotosMaroto";
	require_once $root . '\php\config\Config.php';
	require_once $root . '\php\form\ProductForm.php';
	require_once $root . '\php\model\AccesoryDto.php';
	require_once $root . '\php\model\AccesoryTypeDto.php';
	require_once $root . '\php\model\BikeDto.php';
	require_once $root . '\php\model\BikeTypeDto.php';
	require_once $root . '\php\model\BikeSizeDto.php';
	require_once $root . '\php\model\CategoryDto.php';
	require_once $root . '\php\model\EquipmentDto.php';
	require_once $root . '\php\model\EquipmentSizeDto.php';
	require_once $root . '\php\model\EquipmentTypeDto.php';
	require_once $root . '\php\model\ImageDto.php';
	require_once $root . '\php\model\MotoDto.php';
	require_once $root . '\php\model\MotoContaminationDto.php';
	require_once $root . '\php\model\MotoFuelDto.php';
	require_once $root . '\php\model\MotoLicenseDto.php';
	require_once $root . '\php\model\MotoTransmissionDto.php';
	require_once $root . '\php\model\MotoTypeDto.php';
	require_once $root . '\php\model\ProductDto.php';
	require_once $root . '\php\model\ProductImageDto.php';
	require_once $root . '\php\persistence\dao\impl\BaseDao.php';
	require_once $root . '\php\persistence\dao\impl\AccesoryDao.php';
	require_once $root . '\php\persistence\dao\impl\BikeDao.php';
	require_once $root . '\php\persistence\dao\impl\CategoryDao.php';
	require_once $root . '\php\persistence\dao\impl\MotoDao.php';
	require_once $root . '\php\persistence\dao\impl\ProductDao.php';
	require_once $root . '\php\utility\Utility.php';
	
	use php\form\ProductForm;
	use php\model\AccesoryDto;
	use php\model\AccesoryTypeDto;
	use php\model\BikeDto;
	use php\model\BikeTypeDto;
	use php\model\BikeSizeDto;
	use php\model\CategoryDto;
	use php\model\EquipmentDto;
	use php\model\EquipmentSizeDto;
	use php\model\EquipmentTypeDto;
	use php\model\ImageDto;
	use php\model\MotoDto;
	use php\model\MotoContaminationDto;
	use php\model\MotoFuelDto;
	use php\model\MotoLicenseDto;
	use php\model\MotoTransmissionDto;
	use php\model\MotoTypeDto;
	use php\model\ProductDto;
	use php\model\ProductImageDto;
	use php\persistence\dao\impl\AccesoryDao;
	use php\persistence\dao\impl\BikeDao;
	use php\persistence\dao\impl\CategoryDao;
	use php\persistence\dao\impl\EquipmentDao;
	use php\persistence\dao\impl\MotoDao;
	use php\persistence\dao\impl\ProductDao;
	use php\utility\Utility;
	
	/**
	 * @author JPD
	 */
	class ProductController {
		
		/* CONSTANTES DE CATEGORÍA DE PRODUCTO */
		private const CATEGORY_BIKE = 1;
		private const CATEGORY_MOTO = 2;
		private const CATEGORY_EQUIPMENT = 3;
		private const CATEGORY_ACCESORY = 4;
		private const CATEGORY_OTHER = 5;
		
		/* CONSTANTES DE BOTÓN DE OTRAS IMÁGENES */
		private const BUTTON_PREVIOUS = "previous";
		private const BUTTON_NEXT = "next";
		private const OTHER_IMAGES_VISIBLES = 3; 
		
		/**
		 * Constructor de la clase
		 */
		public function __construct() {
		}
		
		/**
		 * 
		 */
		public function newProduct() {
			if (null != $_POST['productCategory'] && 0 != strcasecmp("", trim($_POST['productCategory']))) {
				switch ($_POST['productCategory']) {
					case 1:
						$id = $this->addNewProduct($this->marshallProduct(self::CATEGORY_BIKE));
						break;
					case 2: 
						$id = $this->addNewProduct($this->marshallProduct(self::CATEGORY_MOTO));
						break;
					case 3:
						$id = $this->addNewProduct($this->marshallProduct(self::CATEGORY_EQUIPMENT));
						break;
					case 4:
						$id = $this->addNewProduct($this->marshallProduct(self::CATEGORY_ACCESORY));
						break;
					case 5:
						$id = $this->addNewProduct($this->marshallProduct(self::CATEGORY_OTHER));
						break;
					default;
				}
			}
		}
		
		/**
		 * @param int $category
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
			$product = $utility->productDtoToProduct($productDto);
			
			return $productDao->newProduct($product);
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
			$utility = new Utility();
			
			$productList = new \ArrayObject();
			$productListAux = new \ArrayObject();
			$productList = $productDao->listProduct($order, $filters);
			
			for ($i = 0; $i < $productList->count(); $i++) {
				$productAux = new ProductDto();
				$productAux = $utility->productToProductDto($productList->offsetGet($i));
				
				$productAux = $this->getProductDetail($productAux);
				
				$productListAux->append($productAux);
			}
			
			return $productListAux;
		}
		
		/**
		 * @param int $productId
		 * @return \php\model\BikeDto
		 */
		private function getBikeDetail(int $productId) : BikeDto {
			$bikeDtoAux = new BikeDto();
			$bikeDao = new BikeDao();
			$utility = new Utility();
			
			$bikeDtoAux = $utility->bikeToBikeDto($bikeDao->getBikeById($productId));
			
			return $bikeDtoAux;
		}
		
		/**
		 * @param int $productId
		 * @return \php\model\MotoDto
		 */
		private function getMotoDetail(int $productId) : MotoDto {
			$motoDtoAux = new MotoDto();
			$motoDao = new MotoDao();
			$utility = new Utility();
			
			$motoDtoAux = $utility->motoToMotoDto($motoDao->getMotoById($productId));
			
			return $motoDtoAux;
		}
		
		/**
		 * @param int $productId
		 * @return \php\model\AccesoryDto
		 */
		private function getAccesoryDetail(int $productId) : AccesoryDto {
			$accesoryDtoAux = new AccesoryDto();
			$accesoryDao = new AccesoryDao();
			$utility = new Utility();
			
			$accesoryDtoAux = $utility->accesoryToAccesoryDto($accesoryDao->getAccesoryById($productId));
			
			return $accesoryDtoAux;
		}
		
		/**
		 * @param int $productId
		 * @return \php\model\EquipmentDto
		 */
		private function getEquipmentDetail(int $productId) : EquipmentDto {
			$equipmentDtoAux = new EquipmentDto();
			$equipmentDao = new EquipmentDao();
			$utility = new Utility();
			
			$equipmentDtoAux = $utility->equipmentToEquipmentDto($equipmentDao->getEquipmentById($productId));
			
			return $equipmentDtoAux;
		}
		
		/**
		 * @param int $id
		 * @return Product
		 */
		public function getProductById (int $productId) : ProductDto {
			$productAux = new ProductDto();
			$productDao = new ProductDao();
			$utility = new Utility();
			
			$productAux = $this->productToProductDto($productDao->getProductById($productId));
			
			$productAux = $this->getProductDetail($productAux);
			
			return $productAux;
		}
		
		/**
		 * @param ProductDto $productAux
		 * @return ProductDto
		 */
		private function getProductDetail(ProductDto $productAux) : ProductDto {
			switch ($productAux->getCategory()->getId()) {
				case self::CATEGORY_BIKE:
					$bikeDtoAux = new BikeDto();
					$bikeDtoAux = $this->getBikeDetail($productAux->getId());
					
					$productAux->setSubtype($bikeDtoAux->getType());
					break;
				case self::CATEGORY_MOTO:
					$motoDtoAux = new MotoDto();
					$motoDtoAux = $this->getMotoDetail($productAux->getId());
					
					$productAux->setSubtype($motoDtoAux->getType());
					break;
				case self::CATEGORY_EQUIPMENT:
					$equipmentDtoAux = new EquipmentDto();
					$equipmentDtoAux = $this->getEquipmentDetail($productAux->getId());
					
					$productAux->setSubtype($equipmentDtoAux->getType());
					break;
				case self::CATEGORY_ACCESORY:
					$accesoryDtoAux = new AccesoryDto();
					$accesoryDtoAux = $this->getAccesoryDetail($productAux->getId());
					
					$productAux->setSubtype($accesoryDtoAux->getType());
					break;
			}
			
			return $productAux;
		}
		
		/**
		 * @param \ArrayObject $images
		 * @return String
		 */
		public function writeOtherImages(\ArrayObject $images, int $index) : String {
			$output = "";
			if (null != $images && 0 < $images->count()) {
				if (4 < $images->count()) {
					$output .= '<div class="productOtherSubDiv" id="productOtherPreviousSubDiv">' . "\n";
					if (0 == $index) {
						$output .= '	<span class="page-item">' . "\n";
						$output .= '		<span class="disabled page-link first-child last-child"> &lt;&lt; </span>' . "\n";
						$output .= '	</span>' . "\n";
					} else {
						$output .= '	<a class="page-item">' . "\n";
						$output .= '		<span class="page-link first-child last-child" onclick="showPreviousImage(' . $index . ', ' . ($images->count() - 1) . ');"> &lt;&lt; </span>' . "\n";
						$output .= '	</a>' . "\n";
					}
					$output .= '</div>' . "\n";
				}
				
				$iAux = 0;
				for ($i = 0; $i < $images->count(); $i++) {
					if (1 != $images->offsetGet($i)->getMain() || !$images->offsetGet($i)->getMain()) {
						if (3 > $iAux) {
							$output .= '<div class="productOtherDiv" id="productOtherDiv'. $iAux .'">' . "\n";
							$index ++;
						} else {
							$output .= '<div class="productOtherDivNoDisplay" id="productOtherDiv'. $iAux .'">' . "\n";
						}
						$output .= '	<img id="productOtherImg'. $iAux .'" src="../../../img/products/' . $images->offsetGet($i)->getImage()->getUrl() . '" title="' . $images->offsetGet($i)->getImage()->getName() . ' (' . $images->offsetGet($i)->getImage()->getUrl() . ')" />' . "\n";
						$output .= '	<input type="button" class="btn btnImg" value="Eliminar foto" title="Eliminar foto: ' . $images->offsetGet($i)->getImage()->getUrl() . '" id="productOtherDeleteButton'. $iAux .'" />' . "\n";
						$output .= '</div>' . "\n";
						
						$iAux++;
					}
				}
				
				if (4 < $images->count()) {
					$output .= '<div class="productOtherSubDiv" id="productOtherNextSubDiv">' . "\n";
					if ($images->count() == $index) {
						$output .= '	<span class="page-item">' . "\n";
						$output .= '		<span class="disabled page-link first-child last-child"> &gt;&gt; </span>' . "\n"; // &#9193; >>
						$output .= '	</span>' . "\n";
					} else {
						$output .= '	<a class="page-item">' . "\n";
						$output .= '		<span class="page-link first-child last-child" onclick="showNextImage(' . $index . ', ' . ($images->count() - 1) . ');"> &gt;&gt; </span>' . "\n";
						$output .= '	</a>' . "\n";
					}
					$output .= '</div>' . "\n";
				}
			}
			
			return $output;
		}
		
		/**
		 * @param int $index
		 * @param int $total
		 * @return String
		 */
		public function writeOtherImagesArrowButton(int $index, int $total, String $direction) : String {
			$output = "";
			if (0 == strcasecmp(self::BUTTON_PREVIOUS, $direction)) { // <<
				$indexAux = $index - self::OTHER_IMAGES_VISIBLES;
				
				if (0 > $indexAux) {
					$output .= '	<span class="page-item">' . "\n";
					$output .= '		<span class="disabled page-link first-child last-child"> &lt;&lt; </span>' . "\n";
					$output .= '	</span>' . "\n";
				} else {
					$output .= '	<a class="page-item">' . "\n";
					$output .= '		<span class="page-link first-child last-child" onclick="showPreviousImage(' . $indexAux . ', ' . $total . ');"> &lt;&lt; </span>' . "\n";
					$output .= '	</a>' . "\n";
				}
			} else if (0 == strcasecmp (self::BUTTON_NEXT, $direction)) { // >>
				$indexAux = $index + self::OTHER_IMAGES_VISIBLES;
				
				if (($total - 1) == $index) {
					$output .= '	<span class="page-item">' . "\n";
					$output .= '		<span class="disabled page-link first-child last-child"> &gt;&gt; </span>' . "\n"; // &#9193; >>
					$output .= '	</span>' . "\n";
				} else {
					$output .= '	<a class="page-item">' . "\n";
					$output .= '		<span class="page-link first-child last-child" onclick="showNextImage(' . $indexAux . ', ' . $total . ');"> &gt;&gt; </span>' . "\n";
					$output .= '	</a>' . "\n";
				}
			}
			
			return $output;
		}
		
		/**
		 * @param \ArrayObject $results
		 * @return string
		 */
		public function writeResults(\ArrayObject $results) : String {
			$output = "";
			echo '<div class="adminResults">' . "\n";
			echo '	<span class="resultsNumber">Total resultados: '
						. '<span class="blackResultsNumber">'
							. $results->count()
						. '</span></span>' . "\n";
			echo '</div>' . "\n";
			
			echo '<table class="table">' . "\n";
			echo '	<tr>' . "\n";
			echo '		<th title="ID del producto">ID</th>' . "\n";
			echo '		<th title="Nombre del producto">Nombre</th>' . "\n";
			echo '		<th title="Marca del producto">Marca</th>' . "\n";
			echo '		<th title="Modelo del producto">Modelo</th>' . "\n";
			echo '		<th title="Categor&iacute;a del producto">Categor&iacute;a</th>' . "\n";
			echo '		<th title="Tipo de producto">Tipo</th>' . "\n";
			echo '		<th title="Subtipo de producto">Subtipo</th>' . "\n";
			echo '		<th title="Existencias del producto">Stock</th>' . "\n";
			echo '		<th title="Precio del producto">Precio</th>' . "\n";
			echo '		<th title="Activo">Activo</th>' . "\n";
			echo '		<th colspan="2" title="Acciones sobre el producto">Acciones</th>' . "\n";
			echo '	</tr>' . "\n";
			
			// Listado de productos
			if (0 < $results->count()) {
				for ($i = 0; $i < $results->count(); $i++) {
					if (0 == $i || 2 % $i) {
						echo '	<tr class="impar">' . "\n";
					} else {
						echo '	<tr>' . "\n";
					}
					
					$productAux = new ProductDto();
					$productAux = $results->offsetGet($i);
					echo '		<td class="center">' . $productAux->getId() . '</td>' . "\n";
					echo '		<td>' . $productAux->getName() . '</td>' . "\n";
					echo '		<td>' . $productAux->getMark() . '</td>' . "\n";
					echo '		<td>' . $productAux->getModel() . '</td>' . "\n";
					echo '		<td>' . $productAux->getCategory()->getName() . '</td>' . "\n";
					echo '		<td>' . $productAux->getSubcategory()->getName() . '</td>' . "\n";
					if (null != $productAux->getSubtype()) {
						echo '	<td>' . $productAux->getSubtype()->getName() . '</td>' . "\n";
					} else {
						echo '	<td>' . '-' . '</td>' . "\n";
					}
					echo '		<td class="right">' . $productAux->getStock() . '</td>' . "\n";
					echo '		<td class="right">' . $productAux->getPrice() . ' &euro;</td>' . "\n";
					if (null != $productAux->getActive() && 0 == strcasecmp("1", $productAux->getActive())) {
						echo '	<td class="center"><span title="S&Iacute;">&#10004;</span></td>' . "\n"; // ✔
					} else {
						echo '	<td class="center"<span title="NO">&#10006;</span></td>' . "\n"; // ✘
					}
					echo '		<td class="action">' . "\n";
					echo '			<div class="adminImg">' . "\n";
					echo '				<a href="./modifyProduct.php?productId=' . $productAux->getId() . '">' . "\n";
					echo '					<img src="../img/modify.png" title="Modificar producto" />' . "\n";
					echo '				</a>' . "\n";
					echo '			</div>' . "\n";
					echo '		</td>' . "\n";
					echo '		<td class="action">' . "\n";
					echo '			<div class="adminImg">' . "\n";
					echo '				<img src="../img/delete.png" title="Eliminar producto" />' . "\n";
					echo '			</div>' . "\n";
					echo '		</td>' . "\n";
				}
			} else {
				echo '		<td colspan=10 class="center"> NO HAY PRODUCTOS </td>' . "\n";
			}

			echo '</table>' . "\n";
			
			return $output;
		}

	}
	
	// Control de entrada
	if (isset($_POST['newProductButton'])) { // newProduct.php
		$productControlerObj = new ProductController();
		$productControlerObj->newProduct();
	} else if (isset($_GET['productId'])) {
		/*
		$productControlerObj = new ProductController($_GET['productId']);
		return $productControlerObj->getProductById();
		*/
	} else if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['mark'])
			&& isset($_POST['productCategory']) && isset($_POST['bikeSubType'])
			&& isset($_POST['motoSubType']) && isset($_POST['otherSubType'])
			&& isset($_POST['accesorySubType']) && isset($_POST['equipmentSubType']) && isset($_POST['active'])) { // listProduct.php
		
		$filters = new ProductForm();
		$filters->setId(trim($_POST['id']));
		$filters->setName(trim($_POST['name']));
		$filters->setMark(trim($_POST['mark']));
		$filters->setActive(trim($_POST['active']));
		$filters->setProductCategory($_POST['productCategory']);
		$filters->setBikeSubType($_POST['bikeSubType']);
		$filters->setOtherSubType($_POST['otherSubType']);
		$filters->setAccesorySubType($_POST['accesorySubType']);
		$filters->setEquipmentSubType($_POST['equipmentSubType']);
		
		$productControlerObj = new ProductController();
		echo $productControlerObj->writeResults($productControlerObj->listProduct("", $filters));
	} else if (isset($_POST['index']) && isset($_POST['total']) && isset($_POST['direction'])) { // Botón izquierda y derecha de Otras imágenes
		$productControlerObj = new ProductController();
		$index = $_POST['index'];
		$total = $_POST['total'];
		$direction = $_POST['direction'];
		
		$output2 = $productControlerObj->writeOtherImagesArrowButton($index, $total, $direction);
		error_log("Salida: " . $output2);
		echo $output2;
	} else {
		error_log("Llamada sin parámetros");
	}

?>