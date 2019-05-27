<?php

	namespace php\utility;
	
	use php\form\ProductForm;
	use php\model\AccesoryDto;
	use php\model\AccesoryTypeDto;
	use php\model\BikeDto;
	use php\model\BikeSizeDto;
	use php\model\BikeTypeDto;
	use php\model\CategoryDto;
	use php\model\ColorDto;
	use php\model\EquipmentDto;
	use php\model\EquipmentSizeDto;
	use php\model\EquipmentTypeDto;
	use php\model\GenderDto;
	use php\model\MotoDto;
	use php\model\MotoContaminationDto;
	use php\model\MotoFuelDto;
	use php\model\MotoLicenseDto;
	use php\model\MotoTransmissionDto;
	use php\model\MotoTypeDto;
	use php\model\OtherTypeDto;
	use php\model\ProductDto;
	use php\model\ProductTypeDto;
	use php\persistence\entities\Accesory;
	use php\persistence\entities\AccesoryType;
	use php\persistence\entities\Bike;
	use php\persistence\entities\BikeSize;
	use php\persistence\entities\BikeType;
	use php\persistence\entities\Category;
	use php\persistence\entities\Color;
	use php\persistence\entities\Equipment;
	use php\persistence\entities\EquipmentSize;
	use php\persistence\entities\EquipmentType;
	use php\persistence\entities\Gender;
	use php\persistence\entities\Moto;
	use php\persistence\entities\MotoContamination;
	use php\persistence\entities\MotoFuel;
	use php\persistence\entities\MotoLicense;
	use php\persistence\entities\MotoTransmission;
	use php\persistence\entities\MotoType;
	use php\persistence\entities\Product;

	/**
	 * @author JPD
	 */
	class Utility {
	
		/**
		 * Constructor por defecto
		 */
		public function __construct() {
		}
		
		/**
		 * @param Accesory $accesory
		 * @return AccesoryDto
		 */
		public function accesoryToAccesoryDto (Accesory $accesory) : AccesoryDto {
			$accesoryDtoAux = new AccesoryDto();
			$accesoryTypeDtoAux = new AccesoryTypeDto();
			$categoryDtoAux = new CategoryDto();
			
			if (null != $accesoryType) {
				$accesoryDtoAux->setId($accesory->getId());
				$accesoryDtoAux->setName($accesory->getName());
				$accesoryTypeDtoAux = $this->accesoryTypeToAccesoryTypeDto($accesory->getType());
				$categoryDtoAux->setType($accesoryTypeDtoAux);
				$categoryDtoAux = $this->categoryToCategoryDto($accesory->getCategory());
				$accesoryDtoAux->setCategory($categoryDtoAux);
			} else {
				return null;
			}
			
			return $accesoryDtoAux;
		}
		
		/**
		 * @param AccesoryType $accesoryType
		 * @return AccesoryTypeDto
		 */
		public function accesoryTypeToAccesoryTypeDto (AccesoryType $accesoryType) : AccesoryTypeDto {
			$accesoryTypeDtoAux = new AccesoryTypeDto();
			
			if (null != $accesoryType) {
				$accesoryTypeDtoAux->setId($accesoryType->getId());
				$accesoryTypeDtoAux->setName($accesoryType->getName());
				$accesoryTypeDtoAux->setCategory($accesoryType->getCategory());
			} else {
				return null;
			}
			
			return $accesoryTypeDtoAux;
		}
		
		/**
		 * @param Bike $bike
		 * @return BikeDto
		 */
		public function bikeToBikeDto (Bike $bike) : BikeDto {
			$bikeDtoAux = new BikeDto();
			$bikeSizeDtoAux = new BikeSizeDto();
			$bikeTypeDtoAux = new BikeTypeDto();
			
			if (null != $bike) {
				$bikeDtoAux->setId($bike->getId());
				$bikeTypeDtoAux = $this->bikeTypeToBikeTypeDto($bike->getType());
				$bikeDtoAux->setType($bikeTypeDtoAux);
				$bikeSizeDtoAux = $this->bikeSizeToBikeSizeDto($bike->getSize());
				$bikeDtoAux->setSize($bikeSizeDtoAux);
				$bikeDtoAux->setGears($bike->getGears());
				$bikeDtoAux->setFrame($bike->getFrame());
				$bikeDtoAux->setFork($bike->getFork());
				$bikeDtoAux->setBrakes($bike->getBrakes());
				$bikeDtoAux->setWheels($bike->getWheels());
				$bikeDtoAux->setTyres($bike->getTyres());
				$bikeDtoAux->setSeat($bike->getSeat());
				$bikeDtoAux->setHandlebars($bike->getHandlebars());
				$bikeDtoAux->setShift($bike->getShift());
				$bikeDtoAux->setDerailleur($bike->getDerailleur());
				$bikeDtoAux->setTwistShifters($bike->getTwistShifters());
				$bikeDtoAux->setSpeedGroupset($bike->getSpeedGroupset());
				$bikeDtoAux->setWeight($bike->getWeight());
				$bikeDtoAux->setPedals($bike->getPedals());
				$bikeDtoAux->setCranks($bike->getCranks());
				$bikeDtoAux->setCassette($bike->getCassette());
			} else {
				return null;
			}
			
			return $bikeSizeDtoAux;
		}
		
		/**
		 * @param BikeSize $bikeSize
		 * @return BikeSizeDto
		 */
		public function bikeSizeToBikeSizeDto (BikeSize $bikeSize) : BikeSizeDto {
			$bikeSizeDtoAux = new BikeSizeDto();
			
			if (null != $bikeSize) {
				$bikeSizeDtoAux->setId($bikeSize->getId());
				$bikeSizeDtoAux->setName($bikeSize->getName());
			} else {
				return null;
			}
			
			return $bikeSizeDtoAux;
		}
		
		/**
		 * @param BikeType $bikeType
		 * @return BikeTypeDto
		 */
		public function bikeTypeToBikeTypeDto (BikeType $bikeType) : BikeTypeDto {
			$bikeTypeDtoAux = new BikeTypeDto();
			
			if (null != $bikeType) {
				$bikeTypeDtoAux->setId($bikeType->getId());
				$bikeTypeDtoAux->setName($bikeType->getName());
			} else {
				return null;
			}
			
			return $bikeTypeDtoAux;
		}
		
		/**
		 * @param Category $category
		 * @return CategoryDto
		 */
		public function categoryToCategoryDto(Category $category) : CategoryDto {
			$categoryDtoAux = new CategoryDto();
			
			if (null != $category) {
				$categoryDtoAux->setId($category->getId());
				$categoryDtoAux->setName($category->getName());
			} else {
				return null;
			}
			
			return $categoryDtoAux;
		}
		
		/**
		 * @param Color $color
		 * @return ColorDto
		 */
		public function colorToColorDto (Color $color) : ColorDto {
			$colorDtoAux = new ColorDto();
			
			if (null != $color) {
				$colorDtoAux->setId($color->getId());
				$colorDtoAux->setName($color->getName());
				$colorDtoAux->setOriginalName($color->getOriginalName());
			} else {
				return null;
			}
			
			return $colorDtoAux;
		}
		
		/**
		 * @param Equipment $equipment
		 * @return EquipmentDto
		 */
		public function equipmentToEquipmentDto (Equipment $equipment) : EquipmentDto {
			$equipmentDtoAux = new EquipmentDto();
			$equipmentSizeDtoAux = new EquipmentSizeDto();
			$equipmentTypeDtoAux = new EquipmentTypeDto();
			$genderDtoAux = new GenderDto();
			
			if (null != $accesoryType) {
				$equipmentDtoAux->setId($equipment->getId());
				$equipmentTypeDtoAux = $this->equipmentTypeToEquipmentTypeDto($equipment->getType());
				$equipmentDtoAux->setType($equipmentTypeDtoAux);
				$equipmentSizeDtoAux = $this->equipmentSizeToEquipmentSizeDto($equipment->getSize());
				$equipmentDtoAux->setSize($equipmentSizeDtoAux);
				$genderDtoAux = $this->genderToGenderDtoAux($equipment->getGender());
				$equipmentDtoAux->setGender($genderDtoAux);
			} else {
				return null;
			}
			
			return $equipmentDtoAux;
		}
		
		/**
		 * @param EquipmentSize $equipmentSize
		 * @return EquipmentSizeDto
		 */
		public function equipmentSizeToEquipmentSizeDto (EquipmentSize $equipmentSize) : EquipmentSizeDto {
			$equipmentSizeDtoAux = new EquipmentSizeDto();
			
			if (null != $equipmentSize) {
				$equipmentSizeDtoAux->setId($equipmentSize->getId());
				$equipmentSizeDtoAux->setName($equipmentSize->getName());
			} else {
				return null;
			}
			
			return $equipmentSizeDtoAux;
		}
		
		/**
		 * @param EquipmentType $equipmentType
		 * @return EquipmentTypeDto
		 */
		public function equipmentTypeToEquipmentTypeDto (EquipmentType $equipmentType) : EquipmentTypeDto {
			$equipmentTypeDtoAux = new EquipmentTypeDto();
			
			if (null != $equipmentType) {
				$equipmentTypeDtoAux->setId($equipmentType->getId());
				$equipmentTypeDtoAux->setName($equipmentType->getName());
				$equipmentTypeDtoAux->setCategory($equipmentType->getCategory());
			} else {
				return null;
			}
			
			return $equipmentTypeDtoAux;
		}
		
		/**
		 * @param Gender $gender
		 * @return GenderDto
		 */
		public function genderToGenderDto (Gender $gender) : GenderDto {
			$genderDtoAux = new GenderDto();
			
			if (null != $gender) {
				$genderDtoAux->setId($gender->getId());
				$genderDtoAux->setName($gender->getName());
				$genderDtoAux->setActive($gender->getActive());
			} else {
				return null;
			}
			
			return $genderDtoAux;
		}
		
		/**
		 * @param Moto $moto
		 * @return MotoDto
		 */
		public function motoToMotoDto (Moto $moto) : MotoDto {
			$motoDtoAux = new MotoDto();
			$motoContaminationDtoAux = new MotoContaminationDto();
			$motoFuelDtoAux = new MotoFuelDto();
			$motoLicenseDtoAux = new MotoLicenseDto();
			$motoTransmissionDtoAux = new MotoTransmissionDto();
			$motoTypeDtoAux = new MotoTypeDto();
			
			if (null != $moto) {
				$motoDtoAux->setId($moto->getId());
				$motoTypeDtoAux = $this->motoTypeToMotoTypeDto($moto->getType());
				$motoDtoAux->setType($motoTypeDtoAux);
				$motoDtoAux->setNumberPlate($moto->getNumberPlate());
				$motoDtoAux->setPower($moto->getPower());
				$motoDtoAux->setPowerUnit($moto->getPowerUnit());
				$motoDtoAux->setCylinderCapacity($moto->getCylinderCapacity());
				$motoDtoAux->setCylinders($moto->getCylinders());
				$motoDtoAux->setGears($moto->getGears());
				$motoDtoAux->setFrontBrake($moto->getFrontBrake());
				$motoDtoAux->setRearBrake($moto->getRearBrake());
				$motoDtoAux->setKilometers($moto->getKilometers());
				$motoLicenseDtoAux = $this->motoLicenseToMotoLicenseDto($moto->getLicense());
				$motoDtoAux->setLicense($motoLicenseDtoAux);
				$motoDtoAux->setPlaces($moto->getPlaces());
				$motoFuelDtoAux = $this->motoFuelToMotoFuelDto($moto->getFuel());
				$motoDtoAux->setFuel($motoFuelDtoAux);
				$motoContaminationDtoAux = $this->motoContaminationToMotoContaminationDto($moto->getContamination());
				$motoDtoAux->setContamination($motoContaminationDtoAux);
				$motoTransmissionDtoAux = $this->motoTransmissionToMotoTransmissionDto($moto->getTransmission());
				$motoDtoAux->setTransmission($motoTransmissionDtoAux);
				$motoDtoAux->setSecondHand($moto->getSecondHand());	
			} else {
				return null;
			}
			
			return $motoDtoAux;			
		}
		
		/**
		 * @param MotoContamination $motoContamination
		 * @return MotoContaminationDto
		 */
		public function motoContaminationToMotoContaminationDto (MotoContamination $motoContamination) : MotoContaminationDto {
			$motoContaminationDtoAux = new MotoContaminationDto();
			
			if (null != $motoContamination) {
				$motoContaminationDtoAux->setId($motoContamination->getId());
				$motoContaminationDtoAux->setName($motoContamination->getName());
				$motoContaminationDtoAux->setColor($motoContamination->getColor());
			} else {
				return null;
			}
			
			return $motoContaminationDtoAux;
		}
		
		/**
		 * @param MotoFuel $motoFuel
		 * @return MotoFuelDto
		 */
		public function motoFuelToMotoFuelDto (MotoFuel $motoFuel) : MotoFuelDto {
			$motoFuelDtoAux = new MotoFuelDto();
			
			if (null != $motoFuel) {
				$motoFuelDtoAux->setId($motoFuel->getId());
				$motoFuelDtoAux->setName($motoFuel->getName());
			} else {
				return null;
			}
			
			return $motoFuelDtoAux;
		}
		
		/**
		 * @param MotoLicense $motoLicense
		 * @return MotoLicenseDto
		 */
		public function motoLicenseToMotoLicenseDto (MotoLicense $motoLicense) : MotoLicenseDto {
			$motoLicenseDtoAux = new MotoLicenseDto();
			
			if (null != $motoLicense) {
				$motoLicenseDtoAux->setId($motoLicense->getId());
				$motoLicenseDtoAux->setName($motoLicense->getName());
				$motoLicenseDtoAux->setObservations($motoLicense->getObservations());
			} else {
				return null;
			}
			
			return $motoLicenseDtoAux;
		}
		
		/**
		 * @param MotoTransmission $motoTransmission
		 * @return MotoTransmissionDto
		 */
		public function motoTransmissionToMotoTransmissionDto (MotoTransmission $motoTransmission) : MotoTransmissionDto {
			$motoTypeDtoAux = new MotoTransmissionDto();
			
			if (null != $motoTransmission) {
				$motoTypeDtoAux->setId($motoTransmission->getId());
				$motoTypeDtoAux->setName($motoTransmission->getName());
			} else {
				return null;
			}
			
			return $motoTypeDtoAux;
		}
		
		/**
		 * @param MotoType $motoType
		 * @return MotoTypeDto
		 */
		public function motoTypeToMotoTypeDto (MotoType $motoType) : MotoTypeDto {
			$motoTypeDtoAux = new MotoTypeDto();
			
			if (null != $motoType) {
				$motoTypeDtoAux->setId($motoType->getId());
				$motoTypeDtoAux->setName($motoType->getName());
			} else {
				return null;
			}
			
			return $motoTypeDtoAux;
		}
		
		/**
		 * @param OtherType $otherType
		 * @return OtherTypeDto
		 */
		public function otherTypeToOtherTypeDto (OtherType $otherType) : OtherTypeDto {
			$otherTypeDtoAux = new OtherTypeDto();
			
			if (null != $otherType) {
				$otherTypeDtoAux->setId($otherType->getId());
				$otherTypeDtoAux->setName($otherType->getName());
			} else {
				return null;
			}
			
			return $otherTypeDtoAux;
		}
		
		
		/**
		 * @param Product $product
		 * @return ProductDto
		 */
		public function productToProductDto (Product $product) : ProductDto {
			$productDtoAux = new ProductDto();
			$categoryDtoAux = new CategoryDto();
			$subcategoryDtoAux = new CategoryDto();
			
			if (null != $product) {
				$productDtoAux->setId($product->getId());
				$productDtoAux->setName($product->getName());
				$productDtoAux->setMark($product->getMark());
				$productDtoAux->setModel($product->getModel());
				$productDtoAux->setDescription($product->getDescription());
				$productDtoAux->setPrice($product->getPrice());
				$categoryDtoAux = $this->categoryToCategoryDto($product->getCategory());
				$productDtoAux->setCategory($categoryDtoAux);
				$subcategoryDtoAux = $this->categoryToCategoryDto($product->getSubcategory());
				$productDtoAux->setSubcategory($subcategoryDtoAux);
				$productDtoAux->setStock($product->getStock());
				$productDtoAux->setRent($product->getRent());
				$productDtoAux->setObservations($product->getObservations());
				$productDtoAux->setActive($product->getActive());
				$productDtoAux->setProductDate($product->getProductDate());	
			} else {
				return null;
			}
			
			return $productDtoAux;
		}
		
		/**
		 * Marshall ProductDto > Product
		 *
		 * @param ProductDto $productDto
		 * @return Product
		 */
		public function productDtoToProduct (ProductDto $productDto) : Product {
			$product = new Product();
			
			if (null != $productDto) {
				$product->setName($productDto->getName()); // Nombre
				$product->setMark($productDto->getMark()); // Marca
				$product->setModel($productDto->getModel()); // Modelo
				$product->setDescription($productDto->getDescription()); // Descripción
				$product->setPrice($productDto->getPrice()); // Precio
				$product->setCategory($productDto->getCategory()); // Categoría
				$product->setSubcategory($productDto->getSubcategory()); // Subcategoría
				$product->setStock($productDto->getStock()); // Existencias
				$product->setRent($productDto->getRent()); // Alquiler
				$product->setObservations($productDto->getObservations()); // Observaciones
				$product->setActive($productDto->getActive()); // Activo en la web
				// Año de fabricación
				if (is_int($productDto->getProductDate()) || is_numeric($productDto->getProductDate())) {
					$product->setProductDate($productDto->getProductDate()."/01/01"); // Fecha en inglés
				} else {
					$product->setProductDate($productDto->getProductDate());
				}
			} else {
				return null;
			}
			
			return $product;
		}
	}

?>