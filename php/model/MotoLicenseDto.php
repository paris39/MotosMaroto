<?php

	namespace php\model;
	
	/**
	 * @author JPD
	 */
	class MotoLicenseDto {
		
		private $id;
		private $name;
		private $observations;
		
		/**
		 * @return mixed
		 */
		public function getObservations() {
			return $this->observations;
		}
	
		/**
		 * @param mixed $observations
		 */
		public function setObservations($observations) {
			$this->observations = $observations;
		}
	
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
		
	}

?>