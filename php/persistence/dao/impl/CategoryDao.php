<?php

	namespace php\persistence\dao\Impl;
	
	use php\persistence\dao\ICategoryDao;
	use php\config\Config;
	
	/**
	 * @author JPD
	 */
	class CategoryDao implements ICategoryDao {
		
		/**
		 * Configuración de la Base de Datos
		 * 
		 * @var unknown
		 */
		private $conection;
	
		/**
		 * {@inheritdoc}
		 * @see \php\persistence\dao\ICategoryDao::categoryList()
		 */
		public function listCategories() {
			// Conexión de la base de datos
			$configObj = new Config();
			$this->connection = $configObj->getConnection();
			
			// SELECT
			$result = mysqli_query ("SELECT *
									FROM	
										PRODUCT_SUBCATEGORY PSCTG, 
									ORDER BY PSCTG.ID", $this->$conection) 
						or die ("No funciona");
			
			$categoryList = new \ArrayObject();
						
			while ($fila = mysql_fetch_array($resul)) {
				$categoryList->append($fila);
			}
			
			return $categoryList;
		}
		
	}

?>