<?php

	namespace php\persistence\dao;
	
	use php\form\ProductForm;
	use php\persistence\entities\Product;

	/**
	 * @author JPD
	 */
	interface IProductDao {
		
		/**
		 * Función que devuelve un Producto por su ID
		 * 
		 * @param int $id
		 * @return Product
		 */
		public function getProductById (int $id) : Product;
		
		/**
		 * Función que lista productos en función del filtro utilizado y un orden
		 * 
		 * @param String $order
		 * @param ProductForm $filters
		 * @return \ArrayObject
		 */
		public function listProduct(String $order, ProductForm $filters): \ArrayObject;
		
		/**
		 * Función que inserta un producto en Base de Datos
		 * 
		 * @param Product $product
		 * @param int $userId
		 * @return int
		 */
		public function newProduct(Product $product, int $userId) : int;

	}

?>