<?php

	namespace php\persistence\dao\Impl;
	
	/* Establecer la codificación de caracteres interna a UTF-8 */
	mb_internal_encoding('UTF-8');
	
	$root = realpath($_SERVER["DOCUMENT_ROOT"]) . "\MotosMaroto";
	error_log("RooT: " . $root);
	require $root.'\php\persistence\dao\IMotoDao.php';
	require $root.'\php\persistence\entities\MotoContamination.php';
	require $root.'\php\persistence\entities\MotoFuel.php';
	require $root.'\php\persistence\entities\MotoLicense.php';
	require $root.'\php\persistence\entities\MotoTransmission.php';
	require $root.'\php\persistence\entities\MotoType.php';
	
	use php\model\MotoContaminationDto;
	use php\model\MotoFuelDto;
	use php\model\MotoLicenseDto;
	use php\model\MotoTransmissionDto;
	use php\model\MotoTypeDto;
	use php\persistence\dao\IMotoDao;
	use php\persistence\dao\impl\BaseDao;
	use php\persistence\entities\MotoContamination;
	use php\persistence\entities\MotoFuel;
	use php\persistence\entities\MotoLicense;
	use php\persistence\entities\MotoTransmission;
	use php\persistence\entities\MotoType;
	
	/**
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
		 * {@inheritdoc}
		 * @see \php\persistence\dao\MotoDao::motoList()
		 */
		public function motoList($order, $filters) : Array {
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
		 * @see \php\persistence\dao\MotoDao::listMotoContamination()
		 */
		public function listMotoContamination() : \ArrayObject {
			// Conexión de la base de datos
			$this->getConnection();
			
			// SELECT
			$query = "SELECT * "
					. "FROM "
						. "MOTO_CONTAMINATION "
					. "ORDER BY ID";
					
			$result = mysqli_query($this->connection, $query) or die ("No funciona");
			
			$motoContaminationList = new \ArrayObject();
			
			while ($row = mysqli_fetch_array($result)) {
				$motoContaminationAux = new MotoContamination();
				$motoContaminationAux = $this->marshallMotoContamination($row);
				
				$motoContaminationDtoAux = new MotoContaminationDto();
				$motoContaminationDtoAux = $this->motoContaminationToMotoContaminationDto($motoContaminationAux);
				$motoContaminationList->append($motoContaminationDtoAux);
			}
			
			return $motoContaminationList;
		}
		
		/**
		 * @param array $row
		 * @return MotoContamination
		 */
		private function marshallMotoContamination (array $row) : MotoContamination {
			$motoContaminationAux = new MotoContamination();
			
			$motoContaminationAux->setId($row['id']);
			$motoContaminationAux->setName(utf8_encode($row['name']));
			$motoContaminationAux->setColor(utf8_encode($row['color']));
			
			return $motoContaminationAux;
		}
		
		/**
		 * @param MotoContamination $motoContamination
		 * @return MotoContaminationDto
		 */
		private function motoContaminationToMotoContaminationDto (MotoContamination $motoContamination) : MotoContaminationDto {
			$motoContaminationDtoAux = new MotoContaminationDto();
			
			$motoContaminationDtoAux->setId($motoContamination->getId());
			$motoContaminationDtoAux->setName($motoContamination->getName());
			$motoContaminationDtoAux->setColor($motoContamination->getColor());
			
			return $motoContaminationDtoAux;
		}		
		
		/**
		 * {@inheritdoc}
		 * @see \php\persistence\dao\MotoDao::listMotoFuel()
		 */
		public function listMotoFuel() : \ArrayObject {
			// Conexión de la base de datos
			$this->getConnection();
			
			// SELECT
			$query = "SELECT * "
					. "FROM "
						. "MOTO_FUEL "
					. "ORDER BY NAME";
					
			$result = mysqli_query($this->connection, $query) or die ("No funciona");
			
			$motoFuelList = new \ArrayObject();
			
			while ($row = mysqli_fetch_array($result)) {
				$motoFuelAux = new MotoFuel();
				$motoFuelAux = $this->marshallMotoFuel($row);
				
				$motoFuelDtoAux = new MotoFuelDto();
				$motoFuelDtoAux = $this->motoFuelToMotoFuelDto($motoFuelAux);
				$motoFuelList->append($motoFuelDtoAux);
			}
			
			return $motoFuelList;
		}
		
		/**
		 * @param array $row
		 * @return MotoFuel
		 */
		private function marshallMotoFuel (array $row) : MotoFuel {
			$motoFuelAux = new MotoFuel();
			
			$motoFuelAux->setId($row['id']);
			$motoFuelAux->setName(utf8_encode($row['name']));
			
			return $motoFuelAux;
		}
		
		/**
		 * @param MotoFuel $motoFuel
		 * @return MotoFuelDto
		 */
		private function motoFuelToMotoFuelDto (MotoFuel $motoFuel) : MotoFuelDto {
			$motoFuelDtoAux = new MotoFuelDto();
			
			$motoFuelDtoAux->setId($motoFuel->getId());
			$motoFuelDtoAux->setName($motoFuel->getName());
			
			return $motoFuelDtoAux;
		}
		
		/**
		 * {@inheritdoc}
		 * @see \php\persistence\dao\MotoDao::listMotoLicense()
		 */
		public function listMotoLicense() : \ArrayObject {
			// Conexión de la base de datos
			$this->getConnection();
			
			// SELECT
			$query = "SELECT * "
					. "FROM "
						. "MOTO_LICENSE "
					. "ORDER BY ID";
					
			$result = mysqli_query($this->connection, $query) or die ("No funciona");
			
			$motoLicenseList = new \ArrayObject();
			
			while ($row = mysqli_fetch_array($result)) {
				$motoLicenseAux = new MotoLicense();
				$motoLicenseAux = $this->marshallMotoLicense($row);
				
				$motoLicenseDtoAux = new MotoLicenseDto();
				$motoLicenseDtoAux = $this->motoLicenseToMotoLicenseDto($motoLicenseAux);
				$motoLicenseList->append($motoLicenseDtoAux);
			}
			
			return $motoLicenseList;
		}
		
		/**
		 * @param array $row
		 * @return MotoLicense
		 */
		private function marshallMotoLicense (array $row) : MotoLicense {
			$motoLicenseAux = new MotoLicense();
			
			$motoLicenseAux->setId($row['id']);
			$motoLicenseAux->setName(utf8_encode($row['name']));
			$motoLicenseAux->setObservations(utf8_encode($row['observations']));
			
			return $motoLicenseAux;
		}
		
		/**
		 * @param MotoLicense $motoLicense
		 * @return MotoLicenseDto
		 */
		private function motoLicenseToMotoLicenseDto (MotoLicense $motoLicense) : MotoLicenseDto {
			$motoLicenseDtoAux = new MotoLicenseDto();
			
			$motoLicenseDtoAux->setId($motoLicense->getId());
			$motoLicenseDtoAux->setName($motoLicense->getName());
			$motoLicenseDtoAux->setObservations($motoLicense->getObservations());
			
			return $motoLicenseDtoAux;
		}
		
		/**
		 * {@inheritdoc}
		 * @see \php\persistence\dao\MotoDao::listMotoTransmission()
		 */
		public function listMotoTransmission() : \ArrayObject {
			// Conexión de la base de datos
			$this->getConnection();
			
			// SELECT
			$query = "SELECT * "
					. "FROM "
						. "MOTO_TRANSMISSION "
					. "ORDER BY NAME";
					
			$result = mysqli_query($this->connection, $query) or die ("No funciona");
			
			$motoTransmissionList = new \ArrayObject();
			
			while ($row = mysqli_fetch_array($result)) {
				$motoTransmissionAux = new MotoTransmission();
				$motoTransmissionAux = $this->marshallMotoTransmission($row);
				
				$motoTransmissionDtoAux = new MotoTransmissionDto();
				$motoTransmissionDtoAux = $this->motoTransmissionToMotoTransmissionDto($motoTransmissionAux);
				
				$motoTransmissionList->append($motoTransmissionDtoAux);
			}
			
			return $motoTransmissionList;
		}
		
		/**
		 * @param array $row
		 * @return MotoTransmission
		 */
		private function marshallMotoTransmission (array $row) : MotoTransmission {
			$motoTransmissionAux = new MotoTransmission();
			
			$motoTransmissionAux->setId($row['id']);
			$motoTransmissionAux->setName(utf8_encode($row['name']));
			
			return $motoTransmissionAux;
		}
		
		/**
		 * @param MotoTransmission $motoTransmission
		 * @return MotoTransmissionDto
		 */
		private function motoTransmissionToMotoTransmissionDto (MotoTransmission $motoTransmission) : MotoTransmissionDto {
			$motoTypeDtoAux = new MotoTransmissionDto();
			
			$motoTypeDtoAux->setId($motoTransmission->getId());
			$motoTypeDtoAux->setName($motoTransmission->getName());
			
			return $motoTypeDtoAux;
		}
		
		/**
		 * {@inheritdoc}
		 * @see \php\persistence\dao\MotoDao::listMotoType()
		 */
		public function listMotoType() : \ArrayObject {
			// Conexión de la base de datos
			$this->getConnection();
			
			// SELECT
			$query = "SELECT * "
					. "FROM "
						. "MOTO_TYPE "
					. "ORDER BY NAME";
									
			$result = mysqli_query($this->connection, $query) or die ("No funciona");
			
			$motoTypeList = new \ArrayObject();
			
			while ($row = mysqli_fetch_array($result)) {
				$motoTypeAux = new MotoType();
				$motoTypeAux = $this->marshallMotoType($row);
				
				$motoTypeDtoAux = new MotoTypeDto();
				$motoTypeDtoAux = $this->motoTypeToMotoTypeDto($motoTypeAux);
				
				$motoTypeList->append($motoTypeDtoAux);
			}
			
			return $motoTypeList;
		}
		
		/**
		 * @param array $row
		 * @return MotoType
		 */
		private function marshallMotoType (array $row) : MotoType {
			$motoTypeAux = new MotoType();
			
			$motoTypeAux->setId($row['id']);
			$motoTypeAux->setName(utf8_encode($row['name']));
			
			return $motoTypeAux;
		}
		
		/**
		 * @param MotoType $motoType
		 * @return MotoTypeDto
		 */
		private function motoTypeToMotoTypeDto (MotoType $motoType) : MotoTypeDto {
			$motoTypeDtoAux = new MotoTypeDto();
			
			$motoTypeDtoAux->setId($motoType->getId());
			$motoTypeDtoAux->setName($motoType->getName());
			
			return $motoTypeDtoAux;
		}
		
	}

?>