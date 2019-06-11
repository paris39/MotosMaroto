<?php

	namespace php\persistence\dao\impl;
	
	/* Establecer la codificación de caracteres interna a UTF-8 */
	mb_internal_encoding('UTF-8');
	
	$root = realpath($_SERVER["DOCUMENT_ROOT"]) . "\MotosMaroto";
	require_once "$root\php\persistence\dao\IMiscellanyDao.php";
	require_once $root.'\php\persistence\entities\Color.php';
	require_once $root.'\php\persistence\entities\Gender.php';
	
	use php\model\ColorDto;
	use php\model\GenderDto;
	use php\persistence\entities\Color;
	use php\persistence\entities\Gender;
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
					. "ORDER BY NAME ASC";
					
			$result = mysqli_query($this->connection, $query) or die ("No funciona");
			
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
					
			$result = mysqli_query($this->connection, $query) or die ("No funciona");
			
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
		
	}

?>