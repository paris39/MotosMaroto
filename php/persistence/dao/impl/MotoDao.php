<?php

namespace php\persistence\dao\Impl;

/* Establecer la codificación de caracteres interna a UTF-8 */
mb_internal_encoding('UTF-8');

$root = realpath($_SERVER["DOCUMENT_ROOT"]) . "\MotosMaroto";
error_log("RooT: " . $root);
require $root . '\php\persistence\dao\IMotoDao.php';
require $root . '\php\persistence\entities\Moto.php';
require $root . '\php\persistence\entities\MotoContamination.php';
require $root . '\php\persistence\entities\MotoFuel.php';
require $root . '\php\persistence\entities\MotoLicense.php';
require $root . '\php\persistence\entities\MotoTransmission.php';
require $root . '\php\persistence\entities\MotoType.php';

use php\persistence\dao\IMotoDao;
use php\persistence\dao\impl\BaseDao;
use php\persistence\entities\Moto;
use php\persistence\entities\MotoContamination;
use php\persistence\entities\MotoFuel;
use php\persistence\entities\MotoLicense;
use php\persistence\entities\MotoTransmission;
use php\persistence\entities\MotoType;

/**
 *
 * @author JPD
 */
class MotoDao extends BaseDao implements IMotoDao {

	/**
	 * Constante del código de Motocicletas en Base de datos
	 *
	 * @var integer
	 */
	private const MOTO = 2;

