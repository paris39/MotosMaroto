<?php

	namespace php\persistence\dao\Impl;
	
	/* Establecer la codificación de caracteres interna a UTF-8 */
	mb_internal_encoding('UTF-8');
	
	$root = realpath($_SERVER["DOCUMENT_ROOT"]) . "\MotosMaroto";
	error_log("RooT: " . $root);
	require $root.'\php\persistence\dao\IBikeDao.php';
	require $root.'\php\persistence\entities\BikeType.php';
	//require $root.'\php\persistence\dao\impl\BaseDao.php';
	
	use php\model\BikeTypeDto;
	use php\persistence\dao\IBikeDao;
	use php\persistence\dao\impl\BaseDao;
	use php\persistence\entities\BikeType;
	
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
		public function bikeList($order, $filters) : Array {
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
				
				$bikeTypeDtoAux = new BikeTypeDto();
				$bikeTypeDtoAux = $this->bikeTypeToBikeTypeDto($bikeTypeAux);
				
				$bikeTypeList->append($bikeTypeDtoAux);
			}
			
			return $bikeTypeList;
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
		 * @param BikeType $bikeType
		 * @return BikeTypeDto
		 */
		private function bikeTypeToBikeTypeDto (BikeType $bikeType) : BikeTypeDto {
			$bikeTypeDtoAux = new BikeTypeDto();
			
			$bikeTypeDtoAux->setId($bikeType->getId());
			$bikeTypeDtoAux->setName($bikeType->getName());
			
			return $bikeTypeDtoAux;
		}
		
	}

?>