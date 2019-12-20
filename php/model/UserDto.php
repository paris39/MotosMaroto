<?php

namespace php\model;

	/**
	 * @author JPD
	 */
	class UserDto {

		private $id;
		private $nick;
		private $password;
		private $name;
		private $surname;
		private $active;
	
		/**
         * @return mixed
         */
        public function getNick()
        {
            return $this->nick;
        }
    
        /**
         * @return mixed
         */
        public function getPassword()
        {
            return $this->password;
        }
    
        /**
         * @return mixed
         */
        public function getSurname()
        {
            return $this->surname;
        }
    
        /**
         * @param mixed $nick
         */
        public function setNick($nick)
        {
            $this->nick = $nick;
        }
    
        /**
         * @param mixed $password
         */
        public function setPassword($password)
        {
            $this->password = $password;
        }
    
        /**
         * @param mixed $surname
         */
        public function setSurname($surname)
        {
            $this->surname = $surname;
        }
    
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
		public function getActive() {
			return $this->active;
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
		 * @param mixed $active
		 */
		public function setActive($active) {
			$this->active = $active;
		}
		
	}

?>