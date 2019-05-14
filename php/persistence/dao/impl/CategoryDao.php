<?php

	namespace php\persistence\dao\Impl;
	
	/* Establecer la codificación de caracteres interna a UTF-8 */
	mb_internal_encoding('UTF-8');
	
	$root = realpath($_SERVER["DOCUMENT_ROOT"]) . "\MotosMaroto";
	require $root.'\php\persistence\dao\ICategoryDao.php';
	require $root.'\php\persistence\entities\Category.php';
	
	use php\model\CategoryDto;
	use php\persistence\dao\ICategoryDao;
	use php\persistence\dao\impl\BaseDao;
	use php\persistence\entities\Category;
	
	/**
	 * @author JPD
	 */
	class CategoryDao extends BaseDao implements ICategoryDao {

		/**
		 * {@inheritdoc}
		 * @see \php\persistence\dao\ICategoryDao::categoryList()
		 */
		public function listCategories() : \ArrayObject {
			// Conexión de la base de datos
			$this->getConnection();
			
			// SELECT
			$query = "SELECT * "
					. "FROM "
						. "PRODUCT_CATEGORY "
					. "ORDER BY ID"; 
						
			$result = mysqli_query($this->connection, $query) or die ("No funciona");
			
			$categoryList = new \ArrayObject();
			
			while ($row = mysqli_fetch_array($result)) {
				$categoryAux = new Category();
				$categoryAux = $this->marshallCategory($row);
				
				$categoryDtoAux = new CategoryDto();
				$categoryDtoAux = $this->categoryToCategoryDto($categoryAux);
				
				$categoryList->append($categoryDtoAux);
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
		
		/**
		 * {@inheritdoc}
		 * @see \php\persistence\dao\ICategoryDao::subcategoryList()
		 */
		public function listSubcategories() : \ArrayObject {
			// Conexión de la base de datos
			$this->getConnection();
			
			// SELECT
			$query = "SELECT * "
					. "FROM "
						. "PRODUCT_SUBCATEGORY "
					. "ORDER BY NAME";
					
				$result = mysqli_query($this->connection, $query) or die ("No funciona");
				
				$subcategoryList = new \ArrayObject();
				
				while ($row = mysqli_fetch_array($result)) {
					$subcategoryAux = new Category();
					$subcategoryAux = $this->marshallCategory($row);
					
					$subcategoryDtoAux = new CategoryDto();
					$subcategoryDtoAux = $this->categoryToCategoryDto($subcategoryAux);
					
					$subcategoryList->append($subcategoryDtoAux);
				}
				
				return $subcategoryList;
		}
		
	}

?>