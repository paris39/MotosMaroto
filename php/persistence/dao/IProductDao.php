<?php

	namespace php\persistence\dao;
	
	use php\form\ProductForm;
	use php\persistence\entities\Product;

	/**
	 * @author JPD
	 */
	interface IProductDao {
	
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
		 * @return int
		 */
		public function newProduct(Product $product) : int;

	}

?>