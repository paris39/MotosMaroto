<?php

namespace php\persistence\entities;

	/**
	 * @author JPD
	 */
	class Accesory {
		
		private $id;
		private $type;
		private $size;
		private $active;
		private $observationActive;
		
		/**
		 *
		 * @return mixed
		 */
		public function getActive () {
			return $this -> active;
		}
		
		/**
		 *
		 * @return mixed
		 */
		public function getObservationActive () {
			return $this -> observationActive;
		}
		
		/**
		 *
		 * @param mixed $active
		 */
		public function setActive ($active) {
			$this -> active = $active;
		}
		
		/**
		 *
		 * @param mixed $observationActive
		 */
		public function setObservationActive ($observationActive) {
			$this -> observationActive = $observationActive;
		}
		
		/**
		 *
		 * @return mixed
		 */
		public function getId () {
			return $this -> id;
		}
		
		/**
		 *
		 * @return mixed
		 */
		public function getType () {
			return $this -> type;
		}
		
		/**
		 *
		 * @return mixed
		 */
		public function getSize () {
			return $this -> size;
		}
		
		/**
		 *
		 * @param mixed $id
		 */
		public function setId ($id) {
			$this -> id = $id;
		}
		
		/**
		 *
		 * @param mixed $type
		 */
		public function setType ($type) {
			$this -> type = $type;
		}
		
		/**
		 *
		 * @param mixed $size
		 */
		public function setSize ($size) {
			$this -> size = $size;
		}
		
		/**
		 * Constructor de la clase
		 */
		public function __construct () {
		}
	}

?>