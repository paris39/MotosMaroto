<?php

	namespace php\persistence\dao\impl;
	
	/* Establecer la codificación de caracteres interna a UTF-8 */
	mb_internal_encoding('UTF-8');
	
	$root = realpath($_SERVER["DOCUMENT_ROOT"]) . "\MotosMaroto";
	require "$root\php\persistence\dao\IMiscellanyDao.php";
	require $root.'\php\persistence\entities\Color.php';
	
	use php\model\ColorDto;
	use php\persistence\entities\Color;
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
				
				$colorDtoAux = new ColorDto();
				$colorDtoAux = $this->colorToColorDto($colorAux);
				
				$colorList->append($colorDtoAux);
			}
			
			return $colorList;
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
		 * @param Color $color
		 * @return ColorDto
		 */
		private function colorToColorDto (Color $color) : ColorDto {
			$colorDtoAux = new ColorDto();
			
			$colorDtoAux->setId($color->getId());
			$colorDtoAux->setName($color->getName());
			$colorDtoAux->setOriginalName($color->getOriginalName());
			
			return $colorDtoAux;
		}
	}

?>