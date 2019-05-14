<?php

	namespace php\model;
	
	/**
	 * @author JPD
	 */
	class GenderDto {
		
		private $id;
		private $name;
		private $active;
		
		/**
		 * Constructor de la clase
		 */
		public function __construct() {
		}
		
		/**
		 *
		 * @return mixed
		 */
		public function getId() {
			return $this->id;
		}
	
		/**
		 *
		 * @return mixed
		 */
		public function getName() {
			return $this->name;
		}
	
		/**
		 *
		 * @param mixed $id
		 */
		public function setId($id) {
			$this->id = $id;
		}
	
		/**
		 *
		 * @param mixed $name
		 */
		public function setName($name) {
			$this->name = $name;
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