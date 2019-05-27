<?php

	namespace php\persistence\dao\impl;
	
	/* Establecer la codificación de caracteres interna a UTF-8 */
	mb_internal_encoding('UTF-8');
	
	$root = realpath($_SERVER["DOCUMENT_ROOT"]) . "\MotosMaroto";
	error_log("RooT: " . $root);
	require $root.'\php\persistence\dao\IAccesoryDao.php';
	require $root.'\php\persistence\entities\Accesory.php';
	require $root.'\php\persistence\entities\AccesoryType.php';
	
	use php\persistence\dao\IAccesoryDao;
	use php\persistence\dao\impl\BaseDao;
	use php\persistence\entities\Accesory;
	use php\persistence\entities\AccesoryType;
	use php\persistence\entities\Category;

	/**
	 * @author JPD
	 */
	class AccesoryDao extends BaseDao implements IAccesoryDao {
				
		/**
		 * Constructor de la clase
		 */
		public function __construct() {
		}
		
		/**
		 * {@inheritdoc}
		 * @see \php\persistence\dao\AccesoryDao::getAccesoryById()
		 */
		public function getAccesoryById (int $id) : Accesory {
			// Conexión de la base de datos
			$this->getConnection();
			
			// SELECT
			$query = "SELECT "
						. "AC.ID AS 'AC.ID', "
						. "AT.ID AS 'AT.ID', "
						. "AT.NAME AS 'AT.NAME', "
						. "PS.ID AS 'PS.ID', "
						. "PS.NAME AS 'PS.NAME', "
						. "AC.SIZE AS 'AC.SIZE' "
					. "FROM "
						. "ACCESORY AC, "
						. "ACCESORY_TYPE AT, "
						. "PRODUCT_SUBCATEGORY PS "
					. "WHERE "
						. "AC.ID = " . $id . " "
						. "AND AT.ID = AC.TYPE "
						. "AND PS.ID = AT.CATEGORY ";																				
						
			$result = mysqli_query($this->connection, $query) or die ("No funciona");
			
			$accesoryList = new \ArrayObject();
			
			while ($row = mysqli_fetch_array($result)) {
				$accesoryAux = new Accesory();
				$accesoryAux = $this->marshallAccesory($row);
				
				$accesoryList->append($accesoryAux);
			}
			
			return $accesoryList;
		}
		
		/**
		 * {@inheritdoc}
		 * @see \php\persistence\dao\AccesoryDao::listAccesoryType()
		 */
		public function listAccesoryType() : \ArrayObject {
			// Conexión de la base de datos
			$this->getConnection();
			
			// SELECT
			$query = "SELECT "
						. "AT.ID AS 'AT.ID', "
						. "AT.NAME AS 'AT.NAME', "
						. "PS.ID AS 'PS.ID', "
						. "PS.NAME AS 'PS.NAME' "
					. "FROM "
						. "ACCESORY_TYPE AT, "
						. "PRODUCT_SUBCATEGORY PS "
						. "WHERE "
							. "PS.ID = AT.CATEGORY "
					. "ORDER BY "
						. "AT.CATEGORY ASC, "
						. "AT.NAME ASC";
																									
			$result = mysqli_query($this->connection, $query) or die ("No funciona");
			
			$accesoryTypeList = new \ArrayObject();
			
			while ($row = mysqli_fetch_array($result)) {
				$accesoryTypeAux = new AccesoryType();
				$accesoryTypeAux = $this->marshallAccesoryType($row);
				
				$accesoryTypeList->append($accesoryTypeAux);
			}
			
			return $accesoryTypeList;
		}
		
		/**
		 * {@inheritdoc}
		 * @see \php\persistence\dao\AccesoryDao::listAccesoryTypeByCategory()
		 */
		public function listAccesoryTypeByCategory(int $category) : \ArrayObject {
			// Conexión de la base de datos
			$this->getConnection();
			
			// SELECT
			$query = "SELECT "
						. "AT.ID AS 'AT.ID', "
						. "AT.NAME AS 'AT.NAME', "
						. "PS.ID AS 'PS.ID', "
						. "PS.NAME AS 'PS.NAME' "
					. "FROM "
						. "ACCESORY_TYPE AT, "
						. "PRODUCT_SUBCATEGORY PS "
					. "WHERE "
						. "PS.ID = AT.CATEGORY "
						. "AND AT.CATEGORY = " . $category . " "
					. "ORDER BY AT.NAME";
									
			$result = mysqli_query($this->connection, $query) or die ("No funciona");
			
			$accesoryTypeList = new \ArrayObject();
			
			while ($row = mysqli_fetch_array($result)) {
				$accesoryTypeAux = new AccesoryType();
				$accesoryTypeAux = $this->marshallAccesoryType($row);
				
				$accesoryTypeList->append($accesoryTypeAux);
			}
			
			return $accesoryTypeList;
		}
		
		/**
		 * @param array $row
		 * @return Accesory
		 */
		private function marshallAccesory (array $row) : Accesory {
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
			
			return $accesoryAux;
		}
		
		/**
		 * @param array $row
		 * @return AccesoryType
		 */
		private function marshallAccesoryType (array $row) : AccesoryType {
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