<?php

namespace php\persistence\dao\impl;

$root = realpath($_SERVER["DOCUMENT_ROOT"]) . "\MotosMaroto";
error_log("RooT: " . $root);
require $root . '\php\persistence\dao\IEquipmentDao.php';
require $root . '\php\persistence\entities\Equipment.php';
require $root . '\php\persistence\entities\EquipmentSize.php';
require $root . '\php\persistence\entities\EquipmentType.php';

use php\persistence\dao\IEquipmentDao;
use php\persistence\dao\impl\BaseDao;
use php\persistence\entities\Category;
use php\persistence\entities\Equipment;
use php\persistence\entities\EquipmentSize;
use php\persistence\entities\EquipmentType;
use php\persistence\entities\Gender;

/**
 *
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
	public function __construct () {
	}

	/**
	 *
	 * {@inheritdoc}
	 * @see \php\persistence\dao\EquipmentDao::getEquipmentyById()
	 */
	public function getEquipmentyById (int $id): Equipment {
		// Conexión de la base de datos
		$this->getConnection();

		// SELECT
		$query = "SELECT " . "EQ.ID AS 'EQ.ID', " . "ET.ID AS 'ET.ID', " .
				"ET.NAME AS 'ET.NAME', " . "ES.ID AS 'ES.ID', " .
				"ES.NAME AS 'ES.NAME', " . "GE.ID AS 'GE.ID', " .
				"GE.NAME AS 'GE.NAME' " . "FROM " . "EQUIPMENT EQ, " .
				"EQUIPMENT_TYPE ET, " . "EQUIPMENT_SIZE ES, " . "GENDER GE " .
				"WHERE " . "EQ.ID = " . $id . " " . "AND ET.ID = EQ.TYPE " .
				"AND ES.ID = EQ.SIZE " . "AND GE.ID = EQ.GENDER ";

		$result = mysqli_query($this->connection, $query) or die("No funciona");

		$equipmentList = new \ArrayObject();

		while ($row = mysqli_fetch_array($result)) {
			$equipmentAux = new Equipment();
			$equipmentAux = $this->marshallEquipment($row);

			$equipmentList->append($equipmentAux);
		}

		return $equipmentList;
	}

	/**
	 *
	 * {@inheritdoc}
	 * @see \php\persistence\dao\EquipmentDao::isExistEquipmentById()
	 */
	public function isExistEquipmentById (int $id, bool $active): Bool {
		// Conexión de la base de datos
		$this->getConnection();
		$activeAux;

		if ($active) {
			$activeAux = 1;
		} else {
			$activeAux = 0;
		}

		// SELECT
		$query = "SELECT COUNT (*) " . "FROM EQUIPMENT " . "WHERE ID = " . $id .
				" AND ACTIVE = " . $activeAux;

		error_log("Consulta a ejecutar: " . $query, 0);
		$result = mysqli_query($this->connection, $query) or
				die("No funciona (isExistEquipmentById)");

		if (1 == mysqli_num_rows($result)) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 *
	 * {@inheritdoc}
	 * @see \php\persistence\dao\EquipmentDao::listEquipmentSize()
	 */
	public function listEquipmentSize (): \ArrayObject {
		// Conexión de la base de datos
		$this->getConnection();

		// SELECT
		$query = "SELECT " . "ID AS 'ID', " . "NAME AS 'NAME' ";
		$query .= "FROM " . "EQUIPMENT_SIZE ";
		$query .= "ORDER BY " . "ID";

		$result = mysqli_query($this->connection, $query) or die("No funciona");

		$equipmentSizeList = new \ArrayObject();

		while ($row = mysqli_fetch_array($result)) {
			$equipmentSizeAux = new EquipmentSize();
			$equipmentSizeAux = $this->marshallEquipmentSize($row);

			$equipmentSizeList->append($equipmentSizeAux);
		}

		return $equipmentSizeList;
	}

	/**
	 *
	 * {@inheritdoc}
	 * @see \php\persistence\dao\EquipmentDao::listEquipmentType()
	 */
	public function listEquipmentType (): \ArrayObject {
		// Conexión de la base de datos
		$this->getConnection();

		// SELECT
		$query = "SELECT " . "ET.ID AS 'ET.ID', " . "ET.NAME AS 'ET.NAME', " . "PS.ID AS 'PS.ID', " . "PS.NAME AS 'PS.NAME' ";
		$query .= "FROM " . "EQUIPMENT_TYPE ET, " . "PRODUCT_SUBCATEGORY PS ";
		$query .= "WHERE " . "PS.ID = ET.CATEGORY ";
		$query .= "ORDER BY " . "ET.CATEGORY ASC, " . "ET.NAME ASC";

		$result = mysqli_query($this->connection, $query) or die("No funciona - listEquipmentType");

		$equipmentTypeList = new \ArrayObject();
		while ($row = mysqli_fetch_array($result)) {
			$equipmentTypeAux = new EquipmentType();
			$equipmentTypeAux = $this->marshallEquipmentType($row);

			$equipmentTypeList->append($equipmentTypeAux);
		}

		return $equipmentTypeList;
	}

	/**
	 *
	 * {@inheritdoc}
	 * @see \php\persistence\dao\EquipmentDao::listEquipmentTypeByCategory()
	 */
	public function listEquipmentTypeByCategory (int $category): \ArrayObject {
		// Conexión de la base de datos
		$this->getConnection();

		// SELECT
		$query = "SELECT " . "ET.ID AS 'ET.ID', " . "ET.NAME AS 'ET.NAME', " . "PS.ID AS 'PS.ID', " . "PS.NAME AS 'PS.NAME' ";
		$query .= "FROM " . "EQUIPMENT_TYPE ET, " . "PRODUCT_SUBCATEGORY PS ";
		$query .= "WHERE " . "PS.ID = ET.CATEGORY " . "AND ET.CATEGORY = " . $category . " ";
		$query .= "ORDER BY ET.NAME";

		$result = mysqli_query($this->connection, $query) or die("No funciona - listEquipmentTypeByCategory");

		$equipmentTypeList = new \ArrayObject();
		while ($row = mysqli_fetch_array($result)) {
			$equipmentTypeAux = new EquipmentType();
			$equipmentTypeAux = $this->marshallEquipmentType($row);

			$equipmentTypeList->append($equipmentTypeAux);
		}

		return $equipmentTypeList;
	}

	/**
	 *
	 * @param int $id
	 * @param Equipment $equipment
	 * @param int $userId
	 */
	public function newEquipment (int $id, Equipment $equipment, int $userId): void {
		$this->save($id, $equipment, $userId);
	}

	/**
	 *
	 * @param array $row
	 * @return Equipment
	 */
	private function marshallEquipment (array $row): Equipment {
		$equipmentAux = new Equipment();
		$equipmentSizeAux = new EquipmentSize();
		$equipmentTypeAux = new EquipmentType();
		$genderAux = new Gender();

		$equipmentAux->setId($row['EQ.ID']);
		$equipmentTypeAux->setId($row['ET.ID']);
		$equipmentTypeAux->setName($row['ET.NAME']);
		$equipmentSizeAux->setId($row['ES.ID']);
		$equipmentSizeAux->setName($row['ES.NAME']);
		$genderAux->setId($row['GE.ID']);
		$genderAux->setName($row['GE.NAME']);

		return $equipmentAux;
	}

	/**
	 *
	 * @param array $row
	 * @return EquipmentSize
	 */
	private function marshallEquipmentSize (array $row): EquipmentSize {
		$equipmentSizeAux = new EquipmentSize();

		$equipmentSizeAux->setId($row['ID']);
		$equipmentSizeAux->setName(utf8_encode($row['NAME']));

		return $equipmentSizeAux;
	}

	/**
	 *
	 * @param array $row
	 * @return EquipmentType
	 */
	private function marshallEquipmentType (array $row): EquipmentType {
		$equipmentTypeAux = new EquipmentType();
		$categoryAux = new Category();

		$equipmentTypeAux->setId($row['ET.ID']);
		$equipmentTypeAux->setName(utf8_encode($row['ET.NAME']));
		$categoryAux->setId($row['PS.ID']);
		$categoryAux->setName(utf8_encode($row['PS.NAME']));
		$equipmentTypeAux->setCategory($categoryAux);

		return $equipmentTypeAux;
	}

	/**
	 * Guarda en Base de Datos un nuevo equipamiento
	 *
	 * @param int $id
	 * @param Equipment $equipment
	 * @param int $userId
	 * @return int
	 */
	private function save (int $id, Equipment $equipment, int $userId): int {
		// Conexión de la base de datos
		$this->getConnection();

		$query = "INSERT INTO EQUIPMENT " .
				"(id, type, size, gender, active, observation_active, create_date, last_modify_date, last_modify_user) " .
				" VALUES " . " (" . $id . ", " . "'" . $equipment->getType() .
				"', " . "'" . $equipment->getSize() . "', " . "'" .
				$equipment->getGender() . "', " . "'" . $equipment->getActive() .
				"', " . "'" . $equipment->getObservationActive() . "', " .
				"CURRENT_TIMESTAMP, " . "CURRENT_TIMESTAMP, " . "'" . $userId .
				"'" . " )";

		error_log("Consulta a ejecutar: " . $query, 0);
		mysqli_query($this->connection, $query);

		$id = mysqli_insert_id($this->connection); // Último ID asignado
		error_log("ID Asignado: " . $id, 0);

		return $id;
	}
}

?>