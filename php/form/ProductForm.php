<?php

	namespace php\form;
	
	/**
	 * @author JPD
	 */
	class ProductForm {
		
		private $id;
		private $name;
		private $mark;
		private $active;
		private $productCategory;
		private $bikeSubType;
		private $motoSubType;
		private $otherSubType;
		private $accesorySubType;
		private $equipmentSubType;
		
		/**
		 * @return mixed
		 */
		public function getId() {
			return $this->id;
		}
	
		/**
		 * @return mixed
		 */
		public function getName() {
			return $this->name;
		}
	
		/**
		 * @return mixed
		 */
		public function getMark() {
			return $this->mark;
		}
		
		/**
		 * @return mixed
		 */
		public function getActive() {
			return $this->active;
		}
	
		/**
		 * @return mixed
		 */
		public function getProductCategory() {
			return $this->productCategory;
		}
	
		/**
		 * @return mixed
		 */
		public function getBikeSubType() {
			return $this->bikeSubType;
		}
	
		/**
		 * @return mixed
		 */
		public function getMotoSubType() {
			return $this->motoSubType;
		}
	
		/**
		 * @return mixed
		 */
		public function getOtherSubType() {
			return $this->otherSubType;
		}
	
		/**
		 * @return mixed
		 */
		public function getAccesorySubType() {
			return $this->accesorySubType;
		}
	
		/**
		 * @return mixed
		 */
		public function getEquipmentSubType() {
			return $this->equipmentSubType;
		}
	
		/**
		 * @param mixed $id
		 */
		public function setId($id) {
			$this->id = $id;
		}
	
		/**
		 * @param mixed $name
		 */
		public function setName($name) {
			$this->name = $name;
		}
	
		/**
		 * @param mixed $mark
		 */
		public function setMark($mark) {
			$this->mark = $mark;
		}
		
		/**
		 * @param mixed $active
		 */
		public function setActive($active) {
			$this->active = $active;
		}
	
		/**
		 * @param mixed $productCategory
		 */
		public function setProductCategory($productCategory) {
			$this->productCategory = $productCategory;
		}
	
		/**
		 * @param mixed $bikeSubType
		 */
		public function setBikeSubType($bikeSubType) {
			$this->bikeSubType = $bikeSubType;
		}
	
		/**
		 * @param mixed $motoSubType
		 */
		public function setMotoSubType($motoSubType) {
			$this->motoSubType = $motoSubType;
		}
	
		/**
		 * @param mixed $otherSubType
		 */
		public function setOtherSubType($otherSubType) {
			$this->otherSubType = $otherSubType;
		}
	
		/**
		 * @param mixed $accesorySubType
		 */
		public function setAccesorySubType($accesorySubType) {
			$this->accesorySubType = $accesorySubType;
		}
	
		/**
		 * @param mixed $equipmentSubType
		 */
		public function setEquipmentSubType($equipmentSubType) {
			$this->equipmentSubType = $equipmentSubType;
		}
	
		/**
		 * Constructor de la clase
		 */
		public function __construct() {
		}
		
		
		
	}

?>