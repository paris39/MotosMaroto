<?php

	namespace php\persistence\entities;

	/**
	 * @author JPD
	 */
	class Color {

		private $id;
		private $name;
		private $originalName;
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