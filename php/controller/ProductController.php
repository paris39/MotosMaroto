<?php

namespace php\controller;

$root = realpath($_SERVER["DOCUMENT_ROOT"]) . "/MotosMaroto";
require_once $root . '/php/config/Config.php';
require_once $root . '/php/form/ProductForm.php';
require_once $root . '/php/model/AccesoryDto.php';
require_once $root . '/php/model/AccesoryTypeDto.php';
require_once $root . '/php/model/BikeDto.php';
require_once $root . '/php/model/BikeSizeDto.php';
require_once $root . '/php/model/BikeTypeDto.php';
require_once $root . '/php/model/CategoryDto.php';
require_once $root . '/php/model/ColorDto.php';
require_once $root . '/php/model/EquipmentDto.php';
require_once $root . '/php/model/EquipmentSizeDto.php';
require_once $root . '/php/model/EquipmentTypeDto.php';
require_once $root . '/php/model/ImageDto.php';
require_once $root . '/php/model/MotoDto.php';
require_once $root . '/php/model/MotoContaminationDto.php';
require_once $root . '/php/model/MotoFuelDto.php';
require_once $root . '/php/model/MotoLicenseDto.php';
require_once $root . '/php/model/MotoTransmissionDto.php';
require_once $root . '/php/model/MotoTypeDto.php';
require_once $root . '/php/model/ProductDto.php';
require_once $root . '/php/model/ProductColorDto.php';
require_once $root . '/php/model/ProductImageDto.php';
require_once $root . '/php/persistence/dao/impl/BaseDao.php';
require_once $root . '/php/persistence/dao/impl/AccesoryDao.php';
require_once $root . '/php/persistence/dao/impl/BikeDao.php';
require_once $root . '/php/persistence/dao/impl/CategoryDao.php';
require_once $root . '/php/persistence/dao/impl/MotoDao.php';
require_once $root . '/php/persistence/dao/impl/ProductDao.php';
require_once $root . '/php/utility/Utility.php';

use php\form\ProductForm;
use php\model\AccesoryDto;
use php\model\AccesoryTypeDto;
use php\model\BikeDto;
use php\model\BikeTypeDto;
use php\model\BikeSizeDto;
use php\model\CategoryDto;
use php\model\EquipmentDto;
use php\model\EquipmentSizeDto;
use php\model\EquipmentTypeDto;
use php\model\ImageDto;
use php\model\MotoDto;
use php\model\MotoContaminationDto;
use php\model\MotoFuelDto;
use php\model\MotoLicenseDto;
use php\model\MotoTransmissionDto;
use php\model\MotoTypeDto;
use php\model\ProductDto;
use php\model\ProductColorDto;
use php\model\ProductImageDto;
use php\persistence\dao\impl\AccesoryDao;
use php\persistence\dao\impl\BikeDao;
use php\persistence\dao\impl\CategoryDao;
use php\persistence\dao\impl\EquipmentDao;
use php\persistence\dao\impl\MotoDao;
use php\persistence\dao\impl\ProductDao;
use php\utility\Utility;

/**
 *
 * @author JPD
 */
class ProductController {

	/* CONSTANTES DE CATEGORÍA DE PRODUCTO */
	private const CATEGORY_BIKE = 1;
	private const CATEGORY_MOTO = 2;
	private const CATEGORY_EQUIPMENT = 3;
	private const CATEGORY_ACCESORY = 4;
	private const CATEGORY_OTHER = 5;
	private const TOTAL_CATEGORIES = 5;

	/* CONSTANTES DE BOTÓN DE OTRAS IMÁGENES */
	private const BUTTON_ORIGIN_PREVIOUS = "previous";
	private const BUTTON_ORIGIN_NEXT = "next";
	private const BUTTON_PREVIOUS = "previous";
	private const BUTTON_NEXT = "next";
	private const OTHER_IMAGES_VISIBLES = 3;

	/**
	 * Constructor de la clase
	 */
	public function __construct () {
	}

	/**
	 * Dependiendo de la categoría seleccionada hay que convertir un tipo de
	 * producto u otro
	 */
	public function newProduct () {
		if (null != $_POST['productCategory'] && 0 != strcasecmp("", trim($_POST['productCategory']))) {
			if (isset($_POST['userId']) && (null != $_POST['userId'])) {
				$userId = $_POST['userId'];
				switch ($_POST['productCategory']) {
					case 1:
						$id = $this->addNewProduct($this->marshallProduct(self::CATEGORY_BIKE, null), $userId);
						// Añadir nueva bicicleta
						$this->addNewBike($this->marshallBike($id, null), $userId);
						break;
					case 2:
						$id = $this->addNewProduct($this->marshallProduct(self::CATEGORY_MOTO, null), $userId);
						$this->addNewMoto($this->marshallMoto($id, null), $userId);
						break;
					case 3:
						$id = $this->addNewProduct($this->marshallProduct(self::CATEGORY_EQUIPMENT, null), $userId);
						$this->addNewEquipment($this->marshallEquipment($id, null), $userId);
						break;
					case 4:
						$id = $this->addNewProduct($this->marshallProduct(self::CATEGORY_ACCESORY, null), $userId);
						$this->addNewEquipment($this->marshallAccesory($id, null), $userId);
						break;
					case 5:
						$id = $this->addNewProduct($this->marshallProduct(self::CATEGORY_OTHER, null), $userId);
						break;
					default:
				}
			}
		}
	}

