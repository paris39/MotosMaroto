<?php

	namespace php\utility;
	
	use php\form\ProductForm;
	use php\model\AccesoryTypeDto;
	use php\model\BikeTypeDto;
	use php\model\BikeSizeDto;
	use php\model\CategoryDto;
	use php\model\ColorDto;
	use php\model\EquipmentSizeDto;
	use php\model\EquipmentTypeDto;
	use php\model\GenderDto;
	use php\model\MotoContaminationDto;
	use php\model\MotoFuelDto;
	use php\model\MotoLicenseDto;
	use php\model\MotoTransmissionDto;
	use php\model\MotoTypeDto;
	use php\model\OtherTypeDto;
	use php\model\ProductTypeDto;
	use php\persistence\entities\AccesoryType;
	use php\persistence\entities\BikeType;
	use php\persistence\entities\BikeSize;
	use php\persistence\entities\Category;
	use php\persistence\entities\Color;
	use php\persistence\entities\EquipmentSize;
	use php\persistence\entities\EquipmentType;
	use php\persistence\entities\Gender;
	use php\persistence\entities\MotoContamination;
	use php\persistence\entities\MotoFuel;
	use php\persistence\entities\MotoLicense;
	use php\persistence\entities\MotoTransmission;
	use php\persistence\entities\MotoType;

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
		 * @param AccesoryType $accesoryType
		 * @return AccesoryTypeDto
		 */
		public function accesoryTypeToAccesoryTypeDto (AccesoryType $accesoryType) : AccesoryTypeDto {
			$accesoryTypeDtoAux = new AccesoryTypeDto();
			
			$accesoryTypeDtoAux->setId($accesoryType->getId());
			$accesoryTypeDtoAux->setName($accesoryType->getName());
			$accesoryTypeDtoAux->setCategory($accesoryType->getCategory());
			
			return $accesoryTypeDtoAux;
		}
		
		/**
		 * @param BikeSize $bikeSize
		 * @return BikeSizeDto
		 */
		public function bikeSizeToBikeSizeDto (BikeSize $bikeSize) : BikeSizeDto {
			$bikeSizeDtoAux = new BikeSizeDto();
			
			$bikeSizeDtoAux->setId($bikeSize->getId());
			$bikeSizeDtoAux->setName($bikeSize->getName());
			
			return $bikeSizeDtoAux;
		}
		
		/**
		 * @param BikeType $bikeType
		 * @return BikeTypeDto
		 */
		public function bikeTypeToBikeTypeDto (BikeType $bikeType) : BikeTypeDto {
			$bikeTypeDtoAux = new BikeTypeDto();
			
			$bikeTypeDtoAux->setId($bikeType->getId());
			$bikeTypeDtoAux->setName($bikeType->getName());
			
			return $bikeTypeDtoAux;
		}
		
		/**
		 * @param Category $category
		 * @return CategoryDto
		 */
		public function categoryToCategoryDto(Category $category) : CategoryDto {
			$categoryDtoAux = new CategoryDto();
			
			$categoryDtoAux->setId($category->getId());
			$categoryDtoAux->setName($category->getName());
			
			return $categoryDtoAux;
		}
		
		/**
		 * @param Color $color
		 * @return ColorDto
		 */
		public function colorToColorDto (Color $color) : ColorDto {
			$colorDtoAux = new ColorDto();
			
			$colorDtoAux->setId($color->getId());
			$colorDtoAux->setName($color->getName());
			$colorDtoAux->setOriginalName($color->getOriginalName());
			
			return $colorDtoAux;
		}
		
		/**
		 * @param EquipmentSize $equipmentSize
		 * @return EquipmentSizeDto
		 */
		public function equipmentSizeToEquipmentSizeDto (EquipmentSize $equipmentSize) : EquipmentSizeDto {
			$equipmentSizeDtoAux = new EquipmentSizeDto();
			
			$equipmentSizeDtoAux->setId($equipmentSize->getId());
			$equipmentSizeDtoAux->setName($equipmentSize->getName());
			
			return $equipmentSizeDtoAux;
		}
		
		/**
		 * @param EquipmentType $equipmentType
		 * @return EquipmentTypeDto
		 */
		public function equipmentTypeToEquipmentTypeDto (EquipmentType $equipmentType) : EquipmentTypeDto {
			$equipmentTypeDtoAux = new EquipmentTypeDto();
			
			$equipmentTypeDtoAux->setId($equipmentType->getId());
			$equipmentTypeDtoAux->setName($equipmentType->getName());
			$equipmentTypeDtoAux->setCategory($equipmentType->getCategory());
			
			return $equipmentTypeDtoAux;
		}
		
		/**
		 * @param Gender $gender
		 * @return GenderDto
		 */
		public function genderToGenderDto (Gender $gender) : GenderDto {
			$genderDtoAux = new GenderDto();
			
			$genderDtoAux->setId($gender->getId());
			$genderDtoAux->setName($gender->getName());
			$genderDtoAux->setActive($gender->getActive());
			
			return $genderDtoAux;
		}
		
		/**
		 * @param MotoContamination $motoContamination
		 * @return MotoContaminationDto
		 */
		public function motoContaminationToMotoContaminationDto (MotoContamination $motoContamination) : MotoContaminationDto {
			$motoContaminationDtoAux = new MotoContaminationDto();
			
			$motoContaminationDtoAux->setId($motoContamination->getId());
			$motoContaminationDtoAux->setName($motoContamination->getName());
			$motoContaminationDtoAux->setColor($motoContamination->getColor());
			
			return $motoContaminationDtoAux;
		}
		
		/**
		 * @param MotoFuel $motoFuel
		 * @return MotoFuelDto
		 */
		public function motoFuelToMotoFuelDto (MotoFuel $motoFuel) : MotoFuelDto {
			$motoFuelDtoAux = new MotoFuelDto();
			
			$motoFuelDtoAux->setId($motoFuel->getId());
			$motoFuelDtoAux->setName($motoFuel->getName());
			
			return $motoFuelDtoAux;
		}
		
		/**
		 * @param MotoLicense $motoLicense
		 * @return MotoLicenseDto
		 */
		public function motoLicenseToMotoLicenseDto (MotoLicense $motoLicense) : MotoLicenseDto {
			$motoLicenseDtoAux = new MotoLicenseDto();
			
			$motoLicenseDtoAux->setId($motoLicense->getId());
			$motoLicenseDtoAux->setName($motoLicense->getName());
			$motoLicenseDtoAux->setObservations($motoLicense->getObservations());
			
			return $motoLicenseDtoAux;
		}
		
		/**
		 * @param MotoTransmission $motoTransmission
		 * @return MotoTransmissionDto
		 */
		public function motoTransmissionToMotoTransmissionDto (MotoTransmission $motoTransmission) : MotoTransmissionDto {
			$motoTypeDtoAux = new MotoTransmissionDto();
			
			$motoTypeDtoAux->setId($motoTransmission->getId());
			$motoTypeDtoAux->setName($motoTransmission->getName());
			
			return $motoTypeDtoAux;
		}
		
		/**
		 * @param MotoType $motoType
		 * @return MotoTypeDto
		 */
		public function motoTypeToMotoTypeDto (MotoType $motoType) : MotoTypeDto {
			$motoTypeDtoAux = new MotoTypeDto();
			
			$motoTypeDtoAux->setId($motoType->getId());
			$motoTypeDtoAux->setName($motoType->getName());
			
			return $motoTypeDtoAux;
		}
		
		/**
		 * @param OtherType $otherType
		 * @return OtherTypeDto
		 */
		public function otherTypeToOtherTypeDto (OtherType $otherType) : OtherTypeDto {
			$otherTypeDtoAux = new OtherTypeDto();
			
			$otherTypeDtoAux->setId($otherType->getId());
			$otherTypeDtoAux->setName($otherType->getName());
			
			return $otherTypeDtoAux;
		}
		
		
		/**
		 * @param Product $product
		 * @return ProductDto
		 */
		public function productToProductDto (Product $product) : ProductDto {
			$productDtoAux = new ProductDto();
			
			$productDtoAux->setId($product->getId());
			$productDtoAux->setName($product->getName());
			$productDtoAux->setCategory($product->getCategory());
			$productDtoAux->setSubcategory($product->getSubcategory());
			
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
			
			return $product;
		}
	}

?>