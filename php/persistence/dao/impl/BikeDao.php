<?php

	namespace php\persistence\dao\Impl;
	
	/* Establecer la codificación de caracteres interna a UTF-8 */
	mb_internal_encoding('UTF-8');
	
	$root = realpath($_SERVER["DOCUMENT_ROOT"]) . "\MotosMaroto";
	error_log("RooT: " . $root);
	require $root.'\php\persistence\dao\IBikeDao.php';
	require $root.'\php\persistence\entities\BikeType.php';
	require $root.'\php\persistence\entities\BikeSize.php';
	//require $root.'\php\persistence\dao\impl\BaseDao.php';
	
	use php\persistence\dao\IBikeDao;
	use php\persistence\dao\impl\BaseDao;
	use php\persistence\entities\Bike;
	use php\persistence\entities\BikeType;
	use php\persistence\entities\BikeSize;
	
	/**
	 * @author JPD
	 */
	class BikeDao extends BaseDao implements IBikeDao {
		
		/**
		 * Constante del código de Bicicletas en Base de datos
		 * 
		 * @var integer
		 */
		private const BIKE = 1;
	
		/**
		 * {@inheritdoc}
		 * @see \php\persistence\dao\BikeDao::bikeList()
		 */
		public function bikeList($order, $filters) : \ArrayObject {
			// SELECT
			$result = mysql_query ("SELECT *
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
									ORDER BY P.ID", this::$conection) 
						or die ("No funciona");
			$fila = mysql_fetch_array($resul);
			
			
			return null;
		}
		
		/**
		 * {@inheritdoc}
		 * @see \php\persistence\dao\BikeDao::getBikeById()
		 */
		public function getBikeById (int $id) : Bike {
			// Conexión de la base de datos
			$this->getConnection();
			
			// SELECT
			$query = "SELECT "
						. "BK.ID AS 'BK.ID', "
						. "BT.ID AS 'BT.ID', "
						. "BT.NAME AS 'BT.NAME', "
						. "BS.ID AS 'BS.ID', "
						. "BS.NAME AS 'BS.NAME', "
						. "BK.GEARS AS 'BK.GEARS', "
						. "BK.FRAME AS 'BK.FRAME', "
						. "BK.FORK AS 'BK.FORK', "
						. "BK.BRAKES AS 'BK.BRAKES', "
						. "BK.WHEELS AS 'BK.WHEELS', "
						. "BK.TYRES AS 'BK.TYRES', "
						. "BK.SEAT AS 'BK.SEAT', "
						. "BK.HANDLEBARS AS 'BK.HANDLEBARS', "
						. "BK.SHIFT AS 'BK.SHIFT', "
						. "BK.DERAILLEUR AS 'BK.DERAILLEUR', "
						. "BK.TWIST_SHIFTERS AS 'BK.TWIST_SHIFTERS', "
						. "BK.SPEED_GROUPSET AS 'BK.SPEED_GROUPSET', "
						. "BK.WEIGHT AS 'BK.WEIGHT', "
						. "BK.PEDALS AS 'BK.PEDALS',  "
						. "BK.CRANKS AS 'BK.CRANKS', "
						. "BK.CASSETTE AS 'BK.CASSETTE' "
					. "FROM "
						. "BIKE BK, "
						. "BIKE_TYPE BT, "
						. "BIKE_SIZE BS "
						. " "
					. "WHERE "
						. "BK.ID = " . $id . " "
						. "AND BT.ID = BK.TYPE "
						. "AND BS.ID = BK.SIZE ";
			
			error_log("Consulta a ejecutar: " . $query, 0);
			$result = mysqli_query($this->connection, $query) or die ("No funciona");
			
			$bikeList = new \ArrayObject();
			
			while ($row = mysqli_fetch_array($result)) {
				$bikeAux = new Bike();
				$bikeAux = $this->marshallBike($row);
				
				$bikeList->append($bikeAux);
			}
			
			return $bikeList;
		}
		
		/**
		 * {@inheritdoc}
		 * @see \php\persistence\dao\BikeDao::listBikeSize()
		 */
		public function listBikeSize() : \ArrayObject {
			// Conexión de la base de datos
			$this->getConnection();
			
			// SELECT
			$query = "SELECT * "
					. "FROM "
						. "BIKE_SIZE "
					. "ORDER BY ID";
									
			$result = mysqli_query($this->connection, $query) or die ("No funciona");
			
			$bikeSizeList = new \ArrayObject();
			
			while ($row = mysqli_fetch_array($result)) {
				$bikeSizeAux = new BikeSize();
				$bikeSizeAux = $this->marshallBikeSize($row);
				
				$bikeSizeList->append($bikeSizeAux);
			}
			
			return $bikeSizeList;
		}
		
		/**
		 * {@inheritdoc}
		 * @see \php\persistence\dao\BikeDao::listBikeType()
		 */
		public function listBikeType() : \ArrayObject {
			// Conexión de la base de datos
			$this->getConnection();
			
			// SELECT
			$query = "SELECT * "
					. "FROM "
						. "BIKE_TYPE "
					. "ORDER BY ID";
									
			$result = mysqli_query($this->connection, $query) or die ("No funciona");
			
			$bikeTypeList = new \ArrayObject();
			
			while ($row = mysqli_fetch_array($result)) {
				$bikeTypeAux = new BikeType();
				$bikeTypeAux = $this->marshallBikeType($row);
				
				$bikeTypeList->append($bikeTypeAux);
			}
			
			return $bikeTypeList;
		}
		
		/**
		 * @param int $id
		 * @param Bike $bike
		 * @param int $userId
		 */
		public function newBike(int $id, Bike $bike, int $userId) : void {
			$this->save($id, $bike, $userId);
		}
		
		/**
		 * @param array $row
		 * @return Bike
		 */
		private function marshallBike (array $row) : Bike {
			$bikeAux = new Bike();
			$bikeSize = new BikeSize();
			$bikeType = new BikeType();
			
			$bikeAux->setId($row['BK.ID']);
			$bikeSize->setId($row['BS.ID']);
			$bikeSize->setName(utf8_encode($row['BS.NAME']));
			$bikeAux->setSize($bikeSize);
			$bikeType->setId($row['BT.ID']);
			$bikeType->setName(utf8_encode($row['BT.NAME']));
			$bikeAux->setType($bikeType);
			$bikeAux->setGears(utf8_encode($row['BK.GEARS']));
			$bikeAux->setFrame(utf8_encode($row['BK.FRAME']));
			$bikeAux->setFork(utf8_encode($row['BK.FORK']));
			$bikeAux->setBrakes(utf8_encode($row['BK.BRAKES']));
			$bikeAux->setWheels(utf8_encode($row['BK.WHEELS']));
			$bikeAux->setTyres(utf8_encode($row['BK.TYRES']));
			$bikeAux->setSeat(utf8_encode($row['BK.SEAT']));
			$bikeAux->setHandlebars(utf8_encode($row['BK.HANDLEBARS']));
			$bikeAux->setShift(utf8_encode($row['BK.SHIFT']));
			$bikeAux->setDerailleur(utf8_encode($row['BK.DERAILLEUR']));
			$bikeAux->setTwistShifters(utf8_encode($row['BK.TWIST_SHIFTERS']));
			$bikeAux->setSpeedGroupset(utf8_encode($row['BK.SPEED_GROUPSET']));
			$bikeAux->setWeight($row['BK.WEIGHT']);
			$bikeAux->setPedals(utf8_encode($row['BK.PEDALS']));
			$bikeAux->setShift(utf8_encode($row['BK.SHIFT']));
			$bikeAux->setCranks(utf8_encode($row['BK.CRANKS']));
			$bikeAux->setCassette(utf8_encode($row['BK.CASSETTE']));
			
			return $bikeAux;
		}
		
		/**
		 * @param array $row
		 * @return BikeSize
		 */
		private function marshallBikeSize (array $row) : BikeSize {
			$bikeSizeAux = new BikeSize();
			
			$bikeSizeAux->setId($row['id']);
			$bikeSizeAux->setName(utf8_encode($row['name']));
			
			return $bikeSizeAux;
		}
		
		/**
		 * @param array $row
		 * @return BikeType
		 */
		private function marshallBikeType (array $row) : BikeType {
			$bikeTypeAux = new BikeType();
			
			$bikeTypeAux->setId($row['id']);
			$bikeTypeAux->setName(utf8_encode($row['name']));
			
			return $bikeTypeAux;
		}
		
		/**
		 * Guarda en Base de Datos una nueva bicicleta
		 *
		 * @param int $id
		 * @param Bike $bike
		 * @param int $userId
		 * @return int
		 */
		private function save (int $id, Bike $bike, int $userId) : int {
			// Conexión de la base de datos
			$this->getConnection();
			
			$query = "INSERT INTO BIKE "
						. "(id, type, size, gears, frame, fork, brakes, wheels, tyres, seat, handlebars, shift, derailleur, twist_shifters, speed_groupset, weight, pedals, crank, cassette, active, observation_active, create_date, last_modify_date, last_modify_user) "
					. " VALUES "
						. " (" . $id . ", "
						. "'" . $bike->getType() . "', "
						. "'" . $bike->getSize() . "', "
						. "'" . $bike->getGears() . "', "
						. "'" . $bike->getFrame() . "', "
						. "'" . $bike->getFork() . "', "
						. "'" . $bike->getBrakes() . "', "
						. "'" . $bike->getWheels() . "', "
						. "'" . $bike->getTyres() . "', "
						. "'" . $bike->getSeat() . "', "
						. "'" . $bike->getHandlebars() . "', "
						. "'" . $bike->getShift() . "', "
						. "'" . $bike->getDerailleur() . "', "
						. "'" . $bike->getTwistShifters() . "', "
						. "'" . $bike->getSpeedGroupset() . "', "
						. "'" . $bike->getWeight() . "', "
						. "'" . $bike->getPedals() . "', "
						. "'" . $bike->getCrank() . "', "
						. "'" . $bike->getCassette() . "', "
						. "'" . $accesory->getActive() . "', "
						. "CURRENT_TIMESTAMP, "
						. "CURRENT_TIMESTAMP, "
						. "'" . $userId . "'"
					. " )";
																							
			error_log("Consulta a ejecutar: " . $query, 0);
			mysqli_query($this->connection, $query);
			
			$id = mysqli_insert_id($this->connection); // Último ID asignado
			error_log("ID Asignado: " . $id, 0);
			
			return $id;
		}

	}

?>