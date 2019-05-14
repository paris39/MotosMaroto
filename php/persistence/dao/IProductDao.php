<?php

	namespace php\persistence\dao;
	
	use php\form\ProductForm;
	use php\model\ProductDto;

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
		 * @param ProductDto $productDto
		 * @return int
		 */
		public function newProduct(ProductDto $productDto) : int;

	}

?>