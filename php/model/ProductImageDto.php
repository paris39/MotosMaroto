<?php

	namespace php\model;
	
	/**
	 * @author JPD
	 */
	class ProductImageDto {
		
		private $idProduct;
		private $image;
		private $main;

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
		
	}

?>