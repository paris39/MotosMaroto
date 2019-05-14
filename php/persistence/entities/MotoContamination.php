<?php

	namespace php\persistence\entities;

	/**
	 * @author JPD
	 */
	class MotoContamination {
		
		private $id;
		private $name;
		private $color;
	
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
		 * @return mixed
		 */
		public function getColor() {
			return $this->color;
		}
		
		/**
		 * @param mixed $color
		 */
		public function setColor($color) {
			$this->color = $color;
		}
		
	}

?>