	/**
	 *
	 * @param BikeDto $bike
	 * @param int $userId
	 */
	private function addNewBike (BikeDto $bike, int $userId): void {
		$bikeDao = new BikeDao();
		$utility = new Utility();

		$bikeDao->newBike($utility->BikeDtoToBike($bike), $userId);
	}

	/**
	 *
	 * @param MotoDto $moto
	 * @param int $userId
	 */
	private function addNewMoto (MotoDto $moto, int $userId): void {
		$motoDao = new MotoDao();
		$utility = new Utility();

		$motoDao->newMoto($utility->MotoDtoToMoto($moto), $userId);
	}

	/**
	 *
	 * @param EquipmentDto $equipment
	 * @param int $userId
	 */
	private function addNewEquipment (EquipmentDto $equipment, int $userId): void {
		$equipmentDao = new EquipmentDao();
		$utility = new Utility();

		$equipmentDao->newEquipment($utility->EquipmentDtoToEquipment($equipment), $userId);
	}

	/**
	 *
	 * @param AccesoryDto $accesory
	 * @param int $userId
	 */
	private function addNewAccesory (AccesoryDto $accesory, int $userId): void {
		$accesoryDao = new EquipmentDao();
		$utility = new Utility();

		$accesoryDao->newAccesory($utility->AccesoryDtoToAccesory($accesory), $userId);
	}

	/**
	 *
	 * @param int $category
	 * @param bool $active
	 * @return ProductDto
	 */
	private function marshallProduct (int $category, bool $active): ProductDto {
		$productDto = new ProductDto();
		$categoryDtoAux = new CategoryDto();
		$subCategoryDtoAux = new CategoryDto();

		$productDto->setName($_POST["name"]); // Nombre
		$productDto->setMark($_POST["mark"]); // Marca
		$productDto->setModel($_POST["model"]); // Modelo
		$productDto->setDescription($_POST["description"]); // Descripción
		$productDto->setPrice($_POST["price"]); // Precio
		$categoryDtoAux->setId($category);
		$productDto->setCategory($categoryDtoAux); // Categoría
		$subCategoryDtoAux->setId($_POST["accesoryKind"]);
		$productDto->setSubcategory($subCategoryDtoAux); // Subcategoría
		$productDto->setStock($_POST["stock"]); // Existencias
		$productDto->setRent($_POST["rent"]); // Alquiler
		$productDto->setObservations($_POST["observations"]); // Observaciones
		if (null != $active) {
			if ($active) {
				$productDto->setActive(1);
			} else {
				$productDto->setActive(0);
			}
		} else if (null != $_POST["active"]) { // Activo en la web
			if (strcasecmp("on", $_POST["active"]) == 0) {
				$productDto->setActive(1);
			} else {
				$productDto->setActive(0); // No está activo
			}
		} else {
			$productDto->setActive(null);
		}
		$productDto->setProductDate($_POST["year"]); // Fecha de producto

		return $productDto;
	}

	/**
	 *
	 * @param int $id
	 * @param bool $active
	 * @return BikeDto
	 */
	private function marshallBike (int $id, bool $active): BikeDto {
		$bikeDto = new BikeDto();
		$bikeTypeDtoAux = new BikeTypeDto();
		$bikeSizeDtoAux = new BikeTypeSizeDto();

		$bikeDto->setId($id); // Id de la bicicleta, el mismo que el del producto
		$bikeTypeDtoAux->setId($_POST["bikeKind"]);
		$bikeDto->setType($bikeTypeDtoAux); // Tipo
		$bikeSizeDtoAux->setId($_POST["bikeSize"]);
		$bikeDto->setSize($bikeSizeDtoAux); // Talla
		$bikeDto->setGears($_POST["bikeGears"]); // Velocidades
		$bikeDto->setFrame($_POST["bikeFrame"]); // Cuadro
		$bikeDto->setFork($_POST["bikeFork"]); // Horquilla
		$bikeDto->setBrakes($_POST["bikeBrakes"]); // Frenos
		$bikeDto->setWheels($_POST["bikeWheels"]); // Llantas
		$bikeDto->setTyres($_POST["bikeTyres"]); // Neumáticos
		$bikeDto->setSeat($_POST["bikeSeat"]); // Sillín
		$bikeDto->setHandlebars($_POST["bikeHandlebars"]); // Manillar
		$bikeDto->setShift($_POST["bikeShift"]); // Sistema de cambio
		$bikeDto->setDerailleur($_POST["bikeDerailleur"]); // Desviador del cambio
		$bikeDto->setTwistShifters($_POST["bikeTwistShifters"]); // Mandos del cambio
		$bikeDto->setSpeedGroupset($_POST["bikeSpeedGroupset"]); // Grupo del cambio
		$bikeDto->setWeight($_POST["bikeWeight"]); // Peso (kg)
		$bikeDto->setPedals($_POST["bikePedals"]); // Pedales
		$bikeDto->setCranks($_POST["bikeCranks"]); // Bielas
		$bikeDto->setCassette($_POST["bikeCassette"]); // Cassette
		if (null != $active) { // Activo en la web
			if ($active) {
				$bikeDto->setActive(1);
				$bikeDto->setObservationActive("Se reactiva la línea de categoría por modificación de la categoría del producto");
			} else {
				$bikeDto->setActive(0); // No está activo
				$bikeDto->setObservationActive("Se desactiva la línea de categoría por modificación de la categoría del producto");
			}
		} else {
			if (null != $_POST["active"]) { // Activo en la web
				if (strcasecmp("on", $_POST["active"]) == 0) {
					$bikeDto->setActive(1);
				} else {
					$bikeDto->setActive(0); // No está activo
				}
			} else {
				$bikeDto->setActive(null);
			}
		}

		return $bikeDto;
	}

