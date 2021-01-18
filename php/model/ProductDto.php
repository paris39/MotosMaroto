<?php

	namespace php\model;
	
	/**
	 * @author JPD
	 */
	class ProductDto {
		
		private $id;
		private $name;
		private $mark;
		private $model;
		private $description;
		private $price;
		private $oldPrice;
		private $category;
		private $subcategory;
		private $stock;
		private $rent;
		private $observations;
		private $active;
		private $productDate;
		private $images;
		private $colors;
		private $details;

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
		 *
		 * @return mixed
		 */
		public function getName() {
			return $this->name;
		}
	
		/**
		 *
		 * @return mixed
		 */
		public function getMark() {
			return $this->mark;
		}
	
		/**
		 *
		 * @return mixed
		 */
		public function getModel() {
			return $this->model;
		}
	
		/**
		 *
		 * @return mixed
		 */
		public function getDescription() {
			return $this->description;
		}
	
		/**
		 *
		 * @return mixed
		 */
		public function getPrice() {
			return $this->price;
		}
		
		/**
		 *
		 * @return mixed
		 */
		public function getOldPrice() {
			return $this->oldPrice;
		}
	
		/**
		 *
		 * @return mixed
		 */
		public function getCategory() {
			return $this->category;
		}
	
		/**
		 *
		 * @return mixed
		 */
		public function getSubcategory() {
			return $this->subcategory;
		}
	
		/**
		 *
		 * @return mixed
		 */
		public function getStock() {
			return $this->stock;
		}
	
		/**
		 *
		 * @return mixed
		 */
		public function getRent() {
			return $this->rent;
		}
	
		/**
		 *
		 * @return mixed
		 */
		public function getObservations() {
			return $this->observations;
		}
	
		/**
		 *
		 * @return mixed
		 */
		public function getActive() {
			return $this->active;
		}
	
		/**
		 *
		 * @return mixed
		 */
		public function getProductDate() {
			return $this->productDate;
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
		 *
		 * @param mixed $mark
		 */
		public function setMark($mark) {
			$this->mark = $mark;
		}
	
		/**
		 *
		 * @param mixed $model
		 */
		public function setModel($model) {
			$this->model = $model;
		}
	
		/**
		 *
		 * @param mixed $description
		 */
		public function setDescription($description) {
			$this->description = $description;
		}
	
		/**
		 *
		 * @param mixed $price
		 */
		public function setPrice($price) {
			$this->price = $price;
		}
		
		/**
		 *
		 * @param mixed $oldPrice
		 */
		public function setOldPrice($oldPrice) {
			$this->oldPrice = $oldPrice;
		}
	
		/**
		 *
		 * @param mixed $category
		 */
		public function setCategory($category) {
			$this->category = $category;
		}
	
		/**
		 *
		 * @param mixed $subcategory
		 */
		public function setSubcategory($subcategory) {
			$this->subcategory = $subcategory;
		}
	
		/**
		 *
		 * @param mixed $stock
		 */
		public function setStock($stock) {
			$this->stock = $stock;
		}
	
		/**
		 *
		 * @param mixed $rent
		 */
		public function setRent($rent) {
			$this->rent = $rent;
		}
	
		/**
		 *
		 * @param mixed $observations
		 */
		public function setObservations($observations) {
			$this->observations = $observations;
		}
	
		/**
		 *
		 * @param mixed $active
		 */
		public function setActive($active) {
			$this->active = $active;
		}
	
		/**
		 *
		 * @param mixed $productDate
		 */
		public function setProductDate($productDate) {
			$this->productDate = $productDate;
		}
		
		/**
		 * @return mixed
		 */
		public function getImages() {
			return $this->images;
		}
		
		/**
		 * @param mixed $images
		 */
		public function setImages($images) {
			$this->images = $images;
		}
		
		/**
		 * @return mixed
		 */
		public function getColors() {
			return $this->colors;
		}
		
		/**
		 * @param mixed $colors
		 */
		public function setColors($colors) {
			$this->colors = $colors;
		}
		
		/**
		 * @return mixed
		 */
		public function getDetails() {
			return $this->details;
		}
		
		/**
		 * @param mixed $details
		 */
		public function setDetails($details) {
			$this->details = $details;
		}
		
	}

?>