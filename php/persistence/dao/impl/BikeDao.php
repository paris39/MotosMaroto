<?php

namespace php\persistence\dao\Impl;

use php\persistence\dao\IBikeDao;
use php\config\Config;

/**
 * @author JPD
 */
class BikeDao implements IBikeDao {
	
	/**
	 * Configuración de la Base de Datos
	 * 
	 * @var unknown
	 */
	private $conection = Config::configureDatabase();
	
	/**
	 * Constante del código de Bicicletas en Base de datos
	 * 
	 * @var integer
	 */
	private final const BIKE = 1;

	/**
	 * {@inheritdoc}
	 * @see \php\persistence\dao\BikeDao::bikeList()
	 */
	public function bikeList($order, $filters) {
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
	
}

?>