	/**
	 *
	 * @param int $id
	 * @param bool $active
	 * @return MotoDto
	 */
	private function marshallMoto (int $id, bool $active): MotoDto {
		$motoDto = new MotoDto();
		$motoTypeDtoAux = new MotoTypeDto();
		$motoLicenseDtoAux = new MotoLicenseDto();
		$motoFuelDtoAux = new MotoFuelDto();
		$motoContaminationDtoAux = new MotoContaminationDto();
		$motoTransmissionDtoAux = new MotoTransmissionDto();

		$motoDto->setId($id); // Id de la moto, el mismo que el del producto
		$motoTypeDtoAux->setId($_POST["motoKind"]);
		$motoDto->setType($motoTypeDtoAux); // Tipo
		$motoDto->setNumberPlate($_POST["motoNumberPlate"]); // Matrícula
		$motoDto->setPower($_POST["motoPower"]); // Potencia
		$motoDto->setPowerUnit($_POST["motoPowerUnit"]); // Unidad de potencia
		$motoDto->setCylinderCapacity($_POST["motoCylinderCapacity"]); // Cilindrada
		$motoDto->setCylinders($_POST["motoCylinders"]); // Número de cilindros
		$motoDto->setGears($_POST["motoGears"]); // Número de marchas
		$motoDto->setFrontBrake($_POST["motoFrontBrake"]); // Freno delantero
		$motoDto->setRearBrake($_POST["motoRearBrake"]); // Freno trasero
		$motoDto->setKilometers($_POST["motoKilometers"]); // Kilómetros
		$motoLicenseDtoAux->setId($_POST["motoLicense"]);
		$motoDto->setLicense($motoLicenseDtoAux); // Permiso de conducir mínimo
		$motoDto->setPlaces($_POST["motoPlaces"]); // Número de plazas
		$motoFuelDtoAux->setId($_POST["motoFuel"]);
		$motoDto->setFuel($motoFuelDtoAux); // Combustible
		$motoContaminationDtoAux->setId($_POST["motoContamination"]);
		$motoDto->setContamination($motoContaminationDtoAux); // Distintivo contaminación
		$motoTransmissionDtoAux->setId($_POST["motoTransmission"]);
		$motoDto->setTransmission($motoTransmissionDtoAux); // Tipo de transmisión
		$motoDto->setSecondHand($_POST["motoSecondHand"]); // Segunda mano
		if (null != $active) { // Activo en la web
			if ($active) {
				$motoDto->setActive(1);
				$motoDto->setObservationActive("Se reactiva la línea de categoría por modificación de la categoría del producto");
			} else {
				$productDto->setActive(0); // No está activo
				$motoDto->setObservationActive("Se desactiva la línea de categoría por modificación de la categoría del producto");
			}
		} else {
			if (null != $_POST["active"]) { // Activo en la web
				if (strcasecmp("on", $_POST["active"]) == 0) {
					$motoDto->setActive(1);
				} else {
					$motoDto->setActive(0); // No está activo
				}
			} else {
				$motoDto->setActive(null);
			}
		}

		return $motoDto;
	}

	/**
	 *
	 * @param int $id
	 * @param bool $active
	 * @return EquipmentDto
	 */
	private function marshallEquipment (int $id, bool $active): EquipmentDto {
		$equipmentDto = new EquipmentDto();
		$equipmentTypeDtoAux = new EquipmentTypeDto();
		$equipmentSizeDtoAux = new EquipmentSizeDto();
		$genderDtoAux = new GenderDto();

		$equipmentDto->setId($id); // Id de la equipación, el mismo que el del producto
		if (null != $_POST["equipmentKind"] && 0 != strcasecmp("", trim($_POST['equipmentKind']))) {
			switch ($_POST["equipmentKind"]) {
				case 1:
					$equipmentTypeDtoAux->setId($_POST["bikeEquipmentSubType"]); // Equipamiento de bicicleta
					break;
				case 2:
					$equipmentTypeDtoAux->setId($_POST["motoEquipmentSubType"]); // Equipamiento de moto
					break;
				case 3:
					$equipmentTypeDtoAux->setId($_POST["otherEquipmentSubType"]); // Equipamiento de otros
					break;
				default:
					break;
			}
			$equipmentDto->setType($equipmentTypeDtoAux); // Tipo de equipamiento
		}
		$genderDtoAux->setId($_POST["equipmentGender"]);
		$equipmentDto->setGender($genderDtoAux); // Género
		$equipmentSizeDtoAux->setId($_POST["equipmentSize"]);
		$equipmentDto->setSize($equipmentSizeDtoAux); // Talla
		if (null != $active) { // Activo en la web
			if ($active) {
				$equipmentDto->setActive(1);
				$equipmentDto->setObservationActive("Se reactiva la línea de categoría por modificación de la categoría del producto");
			} else {
				$equipmentDto->setActive(0); // No está activo
				$equipmentDto->setObservationActive("Se desactiva la línea de categoría por modificación de la categoría del producto");
			}
		} else {
			if (null != $_POST["active"]) { // Activo en la web
				if (strcasecmp("on", $_POST["active"]) == 0) {
					$equipmentDto->setActive(1);
				} else {
					$equipmentDto->setActive(0); // No está activo
				}
			} else {
				$equipmentDto->setActive(null);
			}
		}

		return $equipmentDto;
	}

