<?php

	namespace php\persistence\entities;

	/**
	 * @author JPD
	 */
	class Category {
		
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
	
	}

?>