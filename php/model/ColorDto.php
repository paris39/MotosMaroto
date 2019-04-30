<?php

	namespace php\model;

	/**
	 * @author PIC1813
	 */
	class ColorDto {
		
		private $id;
		private $name;
		private $originalName;
	
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
		public function getOriginalName() {
			return $this->originalName;
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
		 * @param mixed $originalName
		 */
		public function setOriginalName($originalName) {
			$this->originalName = $originalName;
		}
	
		/**
		 * Constructor de la clase
		 */
		public function __construct() {
		}
		
	}

?>