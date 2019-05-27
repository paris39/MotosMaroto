<?php

	namespace php\model;
	
	/**
	 * @author JPD
	 */
	class AccesoryDto {
		private $id;
		private $type;
		private $size;		
		
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
		 * Constructor de la clase
		 */
		public function __construct() {
		}
		
	}

?>