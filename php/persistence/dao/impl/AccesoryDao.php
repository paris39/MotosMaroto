<?php

namespace php\persistence\dao\impl;

/* Establecer la codificación de caracteres interna a UTF-8 */
mb_internal_encoding('UTF-8');

$root = realpath($_SERVER["DOCUMENT_ROOT"]) . "/MotosMaroto";
error_log("RooT: " . $root);
require_once $root . '/php/persistence/dao/IAccesoryDao.php';
require_once $root . '/php/persistence/entities/Accesory.php';
require_once $root . '/php/persistence/entities/AccesoryType.php';
require_once $root . '/php/persistence/dao/impl/BaseDao.php';

use php\persistence\dao\IAccesoryDao;
use php\persistence\entities\Accesory;
use php\persistence\entities\AccesoryType;
use php\persistence\entities\Category;

/**
 *
 * @author JPD
 */
class AccesoryDao extends BaseDao implements IAccesoryDao {

	/**
	 * Constructor de la clase
	 */
	public function __construct () {
	}

	/**
	 *
	 * {@inheritdoc}
	 * @see \php\persistence\dao\AccesoryDao::getAccesoryById()
	 */
	public function getAccesoryById (int $id): Accesory {
		// Conexión de la base de datos
		$this->getConnection();

		// SELECT
		$query = "SELECT ";
		$query .= "AC.ID AS 'AC.ID', " . "AT.ID AS 'AT.ID', " . "AT.NAME AS 'AT.NAME', " . "PS.ID AS 'PS.ID', " . "PS.NAME AS 'PS.NAME', " . "AC.SIZE AS 'AC.SIZE', " . "AC.ACTIVE AS 'AC.ACTIVE', " . "AC.OBSERVATION_ACTIVE AS 'AC.OBSERVATION_ACTIVE' ";
		$query .= "FROM " . "ACCESORY AC, " . "ACCESORY_TYPE AT, " . "PRODUCT_SUBCATEGORY PS "; 
		$query .= "WHERE " . "AC.ID = " . $id . " " . "AND AT.ID = AC.TYPE " . "AND PS.ID = AT.CATEGORY ";

		error_log("Consulta a ejecutar (AccesoryDao:getAccesoryById): " . $query, 0);
		$result = mysqli_query($this->connection, $query) or die("No funciona");

		$row = mysqli_fetch_array($result);
		$accesoryAux = new Accesory();
		$accesoryAux = $this->marshallAccesory($row);

		return $accesoryAux;
	}

