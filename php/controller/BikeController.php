<?php

	namespace php\controller;
	
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
	}

?>