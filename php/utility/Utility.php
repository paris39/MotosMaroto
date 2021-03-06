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
use php\model\ImageDto;
use php\model\MotoDto;
use php\model\MotoContaminationDto;
use php\model\MotoFuelDto;
use php\model\MotoLicenseDto;
use php\model\MotoTransmissionDto;
use php\model\MotoTypeDto;
use php\model\OtherTypeDto;
use php\model\ProductDto;
use php\model\ProductColorDto;
use php\model\ProductImageDto;
use php\model\ProductTypeDto;
use php\model\UserDto;
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
use php\persistence\entities\Image;
use php\persistence\entities\Moto;
use php\persistence\entities\MotoContamination;
use php\persistence\entities\MotoFuel;
use php\persistence\entities\MotoLicense;
use php\persistence\entities\MotoTransmission;
use php\persistence\entities\MotoType;
use php\persistence\entities\Product;
use php\persistence\entities\ProductColor;
use php\persistence\entities\ProductImage;
use php\persistence\entities\User;


/**
 *
 * @author JPD
 */
class Utility {

	/**
	 * Constructor por defecto
	 */
	public function __construct () {
	}

	/**
	 *
	 * @param Accesory $accesory
	 * @return AccesoryDto
	 */
	public function accesoryToAccesoryDto (Accesory $accesory): AccesoryDto {
		$accesoryDtoAux = new AccesoryDto();
		$accesoryTypeDtoAux = new AccesoryTypeDto();
		$categoryDtoAux = new CategoryDto();

		if (null != $accesory) {
			$accesoryDtoAux->setId($accesory->getId());
			$accesoryTypeDtoAux = $this->accesoryTypeToAccesoryTypeDto($accesory->getType());
			$accesoryDtoAux->setType($accesoryTypeDtoAux);
			$accesoryDtoAux->setSize($accesory->getSize());
			$accesoryDtoAux->setActive($accesory->getActive());
			$accesoryDtoAux->setObservationActive($accesory->getObservationActive());
		} else {
			return null;
		}

		return $accesoryDtoAux;
	}