	/**
	 *
	 * @param int $id
	 * @param bool $active
	 * @return AccesoryDto
	 */
	private function marshallAccesory (int $id, bool $active): AccesoryDto {
		$accesoryDto = new EquipmentDto();
		$accesoryTypeDtoAux = new AccesoryTypeDto();

		$accesoryDto->setId($id); // Id del accesorio, el mismo que el del producto
		if (null != $_POST["accesoryKind"] && 0 != strcasecmp("", trim($_POST['accesoryKind']))) {
			switch ($_POST["accesoryKind"]) {
				case 1:
					$accesoryTypeDtoAux->setId($_POST["bikeAccesorySubType"]); // Accesorio de bicicleta
					break;
				case 2:
					$accesoryTypeDtoAux->setId($_POST["motoAccesorySubType"]); // Accesorio de moto
					break;
				case 3:
					$accesoryTypeDtoAux->setId($_POST["otherAccesorySubType"]); // Accesorio de otros
					break;
				default:
					break;
			}
			$accesoryDto->setType($accesoryTypeDtoAux); // Tipo de accesorio
		}
		if (null != $active) { // Activo en la web
			if ($active) {
				$accesoryDto->setActive(1);
				$accesoryDto->setObservationActive("Se reactiva la línea de categoría por modificación de la categoría del producto");
			} else {
				$accesoryDto->setActive(0); // No está activo
				$accesoryDto->setObservationActive("Se desactiva la línea de categoría por modificación de la categoría del producto");
			}
		} else {
			if (null != $_POST["active"]) { // Activo en la web
				if (strcasecmp("on", $_POST["active"]) == 0) {
					$accesoryDto->setActive(1);
				} else {
					$accesoryDto->setActive(0); // No está activo
				}
			} else {
				$accesoryDto->setActive(null);
			}
		}

		return $accesoryDto;
	}

	/**
	 * Inserta un nuevo producto en Base de Datos
	 *
	 * @param ProductDto $productDto
	 * @param int $userId
	 * @return int
	 */
	private function addNewProduct (ProductDto $productDto, int $userId): int {
		$productDao = new ProductDao();
		$utility = new Utility();
		$product = $utility->productDtoToProduct($productDto);

		return $productDao->newProduct($product, $userId);
	}

	/**
	 * Función que devuelve el listado de productos
	 *
	 * @param String $order
	 * @param ProductForm $filters
	 * @return \ArrayObject
	 */
	public function listProduct (String $order, ProductForm $filters): \ArrayObject {
		$productDao = new ProductDao();
		$utility = new Utility();

		$productList = new \ArrayObject();
		$productListAux = new \ArrayObject();
		$productList = $productDao->listProduct($order, $filters);

		for ($i = 0; $i < $productList->count(); $i ++) {
			$productAux = new ProductDto();
			$productAux = $utility->productToProductDto($productList->offsetGet($i));
			$productAux = $this->getProductDetail($productAux);

			$productListAux->append($productAux);
		}

		return $productListAux;
	}