	/**
	 *
	 * {@inheritdoc}
	 * @see \php\persistence\dao\MotoDao::motoList()
	 */
	public function motoList ($order, $filters): Array {
		// SELECT
		$result = mysql_query("SELECT *
									FROM
										PRODUCT P,
										PRODUCT_CATEGORY PCTG,
										PRODUCT_SUBCATEGORY PSCTG,
										PRODUCTS_COLORS PC,
										COLOR CLR,
										PRODUCTS_IMAGES PI,
										IMAGE IMG,
										BIKE B,
										BIKE_TYPE BT,
										BIKE_SIZE BS
									WHERE
										P.CATEGORY = " + BIKE + "
										AND PCTG.ID = P.CATEGORY
										AND PSCTG.ID = P.SUBCATEGORY
										AND PC.PRODUCT = P.ID
										AND PC.COLOR = CLR.ID
										AND PI.PRODUCT = P.ID
										AND PI.IMAGE = IMG.ID
										AND B.ID = P.ID
										AND B.TYPE = BT.ID
										AND B.SIZE = BS.ID
									ORDER BY P.ID", this::$conection) or die("No funciona");
		$fila = mysql_fetch_array($resul);

		return null;
	}

	/**
	 *
	 * {@inheritdoc}
	 * @see \php\persistence\dao\MotoDao::getMotoById()
	 */
	public function getMotoById (int $id): Moto {
		// Conexión de la base de datos
		$this->getConnection();

		// SELECT
		$query = "SELECT " . "MO.ID AS 'MO.ID', " . "MT.ID AS 'MT.ID', " . "MT.NAME AS 'MT.NAME', " . "MO.NUMBER_PLATE AS 'MO.NUMBER_PLATE', " . "MO.POWER AS 'MO.POWER', " . "MO.POWER_UNIT AS 'MO.POWER_UNIT', " . "MO.CYLINDER_CAPACITY AS 'MO.CYLINDER_CAPACITY', " . "MO.CYLINDERS AS 'MO.CYLINDERS', " . "MO.GEARS AS 'MO.GEARS', " . "MO.FRONT_BRAKE AS 'MO.FRONT_BRAKE', " . "MO.REAR_BRAKE AS 'MO.REAR_BRAKE', " . "MO.KILOMETERS AS 'MO.KILOMETERS', " . "ML.ID AS 'ML.ID', " . "ML.NAME AS 'ML.NAME', " . "MO.PLACES AS 'MO.PLACES', " . "MF.ID AS 'MF.ID', " . "MF.NAME AS 'MF.NAME', " . "MC.ID AS 'MC.ID',  " . "MC.NAME AS 'MC.NAME', " . "MTR.ID AS 'MTR.ID', " . "MTR.NAME AS 'MTR.NAME', " . "MO.SECOND_HAND AS 'MO.SECOND_HAND' " . "FROM " . "MOTO MO, " . "MOTO_TYPE MT, " . "MOTO_LICENSE ML, " . "MOTO_FUEL MF, " . "MOTO_CONTAMINATION MC, " . "MOTO_TRANSMISSION MTR " . "WHERE " . "MO.ID = " . $id . " " . "AND MT.ID = MO.TYPE " . "AND ML.ID = MO.LICENSE " . "AND MF.ID = MO.FUEL " . "AND MC.ID = MO.CONTAMINATION " . "AND MTR.ID = MO.TRANSMISSION ";

		$result = mysqli_query($this->connection, $query) or die("No funciona");

		$row = mysqli_fetch_array($result);
		$motoAux = new Moto();
		$motoAux = $this->marshallMoto($row);

		return $motoAux;
	}

	/**
	 *
	 * {@inheritdoc}
	 * @see \php\persistence\dao\MotoDao::isExistMotoById()
	 */
	public function isExistMotoById (int $id, bool $active): Bool {
		// Conexión de la base de datos
		$this->getConnection();
		$activeAux;

		if ($active) {
			$activeAux = 1;
		} else {
			$activeAux = 0;
		}

		// SELECT
		$query = "SELECT COUNT (*) " . "FROM MOTO " . "WHERE ID = " . $id . " AND ACTIVE = " . $activeAux;

		error_log("Consulta a ejecutar: " . $query, 0);
		$result = mysqli_query($this->connection, $query) or die("No funciona (isExistMotoById)");

		if (1 == mysqli_num_rows($result)) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 *
	 * {@inheritdoc}
	 * @see \php\persistence\dao\MotoDao::listMotoContamination()
	 */
	public function listMotoContamination (): \ArrayObject {
		// Conexión de la base de datos
		$this->getConnection();

		// SELECT
		$query = "SELECT * " . "FROM " . "MOTO_CONTAMINATION " . "ORDER BY ID";

		$result = mysqli_query($this->connection, $query) or die("No funciona");

		$motoContaminationList = new \ArrayObject();

		while ($row = mysqli_fetch_array($result)) {
			$motoContaminationAux = new MotoContamination();
			$motoContaminationAux = $this->marshallMotoContamination($row);

			$motoContaminationList->append($motoContaminationAux);
		}

		return $motoContaminationList;
	}

	/**
	 *
	 * {@inheritdoc}
	 * @see \php\persistence\dao\MotoDao::listMotoFuel()
	 */
	public function listMotoFuel (): \ArrayObject {
		// Conexión de la base de datos
		$this->getConnection();

		// SELECT
		$query = "SELECT * " . "FROM " . "MOTO_FUEL " . "ORDER BY NAME";

		$result = mysqli_query($this->connection, $query) or die("No funciona");

		$motoFuelList = new \ArrayObject();

		while ($row = mysqli_fetch_array($result)) {
			$motoFuelAux = new MotoFuel();
			$motoFuelAux = $this->marshallMotoFuel($row);

			$motoFuelList->append($motoFuelAux);
		}

		return $motoFuelList;
	}

	/**
	 *
	 * {@inheritdoc}
	 * @see \php\persistence\dao\MotoDao::listMotoLicense()
	 */
	public function listMotoLicense (): \ArrayObject {
		// Conexión de la base de datos
		$this->getConnection();

		// SELECT
		$query = "SELECT * " . "FROM " . "MOTO_LICENSE " . "ORDER BY ID";

		$result = mysqli_query($this->connection, $query) or die("No funciona");

		$motoLicenseList = new \ArrayObject();

		while ($row = mysqli_fetch_array($result)) {
			$motoLicenseAux = new MotoLicense();
			$motoLicenseAux = $this->marshallMotoLicense($row);

			$motoLicenseList->append($motoLicenseAux);
		}

		return $motoLicenseList;
	}

	/**
	 *
	 * {@inheritdoc}
	 * @see \php\persistence\dao\MotoDao::listMotoTransmission()
	 */
	public function listMotoTransmission (): \ArrayObject {
		// Conexión de la base de datos
		$this->getConnection();

		// SELECT
		$query = "SELECT * " . "FROM " . "MOTO_TRANSMISSION " . "ORDER BY NAME";

		$result = mysqli_query($this->connection, $query) or die("No funciona");

		$motoTransmissionList = new \ArrayObject();

		while ($row = mysqli_fetch_array($result)) {
			$motoTransmissionAux = new MotoTransmission();
			$motoTransmissionAux = $this->marshallMotoTransmission($row);

			$motoTransmissionList->append($motoTransmissionAux);
		}

		return $motoTransmissionList;
	}

	/**
	 *
	 * {@inheritdoc}
	 * @see \php\persistence\dao\MotoDao::listMotoType()
	 */
	public function listMotoType (): \ArrayObject {
		// Conexión de la base de datos
		$this->getConnection();

		// SELECT
		$query = "SELECT * " . "FROM " . "MOTO_TYPE " . "ORDER BY NAME";

		$result = mysqli_query($this->connection, $query) or die("No funciona");

		$motoTypeList = new \ArrayObject();

		while ($row = mysqli_fetch_array($result)) {
			$motoTypeAux = new MotoType();
			$motoTypeAux = $this->marshallMotoType($row);

			$motoTypeList->append($motoTypeAux);
		}

		return $motoTypeList;
	}

	/**
	 *
	 * @param \php\persistence\entities\Moto $moto
	 * @param int $userId
	 */
	public function modifyMoto (Moto $moto, int $userId): void {
		$this->update($moto, $userId);
	}

	/**
	 *
	 * @param int $id
	 * @param Moto $moto
	 * @param int $userId
	 */
	public function newMoto (int $id, Moto $moto, int $userId): void {
		$this->save($id, $moto, $userId);
	}

	/**
	 *
	 * @param array $row
	 * @return Moto
	 */
	private function marshallMoto (array $row): Moto {
		$motoAux = new Moto();
		$motoType = new MotoType();
		$motoContamination = new MotoContamination();
		$motoFuel = new MotoFuel();
		$motoLicense = new MotoLicense();
		$motoTransmission = new MotoTransmission();

		$motoAux->setId($row['MO.ID']);
		$motoType->setId($row['MT.ID']);
		$motoType->setName(utf8_encode($row['MT.NAME']));
		$motoAux->setType($motoType);
		$motoAux->setNumberPlate(utf8_encode($row['MO.NUMBER_PLATE']));
		$motoAux->setPower($row['MO.POWER']);
		$motoAux->setPowerUnit(utf8_encode($row['MO.POWER_UNIT']));
		$motoAux->setCylinderCapacity($row['MO.CYLINDER_CAPACITY']);
		$motoAux->setCylinders($row['MO.CYLINDERS']);
		$motoAux->setGears($row['MO.GEARS']);
		$motoAux->setFrontBrake(utf8_encode($row['MO.FRONT_BRAKE']));
		$motoAux->setRearBrake(utf8_encode($row['MO.REAR_BRAKE']));
		$motoAux->setKilometers($row['MO.KILOMETERS']);
		$motoLicense->setId($row['ML.ID']);
		$motoLicense->setName(utf8_encode($row['ML.NAME']));
		$motoAux->setLicense($motoLicense);
		$motoAux->setPlaces($row['MO.PLACES']);
		$motoFuel->setId($row['MF.ID']);
		$motoFuel->setName(utf8_encode($row['MF.NAME']));
		$motoAux->setFuel($motoFuel);
		$motoContamination->setId($row['MC.ID']);
		$motoContamination->setName(utf8_encode($row['MC.NAME']));
		$motoAux->setContamination($motoContamination);
		$motoTransmission->setId($row['MTR.ID']);
		$motoTransmission->setName(utf8_encode($row['MTR.NAME']));
		$motoAux->setTransmission($motoTransmission);
		$motoAux->setSecondHand($row['MO.SECOND_HAND']);

		return $motoAux;
	}

	/**
	 *
	 * @param array $row
	 * @return MotoContamination
	 */
	private function marshallMotoContamination (array $row): MotoContamination {
		$motoContaminationAux = new MotoContamination();

		$motoContaminationAux->setId($row['id']);
		$motoContaminationAux->setName(utf8_encode($row['name']));
		$motoContaminationAux->setColor(utf8_encode($row['color']));

		return $motoContaminationAux;
	}

	/**
	 *
	 * @param array $row
	 * @return MotoFuel
	 */
	private function marshallMotoFuel (array $row): MotoFuel {
		$motoFuelAux = new MotoFuel();

		$motoFuelAux->setId($row['id']);
		$motoFuelAux->setName(utf8_encode($row['name']));

		return $motoFuelAux;
	}

	/**
	 *
	 * @param array $row
	 * @return MotoLicense
	 */
	private function marshallMotoLicense (array $row): MotoLicense {
		$motoLicenseAux = new MotoLicense();

		$motoLicenseAux->setId($row['id']);
		$motoLicenseAux->setName(utf8_encode($row['name']));
		$motoLicenseAux->setObservations(utf8_encode($row['observations']));

		return $motoLicenseAux;
	}

	/**
	 *
	 * @param array $row
	 * @return MotoTransmission
	 */
	private function marshallMotoTransmission (array $row): MotoTransmission {
		$motoTransmissionAux = new MotoTransmission();

		$motoTransmissionAux->setId($row['id']);
		$motoTransmissionAux->setName(utf8_encode($row['name']));

		return $motoTransmissionAux;
	}

	/**
	 *
	 * @param array $row
	 * @return MotoType
	 */
	private function marshallMotoType (array $row): MotoType {
		$motoTypeAux = new MotoType();

		$motoTypeAux->setId($row['id']);
		$motoTypeAux->setName(utf8_encode($row['name']));

		return $motoTypeAux;
	}

	/**
	 * Modifica un registro de una moto en Base de datos
	 *
	 * @param \php\persistence\entities\Moto $moto
	 * @param int $userId
	 */
	private function update (Moto $moto, int $userId): void {
		// Conexión de la base de datos
		$this->getConnection();

		$query = "UPDATE MOTO ";
		$query += "SET ";
		$query += "type = " . $moto->getId() . ", ";
		$query += "number_plate = '" . $moto->getNumberPlate() . "', ";
		$query += "power = '" . $moto->getPower() . "', ";
		$query += "power_unit = '" . $moto->getPowerUnit() . "', ";
		$query += "cylinder_capacity = '" . $moto->getCylinderCapacity() . "', ";
		$query += "cylinders = " . $moto->getCylinders() . ", ";
		$query += "gears = " . $moto->getGears() . ", ";
		$query += "front_brake = '" . $moto->getFrontBrake() . "', ";
		$query += "rear_brake = '" . $moto->getRearBrake() . "', ";
		$query += "kilometers = " . $moto->getKilometers() . ", ";
		$query += "license = " . $moto->getLicense()->getId() . ", ";
		$query += "places = " . $moto->getPlaces() . ", ";
		$query += "fuel = " . $moto->getFuel()->getId() . ", ";
		$query += "contamination = " . $moto->getContamination()->getId() . ", ";
		$query += "transmission = " . $moto->getTransmission()->getId() . ", ";
		$query += "second_hand = " . $moto->getSecondHand() . ", ";
		$query += "active = " . $moto->getActive() . ", ";
		$query += "observation_active = '" . $moto->getObservationActive() . "', ";
		$query += "logic_delete = " . $moto->getLogicDelete() . ", ";
		$query += "last_modify_date = CURRENT_TIMESTAMP, ";
		$query += "last_modify_user = " . $userId . " ";
		$query += "WHERE ";
		$query += "id = " . $moto->getId();
		
		error_log("Consulta a ejecutar: " . $query, 0);
		$result = mysqli_query($this->connection, $query);
		error_log("Registros acutalizados: " . mysqli_num_rows($result), 0);
	}

	/**
	 * Guarda en Base de Datos un nueva moto
	 *
	 * @param int $id
	 * @param Moto $moto
	 * @param int $userId
	 * @return int
	 */
	private function save (int $id, Moto $moto, int $userId): int {
		// Conexión de la base de datos
		$this->getConnection();

		$query = "INSERT INTO MOTO ";
		$query += "(id, type, number_plate, power, power_unit, cylinder_capacity, cylinders, gears, front_brake, rear_brake, kilometers, license, places, fuel, contamination, transmission, second_hand, observation_active, create_date, last_modify_date, last_modify_user) ";
		$query += "VALUES ";
		$query += "(" . $id . ", " . 
		$query += "'" . $moto->getType() . "', ";
		$query += "'" . $moto->getNumberPlate() . "', ";
		$query += "'" . $moto->getPower() . "', ";
		$query += "'" . $moto->getPowerUnit() . "', ";
		$query += "'" . $moto->getCylinderCapacity() . "', ";
		$query += "'" . $moto->getCylinders() . "', ";
		$query += "'" . $moto->getGears() . "', ";
		$query += "'" . $moto->getFrontBrake() . "', ";
		$query += "'" . $moto->getRearBrake() . "', ";
		$query += "'" . $moto->getKilometers() . "', ";
		$query += "'" . $moto->getLicense() . "', ";
		$query += "'" . $moto->getPlaces() . "', ";
		$query += "'" . $moto->getFuel() . "', ";
		$query += "'" . $moto->getContamination() . "', ";
		$query += "'" . $moto->getTransmission() . "', ";
		$query += "'" . $moto->getSecondHand() . "', ";
		$query += "'" . $equipment->getObservationActive() . "', ";
		$query += "CURRENT_TIMESTAMP, ";
		$query += "CURRENT_TIMESTAMP, ";
		$query += "'" . $userId . "'" . " )";

		error_log("Consulta a ejecutar: " . $query, 0);
		mysqli_query($this->connection, $query);

		$id = mysqli_insert_id($this->connection); // Último ID asignado
		error_log("ID Asignado: " . $id, 0);

		return $id;
	}
}

?>