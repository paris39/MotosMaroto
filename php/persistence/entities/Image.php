<?php

	namespace php\persistence\entities;
	
	/**
	 * @author JPD
	 */
	class Image {
		
		private $id;
		private $name;
		private $url;
		private $createDate;
		private $modifyDate;
		
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
		public function getUrl() {
			return $this->url;
		}
		
		/**
		 * @param mixed $url
		 */
		public function setUrl($url) {
			$this->url = $url;
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
		public function getModifyDate() {
			return $this->modifyDate;
		}
		
		/**
		 * @param mixed $createDate
		 */
		public function setCreateDate($createDate) {
			$this->createDate = $createDate;
		}
		
		/**
		 * @param mixed $modifyDate
		 */
		public function setModifyDate($modifyDate) {
			$this->modifyDate = $modifyDate;
		}
		
	}

?>