	/**
	 * Modifica un producto en la base de datos
	 */
	private function modifyProductAction (): void {
		if (null != $_POST['productCategory'] && 0 != strcasecmp("", trim($_POST['productCategory']))) {
			if (isset($_POST['userId']) && (null != $_POST['userId'])) {
				$userId = $_POST['userId'];
				$productCategory = $_POST['productCategory'];

				// Modificar producto
				$productDto = $this->marshallProduct($productCategory, null);
				$this->modifyProduct($productDto, $userId);

				// Buscar restos del producto por si no coincide con la nueva categoría deshabilitarlos.
				for ($i = 0; $i < self::TOTAL_CATEGORIES; $i ++) {
					switch ($i) {
						case 1:
							$bikeDao = new BikeDao();
							$exist = false;
							// Comprobar si existe la bicicleta con active = true
							$exist = $bikeDao->isExistBikeById($productDto->getId(), true);
							if ($exist) {
								if ($i == $productCategory) {
									// UPDATE active = true
									// Recoger datos de producto
									$this->modifyBike($this->marshallBike(self::CATEGORY_BIKE, true), $userId);
								} else {
									// UPDATE active = false
									// Recoger datos de producto
									$this->modifyBike($this->marshallBike(self::CATEGORY_BIKE, false), $userId);
								}
							} else {
								if ($i == $productCategory) {
									$exist = false;
									// Comprobar si existe la bicicleta con active = false
									$exist = $bikeDao->isExistBikeById($productDto->getId(), false);
									if ($exist) {
										// UPDATE active = true
										// Recoger datos de producto
										$this->modifyBike($this->marshallBike(self::CATEGORY_BIKE, true), $userId);
									} else {
										// INSERT nueva línea de bicicleta
										// Recoger datos de producto
										$this->addNewBike($this->marshallBike(self::CATEGORY_BIKE, null), $userId);
									}
								}
							}

							break;
						case 2:
							$motoDao = new MotoDao();
							$exist = false;
							// Comprobar si existe la moto con active = true
							$exist = $motoDao->isExistMotoById($productDto->getId(), true);
							if ($exist) {
								if ($i == $productCategory) {
									// UPDATE active = true
									$this->modifyMoto($this->marshallMoto(self::CATEGORY_MOTO, false), $userId);
								} else {
									// UPDATE active = false
									$this->modifyMoto($this->marshallMoto(self::CATEGORY_MOTO, false), $userId);
								}
							} else {
								if ($i == $productCategory) {
									$exist = false;
									// Comprobar si existe la moto con active = false
									$exist = $motoDao->isExistMotoById($productDto->getId(), false);
									if ($exist) {
										// UPDATE active = true
										$this->modifyMoto($this->marshallMoto(self::CATEGORY_MOTO, true), $userId);
									} else {
										// INSERT nueva línea de bicicleta
										$this->addNewMoto($this->marshallMoto(self::CATEGORY_MOTO, null), $userId);
									}
								}
							}

							break;
						case 3:
							$equipmentDao = new EquipmentDao();
							$exist = false;
							// Comprobar si existe el equipamiento con active = true
							$exist = $equipmentDao->isExistEquipmentById($productDto->getId(), true);
							if ($exist) {
								if ($i == $productCategory) {
									// UPDATE active = true
									$this->modifyEquipment($this->marshallEquipment(self::CATEGORY_EQUIPMENT, false), $userId);
								} else {
									// UPDATE active = false
									$this->modifyEquipment($this->marshallEquipment(self::CATEGORY_EQUIPMENT, false), $userId);
								}
							} else {
								if ($i == $productCategory) {
									$exist = false;
									// Comprobar si existe la moto con active = false
									$exist = $equipmentDao->isExistEquipmentById($productDto->getId(), false);
									if ($exist) {
										// UPDATE active = true
										$this->modifyEquipment($this->marshallEquipment(self::CATEGORY_EQUIPMENT, true), $userId);
									} else {
										// INSERT nueva línea de bicicleta
										$this->addNewEquipment($this->marshallEquipment(self::CATEGORY_EQUIPMENT, null), $userId);
									}
								}
							}

							break;
						case 4:
							$accesoryDao = new AccesoryDao();
							$exist = false;
							// Comprobar si existe el equipamiento con active = true
							$exist = $accesoryDao->isExistAccesoryById($productDto->getId(), true);
							if ($exist) {
								if ($i == $productCategory) {
									// UPDATE active = true
									$this->modifyAccesory($this->marshallAccesory(self::CATEGORY_ACCESORY, false), $userId);
								} else {
									// UPDATE active = false
									$this->modifyAccesory($this->marshallAccesory(self::CATEGORY_ACCESORY, false), $userId);
								}
							} else {
								if ($i == $productCategory) {
									$exist = false;
									// Comprobar si existe la moto con active = false
									$exist = $equipmentDao->isExistAccesoryById($productDto->getId(), false);
									if ($exist) {
										// UPDATE active = true
										$this->modifyAccesory($this->marshallAccesory(self::CATEGORY_ACCESORY, true), $userId);
									} else {
										// INSERT nueva línea de bicicleta
										$this->addNewAccesory($this->marshallAccesory(self::CATEGORY_ACCESORY, null), $userId);
									}
								}
							}

							break;
						case 5:
							// $id =
							// $this->modifyProduct($this->marshallProduct(self::CATEGORY_OTHER,
							// false));
							break;
						default:
							error_log("Se ha introducido una categoría no contemplada");
							break;
					}
				}
			}
		}
	}

	/**
	 * Modifica un producto en base de datos
	 *
	 * @param ProductDto $productDto
	 * @param int $userId
	 */
	private function modifyProduct (ProductDto $productDto, int $userId): void {
		$productDao = new ProductDao();
		$utility = new Utility();
		$product = $utility->productDtoToProduct($productDto);

		$productDao->modifyProduct($product, $userId);
	}

	/**
	 *
	 * @param BikeDto $bikeDto
	 * @param int $userId
	 */
	private function modifyBike (BikeDto $bikeDto, int $userId): void {
		$bikeDao = new BikeDao();
		$utility = new Utility();

		$bikeDao->modifyBike($utility->BikeDtoToBike($bike), $userId);
	}

