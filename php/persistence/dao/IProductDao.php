<?php

	namespace php\persistence\dao;
	
	use php\model\ProductDto;

	interface IProductDao {
	
		/**
		 * Función que inserta un producto en Base de Datos
		 * 
		 * @param ProductDto $productDto
		 * @return int
		 */
		public function newProduct(ProductDto $productDto) : int;

	}

?>