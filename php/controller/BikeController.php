<?php

	namespace php\controller;
	
	$root = realpath($_SERVER["DOCUMENT_ROOT"]) . "\MotosMaroto";
	require $root.'\php\persistence\dao\impl\BikeDao.php';
	require "$root\php\persistence\dao\impl\BaseDao.php";
	
	use php\model\BikeDto;
	use php\persistence\dao\BikeDao;
	
	/**
	 * @author JPD
	 */
	class BikeController {
	
		/**
		 * Función que devuelve un listado de bicicletas según un orden y un filtro
		 *
		 * @param String $order
		 * @param \ArrayObject $filters
		 * @return \ArrayObject
		 */
		public function bikeList($order, $filters) {
			$list = BikeDao::bikeList();
	
			return $list;
		}
		
		/**
		 * Función que devuelve el listado de tipos de bicicletas
		 *
		 * @return \ArrayObject
		 */
		public function listBikeType() : \ArrayObject {
			$BikeDao = new BikeDao();
			
			return $BikeDao->listBikeType();
		}
	}

?>