	/**
	 *
	 * @param int $productId
	 * @return \php\model\BikeDto
	 */
	private function getBikeDetail (int $productId): BikeDto {
		$bikeDtoAux = new BikeDto();
		$bikeDao = new BikeDao();
		$utility = new Utility();

		$bikeDtoAux = $utility->bikeToBikeDto($bikeDao->getBikeById($productId));

		return $bikeDtoAux;
	}

	/**
	 *
	 * @param int $productId
	 * @return \php\model\MotoDto
	 */
	private function getMotoDetail (int $productId): MotoDto {
		$motoDtoAux = new MotoDto();
		$motoDao = new MotoDao();
		$utility = new Utility();

		$motoDtoAux = $utility->motoToMotoDto($motoDao->getMotoById($productId));
		error_log("DETAIL: " . $motoDtoAux->getType()->getName());

		return $motoDtoAux;
	}

	/**
	 *
	 * @param int $productId
	 * @return \php\model\AccesoryDto
	 */
	private function getAccesoryDetail (int $productId): AccesoryDto {
		$accesoryDtoAux = new AccesoryDto();
		$accesoryDao = new AccesoryDao();
		$utility = new Utility();

		$accesoryDtoAux = $utility->accesoryToAccesoryDto($accesoryDao->getAccesoryById($productId));

		return $accesoryDtoAux;
	}

	/**
	 *
	 * @param int $productId
	 * @return \php\model\EquipmentDto
	 */
	private function getEquipmentDetail (int $productId): EquipmentDto {
		$equipmentDtoAux = new EquipmentDto();
		$equipmentDao = new EquipmentDao();
		$utility = new Utility();

		$equipmentDtoAux = $utility->equipmentToEquipmentDto($equipmentDao->getEquipmentById($productId));

		return $equipmentDtoAux;
	}

	/**
	 *
	 * @param int $id
	 * @return Product
	 */
	public function getProductById (int $productId): ProductDto {
		$productAux = new ProductDto();
		$productDao = new ProductDao();
		$utility = new Utility();

		$productAux = $utility->productToProductDto($productDao->getProductById($productId));
		$productAux = $this->getProductDetail($productAux);

		return $productAux;
	}

	/**
	 *
	 * @param ProductDto $productAux
	 * @return ProductDto
	 */
	private function getProductDetail (ProductDto $productAux): ProductDto {
		switch ($productAux->getCategory()->getId()) {
			case self::CATEGORY_BIKE:
				$bikeDtoAux = new BikeDto();
				$bikeDtoAux = $this->getBikeDetail($productAux->getId());

				$productAux->setDetails($bikeDtoAux);
				break;
			case self::CATEGORY_MOTO:
				$motoDtoAux = new MotoDto();
				$motoDtoAux = $this->getMotoDetail($productAux->getId());

				$productAux->setDetails($motoDtoAux);
				break;
			case self::CATEGORY_EQUIPMENT:
				$equipmentDtoAux = new EquipmentDto();
				$equipmentDtoAux = $this->getEquipmentDetail($productAux->getId());

				$productAux->setDetails($equipmentDtoAux);
				break;
			case self::CATEGORY_ACCESORY:
				$accesoryDtoAux = new AccesoryDto();
				$accesoryDtoAux = $this->getAccesoryDetail($productAux->getId());

				$productAux->setDetails($accesoryDtoAux);
				break;
		}

		return $productAux;
	}

	/**
	 *
	 * @param \ArrayObject $images
	 * @return String
	 */
	public function writeOtherImages (\ArrayObject $images, int $index): String {
		$output = "";
		if (null != $images && 0 < $images->count()) {
			$output .= '<div class="productOtherSubDiv" id="productOtherPreviousSubDiv">' . "\n";
			if (0 == $index || (self::OTHER_IMAGES_VISIBLES + 1) <= $images->count()) {
				$output .= '	<span class="page-item">' . "\n";
				$output .= '		<span class="disabled page-link first-child last-child"> &lt;&lt; </span>' . "\n";
				$output .= '	</span>' . "\n";
			} else {
				$output .= '	<a class="page-item">' . "\n";
				$output .= '		<span class="page-link first-child last-child" onclick="showPreviousImage(' . $index . ', ' . ($images->count() - 1) . ');"> &lt;&lt; </span>' . "\n";
				$output .= '	</a>' . "\n";
			}
			$output .= '</div>' . "\n";

			$iAux = 0;
			$jAux = 0;
			for ($i = 0; $i < $images->count(); $i ++) {
				if (1 != $images->offsetGet($i)->getMain() || ! $images->offsetGet($i)->getMain()) {
					if (3 > $iAux) {
						$output .= '<div class="productOtherDiv" id="productOtherDiv' . $iAux . '">' . "\n";
						$jAux ++;
					} else {
						$output .= '<div class="productOtherDivNoDisplay" id="productOtherDiv' . $iAux . '">' . "\n";
					}
					$output .= '	<img id="productOtherImg' . $iAux . '" src="../../../img/products/' . $images->offsetGet($i)
						->getImage()
						->getUrl() . '" title="' . $images->offsetGet($i)
						->getImage()
						->getName() . ' (' . $images->offsetGet($i)
						->getImage()
						->getUrl() . ')" />' . "\n";
					$output .= '	<input type="button" class="btn btnImg" value="Eliminar foto" title="Eliminar foto: ' . $images->offsetGet($i)
						->getImage()
						->getUrl() . '" id="productOtherDeleteButton' . $iAux . '" onclick="javascript:deletePhoto(this, \'productOtherImg' . $iAux . '\', ' . $iAux . ');" />' . "\n";
					$output .= '</div>' . "\n";

					$iAux ++;
				}
			}

			$output .= '<div class="productOtherSubDiv" id="productOtherNextSubDiv">' . "\n";
			if ($images->count() == $index || (self::OTHER_IMAGES_VISIBLES + 1) >= $images->count()) {
				$output .= '	<span class="page-item">' . "\n";
				$output .= '		<span class="disabled page-link first-child last-child"> &gt;&gt; </span>' . "\n"; // &#9193; >>
				$output .= '	</span>' . "\n";
			} else {
				$output .= '	<a class="page-item">' . "\n";
				$output .= '		<span class="page-link first-child last-child" onclick="showNextImage(' . $jAux . ', ' . ($images->count() - 1) . ');"> &gt;&gt; </span>' . "\n";
				$output .= '	</a>' . "\n";
			}
			$output .= '</div>' . "\n";
		}

		return $output;
	}

