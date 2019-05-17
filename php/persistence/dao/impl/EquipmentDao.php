<?php

	namespace php\persistence\dao\impl;
	
	$root = realpath($_SERVER["DOCUMENT_ROOT"]) . "\MotosMaroto";
	error_log("RooT: " . $root);
	require $root.'\php\persistence\dao\IEquipmentDao.php';
	require $root.'\php\persistence\entities\EquipmentSize.php';
	require $root.'\php\persistence\entities\EquipmentType.php';
	
	use php\persistence\dao\IEquipmentDao;
	use php\persistence\dao\impl\BaseDao;
	use php\persistence\entities\Category;
	use php\persistence\entities\EquipmentSize;
	use php\persistence\entities\EquipmentType;

	/**
	 * @author JPD
	 */
	class EquipmentDao extends BaseDao implements IEquipmentDao {
		
		/**
		 * Constantes del código de subcategorías en Base de datos
		 */
		private const BIKE = 1;
		private const MOTO = 2;
		private const OTHER = 3;
				
		/**
		 * Constructor de la clase
		 */
		public function __construct() {
		}
		
		/**
		 * {@inheritdoc}
		 * @see \php\persistence\dao\EquipmentDao::listEquipmentSize()
		 */
		public function listEquipmentSize() : \ArrayObject {
			// Conexión de la base de datos
			$this->getConnection();
			
			// SELECT
			$query = "SELECT "
						. "ID AS 'ID', "
						. "NAME AS 'NAME' "
					. "FROM "
						. "EQUIPMENT_SIZE "
					. "ORDER BY "
						. "ID";
																											
			$result = mysqli_query($this->connection, $query) or die ("No funciona");
			
			$equipmentSizeList = new \ArrayObject();
			
			while ($row = mysqli_fetch_array($result)) {
				$equipmentSizeAux = new EquipmentSize();
				$equipmentSizeAux = $this->marshallEquipmentSize($row);
				
				$equipmentSizeList->append($equipmentSizeAux);
			}
			
			return $equipmentSizeList;
		}
		
		/**
		 * {@inheritdoc}
		 * @see \php\persistence\dao\EquipmentDao::listEquipmentType()
		 */
		public function listEquipmentType() : \ArrayObject {
			// Conexión de la base de datos
			$this->getConnection();
			
			// SELECT
			$query = "SELECT "
						. "ET.ID AS 'ET.ID', "
						. "ET.NAME AS 'ET.NAME', "
						. "PS.ID AS 'PS.ID', "
						. "PS.NAME AS 'PS.NAME' "
					. "FROM "
						. "EQUIPMENT_TYPE ET, "
						. "PRODUCT_SUBCATEGORY PS "
						. "WHERE "
							. "PS.ID = ET.CATEGORY "
					. "ORDER BY "
						. "ET.CATEGORY ASC, "
						. "ET.NAME ASC";
																									
			$result = mysqli_query($this->connection, $query) or die ("No funciona");
			
			$equipmentTypeList = new \ArrayObject();
			
			while ($row = mysqli_fetch_array($result)) {
				$equipmentTypeAux = new EquipmentType();
				$equipmentTypeAux = $this->marshallEquipmentType($row);
				
				$equipmentTypeList->append($equipmentTypeAux);
			}
			
			return $equipmentTypeList;
		}
		
		/**
		 * {@inheritdoc}
		 * @see \php\persistence\dao\EquipmentDao::listEquipmentTypeByCategory()
		 */
		public function listEquipmentTypeByCategory(int $category) : \ArrayObject {
			// Conexión de la base de datos
			$this->getConnection();
			
			// SELECT
			$query = "SELECT "
						. "ET.ID AS 'ET.ID', "
						. "ET.NAME AS 'ET.NAME', "
						. "PS.ID AS 'PS.ID', "
						. "PS.NAME AS 'PS.NAME' "
					. "FROM "
						. "EQUIPMENT_TYPE ET, "
						. "PRODUCT_SUBCATEGORY PS "
					. "WHERE "
						. "PS.ID = ET.CATEGORY "
						. "AND ET.CATEGORY = " . $category . " "
					. "ORDER BY ET.NAME";
									
			$result = mysqli_query($this->connection, $query) or die ("No funciona");
			
			$equipmentTypeList = new \ArrayObject();
			
			while ($row = mysqli_fetch_array($result)) {
				$equipmentTypeAux = new EquipmentType();
				$equipmentTypeAux = $this->marshallEquipmentType($row);
				
				$equipmentTypeList->append($equipmentTypeAux);
			}
			
			return $equipmentTypeList;
		}
		
		/**
		 * @param array $row
		 * @return EquipmentSize
		 */
		private function marshallEquipmentSize (array $row) : EquipmentSize {
			$equipmentSizeAux = new EquipmentSize();
			
			$equipmentSizeAux->setId($row['ID']);
			$equipmentSizeAux->setName(utf8_encode($row['NAME']));
			
			return $equipmentSizeAux;
		}
		
		/**
		 * @param array $row
		 * @return EquipmentType
		 */
		private function marshallEquipmentType (array $row) : EquipmentType {
			$equipmentTypeAux = new EquipmentType();
			$categoryAux = new Category();
			
			$equipmentTypeAux->setId($row['ET.ID']);
			$equipmentTypeAux->setName(utf8_encode($row['ET.NAME']));
			$categoryAux->setId($row['PS.ID']);
			$categoryAux->setName(utf8_encode($row['PS.NAME']));
			$equipmentTypeAux->setCategory($categoryAux);
			
			return $equipmentTypeAux;
		}
		
	}

?>