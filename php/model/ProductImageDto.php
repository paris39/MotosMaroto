<?php

	namespace php\model;
	
	/**
	 * @author JPD
	 */
	class ProductImageDto {
		
		private $productId;
		private $image;
		private $main;
		private $active;

		/**
		 * Constructor de la clase
		 */
		public function __construct() {
		}
		
		/**
		 * @return mixed
		 */
		public function getProductId() {
			return $this->productId;
		}
	
		/**
		 * @return mixed
		 */
		public function getImage() {
			return $this->image;
		}
	
		/**
		 * @return mixed
		 */
		public function getMain() {
			return $this->main;
		}
	
		/**
		 * @param mixed $productId
		 */
		public function setProductId($productId) {
			$this->productId = $productId;
		}
	
		/**
		 * @param mixed $image
		 */
		public function setImage($image) {
			$this->image = $image;
		}
	
		/**
		 * @param mixed $main
		 */
		public function setMain($main) {
			$this->main = $main;
		}
		
		/**
		 * @return mixed
		 */
		public function getActive() {
			return $this->active;
		}
		
		/**
		 * @param mixed $active
		 */
		public function setActive($active) {
			$this->active = $active;
		}
	
	}

?>