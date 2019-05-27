<?php

	namespace php\model;
	
	/**
	 * @author JPD
	 */
	class EquipmentDto {
		private $id;
		private $type;
		private $size;
		private $gender;
		
		/**
		 * @return mixed
		 */
		public function getId() {
			return $this->id;
		}
	
		/**
		 * @return mixed
		 */
		public function getType() {
			return $this->type;
		}
	
		/**
		 * @return mixed
		 */
		public function getSize() {
			return $this->size;
		}
	
		/**
		 * @return mixed
		 */
		public function getGender() {
			return $this->gender;
		}
	
		/**
		 * @param mixed $id
		 */
		public function setId($id) {
			$this->id = $id;
		}
	
		/**
		 * @param mixed $type
		 */
		public function setType($type) {
			$this->type = $type;
		}
	
		/**
		 * @param mixed $size
		 */
		public function setSize($size) {
			$this->size = $size;
		}
	
		/**
		 * @param mixed $gender
		 */
		public function setGender($gender) {
			$this->gender = $gender;
		}
	
		/**
		 * Constructor de la clase
		 */
		public function __construct() {
		}
		
	}

?>