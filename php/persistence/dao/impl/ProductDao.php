<?php

	namespace php\persistence\dao\impl;
	
	require '../config/Config.php';
	require '../persistence/dao/IProductDao.php';
	require '../persistence/entities/Product.php';
	
	use php\persistence\dao\IProductDao;
	use php\config\Config;
	use php\model\ProductDto;
	use php\persistence\entities\Product;

	/**
	 * @author JPD
	 */
	class ProductDao implements IProductDao {
		
		/**
		 * Configuración de la Base de Datos
		 * 
		 * @var unknown
		 */
		private $connection;
		
		/**
		 * Constructor de la clase
		 */
		public function __construct() {
		}
		
		public function newProduct(ProductDto $productDto) : int {
			$configObj = new Config();
			$this->connection = $configObj->getConnection();
			$id = $this->save($this.marshall($productDto)); // Conversión de tipo
			
			return $id;
		}
		
		/**
		 * Guarda en Base de Datos un producto devolviendo el ID asignado
		 * 
		 * @param Product $product
		 * @return int
		 */
		private function save (Product $product) : int {
			$query = "INSERT INTO PRODUCT
						(name, mark, model, description, price, category, subcategory, stock, rent, observarions, active, product_date, create_date, last_modify_date)
					VALUES
						(" . $product.getName() . ", "
							. $product.getMark() . ", "
							. $product.getModel() . ", "
							. $product.getDescription() . ", "
							. $product.getPrice() . ", "
							. $product.getCategory() . ", "
							. $product.getSubcategory() . ", "
							. $product.getStock() . ", "
							. $product.getRent() . ", "
							. $product.getObservations() . ", "
							. $product.getActive() . ", "
							. $product.getProductDate() . ", "
							. "CURRENT_TIMESTAMP, "
							. "CURRENT_TIMESTAMP"
						. ")";
			mysqli_query($this.connection, $query);
			$id = mysqli_insert_id(); // Último ID asignado
			
			return $id;
		}
		
		/**
		 * Marshall ProductDto > Product
		 * 
		 * @param ProductDto $productDto
		 * @return Product
		 */
		private function marshall (ProductDto $productDto) : Product {
			$product = new Product();
			
			$product.setName($productDto.getName()); // Nombre
			$product.setMark($productDto.getMark()); // Marca
			$product.setModel($productDto.getModel()); // Modelo
			$product.setDescription($productDto.getDescription()); // Descripción
			$product.setPrice($productDto.getPrice()); // Precio
			$product.setCategory($productDto.getCategory()); // Categoría
			$product.setSubcategory($productDto.getSubcategory()); // Subcategoría
			$product.setStock($productDto.getStock()); // Existencias
			$product.setRent($productDto.getRent()); // Alquiler
			$product.setObservations($productDto.getObservations()); // Observaciones
			$product.setActive($productDto.getActive()); // Activo en la web
			// Año de fabricación
			if (isInt($productDto.getProductDate()) || isNumeric($productDto.getProductDate())) {
				$product.setProductDate("01/01".$productDto.getProductDate());
			} else {
				$product.setProductDate($productDto.getProductDate());
			}
			
			return $product;
		}
	}

?>