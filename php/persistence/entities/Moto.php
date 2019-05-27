<?php

	namespace php\persistence\entities;
	
	/**
	 * @author JPD
	 */
	class Moto {
		private $id;
		private $type;
		private $numberPlate;
		private $power;
		private $powerUnit;
		private $cylinderCapacity;
		private $cylinders;
		private $gears;
		private $frontBrake;
		private $rearBrake;
		private $kilometers;
		private $license;
		private $places;
		private $fuel;
		private $contamination;
		private $transmission;
		private $secondHand;
		
		/**
		 * @return mixed
		 */
		public function getId() {
			return $this->id;
		}
	
		/**
		 * @return mixed
		 */
		public function getType() {
			return $this->type;
		}
	
		/**
		 * @return mixed
		 */
		public function getNumberPlate() {
			return $this->numberPlate;
		}
	
		/**
		 * @return mixed
		 */
		public function getPower() {
			return $this->power;
		}
	
		/**
		 * @return mixed
		 */
		public function getPowerUnit() {
			return $this->powerUnit;
		}
	
		/**
		 * @return mixed
		 */
		public function getCylinderCapacity() {
			return $this->cylinderCapacity;
		}
	
		/**
		 * @return mixed
		 */
		public function getCylinders() {
			return $this->cylinders;
		}
	
		/**
		 * @return mixed
		 */
		public function getGears() {
			return $this->gears;
		}
	
		/**
		 * @return mixed
		 */
		public function getFrontBrake() {
			return $this->frontBrake;
		}
	
		/**
		 * @return mixed
		 */
		public function getRearBrake() {
			return $this->rearBrake;
		}
	
		/**
		 * @return mixed
		 */
		public function getKilometers() {
			return $this->kilometers;
		}
	
		/**
		 * @return mixed
		 */
		public function getLicense() {
			return $this->license;
		}
	
		/**
		 * @return mixed
		 */
		public function getPlaces() {
			return $this->places;
		}
	
		/**
		 * @return mixed
		 */
		public function getFuel() {
			return $this->fuel;
		}
	
		/**
		 * @return mixed
		 */
		public function getContamination() {
			return $this->contamination;
		}
	
		/**
		 * @return mixed
		 */
		public function getTransmission() {
			return $this->transmission;
		}
	
		/**
		 * @return mixed
		 */
		public function getSecondHand() {
			return $this->secondHand;
		}
	
		/**
		 * @param mixed $id
		 */
		public function setId($id) {
			$this->id = $id;
		}
	
		/**
		 * @param mixed $type
		 */
		public function setType($type) {
			$this->type = $type;
		}
	
		/**
		 * @param mixed $numberPlate
		 */
		public function setNumberPlate($numberPlate) {
			$this->numberPlate = $numberPlate;
		}
	
		/**
		 * @param mixed $power
		 */
		public function setPower($power) {
			$this->power = $power;
		}
	
		/**
		 * @param mixed $powerUnit
		 */
		public function setPowerUnit($powerUnit) {
			$this->powerUnit = $powerUnit;
		}
	
		/**
		 * @param mixed $cylinderCapacity
		 */
		public function setCylinderCapacity($cylinderCapacity) {
			$this->cylinderCapacity = $cylinderCapacity;
		}
	
		/**
		 * @param mixed $cylinders
		 */
		public function setCylinders($cylinders) {
			$this->cylinders = $cylinders;
		}
	
		/**
		 * @param mixed $gears
		 */
		public function setGears($gears) {
			$this->gears = $gears;
		}
	
		/**
		 * @param mixed $frontBrake
		 */
		public function setFrontBrake($frontBrake) {
			$this->frontBrake = $frontBrake;
		}
	
		/**
		 * @param mixed $rearBrake
		 */
		public function setRearBrake($rearBrake) {
			$this->rearBrake = $rearBrake;
		}
	
		/**
		 * @param mixed $kilometers
		 */
		public function setKilometers($kilometers) {
			$this->kilometers = $kilometers;
		}
	
		/**
		 * @param mixed $license
		 */
		public function setLicense($license) {
			$this->license = $license;
		}
	
		/**
		 * @param mixed $places
		 */
		public function setPlaces($places) {
			$this->places = $places;
		}
	
		/**
		 * @param mixed $fuel
		 */
		public function setFuel($fuel) {
			$this->fuel = $fuel;
		}
	
		/**
		 * @param mixed $contamination
		 */
		public function setContamination($contamination) {
			$this->contamination = $contamination;
		}
	
		/**
		 * @param mixed $transmission
		 */
		public function setTransmission($transmission) {
			$this->transmission = $transmission;
		}
	
		/**
		 * @param mixed $secondHand
		 */
		public function setSecondHand($secondHand) {
			$this->secondHand = $secondHand;
		}
	
		/**
		 * Constructor de la clase
		 */
		public function __construct() {
		}
		
	}

?>