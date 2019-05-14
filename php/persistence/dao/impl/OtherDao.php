<?php

	namespace php\persistence\dao\Impl;
	
	/* Establecer la codificación de caracteres interna a UTF-8 */
	mb_internal_encoding('UTF-8');
	
	$root = realpath($_SERVER["DOCUMENT_ROOT"]) . "\MotosMaroto";
	error_log("RooT: " . $root);
	require $root.'\php\persistence\dao\IOtherDao.php';
	require $root.'\php\persistence\entities\OtherType.php';
	
	use php\model\OtherTypeDto;
	use php\persistence\dao\IOtherDao;
	use php\persistence\dao\impl\BaseDao;
	use php\persistence\entities\OtherType;
	
	/**
	 * @author JPD
	 */
	class OtherDao extends BaseDao implements IOtherDao {
				
		/**
		 * {@inheritdoc}
		 * @see \php\persistence\dao\OtherDao::listOtherType()
		 */
		public function listOtherType() : \ArrayObject {
			// Conexión de la base de datos
			$this->getConnection();
			
			// SELECT
			$query = "SELECT * "
					. "FROM "
						. "OTHER_TYPE "
					. "ORDER BY NAME";
									
			$result = mysqli_query($this->connection, $query) or die ("No funciona");
			
			$otherTypeList = new \ArrayObject();
			
			while ($row = mysqli_fetch_array($result)) {
				$otherTypeAux = new OtherType();
				$otherTypeAux = $this->marshallOtherType($row);
				
				$otherTypeDtoAux = new OtherTypeDto();
				$otherTypeDtoAux = $this->otherTypeToOtherTypeDto($otherTypeAux);
				
				$otherTypeList->append($otherTypeDtoAux);
			}
			
			return $otherTypeList;
		}
		
		/**
		 * @param array $row
		 * @return OtherType
		 */
		private function marshallOtherType (array $row) : OtherType {
			$otherTypeAux = new OtherType();
			
			$otherTypeAux->setId($row['id']);
			$otherTypeAux->setName(utf8_encode($row['name']));
			
			return $otherTypeAux;
		}
		
		/**
		 * @param OtherType $otherType
		 * @return OtherTypeDto
		 */
		private function otherTypeToOtherTypeDto (OtherType $otherType) : OtherTypeDto {
			$otherTypeDtoAux = new OtherTypeDto();
			
			$otherTypeDtoAux->setId($otherType->getId());
			$otherTypeDtoAux->setName($otherType->getName());
			
			return $otherTypeDtoAux;
		}
		
	}

?>