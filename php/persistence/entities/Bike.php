<?php

	namespace php\persistence\entities;
	
	/**
	 * @author JPD
	 */
	class Bike {
		private $id;
		private $type;
		private $size;
		private $gears;
		private $frame;
		private $fork;
		private $brakes;
		private $wheels;
		private $tyres;
		private $seat;
		private $handlebars;
		private $shift;
		private $derailleur;
		private $twistShifters;
		private $speedGroupset;
		private $weight;
		private $pedals;
		private $cranks;
		private $cassette;
		private $active;
		private $observationActive;
		
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
		public function getType() {
			return $this->type;
		}
	
		/**
		 *
		 * @return mixed
		 */
		public function getSize() {
			return $this->size;
		}
	
		/**
		 *
		 * @return mixed
		 */
		public function getGears() {
			return $this->gears;
		}
	
		/**
		 *
		 * @return mixed
		 */
		public function getFrame() {
			return $this->frame;
		}
	
		/**
		 *
		 * @return mixed
		 */
		public function getFork() {
			return $this->fork;
		}
	
		/**
		 *
		 * @return mixed
		 */
		public function getBrakes() {
			return $this->brakes;
		}
	
		/**
		 *
		 * @return mixed
		 */
		public function getWheels() {
			return $this->wheels;
		}
	
		/**
		 *
		 * @return mixed
		 */
		public function getTyres() {
			return $this->tyres;
		}
	
		/**
		 *
		 * @return mixed
		 */
		public function getSeat() {
			return $this->seat;
		}
	
		/**
		 *
		 * @return mixed
		 */
		public function getHandlebars() {
			return $this->handlebars;
		}
	
		/**
		 *
		 * @return mixed
		 */
		public function getShift() {
			return $this->shift;
		}
	
		/**
		 *
		 * @return mixed
		 */
		public function getDerailleur() {
			return $this->derailleur;
		}
	
		/**
		 *
		 * @return mixed
		 */
		public function getTwistShifters() {
			return $this->twistShifters;
		}
	
		/**
		 *
		 * @return mixed
		 */
		public function getSpeedGroupset() {
			return $this->speedGroupset;
		}
	
		/**
		 *
		 * @return mixed
		 */
		public function getWeight() {
			return $this->weight;
		}
	
		/**
		 *
		 * @return mixed
		 */
		public function getPedals() {
			return $this->pedals;
		}
	
		/**
		 *
		 * @return mixed
		 */
		public function getCranks() {
			return $this->cranks;
		}
	
		/**
		 *
		 * @return mixed
		 */
		public function getCassette() {
			return $this->cassette;
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
		 * @param mixed $type
		 */
		public function setType($type) {
			$this->type = $type;
		}
	
		/**
		 *
		 * @param mixed $size
		 */
		public function setSize($size) {
			$this->size = $size;
		}
	
		/**
		 *
		 * @param mixed $gears
		 */
		public function setGears($gears) {
			$this->gears = $gears;
		}
	
		/**
		 *
		 * @param mixed $frame
		 */
		public function setFrame($frame) {
			$this->frame = $frame;
		}
	
		/**
		 *
		 * @param mixed $fork
		 */
		public function setFork($fork) {
			$this->fork = $fork;
		}
	
		/**
		 *
		 * @param mixed $brakes
		 */
		public function setBrakes($brakes) {
			$this->brakes = $brakes;
		}
	
		/**
		 *
		 * @param mixed $wheels
		 */
		public function setWheels($wheels) {
			$this->wheels = $wheels;
		}
	
		/**
		 *
		 * @param mixed $tyres
		 */
		public function setTyres($tyres) {
			$this->tyres = $tyres;
		}
	
		/**
		 *
		 * @param mixed $seat
		 */
		public function setSeat($seat) {
			$this->seat = $seat;
		}
	
		/**
		 *
		 * @param mixed $handlebars
		 */
		public function setHandlebars($handlebars) {
			$this->handlebars = $handlebars;
		}
	
		/**
		 *
		 * @param mixed $shift
		 */
		public function setShift($shift) {
			$this->shift = $shift;
		}
	
		/**
		 *
		 * @param mixed $derailleur
		 */
		public function setDerailleur($derailleur) {
			$this->derailleur = $derailleur;
		}
	
		/**
		 *
		 * @param mixed $twistShifters
		 */
		public function setTwistShifters($twistShifters) {
			$this->twistShifters = $twistShifters;
		}
	
		/**
		 *
		 * @param mixed $speedGroupset
		 */
		public function setSpeedGroupset($speedGroupset) {
			$this->speedGroupset = $speedGroupset;
		}
	
		/**
		 *
		 * @param mixed $weight
		 */
		public function setWeight($weight) {
			$this->weight = $weight;
		}
	
		/**
		 *
		 * @param mixed $pedals
		 */
		public function setPedals($pedals) {
			$this->pedals = $pedals;
		}
	
		/**
		 *
		 * @param mixed $cranks
		 */
		public function setCranks($cranks) {
			$this->cranks = $cranks;
		}
	
		/**
		 *
		 * @param mixed $cassette
		 */
		public function setCassette($cassette) {
			$this->cassette = $cassette;
		}
		
		/**
		 * @return mixed
		 */
		public function getActive () {
			return $this->active;
		}
	
		/**
		 * @return mixed
		 */
		public function getObservationActive () {
			return $this->observationActive;
		}
	
		/**
		 * @param mixed $active
		 */
		public function setActive ($active) {
			$this->active = $active;
		}
	
		/**
		 * @param mixed $observationActive
		 */
		public function setObservationActive ($observationActive) {
			$this->observationActive = $observationActive;
		}
	
	}

?>