<?php

	namespace php\persistence\dao\impl;
	
	/* Establecer la codificación de caracteres interna a UTF-8 */
	mb_internal_encoding('UTF-8');
	
	$root = realpath($_SERVER["DOCUMENT_ROOT"]) . "\MotosMaroto";
	require_once $root . '\php\persistence\dao\IProductDao.php';
	require_once $root . '\php\persistence\entities\Color.php';
	require_once $root . '\php\persistence\entities\Image.php';
	require_once $root . '\php\persistence\entities\Product.php';
	require_once $root . '\php\persistence\entities\ProductColor.php';
	require_once $root . '\php\persistence\entities\ProductImage.php';
	
	use php\form\ProductForm;
	use php\persistence\dao\IProductDao;
	use php\persistence\dao\impl\BaseDao;
	use php\persistence\entities\Category;
	use php\persistence\entities\Color;
	use php\persistence\entities\Image;
	use php\persistence\entities\Product;
	use php\persistence\entities\ProductColor;
	use php\persistence\entities\ProductImage;

	/**
	 * @author JPD
	 */
	class ProductDao extends BaseDao implements IProductDao {
		
		/**
		 * Constantes del código de subcategorías en Base de datos
		 */
		const BIKE = 1;
		const MOTO = 2;
		const EQUIPMENT = 3;
		const ACCESORY = 4;
		const OTHER = 5;
				
		/**
		 * Constructor de la clase
		 */
		public function __construct() {
		}
		
		/**
		 * @param int $productId
		 * @return \ArrayObject
		 */
		private function getColorsByProductId (int $productId) : \ArrayObject {
			// Conexión de la base de datos
			$this->getConnection();
			
			// SELECT
			$query = "SELECT "
						. "PC.PRODUCT AS 'PC.PRODUCT', "
						. "PC.COLOR AS 'PC.COLOR', "
						. "CO.NAME AS 'CO.NAME', "
						. "CO.ORIGINAL_NAME AS 'CO.ORIGINAL_NAME' "
					. "FROM "
						. "PRODUCTS_COLORS PC, "
						. "COLOR CO "
					. "WHERE "
						. "CO.ID = PC.COLOR "
						. "AND PC.PRODUCT = " . $productId . " ";
																							
			$result = mysqli_query($this->connection, $query) or die ("No funciona - getColorsByProductId");
			
			$productColorList = new \ArrayObject();
			
			while ($row = mysqli_fetch_array($result)) {
				$colorAux = new ProductColor();
				$colorAux = $this->marshallProductColor($row);
				
				$productColorList->append($colorAux);
			}
			
			return $productColorList;
		}
		
		/**
		 * @param int $productId
		 * @return \ArrayObject
		 */
		private function getImagesByProductId (int $productId) : \ArrayObject {
			// Conexión de la base de datos
			$this->getConnection();
			
			// SELECT
			$query = "SELECT "
						. "PI.PRODUCT AS 'PI.PRODUCT', "
						. "PI.IMAGE AS 'PI.IMAGE', "
						. "PI.MAIN AS 'PI.MAIN', "
						. "PI.ACTIVE AS 'PI.ACTIVE', "
						. "IM.NAME AS 'IM.NAME', "
						. "IM.URL AS 'IM.URL' "
					. "FROM "
						. "PRODUCTS_IMAGES PI, "
						. "IMAGE IM "
					. "WHERE "
						. "IM.ID = PI.IMAGE "
						. "AND PI.PRODUCT = " . $productId . " ";
				
			$result = mysqli_query($this->connection, $query) or die ("No funciona - getImagesByProductId");
			
			$productImageList = new \ArrayObject();
			
			while ($row = mysqli_fetch_array($result)) {
				$imageAux = new ProductImage();
				$imageAux = $this->marshallProductImage($row);
				
				$productImageList->append($imageAux);
			}
			
			return $productImageList;
		}
		
		/**
		 * {@inheritdoc}
		 * @see \php\persistence\dao\ProductDao::getProductById()
		 */
		public function getProductById (int $id) : Product {
			// Conexión de la base de datos
			$this->getConnection();
			
			// SELECT
			$query = "SELECT "
						. "PT.ID AS 'PT.ID', "
						. "PT.NAME AS 'PT.NAME', "
						. "PT.MARK AS 'PT.MARK', "
						. "PT.MODEL AS 'PT.MODEL', "
						. "PT.DESCRIPTION AS 'PT.DESCRIPTION', "
						. "PT.OBSERVATIONS AS 'PT.OBSERVATIONS', "
						. "PC.ID AS 'PC.ID', "
						. "PC.NAME AS 'PC.NAME', "
						. "PS.ID AS 'PS.ID', "
						. "PS.NAME AS 'PS.NAME', "
						. "PT.STOCK AS 'PT.STOCK', "
						. "PT.PRICE AS 'PT.PRICE', "
						. "PT.RENT AS 'PT.RENT', "
						. "PT.ACTIVE AS 'PT.ACTIVE' "
					. "FROM "
						. "PRODUCT PT, "
						. "PRODUCT_CATEGORY PC, "
						. "PRODUCT_SUBCATEGORY PS "
					. "WHERE "
						. "PT.ID = " . $id . " "
						. "AND PC.ID = PT.CATEGORY "
						. "AND PS.ID = PT.SUBCATEGORY ";
																										
			$result = mysqli_query($this->connection, $query) or die ("No funciona - getProductById");
			
			$row = mysqli_fetch_array($result);
			$productAux = new Product();
			$productAux = $this->marshallProduct($row);
			
			return $productAux;
		}
		
		/**
		 * @param String $order
		 * @param ProductForm $filters
		 * @return \ArrayObject
		 */
		public function listProduct(String $order, ProductForm $filters): \ArrayObject {
			// Conexión de la base de datos
			$this->getConnection();
			
			$conditions = $this->getConditions($filters);
			if (!empty(trim($conditions))) {
				error_log("Condiciones de busqueda: " . $conditions);
			}
			
			// SELECT
			$query = "SELECT "
						. "PT.ID AS 'PT.ID', "
						. "PT.NAME AS 'PT.NAME', "
						. "PT.MARK AS 'PT.MARK', "
						. "PT.MODEL AS 'PT.MODEL', "
						. "PT.DESCRIPTION AS 'PT.DESCRIPTION', "
						. "PT.OBSERVATIONS AS 'PT.OBSERVATIONS', "
						. "PC.ID AS 'PC.ID', "
						. "PC.NAME AS 'PC.NAME', "
						. "PS.ID AS 'PS.ID', "
						. "PS.NAME AS 'PS.NAME', "
						. "PT.STOCK AS 'PT.STOCK', "
						. "PT.PRICE AS 'PT.PRICE', "
						. "PT.RENT AS 'PT.RENT', "
						. "PT.ACTIVE AS 'PT.ACTIVE' "
					. "FROM "
						. "PRODUCT PT, "
						. "PRODUCT_CATEGORY PC, "
						. "PRODUCT_SUBCATEGORY PS "
					. "WHERE "
						. "PC.ID = PT.CATEGORY "
						. "AND PS.ID = PT.SUBCATEGORY "
						. $conditions
					. "ORDER BY "
						. "PT.ID ASC ";
																											
			$result = mysqli_query($this->connection, $query) or die ("No funciona - listProduct");
			
			$productList = new \ArrayObject();
			
			while ($row = mysqli_fetch_array($result)) {
				$productAux = new Product();
				$productAux = $this->marshallProduct($row);
				
				$productList->append($productAux);
			}
			
			return $productList;
		}
		
		/**
		 * @param array $row
		 * @return ProductColor
		 */
		private function marshallProductColor(array $row) : ProductColor {
			$colorAux = new Color();
			$productColorAux = new ProductColor();
			
			$productColorAux->setProductId($row['PC.PRODUCT']);
			$colorAux->setId($row['PC.COLOR']);
			$colorAux->setName(utf8_encode($row['CO.NAME']));
			$colorAux->setOriginalName(utf8_encode($row['CO.ORIGINAL_NAME']));
			$productColorAux->setColor($colorAux);
			
			return $productColorAux;
		}
		
		/**
		 * @param array $row
		 * @return ProductImage
		 */
		private function marshallProductImage(array $row) : ProductImage {
			$imageAux = new Image();
			$productImageAux = new ProductImage();
			
			$productImageAux->setProductId($row['PI.PRODUCT']);
			$imageAux->setId($row['PI.IMAGE']);
			$imageAux->setName(utf8_encode($row['IM.NAME']));
			$imageAux->setUrl(utf8_encode($row['IM.URL']));
			$productImageAux->setImage($imageAux);
			$productImageAux->setMain($row['PI.MAIN']);
			$productImageAux->setActive($row['PI.ACTIVE']);
			
			return $productImageAux;
		}
		
		/**
		 * @param array $row
		 * @return Product
		 */
		private function marshallProduct (array $row) : Product {
			$productAux = new Product();
			$categoryAux = new Category();
			$subcategoryAux = new Category();
			
			$productAux->setId($row['PT.ID']);
			$productAux->setName(utf8_encode($row['PT.NAME']));
			$productAux->setMark(utf8_encode($row['PT.MARK']));
			$productAux->setModel(utf8_encode($row['PT.MODEL']));
			$productAux->setDescription(utf8_encode($row['PT.DESCRIPTION']));
			$productAux->setObservations(utf8_encode($row['PT.OBSERVATIONS']));
			$productAux->setStock($row['PT.STOCK']);
			$productAux->setPrice(number_format($row['PT.PRICE'], 2, '.', ''));
			$productAux->setActive($row['PT.ACTIVE']);
			$productAux->setRent($row['PT.RENT']);
			$categoryAux->setId($row['PC.ID']);
			$categoryAux->setName(utf8_encode($row['PC.NAME']));
			$subcategoryAux->setId($row['PS.ID']);
			$subcategoryAux->setName(utf8_encode($row['PS.NAME']));
			$productAux->setCategory($categoryAux);
			$productAux->setSubcategory($subcategoryAux);
			$productAux->setColors($this->getColorsByProductId($productAux->getId()));
			$productAux->setImages($this->getImagesByProductId($productAux->getId()));
			
			return $productAux;
		}
		
		/**
		 * @param Product $product
		 * @return int
		 */
		public function newProduct(Product $product) : int {
			$id = $this->save($product);
			
			return $id;
		}
		
		/**
		 * Guarda en Base de Datos un producto devolviendo el ID asignado
		 * 
		 * @param Product $product
		 * @return int
		 */
		private function save (Product $product) : int {
			// Conexión de la base de datos
			$this->getConnection();
			
			$query = "INSERT INTO PRODUCT " 
						. "(name, mark, model, description, price, category, subcategory, stock, rent, observations, active, product_date, create_date, last_modify_date) "
					. " VALUES "
						. " ('" . $product->getName() . "', "
						. "'" . $product->getMark() . "', " 
						. "'" . $product->getModel() . "', " 
						. "'" . $product->getDescription() . "', " 
						. $product->getPrice() . ", " 
						. $product->getCategory() . ", " 
						. $product->getSubcategory() . ", " 
						. $product->getStock() . ", " 
						. $product->getRent() . ", " 
						. "'" . $product->getObservations() . "', " 
						. "'" . $product->getActive() . "', " 
						. "'" . $product->getProductDate() . "', " 
						. "CURRENT_TIMESTAMP, " 
						. "CURRENT_TIMESTAMP "
						. " )";
			error_log("Consulta a ejecutar: " . $query, 0);
			mysqli_query($this->connection, $query);
			
			$id = mysqli_insert_id($this->connection); // Último ID asignado
			error_log("ID Asignado: " . $id, 0);
			
			return $id;
		}
		
		/**
		 * @param ProductForm $filters
		 * @return string
		 */
		private function getConditions (ProductForm $filters) : string {
			$conditions = " ";
			
			if (!empty($filters->getId())) {
				$conditions .= "AND PT.ID = " . $filters->getId() . " ";
			}
			if (!empty($filters->getName())) {
				$conditions .= "AND PT.NAME LIKE '%" . $filters->getName() . "%' ";
			}
			if (!empty($filters->getMark())) {
				$conditions .= "AND PT.MARK LIKE '%" . $filters->getMark() . "%' ";
			}
			if (!empty($filters->getProductCategory()) && 0 != strcasecmp("none", $filters->getProductCategory())) {
				$conditions .= "AND PT.CATEGORY = " . $filters->getProductCategory() . " ";
				
				// Comprobar subtipos
				switch ($filters->getProductCategory()) {
					case self::BIKE:
						if (!empty($filters->getBikeSubType()) && 0 != strcasecmp("none", $filters->getBikeSubType())) {
							$conditions .= "AND PT.SUBCATEGORY = " . $filters->getBikeSubType() . " ";
						}
						break;
					case self::MOTO:
						if (!empty($filters->getMotoSubType()) && 0 != strcasecmp("none", $filters->getMotoSubType())) {
							$conditions .= "AND PT.SUBCATEGORY = " . $filters->getMotoSubType() . " ";
						}
						break;
					case self::EQUIPMENT:
						if (!empty($filters->getEquipmentSubType()) && 0 != strcasecmp("none", $filters->getEquipmentSubType())) {
							$conditions .= "AND PT.SUBCATEGORY = " . $filters->getEquipmentSubType() . " ";
						}
						break;
					case self::ACCESORY:
						if (!empty($filters->getAccesorySubType()) && 0 != strcasecmp("none", $filters->getAccesorySubType())) {
							$conditions .= "AND PT.SUBCATEGORY = " . $filters->getAccesorySubType() . " ";
						}
						break;
					case self::OTHER:
						if (!empty($filters->getOtherSubType()) && 0 != strcasecmp("none", $filters->getOtherSubType())) {
							$conditions .= "AND PT.SUBCATEGORY = " . $filters->getOtherSubType() . " ";
						}
						break;
				}
			}
			if (!empty($filters->getActive())) {
				if (0 == strcasecmp("TRUE", $filters->getActive())) { // Lo toma como cadena de texto
					$conditions .= "AND PT.ACTIVE IS TRUE ";
				}
			}
			
			return $conditions;
		}
		

		
	}

?>