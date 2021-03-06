<?php

namespace php\persistence\dao\impl;

/* Establecer la codificación de caracteres interna a UTF-8 */
mb_internal_encoding('UTF-8');

$root = realpath($_SERVER["DOCUMENT_ROOT"]) . "/MotosMaroto";
require $root . '/php/persistence/dao/IProductDao.php';
require_once $root . '/php/persistence/entities/Color.php';
require_once $root . '/php/persistence/entities/Image.php';
require_once $root . '/php/persistence/entities/AccesoryType.php';
require_once $root . '/php/persistence/entities/EquipmentType.php';
require_once $root . '/php/persistence/entities/Product.php';
require_once $root . '/php/persistence/entities/ProductColor.php';
require_once $root . '/php/persistence/entities/ProductImage.php';

use php\form\ProductForm;
use php\persistence\dao\IProductDao;
use php\persistence\dao\impl\BaseDao;
use php\persistence\entities\AccesoryType;
use php\persistence\entities\Category;
use php\persistence\entities\Color;
use php\persistence\entities\EquipmentType;
use php\persistence\entities\Image;
use php\persistence\entities\Product;
use php\persistence\entities\ProductColor;
use php\persistence\entities\ProductImage;

/**
 *
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
	
	const BIKE_SUBCATEGORY = 1;
	const MOTO_SUBCATEGORY = 2;
	const OTHER_SUBCATEGORY = 3;

	/**
	 * Constructor de la clase
	 */
	public function __construct () {
	}

	/**
	 *
	 * @param int $productId
	 * @return \ArrayObject
	 */
	private function getColorsByProductId (int $productId): \ArrayObject {
		// Conexión de la base de datos
		$this->getConnection();

		// SELECT
		$query = "SELECT " . "PC.PRODUCT AS 'PC.PRODUCT', " . "PC.COLOR AS 'PC.COLOR', " . "CO.NAME AS 'CO.NAME', " . "CO.ORIGINAL_NAME AS 'CO.ORIGINAL_NAME' ";
		$query .= "FROM " . "PRODUCTS_COLORS PC, " . "COLOR CO ";
		$query .= "WHERE " . "CO.ID = PC.COLOR " . "AND PC.PRODUCT = " . $productId . " ";

		$result = mysqli_query($this->connection, $query) or die("No funciona - getColorsByProductId");

		$productColorList = new \ArrayObject();

		while ($row = mysqli_fetch_array($result)) {
			$colorAux = new ProductColor();
			$colorAux = $this->marshallProductColor($row);

			$productColorList->append($colorAux);
		}

		return $productColorList;
	}

	/**
	 *
	 * @param int $productId
	 * @return \ArrayObject
	 */
	private function getImagesByProductId (int $productId): \ArrayObject {
		// Conexión de la base de datos
		$this->getConnection();

		// SELECT
		$query = "SELECT " . "PI.PRODUCT AS 'PI.PRODUCT', " . "PI.IMAGE AS 'PI.IMAGE', " . "PI.MAIN AS 'PI.MAIN', " . "PI.ACTIVE AS 'PI.ACTIVE', " . "IM.NAME AS 'IM.NAME', " . "IM.URL AS 'IM.URL' ";
		$query .= "FROM " . "PRODUCTS_IMAGES PI, " . "IMAGE IM ";
		$query .= "WHERE " . "IM.ID = PI.IMAGE " . "AND PI.PRODUCT = " . $productId . " ";
		
		$result = mysqli_query($this->connection, $query) or die("No funciona - getImagesByProductId");

		$productImageList = new \ArrayObject();

		while ($row = mysqli_fetch_array($result)) {
			$imageAux = new ProductImage();
			$imageAux = $this->marshallProductImage($row);

			$productImageList->append($imageAux);
		}

		return $productImageList;
	}

	/**
	 *
	 * {@inheritdoc}
	 * @see \php\persistence\dao\ProductDao::getProductById()
	 */
	public function getProductById (int $id): Product {
		// Conexión de la base de datos
		$this->getConnection();

		// SELECT
		$query = "SELECT " . "PT.ID AS 'PT.ID', " . "PT.NAME AS 'PT.NAME', " . "PT.MARK AS 'PT.MARK', " . "PT.MODEL AS 'PT.MODEL', " . "PT.DESCRIPTION AS 'PT.DESCRIPTION', " . "PT.OBSERVATIONS AS 'PT.OBSERVATIONS', " . "PC.ID AS 'PC.ID', " . "PC.NAME AS 'PC.NAME', " . "PS.ID AS 'PS.ID', " . "PS.NAME AS 'PS.NAME', " . "PT.STOCK AS 'PT.STOCK', " . "PT.PRICE AS 'PT.PRICE', " . "PT.RENT AS 'PT.RENT', " . "PT.ACTIVE AS 'PT.ACTIVE' ";
		$query .= "FROM " . "PRODUCT PT, " . "PRODUCT_CATEGORY PC, " . "PRODUCT_SUBCATEGORY PS ";
		$query .= "WHERE " . "PT.ID = " . $id . " " . "AND PC.ID = PT.CATEGORY " . "AND PS.ID = PT.SUBCATEGORY ";
		
		error_log($query);
		$result = mysqli_query($this->connection, $query) or die("No funciona - getProductById");

		$row = mysqli_fetch_array($result);
		$productAux = new Product();
		$productAux = $this->marshallProduct($row);

		return $productAux;
	}
	
	/**
	*
	* {@inheritdoc}
	* @see \php\persistence\dao\ProductDao::getProductBySubCategory()
	*/
	public function getProductBySubcategory (int $idSubcategory) : \ArrayObject {
		// Conexión de la base de datos
		$this->getConnection();
		
		// SELECT
		$query = "SELECT " . "PT.ID AS 'PT.ID', " . "PT.NAME AS 'PT.NAME', " . "PT.MARK AS 'PT.MARK', " . "PT.MODEL AS 'PT.MODEL', " . "PT.DESCRIPTION AS 'PT.DESCRIPTION', " . "PT.OBSERVATIONS AS 'PT.OBSERVATIONS', " . "PC.ID AS 'PC.ID', " . "PC.NAME AS 'PC.NAME', " . "PS.ID AS 'PS.ID', " . "PS.NAME AS 'PS.NAME', " . "PT.STOCK AS 'PT.STOCK', " . "PT.PRICE AS 'PT.PRICE', " . "PT.OLD_PRICE AS 'PT.OLD_PRICE', " . "PT.RENT AS 'PT.RENT', " . "PT.ACTIVE AS 'PT.ACTIVE' ";
		$query .= "FROM " . "PRODUCT PT, " . "PRODUCT_CATEGORY PC, " . "PRODUCT_SUBCATEGORY PS ";
		$query .= "WHERE " . "PS.ID = " . $idSubcategory . " " . "AND PC.ID = PT.CATEGORY " . "AND PS.ID = PT.SUBCATEGORY ";
		
		error_log($query);
		$result = mysqli_query($this->connection, $query) or die("No funciona - getProductByCategory");

		$productList = new \ArrayObject();
		while ($row = mysqli_fetch_array($result)) {
			$productAux = new Product();
			$productAux = $this->marshallProduct($row);

			$productList->append($productAux);
		}

		return $productList;
	}
	
	/**
	*
	* {@inheritdoc}
	* @see \php\persistence\dao\ProductDao::getProductTypeBySubcategory()
	*/
	public function getProductTypeBySubcategory(int $idSubcategory) : \ArrayObject {
		// Conexión de la base de datos
		$this->getConnection();
		
		// SELECT
		$query = "SELECT " . "PT.ID AS 'PT.ID', " . "PT.NAME AS 'PT.NAME' ";
		$query .= "FROM ";
		if (self::BIKE_SUBCATEGORY == $idSubcategory) {
			$query .= " BIKE_TYPE PT ";
		} else if (self::MOTO_SUBCATEGORY == $idSubcategory) {
			$query .= " MOTO_TYPE PT ";
		} else if (self::OTHER_SUBCATEGORY == $idSubcategory) {
			$query .= " OTHER_TYPE PT ";
		}
		
		error_log($query);
		$result = mysqli_query($this->connection, $query) or die("No funciona - getProductTypeBySubcategory");
		
		$productTypeList = new \ArrayObject();
		while ($row = mysqli_fetch_array($result)) {
			$productTypeAux = new Category();
			$productTypeAux = $this->marshallProductType($row);

			$productTypeList->append($productTypeAux);
		}

		return $productTypeList;
	}

	/**
	 *
	 * @param String $order
	 * @param ProductForm $filters
	 * @return \ArrayObject
	 */
	public function listProduct (String $order, ProductForm $filters): \ArrayObject {
		// Conexión de la base de datos
		$this->getConnection();

		$arrayResult = $this->getConditions($filters);
		if (! empty($arrayResult)) {
			error_log("Condiciones de búsqueda: " . $arrayResult[0] . " " . $arrayResult[1]);
		}

		// SELECT
		$query = "SELECT " . "PT.ID AS 'PT.ID', " . "PT.NAME AS 'PT.NAME', " . "PT.MARK AS 'PT.MARK', " . "PT.MODEL AS 'PT.MODEL', " . "PT.DESCRIPTION AS 'PT.DESCRIPTION', " . "PT.OBSERVATIONS AS 'PT.OBSERVATIONS', " . "PC.ID AS 'PC.ID', " . "PC.NAME AS 'PC.NAME', " . "PS.ID AS 'PS.ID', " . "PS.NAME AS 'PS.NAME', " . "PT.STOCK AS 'PT.STOCK', " . "PT.PRICE AS 'PT.PRICE', " . "PT.OLD_PRICE AS 'PT.OLD_PRICE', " . "PT.RENT AS 'PT.RENT', " . "PT.ACTIVE AS 'PT.ACTIVE' ";
		$query .= "FROM " . "PRODUCT PT, " . "PRODUCT_CATEGORY PC, " . "PRODUCT_SUBCATEGORY PS " . $arrayResult[0];
		$query .= "WHERE " . "PC.ID = PT.CATEGORY " . "AND PS.ID = PT.SUBCATEGORY " . $arrayResult[1] . "ORDER BY " . "PT.ID ASC ";
		
		error_log($query);
		$result = mysqli_query($this->connection, $query) or die("No funciona - listProduct");

		$productList = new \ArrayObject();
		while ($row = mysqli_fetch_array($result)) {
			$productAux = new Product();
			$productAux = $this->marshallProduct($row);

			$productList->append($productAux);
		}

		return $productList;
	}

	/**
	 *
	 * @param array $row
	 * @return ProductColor
	 */
	private function marshallProductColor (array $row): ProductColor {
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
	 *
	 * @param array $row
	 * @return ProductImage
	 */
	private function marshallProductImage (array $row): ProductImage {
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
	 *
	 * @param array $row
	 * @return Product
	 */
	private function marshallProduct (array $row): Product {
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
		$productAux->setPrice(number_format($row['PT.PRICE'], 2, ',', '.')); // Con formato de decimal con separador con coma y de miles con punto
		if (null != $row['PT.OLD_PRICE']) {
			$productAux->setOldPrice(number_format($row['PT.OLD_PRICE'], 2, ',', '.'));
		} else {
			$productAux->setOldPrice(null);
		}
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
	 *
	 * @param array $row
	 * @return Product
	 */
	private function marshallProductType (array $row): Category {
		$categoryAux = new Category();
		
		$categoryAux->setId($row['PT.ID']);
		$categoryAux->setName($row['PT.NAME']);
		
		return $categoryAux;
	}

	/**
	 *
	 * @param Product $product
	 * @param int $userId
	 */
	public function modifyProduct (Product $product, int $userId): void {
		$this->update($product, $userId);
	}

	/**
	 *
	 * @param Product $product
	 * @param int $userId
	 * @return int
	 */
	public function newProduct (Product $product, int $userId): int {
		$id = $this->save($product, $userId);

		return $id;
	}

	/**
	 * Modifica en Base de Datos un producto
	 *
	 * @param \php\persistence\entities\Product $product
	 * @param int $userId
	 */
	private function update (Product $product, int $userId): void {
		// Conexión de la base de datos
		$this->getConnection();

		$query = "UPDATE PRODUCT ";
		$query .= "SET ";
		$query .= "name = '" . utf8_encode($product->getName()) . "', ";
		$query .= "mark = '" . utf8_encode($product->getMark()) . "', ";
		$query .= "model = '" . utf8_encode($product->getModel()) . "', ";
		$query .= "description = '" . utf8_encode($product->getDescription()) . "', ";
		$query .= "price = " . $product->getPrice() . ", ";
		$query .= "category = " . $product->getCategory() . ", ";
		$query .= "subcategory = " . $product->getSubcategory() . ", ";
		$query .= "stock = " . $product->getStock() . ", ";
		$query .= "rent = " . $product->getRent() . ", ";
		$query .= "observations = " . utf8_encode($product->getObservations()) . ", ";
		$query .= "active = " . $product->getActive() . ", ";
		$query .= "product_date = " . $product->getProductDate() . ", ";
		$query .= "last_modify_date = " . "CURRENT_TIMESTAMP, "; // Fecha del sistema
		$query .= "last_modify_user = " . $userId . " ";
		$query .= "WHERE id = " . $product->getId();

		error_log("Consulta a ejecutar: " . $query, 0);
		mysqli_query($this->connection, $query);

		$result = mysqli_affected_rows($this->connection);
		error_log("Registros actualizados: " . $result);
	}

	/**
	 * Guarda en Base de Datos un producto devolviendo el ID asignado
	 *
	 * @param Product $product
	 * @param int $userId
	 * @return int
	 */
	private function save (Product $product, int $userId): int {
		// Conexión de la base de datos
		$this->getConnection();

		$query = "INSERT INTO PRODUCT ";
		$query .= "(name, mark, model, description, price, category, subcategory, stock, rent, observations, active, product_date, create_date, last_modify_date, last_modify_user) ";
		$query .= "VALUES ";
		$query .= "('" . $product->getName() . "', " . "'" . $product->utf8_encode(getMark()) . "', " . "'" . $product->utf8_encode(getModel()) . "', " . "'" . $product->utf8_encode(getDescription()) . "', " . $product->getPrice() . ", " . $product->getCategory() . ", " . $product->getSubcategory() . ", " . $product->getStock() . ", " . $product->getRent() . ", " . "'" . $product->utf8_encode(getObservations()) . "', " . $product->getActive() . "', " . "'" . $product->getProductDate() . "', " . "CURRENT_TIMESTAMP, " . "CURRENT_TIMESTAMP, " . "'" . $userId . "'" . " )";

		error_log("Consulta a ejecutar: " . $query, 0);
		mysqli_query($this->connection, $query);

		$id = mysqli_insert_id($this->connection); // Último ID asignado
		error_log("ID Asignado: " . $id, 0);

		return $id;
	}

	/**
	 *
	 * @param ProductForm $filters
	 * @return string
	 */
	private function getConditions (ProductForm $filters): array {
		$tables = " ";
		$conditions = " ";

		if (! empty($filters->getId())) {
			$conditions .= "AND PT.ID = " . $filters->getId() . " ";
		}
		if (! empty($filters->getName())) {
			$conditions .= "AND PT.NAME LIKE '%" . $filters->getName() . "%' ";
		}
		if (! empty($filters->getMark())) {
			$conditions .= "AND PT.MARK LIKE '%" . $filters->getMark() . "%' ";
		}
		if (! empty($filters->getProductCategory()) && 0 != strcasecmp("none", $filters->getProductCategory())) {
			$conditions .= "AND PT.CATEGORY = " . $filters->getProductCategory() . " ";

			// Comprobar subtipos
			switch ($filters->getProductCategory()) {
				case self::BIKE:
					if (! empty($filters->getBikeSubType()) && 0 != strcasecmp("none", $filters->getBikeSubType())) {
						$tables .= ", BIKE BIKE "; 
						$conditions .= "AND BIKE.ID = PT.ID AND BIKE.TYPE = " . $filters->getBikeSubType() . " ";
					}
					break;
				case self::MOTO:
					if (! empty($filters->getMotoSubType()) && 0 != strcasecmp("none", $filters->getMotoSubType())) {
						$tables .= ", MOTO MOTO "; 
						$conditions .= "AND MOTO.ID = PT.ID AND MOTO.TYPE = " . $filters->getMotoSubType() . " ";
					}
					break;
				case self::EQUIPMENT:
					if (! empty($filters->getEquipmentSubType()) && 0 != strcasecmp("none", $filters->getEquipmentSubType())) {
						$tables .= ", EQUIPMENT EQUIPMENT "; 
						$conditions .= "AND EQUIPMENT.ID = PT.ID AND EQUIPMENT.TYPE = " . $filters->getEquipmentSubType() . " ";
					}
					break;
				case self::ACCESORY:
					if (! empty($filters->getAccesorySubType()) && 0 != strcasecmp("none", $filters->getAccesorySubType())) {
						$tables .= ", ACCESORY ACCESORY "; 
						$conditions .= "AND ACCESORY.ID = PT.ID AND ACCESORY.TYPE = " . $filters->getAccesorySubType() . " ";
					}
					break;
				case self::OTHER:
					if (! empty($filters->getOtherSubType()) && 0 != strcasecmp("none", $filters->getOtherSubType())) {
						$conditions .= "AND PT.SUBCATEGORY = " . $filters->getOtherSubType() . " ";
					}
					break;
			}
		}
		if (! empty($filters->getActive())) {
			if (0 == strcasecmp("TRUE", $filters->getActive())) { // Lo toma como cadena de texto
				$conditions .= "AND PT.ACTIVE IS TRUE ";
			}
		}

		return array ($tables, $conditions);
	}
}

?>