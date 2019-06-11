<?php

	namespace php\persistence\entities;
	
	/**
	 * @author JPD
	 */
	class ProductColor {
		
		private $productId;
		private $color;
		private $createDate;
		private $lastModifyDate;
	
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
			$this->productId = $productId;
		}
	
		/**
		 * @param mixed $color
		 */
		public function setColor($color) {
			$this->color = $color;
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
	
		/**
		 * Constructor de la clase
		 */
		public function __construct() {
		}

	}

?>