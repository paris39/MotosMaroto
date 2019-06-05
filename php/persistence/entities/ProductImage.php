<?php

	namespace php\persistence\entities;
	
	/**
	 * @author JPD
	 */
	class ProductImage {
		
		private $productId;
		private $image;
		private $main;
		private $createDate;
		private $lastModifyDate;
		
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
		 * @return mixed
		 */
		public function getCreateDate() {
			return $this->createDate;
		}
	
		/**
		 * @return mixed
		 */
		public function getLastModifyDate() {
			return $this->lastModifyDate;
		}
	
		/**
		 * @param mixed $productId
		 */
		public function setProductId($productId) {
			$this->idProduct = $productId;
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
		 * @param mixed $createDate
		 */
		public function setCreateDate($createDate) {
			$this->createDate = $createDate;
		}
	
		/**
		 * @param mixed $lastModifyDate
		 */
		public function setLastModifyDate($lastModifyDate) {
			$this->lastModifyDate = $lastModifyDate;
		}
	
	}

?>