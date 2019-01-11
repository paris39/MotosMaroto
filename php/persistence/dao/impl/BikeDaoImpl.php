<?php

namespace php\persistence\dao\Impl;

/**
 * @author JPD
 */
class BikeDaoImpl implements BikeDao {
	
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
	private const BIKE = 1;

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
									PRODUCT-COLOR PC,
									COLOR CLR,
									PRODUCT-IMAGE PI,
									IMAGE IMG, 
									BIKE B, 
									BIKE_TYPE BT, 
									BIKE_SIZE BS
								WHERE 
									P.CATEGORY = " + this::BIKE + "
									AND PCTG.ID = P.CATEGORY
									AND PSCTG.ID = P.SUBCATEGORY
									AND PC.PRODUCT = P.ID
									AND PC.COLOR = CLR.ID
									AND PI.PRODUCT = P.ID 
									AND PI.IMAGE = IMG.ID
									AND B.ID = P.ID
									AND B.TYPE = BT.ID
									AND B.SIZE = BS.ID
								ORDER BY IDVENTA", this::$conection) 
					or die ("No funciona");
		$fila = mysql_fetch_array($resul);
		
		
		return null;
	}
}

?>