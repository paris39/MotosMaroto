<?php

	namespace php\persistence\entities;

	/**
	 * @author JPD
	 */
	class MotoLicense {
		
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
		
	}

?>