	/**
	 *
	 * @param AccesoryType $accesoryType
	 * @return AccesoryTypeDto
	 */
	public function accesoryTypeToAccesoryTypeDto (AccesoryType $accesoryType): AccesoryTypeDto {
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
	 *
	 * @param \php\model\BikeDto $bikeDto
	 * @return \php\persistence\entities\Bike
	 */
	public function bikeDtoToBike (BikeDto $bikeDto): Bike {
		if (null != $bikeDto) {
			$bikeAux = new Bike();
			$bikeSizeAux = new BikeSize();
			$bikeTypeAux = new BikeType();

			$bikeAux->setId($bikeAux->getId());
			$bikeTypeAux = $this->bikeTypeDtoToBikeType($bikeDto->getType());
			$bikeAux->setType($bikeTypeAux);
			$bikeSizeAux = $this->bikeSizeDtoToBikeSize($bikeDto->getSize());
			$bikeAux->setSize($bikeSizeAux);
			$bikeAux->setGears($bikeDto->getGears());
			$bikeAux->setFrame($bikeDto->getFrame());
			$bikeAux->setFork($bikeDto->getFork());
			$bikeAux->setBrakes($bikeDto->getBrakes());
			$bikeAux->setWheels($bikeDto->getWheels());
			$bikeAux->setTyres($bikeDto->getTyres());
			$bikeAux->setSeat($bikeDto->getSeat());
			$bikeAux->setHandlebars($bikeDto->getHandlebars());
			$bikeAux->setShift($bikeDto->getShift());
			$bikeAux->setDerailleur($bikeDto->getDerailleur());
			$bikeAux->setTwistShifters($bikeDto->getTwistShifters());
			$bikeAux->setSpeedGroupset($bike->getSpeedGroupset());
			$bikeAux->setWeight($bikeDto->getWeight());
			$bikeAux->setPedals($bikeDto->getPedals());
			$bikeAux->setCranks($bikeDto->getCranks());
			$bikeAux->setCassette($bikeDto->getCassette());

			return $bikeAux;
		} else {
			return null;
		}
	}

	/**
	 *
	 * @param Bike $bike
	 * @return BikeDto
	 */
	public function bikeToBikeDto (Bike $bike): BikeDto {
		if (null != $bike) {
			$bikeDtoAux = new BikeDto();
			$bikeSizeDtoAux = new BikeSizeDto();
			$bikeTypeDtoAux = new BikeTypeDto();

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

			return $bikeDtoAux;
		} else {
			return null;
		}
	}

	/**
	 *
	 * @param \php\model\BikeSizeDto $bikeSizeDto
	 * @return \php\persistence\entities\BikeSize
	 */
	public function bikeSizeDtoToBikeSize (BikeSizeDto $bikeSizeDto): BikeSize {
		if (null != $bikeSizeDto) {
			$bikeSizeAux = new BikeSize();
			$bikeSizeAux->setId($bikeSizeDto->getId());
			$bikeSizeAux->setName($bikeSizedto->getName());

			return $bikeSizeAux;
		} else {
			return null;
		}
	}

	/**
	 *
	 * @param BikeSize $bikeSize
	 * @return BikeSizeDto
	 */
	public function bikeSizeToBikeSizeDto (BikeSize $bikeSize): BikeSizeDto {
		if (null != $bikeSize) {
			$bikeSizeDtoAux = new BikeSizeDto();
			$bikeSizeDtoAux->setId($bikeSize->getId());
			$bikeSizeDtoAux->setName($bikeSize->getName());

			return $bikeSizeDtoAux;
		} else {
			return null;
		}
	}

	/**
	 *
	 * @param \php\model\BikeTypeDto $bikeTypeDto
	 * @return \php\persistence\entities\BikeType
	 */
	public function bikeTypeDtoToBikeType (BikeTypeDto $bikeTypeDto): BikeType {
		if (null != $bikeTypeDto) {
			$bikeTypeAux = new BikeType();
			$bikeTypeAux->setId($bikeTypeDto->getId());
			$bikeTypeAux->setName($bikeTypeDto->getName());

			return $bikeTypeAux;
		} else {
			return null;
		}
	}

	/**
	 *
	 * @param BikeType $bikeType
	 * @return BikeTypeDto
	 */
	public function bikeTypeToBikeTypeDto (BikeType $bikeType): BikeTypeDto {
		if (null != $bikeType) {
			$bikeTypeDtoAux = new BikeTypeDto();
			$bikeTypeDtoAux->setId($bikeType->getId());
			$bikeTypeDtoAux->setName($bikeType->getName());

			return $bikeTypeDtoAux;
		} else {
			return null;
		}
	}

	/**
	 *
	 * @param Category $category
	 * @return CategoryDto
	 */
	public function categoryToCategoryDto (Category $category): CategoryDto {
		$categoryDtoAux = new CategoryDto();

		if (null != $category) {
			$categoryDtoAux->setId($category->getId());
			$categoryDtoAux->setName($category->getName());
			$categoryDtoAux->setOriginalName($category->getOriginalName());
		} else {
			return null;
		}

		return $categoryDtoAux;
	}

	/**
	 *
	 * @param Color $color
	 * @return ColorDto
	 */
	public function colorToColorDto (Color $color): ColorDto {
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
	 *
	 * @param Equipment $equipment
	 * @return EquipmentDto
	 */
	public function equipmentToEquipmentDto (Equipment $equipment): EquipmentDto {
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
	 *
	 * @param EquipmentSize $equipmentSize
	 * @return EquipmentSizeDto
	 */
	public function equipmentSizeToEquipmentSizeDto (EquipmentSize $equipmentSize): EquipmentSizeDto {
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
	 *
	 * @param EquipmentType $equipmentType
	 * @return EquipmentTypeDto
	 */
	public function equipmentTypeToEquipmentTypeDto (EquipmentType $equipmentType): EquipmentTypeDto {
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
	 *
	 * @param Gender $gender
	 * @return GenderDto
	 */
	public function genderToGenderDto (Gender $gender): GenderDto {
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
	 *
	 * @param Image $image
	 * @return ImageDto
	 */
	public function imageToImageDto (Image $image): ImageDto {
		$imageDtoAux = new ImageDto();

		$imageDtoAux->setId($image->getId());
		$imageDtoAux->setName($image->getName());
		$imageDtoAux->setUrl($image->getUrl());

		return $imageDtoAux;
	}

	/**
	 *
	 * @param MotoDto $motoDto
	 * @return Moto
	 */
	public function motoDtoToMoto (MotoDto $motoDto): Moto {
		if (null != $motoDto) {
			$motoAux = new Moto();
			$motoContaminationAux = new MotoContamination();
			$motoFuelAux = new MotoFuel();
			$motoLicenseAux = new MotoLicense();
			$motoTransmissionAux = new MotoTransmission();
			$motoTypeAux = new MotoType();

			$motoAux->setId($motoDto->getId());
			$motoTypeAux = $this->motoTypeDtoToMotoType($motoDto->getType());
			$motoAux->setType($motoTypeAux);
			$motoAux->setNumberPlate($motoDto->getNumberPlate());
			$motoAux->setPower($motoDto->Power());
			$motoAux->setPowerUnit($motoDto->getPowerUnit());
			$motoAux->setCylinderCapacity($motoDto->getCylinderCapacity());
			$motoAux->setCylinders($motoDto->getCylinders());
			$motoAux->setGears($motoDto->getGears());
			$motoAux->setFrontBrake($motoDto->getFrontBrake());
			$motoAux->setRearBrake($motoDto->getRearBrake());
			$motoAux->setKilometers($motoDto->getKilometers());
			$motoLicenseAux = $this->motoLicenseDtoToMotoLicense($motoAux->getLicense());
			$motoAux->setLicense($motoLicenseAux);
			$motoAux->setPlaces($motoDto->getPlaces());
			$motoFuelAux = $this->motoFuelDtoToMotoFuel($motoDto->getFuel());
			$motoAux->setFuel($motoFuelAux);
			$motoContaminationAux = $this->motoContaminationDtoToMotoContamination($motoDto->getContamination());
			$motoAux->setContamination($motoContaminationAux);
			$motoTransmissionAux = $this->motoTransmissionDtoToMotoTransmission($motoDto->getTransmission());
			$motoAux->setTransmission($motoTransmissionAux);
			$motoAux->setSecondHand($motoDto->getSecondHand());
			$motoAux->setActive($motoDto->getActive());
			$motoAux->setObservationActive($motoDto->getObservationActive());

			return $motoAux;
		} else {
			return null;
		}
	}

	/**
	 *
	 * @param Moto $moto
	 * @return MotoDto
	 */
	public function motoToMotoDto (Moto $moto): MotoDto {
		if (null != $moto) {
			$motoDtoAux = new MotoDto();
			$motoContaminationDtoAux = new MotoContaminationDto();
			$motoFuelDtoAux = new MotoFuelDto();
			$motoLicenseDtoAux = new MotoLicenseDto();
			$motoTransmissionDtoAux = new MotoTransmissionDto();
			$motoTypeDtoAux = new MotoTypeDto();

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
			$motoDtoAux->setActive($moto->getActive());
			$motoDtoAux->setObservationActive($moto->getObservationActive());

			return $motoDtoAux;
		} else {
			return null;
		}
	}

	/**
	 *
	 * @param MotoContaminationDto $motoContaminationDto
	 * @return MotoContamination
	 */
	public function motoContaminationDtoToMotoContamination (MotoContaminationDto $motoContaminationDto): MotoContamination {
		if (null != $motoContaminationDto) {
			$motoContaminationAux = new MotoContamination();

			$motoContaminationAux->setId($motoContaminationDto->getId());
			$motocontaminationAux->setName($motoContaminationDto->getName());
			$motoContaminationAux->setColor($motoContaminationDto->getColor());

			return $motoContaminationAux;
		} else {
			return null;
		}
	}

	/**
	 *
	 * @param MotoContamination $motoContamination
	 * @return MotoContaminationDto
	 */
	public function motoContaminationToMotoContaminationDto (MotoContamination $motoContamination): MotoContaminationDto {
		if (null != $motoContamination) {
			$motoContaminationDtoAux = new MotoContaminationDto();

			$motoContaminationDtoAux->setId($motoContamination->getId());
			$motoContaminationDtoAux->setName($motoContamination->getName());
			$motoContaminationDtoAux->setColor($motoContamination->getColor());

			return $motoContaminationDtoAux;
		} else {
			return null;
		}
	}

	/**
	 *
	 * @param MotoFuelDto $motoFuelDto
	 * @return MotoFuel
	 */
	public function motoFuelDtoToMotoFuel (MotoFuelDto $motoFuelDto): MotoFuel {
		if (null != $motoFuelDto) {
			$motoFuelAux = new MotoFuel();

			$motoFuelAux->setId($motoFuelDto->getId());
			$motoFuelAux->setName($motoFuelDto->getName());

			return $motoFuelAux;
		} else {
			return null;
		}
	}

	/**
	 *
	 * @param MotoFuel $motoFuel
	 * @return MotoFuelDto
	 */
	public function motoFuelToMotoFuelDto (MotoFuel $motoFuel): MotoFuelDto {
		if (null != $motoFuel) {
			$motoFuelDtoAux = new MotoFuelDto();

			$motoFuelDtoAux->setId($motoFuel->getId());
			$motoFuelDtoAux->setName($motoFuel->getName());

			return $motoFuelDtoAux;
		} else {
			return null;
		}
	}

	/**
	 *
	 * @param MotoLicenseDto $motoLicenseDto
	 * @return MotoLicense
	 */
	public function motoLicenseDtoToMotoLicense (MotoLicenseDto $motoLicenseDto): MotoLicense {
		if (null != $motoLicenseDto) {
			$motoLicenseAux = new MotoLicense();

			$motoLicenseAux->setId($motoLicenseDto->getId());
			$motoLicenseAux->setName($motoLicenseDto->getName());
			$motoLicenseAux->setObservations($motoLicenseDto->getObservations());

			return $motoLicenseAux;
		} else {
			return null;
		}
	}

	/**
	 *
	 * @param MotoLicense $motoLicense
	 * @return MotoLicenseDto
	 */
	public function motoLicenseToMotoLicenseDto (MotoLicense $motoLicense): MotoLicenseDto {
		if (null != $motoLicense) {
			$motoLicenseDtoAux = new MotoLicenseDto();

			$motoLicenseDtoAux->setId($motoLicense->getId());
			$motoLicenseDtoAux->setName($motoLicense->getName());
			$motoLicenseDtoAux->setObservations($motoLicense->getObservations());

			return $motoLicenseDtoAux;
		} else {
			return null;
		}
	}

	/**
	 *
	 * @param MotoTransmissionDto $motoTransmissionDto
	 * @return MotoTransmission
	 */
	public function motoTransmissionDtoToMotoTransmission (MotoTransmissionDto $motoTransmissionDto): MotoTransmission {
		if (null != $motoTransmissionDto) {
			$motoTransmissionAux = new MotoTransmission();

			$motoTransmissionAux->setId($motoTransmissionDto->getId());
			$motoTransmissionAux->setName($motoTransmissionDto->getName());

			return $motoTransmissionAux;
		} else {
			return null;
		}
	}

	/**
	 *
	 * @param MotoTransmission $motoTransmission
	 * @return MotoTransmissionDto
	 */
	public function motoTransmissionToMotoTransmissionDto (MotoTransmission $motoTransmission): MotoTransmissionDto {
		if (null != $motoTransmission) {
			$motoTypeDtoAux = new MotoTransmissionDto();

			$motoTypeDtoAux->setId($motoTransmission->getId());
			$motoTypeDtoAux->setName($motoTransmission->getName());

			return $motoTypeDtoAux;
		} else {
			return null;
		}
	}

	/**
	 *
	 * @param MotoTypeDto $motoTypeDto
	 * @return MotoType
	 */
	public function motoTypeDtoToMotoType (MotoTypeDto $motoTypeDto): MotoType {
		if (null != $motoTypeDto) {
			$motoTypeAux = new MotoType();

			$motoTypeAux->setId($motoTypeDto->getId());
			$motoTypeAux->setName($motoTypeDto->getName());

			return $motoTypeAux;
		} else {
			return null;
		}
	}

	/**
	 *
	 * @param MotoType $motoType
	 * @return MotoTypeDto
	 */
	public function motoTypeToMotoTypeDto (MotoType $motoType): MotoTypeDto {
		if (null != $motoType) {
			$motoTypeDtoAux = new MotoTypeDto();

			$motoTypeDtoAux->setId($motoType->getId());
			$motoTypeDtoAux->setName($motoType->getName());

			return $motoTypeDtoAux;
		} else {
			return null;
		}
	}

	/**
	 *
	 * @param OtherType $otherType
	 * @return OtherTypeDto
	 */
	public function otherTypeToOtherTypeDto (OtherType $otherType): OtherTypeDto {
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
	 *
	 * @param Product $product
	 * @return ProductDto
	 */
	public function productToProductDto (Product $product): ProductDto {
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
			if (null != $product->getColors()) { // Colores
				$productColorList = new \ArrayObject();
				for ($i = 0; $i < $product->getColors()->count(); $i ++) {
					$productColorList->append($this->productColorToProductColorDto($product->getColors()
						->offsetGet($i)));
				}
				$productDtoAux->setColors($productColorList);
			}
			if (null != $product->getImages()) { // Imágenes
				$productImageList = new \ArrayObject();
				for ($i = 0; $i < $product->getImages()->count(); $i ++) {
					$productImageList->append($this->productImageToProductImageDto($product->getImages()
						->offsetGet($i)));
				}
				$productDtoAux->setImages($productImageList);
			}
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
	public function productDtoToProduct (ProductDto $productDto): Product {
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
				$product->setProductDate($productDto->getProductDate() . "/01/01"); // Fecha en inglés
			} else {
				$product->setProductDate($productDto->getProductDate());
			}
		} else {
			return null;
		}

		return $product;
	}

	/**
	 *
	 * @param ProductColor $productColor
	 * @return ProductColorDto
	 */
	public function productColorToProductColorDto (ProductColor $productColor): ProductColorDto {
		$productColorDtoAux = new ProductColorDto();

		$productColorDtoAux->setProductId($productColor->getProductId());
		$productColorDtoAux->setColor($this->colorToColorDto($productColor->getColor()));

		return $productColorDtoAux;
	}

	/**
	 *
	 * @param ProductImage $productImage
	 * @return ProductImageDto
	 */
	public function productImageToProductImageDto (ProductImage $productImage): ProductImageDto {
		$productImageDtoAux = new ProductImageDto();

		$productImageDtoAux->setProductId($productImage->getProductId());
		$productImageDtoAux->setImage($this->imageToImageDto($productImage->getImage()));
		$productImageDtoAux->setMain($productImage->getMain());
		$productImageDtoAux->setActive($productImage->getActive());

		return $productImageDtoAux;
	}

	/**
	 *
	 * @param User $user
	 * @return UserDto
	 */
	public function userToUserDto (User $user): UserDto {
		$userAux = new UserDto();

		$userAux->setId($user->getId());
		$userAux->setNick($user->getNick());
		$userAux->setName($user->getName());
		$userAux->setSurname($user->getSurname());
		$userAux->setPassword($user->getPassword());
		$userAux->setActive($user->getActive());

		return $userAux;
	}
}

?>