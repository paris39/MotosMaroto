<?php

	namespace php\persistence\dao\Impl;
	
	/* Establecer la codificación de caracteres interna a UTF-8 */
	mb_internal_encoding('UTF-8');
	
	$root = realpath($_SERVER["DOCUMENT_ROOT"]) . "\MotosMaroto";
	require "$root\php\config\Config.php";
	//require "$root\php\model\CategoryDto.php";
	require "$root\php\persistence\dao\ICategoryDao.php";
	require $root.'\php\persistence\entities\Category.php';
	
	use php\persistence\dao\ICategoryDao;
	use php\persistence\entities\Category;
	use php\model\CategoryDto;
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
		private $connection;
	
		/**
		 * {@inheritdoc}
		 * @see \php\persistence\dao\ICategoryDao::categoryList()
		 */
		public function listCategories() : \ArrayObject {
			// Conexión de la base de datos
			$configObj = new Config();
			$this->connection = $configObj->getConnection();
			
			// SELECT
			$query = "SELECT * "
					. "FROM "
					. "PRODUCT_SUBCATEGORY PSCTG "
					. "ORDER BY PSCTG.ID"; 
						
			$result = mysqli_query($this->connection, $query) or die ("No funciona");
			
			$categoryList = new \ArrayObject();
			
			$i = 0;
			while ($row = mysqli_fetch_array($result)) {
				$categoryAux = new Category();
				$categoryAux = $this->marshallCategory($row);
				
				$categoryDtoAux = new CategoryDto();
				$categoryDtoAux = $this->categoryToCategoryDto($categoryAux);
				
				$categoryList->append($categoryDtoAux);
				
				$i++;
			}
			
			return $categoryList;
		}
		

		/**
		 * @param array $row
		 * @return Category
		 */
		private function marshallCategory(array $row) : Category {
			$categoryAux = new Category();
			
			$categoryAux->setId($row['id']);
			$categoryAux->setName(utf8_encode($row['name']));
			
			return $categoryAux;
		}
		

		/**
		 * @param Category $category
		 * @return CategoryDto
		 */
		private function categoryToCategoryDto(Category $category) : CategoryDto {
			$categoryDtoAux = new CategoryDto();
			
			$categoryDtoAux->setId($category->getId());
			$categoryDtoAux->setName($category->getName());
			
			return $categoryDtoAux;			
		}
		
	}

?>