<?php

	namespace php\model;
	
	/**
	 * @author JPD
	 */
	class ProductColorDto {
		
		private $productId;
		private $color;

		/**
		 * @return mixed
		 */
		public function getProductId() {
			return $this->productId;
		}
	
		/**
		 * @return mixed
		 */
		public function getColor() {
			return $this->color;
		}
	
		/**
		 * @param mixed $product
		 */
		public function setProductId($productId) {
			$this->productId = $productId;
		}
	
		/**
		 * @param mixed $color
		 */
		public function setColor($color) {
			$this->color = $color;
		}
	
		/**
		 * Constructor de la clase
		 */
		public function __construct() {
		}

	}

?>