	/**
	 *
	 * @param int $index
	 * @param int $total
	 * @param String $direction
	 * @param String $origin
	 * @return String
	 */
	public function writeOtherImagesArrowButton (int $index, int $total, String $direction, String $origin): String {
		$output = "";
		if (0 == strcasecmp(self::BUTTON_PREVIOUS, $direction)) { // <<
			if (0 == strcasecmp(self::BUTTON_ORIGIN_PREVIOUS, $origin)) {
				$indexAux = $index - 1;
			} else if (0 == strcasecmp(self::BUTTON_ORIGIN_NEXT, $origin)) {
				$indexAux = $index - self::OTHER_IMAGES_VISIBLES;
			}

			if (0 > $indexAux) {
				$output .= '	<span class="page-item">' . "\n";
				$output .= '		<span class="disabled page-link first-child last-child"> &lt;&lt; </span>' . "\n";
				$output .= '	</span>' . "\n";
			} else {
				$output .= '	<a class="page-item">' . "\n";
				$output .= '		<span class="page-link first-child last-child" onclick="showPreviousImage(' . $indexAux . ', ' . $total . ');"> &lt;&lt; </span>' . "\n";
				$output .= '	</a>' . "\n";
			}
		} else if (0 == strcasecmp(self::BUTTON_NEXT, $direction)) { // >>
			if (0 == strcasecmp(self::BUTTON_ORIGIN_PREVIOUS, $origin)) {
				$indexAux = $index + self::OTHER_IMAGES_VISIBLES;
			} else if (0 == strcasecmp(self::BUTTON_ORIGIN_NEXT, $origin)) {
				$indexAux = $index + 1;
			}

			if (($total - 1) == $index) {
				$output .= '	<span class="page-item">' . "\n";
				$output .= '		<span class="disabled page-link first-child last-child"> &gt;&gt; </span>' . "\n"; // &#9193; >>
				$output .= '	</span>' . "\n";
			} else {
				$output .= '	<a class="page-item">' . "\n";
				$output .= '		<span class="page-link first-child last-child" onclick="showNextImage(' . $indexAux . ', ' . $total . ');"> &gt;&gt; </span>' . "\n";
				$output .= '	</a>' . "\n";
			}
		}

		return $output;
	}