	/**
	 *
	 * {@inheritdoc}
	 * @see \php\persistence\dao\AccesoryDao::isExistAccesoryById()
	 */
	public function isExistAccesoryById (int $id, bool $active): Bool {
		// Conexión de la base de datos
		$this->getConnection();
		$activeAux;

		if ($active) {
			$activeAux = 1;
		} else {
			$activeAux = 0;
		}

		// SELECT
		$query = "SELECT COUNT (*) " . "FROM ACCESORY " . "WHERE ID = " . $id . " AND ACTIVE = " . $activeAux;

		error_log("Consulta a ejecutar: " . $query, 0);
		$result = mysqli_query($this->connection, $query) or die("No funciona (isExistAccesoryById)");

		if (1 == mysqli_num_rows($result)) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 *
	 * @param int $id
	 * @param Accesory $accesory
	 * @param int $userId
	 */
	public function newAccesory (int $id, Accesory $accesory, int $userId): void {
		$this->save($id, $accesory, $userId);
	}

	/**
	 * Guarda en Base de Datos un nuevo accesorio
	 *
	 * @param int $id
	 * @param Accesory $accesory
	 * @param int $userId
	 * @return int
	 */
	private function save (int $id, Accesory $accesory, int $userId): int {
		// Conexión de la base de datos
		$this->getConnection();

		$query = "INSERT INTO ACCESORY " . "(id, type, size, active, observation_active, create_date, last_modify_date, last_modify_user) " . " VALUES " . " (" . $id . ", " . "'" . $accesory->getType() . "', " . "'" . $accesory->getSize() . "', " . "'" . $accesory->getActive() . "', " . "CURRENT_TIMESTAMP, " . "CURRENT_TIMESTAMP, " . "'" . $userId . "'" . " )";

		error_log("Consulta a ejecutar (AccesoryDao:save): " . $query, 0);
		mysqli_query($this->connection, $query);

		$id = mysqli_insert_id($this->connection); // Último ID asignado
		error_log("ID Asignado: " . $id, 0);

		return $id;
	}

	/**
	 *
	 * {@inheritdoc}
	 * @see \php\persistence\dao\AccesoryDao::listAccesoryType()
	 */
	public function listAccesoryType (): \ArrayObject {
		// Conexión de la base de datos
		$this->getConnection();

		// SELECT
		$query = "SELECT " . "AT.ID AS 'AT.ID', " . "AT.NAME AS 'AT.NAME', " . "PS.ID AS 'PS.ID', " . "PS.NAME AS 'PS.NAME' " . "FROM " . "ACCESORY_TYPE AT, " . "PRODUCT_SUBCATEGORY PS " . "WHERE " . "PS.ID = AT.CATEGORY " . "ORDER BY " . "AT.CATEGORY ASC, " . "AT.NAME ASC";

		error_log("Consulta a ejecutar (AccesoryDao:listAccesoryType): " . $query, 0);
		$result = mysqli_query($this->connection, $query) or die("No funciona");

		$accesoryTypeList = new \ArrayObject();

		while ($row = mysqli_fetch_array($result)) {
			$accesoryTypeAux = new AccesoryType();
			$accesoryTypeAux = $this->marshallAccesoryType($row);

			$accesoryTypeList->append($accesoryTypeAux);
		}

		return $accesoryTypeList;
	}

	/**
	 *
	 * {@inheritdoc}
	 * @see \php\persistence\dao\AccesoryDao::listAccesoryTypeByCategory()
	 */
	public function listAccesoryTypeByCategory (int $category): \ArrayObject {
		// Conexión de la base de datos
		$this->getConnection();

		// SELECT
		$query = "SELECT " . "AT.ID AS 'AT.ID', " . "AT.NAME AS 'AT.NAME', " . "PS.ID AS 'PS.ID', " . "PS.NAME AS 'PS.NAME' ";
		$query .= "FROM " . "ACCESORY_TYPE AT, " . "PRODUCT_SUBCATEGORY PS ";
		$query .= "WHERE " . "PS.ID = AT.CATEGORY " . "AND AT.CATEGORY = " . $category . " ";
		$query .= "ORDER BY AT.NAME";

		error_log("Consulta a ejecutar (AccesoryDao:listAccesoryTypeByCategory): " . $query, 0);
		$result = mysqli_query($this->connection, $query) or die("No funciona");

		$accesoryTypeList = new \ArrayObject();

		while ($row = mysqli_fetch_array($result)) {
			$accesoryTypeAux = new AccesoryType();
			$accesoryTypeAux = $this->marshallAccesoryType($row);

			$accesoryTypeList->append($accesoryTypeAux);
		}

		return $accesoryTypeList;
	}

	/**
	 *
	 * @param array $row
	 * @return Accesory
	 */
	private function marshallAccesory (array $row): Accesory {
		$accesoryAux = new Accesory();
		$accesoryTypeAux = new AccesoryType();
		$categoryAux = new Category();

		$accesoryAux->setId($row['AC.ID']);
		$accesoryTypeAux->setId($row['AT.ID']);
		$accesoryTypeAux->setName(utf8_encode($row['AT.NAME']));
		$categoryAux->setId($row['PS.ID']);
		$categoryAux->setName(utf8_encode($row['PS.NAME']));
		$accesoryTypeAux->setCategory($categoryAux);
		$accesoryAux->setType($accesoryTypeAux);
		$accesoryAux->setSize(utf8_encode($row['AC.SIZE']));
		$accesoryAux->setActive($row['AC.ACTIVE']);
		$accesoryAux->setObservationActive($row['AC.OBSERVATION_ACTIVE']);

		return $accesoryAux;
	}

	/**
	 *
	 * @param array $row
	 * @return AccesoryType
	 */
	private function marshallAccesoryType (array $row): AccesoryType {
		$accesoryTypeAux = new AccesoryType();
		$categoryAux = new Category();

		$accesoryTypeAux->setId($row['AT.ID']);
		$accesoryTypeAux->setName(utf8_encode($row['AT.NAME']));
		$categoryAux->setId($row['PS.ID']);
		$categoryAux->setName(utf8_encode($row['PS.NAME']));
		$accesoryTypeAux->setCategory($categoryAux);

		return $accesoryTypeAux;
	}
}

?>