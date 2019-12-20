<?php

	namespace php\persistence\dao\impl;
	
	/* Establecer la codificación de caracteres interna a UTF-8 */
	mb_internal_encoding('UTF-8');
	
	$root = realpath($_SERVER["DOCUMENT_ROOT"]) . "\MotosMaroto";
	require_once "$root\php\persistence\dao\IMiscellanyDao.php";
	require_once $root.'\php\persistence\entities\Color.php';
	require_once $root.'\php\persistence\entities\Gender.php';
	require_once $root.'\php\persistence\entities\User.php';
	
	use php\persistence\entities\Color;
	use php\persistence\entities\Gender;
	use php\persistence\entities\User;
	use php\persistence\dao\IMiscellanyDao;
	use php\persistence\dao\impl\BaseDao;
	
	/**
	 * @author JPD
	 */
	class MiscellanyDao extends BaseDao implements IMiscellanyDao {
	
		/**
		 */
		public function __construct() {
		}
		
		/**
		 * Función que devuelve un usuario buscando por su id
		 * 
		 * @param int $id
		 * @return User
		 */
		public function getUserById (int $id) : User {
		    // Conexión de la base de datos
		    $this->getConnection();
		    
		    // SELECT
		    $query = "SELECT * "
                    . "FROM "
                        . "USER "
                    . "WHERE ID = " . $id . " ";
		    
            error_log($query);
            $result = mysqli_query($this->connection, $query) or die ("No funciona - getUserById");
            
            $row = mysqli_fetch_array($result);
            $userAux = new User();
            if (null != $row) {
                $userAux = $this->marshallUser($row); // Si ha devuelto algún valor la consulta
            }
            
            return $userAux;
		}
		
		/**
		 * Función que devuelve un usuario buscando por su nick
		 *
		 * @param String $nick
		 * @return User
		 */
		public function getUserByNick (String $nick) : User {
		    // Conexión de la base de datos
		    $this->getConnection();
		    
		    // SELECT
		    $query = "SELECT * "
                    . "FROM "
                        . "USER "
                    . "WHERE NICK LIKE '" . $nick . "' ";
            
            error_log($query);
            $result = mysqli_query($this->connection, $query) or die ("No funciona - getUserByNick");
            
            $row = mysqli_fetch_array($result);
            $userAux = new User();
            if (null != $row) {
                $userAux = $this->marshallUser($row); // Si ha devuelto algún valor la consulta
            }
            
            return $userAux;
		}
		
		/**
		 * Función que devuelve el listado de colores
		 *
		 * @return \ArrayObject
		 */
		public function listColors() : \ArrayObject {
			// Conexión de la base de datos
			$this->getConnection();
			
			// SELECT
			$query = "SELECT * "
                    . "FROM "
                        . "COLOR "
                    . "ORDER BY ID";
            
            error_log($query);
			$result = mysqli_query($this->connection, $query) or die ("No funciona - listColors");
			
			$colorList = new \ArrayObject();
			
			while ($row = mysqli_fetch_array($result)) {
				$colorAux = new Color();
				$colorAux = $this->marshallColor($row);
				
				$colorList->append($colorAux);
			}
			
			return $colorList;
		}
		
		/**
		 * Función que devuelve el listado de géneros
		 *
		 * @return \ArrayObject
		 */
		public function listGenders() : \ArrayObject {
			// Conexión de la base de datos
			$this->getConnection();
			
			// SELECT
			$query = "SELECT * "
					. "FROM "
						. "GENDER "
					. "WHERE "
						. "ACTIVE = 1 "
					. "ORDER BY ID";

            error_log($query);
			$result = mysqli_query($this->connection, $query) or die ("No funciona - listGenders");
			
			$genderList = new \ArrayObject();
			
			while ($row = mysqli_fetch_array($result)) {
				$genderAux = new Gender();
				$genderAux = $this->marshallGender($row);
				
				$genderList->append($genderAux);
			}
			
			return $genderList;
		}
		
		/**
		 * @param array $row
		 * @return Color
		 */
		private function marshallColor (array $row) : Color {
			$colorAux = new Color();
			
			$colorAux->setId($row['id']);
			$colorAux->setName(utf8_encode($row['name']));
			$colorAux->setOriginalName(utf8_encode($row['original_name']));
			
			
			return $colorAux;
		}
		
		/**
		 * @param array $row
		 * @return Gender
		 */
		private function marshallGender (array $row) : Gender {
			$genderAux = new Gender();
			
			$genderAux->setId($row['id']);
			$genderAux->setName(utf8_encode($row['name']));
			$genderAux->setActive($row['active']);
			
			
			return $genderAux;
		}
		
		/**
		 * @param array $row
		 * @return User
		 */
		private function marshallUser (array $row) : User {
		    $userAux = new User();
		    
		    $userAux->setId($row['id']);
		    $userAux->setNick(utf8_encode($row['nick']));
		    $userAux->setName(utf8_encode($row['name']));
		    $userAux->setSurname(utf8_encode($row['surname']));
		    $userAux->setPassword(utf8_encode($row['password']));
		    $userAux->setActive($row['active']);
		    
		    return $userAux;
		}
		
	}

?>