	/**
	 *
	 * @param \ArrayObject $results
	 * @return string
	 */
	public function writeResults (\ArrayObject $results): String {
		$output = "";
		echo '<div class="adminResults">' . "\n";
		echo '	<span class="resultsNumber">Total resultados: ' . '<span class="blackResultsNumber">' . $results->count() . '</span></span>' . "\n";
		echo '</div>' . "\n";

		echo '<table class="table">' . "\n";
		echo '	<tr>' . "\n";
		echo '		<th style="width: 5%;" title="ID del producto">ID</th>' . "\n";
		echo '		<th style="width: 16%;" title="Nombre del producto">Nombre</th>' . "\n";
		echo '		<th style="width: 11%;" title="Marca del producto">Marca</th>' . "\n";
		echo '		<th style="width: 13%;" title="Modelo del producto">Modelo</th>' . "\n";
		echo '		<th style="width: 10%;" title="Categor&iacute;a del producto">Categor&iacute;a</th>' . "\n";
		echo '		<th style="width: 10%;" title="Tipo de producto">Tipo</th>' . "\n";
		echo '		<th style="width: 11%;" title="Subtipo de producto">Subtipo</th>' . "\n";
		echo '		<th style="width: 4%;" title="Existencias del producto">Stock</th>' . "\n";
		echo '		<th style="width: 12%;" title="Precio del producto">Precio</th>' . "\n";
		echo '		<th style="width: 4%;" title="Activo">Activo</th>' . "\n";
		echo '		<th style="width: 4%;" colspan="2" title="Acciones sobre el producto">Acciones</th>' . "\n";
		echo '	</tr>' . "\n";

		// Listado de productos
		if (0 < $results->count()) {
			for ($i = 0; $i < $results->count(); $i ++) {
				if (0 == $i || (($i % 2) == 0)) {
					echo '	<tr class="impar">' . "\n";
				} else {
					echo '	<tr>' . "\n";
					error_log("i=" . $i);
				}

				$productAux = new ProductDto();
				$productAux = $results->offsetGet($i);
				echo '		<td class="center">' . $productAux->getId() . '</td>' . "\n";
				echo '		<td>' . $productAux->getName() . '</td>' . "\n";
				echo '		<td>' . $productAux->getMark() . '</td>' . "\n";
				echo '		<td>' . $productAux->getModel() . '</td>' . "\n";
				echo '		<td>' . $productAux->getCategory()->getName() . '</td>' . "\n";
				echo '		<td>' . $productAux->getSubcategory()->getName() . '</td>' . "\n";
				if (null != $productAux->getDetails()) {
					echo '	<td>' . $productAux->getDetails()
						->getType()
						->getName() . '</td>' . "\n";
				} else {
					echo '	<td>' . '-' . '</td>' . "\n";
				}
				echo '		<td class="right">' . $productAux->getStock() . '</td>' . "\n";
				echo '		<td class="right">' . $productAux->getPrice() . ' &euro;</td>' . "\n";
				if (null != $productAux->getActive() && 0 == strcasecmp("1", $productAux->getActive())) {
					echo '	<td class="center"><span title="S&Iacute;">&#10004;</span></td>' . "\n"; // ✔
				} else {
					echo '	<td class="center"<span title="NO">&#10006;</span></td>' . "\n"; // ✘
				}
				echo '		<td class="action">' . "\n";
				echo '			<div class="adminImg">' . "\n";
				echo '				<a href="./modifyProduct.php?productId=' . $productAux->getId() . '">' . "\n";
				echo '					<img src="../img/modify.png" title="Modificar producto id=\'' . $productAux->getId() . '\'" />' . "\n";
				echo '				</a>' . "\n";
				echo '			</div>' . "\n";
				echo '		</td>' . "\n";
				echo '		<td class="action">' . "\n";
				echo '			<div class="adminImg">' . "\n";
				echo '				<img src="../img/delete.png" title="Eliminar producto id=\'' . $productAux->getId() . '\'" />' . "\n";
				echo '			</div>' . "\n";
				echo '		</td>' . "\n";
			}
		} else {
			echo '		<td colspan=11 class="center"> NO HAY PRODUCTOS </td>' . "\n";
		}

		echo '</table>' . "\n";

		return $output;
	}
}

// Control de entrada
/*
 * if (isset($_POST['newProductButton'])) { // newProduct.php
 * $productControlerObj = new ProductController();
 * $productControlerObj->newProduct();
 * } else
 */
if (isset($_GET['productId'])) {
	/*
	 * $productControlerObj = new ProductController($_GET['productId']);
	 * return $productControlerObj->getProductById();
	 */
} else if (isset($_POST['newProductProperty']) && ("true" == $_POST['newProductProperty'])) {
	$productControlerObj = new ProductController();
	$productControlerObj->newProduct();
} else if (isset($_POST['modifyProperty']) && ("true" == $_POST['modifyProperty'])) {
	$productControlerObj = new ProductController();
	$productControlerObj->modifyProduct();
} else if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['mark']) && isset($_POST['productSubcategory']) && isset($_POST['bikeSubType']) && isset($_POST['motoSubType']) && isset($_POST['otherSubType']) && isset($_POST['accesorySubType']) && isset($_POST['equipmentSubType']) && isset($_POST['active'])) { // listProduct.php

	$filters = new ProductForm();
	$filters->setId(trim($_POST['id']));
	$filters->setName(trim($_POST['name']));
	$filters->setMark(trim($_POST['mark']));
	$filters->setActive(trim($_POST['active']));
	$filters->setProductCategory($_POST['productSubcategory']);
	$filters->setBikeSubType($_POST['bikeSubType']);
	$filters->setMotoSubType($_POST['motoSubType']);
	$filters->setOtherSubType($_POST['otherSubType']);
	$filters->setAccesorySubType($_POST['accesorySubType']);
	$filters->setEquipmentSubType($_POST['equipmentSubType']);

	$productControlerObj = new ProductController();
	echo $productControlerObj->writeResults($productControlerObj->listProduct("", $filters));
} else if (isset($_POST['index']) && isset($_POST['total']) && isset($_POST['direction']) && isset($_POST['origin'])) { // Botón
	// izquierda
	// y
	// derecha
	// de
	// Otras
	// imágenes
	$productControlerObj = new ProductController();
	$index = $_POST['index'];
	$total = $_POST['total'];
	$direction = $_POST['direction'];
	$origin = $_POST['origin'];

	$output2 = $productControlerObj->writeOtherImagesArrowButton($index, $total, $direction, $origin);
	echo $output2;
} else {
	error_log("Llamada sin parámetros");
}

?>