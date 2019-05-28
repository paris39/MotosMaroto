<?php

	namespace php\model;
	
	/**
	 * @author JPD
	 */
	class ProductImage {
		
		private $idProduct;
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
		public function getIdProduct() {
			return $this->idProduct;
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
		 * @param mixed $idProduct
		 */
		public function setIdProduct($idProduct) {
			$this->idProduct = $idProduct;
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