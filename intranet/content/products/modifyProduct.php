<?php
	
	namespace intranet\content\products;
	
	/* Establecer la codificación de caracteres interna a UTF-8 */
	mb_internal_encoding('UTF-8');
 	mb_http_output('UTF-8');
	
	// Carga de combos
	require '../../../php/controller/InitController.php';

	use php\controller\InitController;
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
	
	error_log("Inicializado modifyProduct");
	
	if (isset($_GET['productId'])) {
		error_log("Product ID: " . $_GET['productId']);	
	} else {
		error_log("No hay product ID");
	}
	
	/**
	 * Constantes del código de subcategorías en Base de datos
	 */
	const BIKE = 1;
	const MOTO = 2;
	const OTHER = 3;
	
	/**
	 * Carga de datos de combos
	 */
	$initController = new InitController();
	$bikeAccesoryTypeList = new \ArrayObject();
	$bikeAccesoryTypeList = $initController->listAccesoryTypeByCategory(BIKE);
	$bikeEquipmentTypeList = new \ArrayObject();
	$bikeEquipmentTypeList = $initController->listEquipmentTypeByCategory(BIKE);
	$bikeTypeList = new \ArrayObject();
	$bikeTypeList = $initController->listBikeType(); // Listar tipos de bicicleta
	$bikeSizeList = new \ArrayObject();
	$bikeSizeList = $initController->listBikeSize(); // Listar tallas de bicicleta
	$categoryList = new \ArrayObject();
	$categoryList = $initController->listCategories(); // Listar categorías de producto
	$colorList = new \ArrayObject();
	$colorList = $initController->listColors(); // Listar colores
	$equipmentSizeList = new \ArrayObject();
	$equipmentSizeList = $initController->listEquipmentSize(); // Listar tallas de equipamiento
	$genderList = new \ArrayObject();
	$genderList = $initController->listGenders(); // Listar géneros
	$motoAccesoryTypeList = new \ArrayObject();
	$motoAccesoryTypeList = $initController->listAccesoryTypeByCategory(MOTO);
	$motoContaminationList = new \ArrayObject();
	$motoContaminationList = $initController->listMotoContamination(); // Listar distintivos anticontaminación de motos
	$motoEquipmentTypeList = new \ArrayObject();
	$motoEquipmentTypeList = $initController->listEquipmentTypeByCategory(MOTO);
	$motoFuelList = new \ArrayObject();
	$motoFuelList = $initController->listMotoFuel(); // Listar combustibles de motos
	$motoLicenseList = new \ArrayObject();
	$motoLicenseList = $initController->listMotoLicense(); // Listar permisos de conducir motos
	$motoTransmissionList = new \ArrayObject();
	$motoTransmissionList = $initController->listMotoTransmission(); // Listar tipos de transmisión de motocicleta
	$motoTypeList = new \ArrayObject();
	$motoTypeList = $initController->listMotoType(); // Listar tipos de motocicleta
	$otherAccesoryTypeList = new \ArrayObject();
	$otherAccesoryTypeList = $initController->listAccesoryTypeByCategory(OTHER);
	$otherEquipmentTypeList = new \ArrayObject();
	$otherEquipmentTypeList = $initController->listEquipmentTypeByCategory(OTHER);
	$subcategoryList = new \ArrayObject();
	$subcategoryList = $initController->listSubcategories(); // Listar categorías de producto
	
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
		<title>INTRANET - Modificar Producto - Bicicletas y Motos Maroto</title>
		<link rel='icon' type='image/x-icon' href='../../../img/mm_logo.ico' />
		<script src='../../content/js/intranet.js' type='text/javascript'></script>
		
		<!-- Bootstrap core CSS -->
		<link href="../../../vendor/bootstrap/css/bootstrap.min.css"
			rel="stylesheet" />
		
		<!-- Custom fonts for this template -->
		<link
			href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700"
			rel="stylesheet" />
		<link
			href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i"
			rel="stylesheet" />
		<link href="../../../vendor/fontawesome-free/css/all.min.css"
			rel="stylesheet" />
		
		<!-- Custom styles for this template -->
		<link rel='STYLESHEET' type='text/css'
			href='../../../css/resume.min.css' />
		
		<!-- Custom scripts for this template -->
		<script src="../../../js/resume.min.js"></script>
		<script src='../../content/js/intranet.js' type='text/javascript'></script>
	</head>
	<body class="noMargin" style="padding-top: 0px;" id="page-top"
		onload="openTab(event, 'newProductTab');">
		<div class="container-fluid p-0">
			<section class="resume-section p-3 p-lg-5 d-flex flex-column"
				id="admin">
				<div class="my-auto">
					<div id="mainTitle" class="mainTitle">
						<h1 class="mb-0">
							Maroto <span class="text-primary">Bikes</span>
						</h1>
					</div>
					<div class="lead mb-5">
						<p>INTRANET</p>
					</div>
	
					<h2 class="mb-5">Modificar producto</h2>
	
					<div class="resume-item d-flex flex-column flex-md-row mb-5">
						<div class="resume-content">
							<div class="tabcontainer">
								<div id="newProductTab" class="tabcontent">
									<div class="row">
										<div class="col-lg-12">
											<form id="productForm" method="post" name="modifyProductForm" action="/MotosMaroto/php/controller/ProductController.php">
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<div class="productImg">
																<span>Imagen principal:</span> <input class="form-control"
																	type="file" name="fileToUpload" id="fileToUpload"
																	accept="image/*" placeholder="Imagen principal *" required="required"
																	data-validation-required-message="Por favor, cargue una imagen." />
															</div>
														</div>
														<div class="form-group">
															<div class="productImg">
																<span>Otras im&aacute;genes:</span> <input class="form-control"
																	type="file" name="filesToUpload" id="filesToUpload"
																	multiple="multiple" accept="image/*"
																	placeholder="Otras im&aacute;genes"
																	data-validation-required-message="" />
															</div>
														</div>
														<div class="form-group">
															<input class="form-control" type="text" name="name"
																id="name" placeholder="Nombre *" required="required"
																data-validation-required-message="Por favor, introduzca un nombre." />
														</div>
														<div class="form-group">
															<textarea class="form-control" name="description"
																id="description" placeholder="Descripci&oacute;n *"
																required="required"
																data-validation-required-message="Por favor, introduzca una descripci&oacute;n."></textarea>
														</div>
														<div class="form-group">
															<input class="form-control" type="text" name="mark"
																id="mark" placeholder="Marca *" required="required"
																data-validation-required-message="Por favor, introduzca la marca del producto." />
														</div>
														<div class="form-group">
															<input class="form-control" type="text" name="model"
																id="model" placeholder="Modelo *" required="required"
																data-validation-required-message="Por favor, introduzca el modelo del producto." />
														</div>
														<div class="form-group">
															<input class="form-control" type="number" name="price"
																id="price" placeholder="Precio (&euro;) *"
																required="required"
																data-validation-required-message="Por favor, introduzca el precio del producto."
																min="0.00" step="0.01" />
														</div>
														<div class="form-group">
															<input class="form-control" type="number" name="stock"
																id="stock" placeholder="Existencias *"
																required="required"
																data-validation-required-message="Por favor, introduzca las existencias del producto."
																min="0" step="1" />
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<span>Categor&iacute;a:</span> 
															<select
																name="productCategory" class="form-control"
																id="productCategory" title="Categor&iacute;a"
																onChange="showProductCategory(this);" required="required">
																<option value="none">Seleccionar categor&iacute;a...</option>
<?php 
	// Listado de Categorías
																for ($i = 0; $i < $categoryList->count(); $i++) {
																	$categoryDtoAux = new CategoryDto();
																	$categoryDtoAux = $categoryList->offsetGet($i);
																	echo '<option value="' . $categoryDtoAux->getId() . '">' . $categoryDtoAux->getName() . '</option> ' . "\n";
																}
?>
															</select>
														</div>
														<div class="form-group">
															<input class="form-control" type="number" name="year"
																id="year"
																placeholder="A&ntilde;o de fabricaci&oacute;n *"
																required="required"
																data-validation-required-message="Por favor, introduzca el a&ntilde;o de fabricaci&oacute;n."
																min="1900" max="2018" step="1" />
														</div>
														<div class="form-group">
															<span>Colores:</span> <select name="colors"
																class="form-control" id="colors" size="10" multiple>
<?php 
	// Listado de Colores	
																for ($i = 0; $i < $colorList->count(); $i++) {
																	$colorDtoAux = new ColorDto();
																	$colorDtoAux = $colorList->offsetGet($i);
																	echo '<option value="' . $colorDtoAux->getOriginalName() . '">' . $colorDtoAux->getName() . '</option> ' . "\n";
																}
?>
															</select>
														</div>
														<!-- div class="form-group">
																<span>&iquest;Alquiler?</span-->
																<input type="hidden" name="rent" id="rent" value="false" />
															<!-- /div-->
														<div class="form-group">
															<textarea class="form-control" name="observations"
																id="observations" placeholder="Observaciones"
																data-validation-required-message="Por favor, introduzca observaciones."></textarea>
														</div>
														<div class="form-group">
															<span>&iquest;Mostrar en web?</span> <input
																type="checkbox" name="active" id="active" checked="checked" />
														</div>
													</div>
												</div>
	
												<!-- BICICLETAS -->
												<div class="row productType" id="bikeType">
													<div class="col-lg-12">
														<h3>Bicicleta</h3>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<span>Tipo de bicicleta:</span> <select name="bikeKind"
																class="form-control" id="bikeKind"
																title="Tipo de bicicleta">
																<option value="none">Seleccionar tipo...</option>
<?php 
	// Listado de Tipos de bicicleta
																for ($i = 0; $i < $bikeTypeList->count(); $i++) {
																	$bikeTypeDtoAux = new BikeTypeDto();
																	$bikeTypeDtoAux = $bikeTypeList->offsetGet($i);
																	echo '<option value="' . $bikeTypeDtoAux->getId() . '">' . $bikeTypeDtoAux->getName() . '</option> ' . "\n";
																}
?>
															</select>
														</div>
														<div class="form-group">
															<input class="form-control" type="text" name="bikeFrame"
																id="bikeFrame" placeholder="Cuadro" />
														</div>
														<div class="form-group">
															<input class="form-control" type="text" name="bikeFork"
																id="bikeFork" placeholder="Horquilla" />
														</div>
														<div class="form-group">
															<input class="form-control" type="text"
																name="bikeHandlebars" id="bikeHandlebars"
																placeholder="Manillar" />
														</div>
														<div class="form-group">
															<input class="form-control" type="text" name="bikeSeat"
																id="bikeSeat" placeholder="Sill&iacute;n" />
														</div>
														<div class="form-group">
															<input class="form-control" type="text" name="bikeChange"
																id="bikeChange" placeholder="Cambio" />
														</div>
														<div class="form-group">
															<input class="form-control" type="text"
																name="bikeDeflector" id="bikeDeflector"
																placeholder="Desviador" />
														</div>
														<div class="form-group">
															<input class="form-control" type="text" name="bikeControl"
																id="bikeControl" placeholder="Mando" />
														</div>
														<div class="form-group">
															<input class="form-control" type="text" name="bikeGroup"
																id="bikeGroup" placeholder="Grupo" />
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<span>Talla:</span> <select name="bikeSize"
																class="form-control" id="bikeSize" title="Talla">
																<option value="none">Seleccionar talla...</option>
<?php 
	// Listado de Tallas de bicicleta
																for ($i = 0; $i < $bikeSizeList->count(); $i++) {
																	$bikeSizeDtoAux = new BikeSizeDto();
																	$bikeSizeDtoAux = $bikeSizeList->offsetGet($i);
																	echo '<option value="' . $bikeSizeDtoAux->getId() . '">' . $bikeSizeDtoAux->getName() . '</option> ' . "\n";
																}
?>
															</select>
														</div>
														<div class="form-group">
															<input class="form-control" type="text" name="bikePedals"
																id="bikePedals" placeholder="Pedales" />
														</div>
														<div class="form-group">
															<input class="form-control" type="text" name="bikeCrank"
																id="bikeCrank" placeholder="Bielas" />
														</div>
														<div class="form-group">
															<input class="form-control" type="text"
																name="bikeCassette" id="bikeCassette"
																placeholder="Cassette" />
														</div>
														<div class="form-group">
															<input class="form-control" type="text" name="bikeWheels"
																id="bikeWheels" placeholder="Llantas" />
														</div>
														<div class="form-group">
															<input class="form-control" type="text" name="bikeTyres"
																id="bikeTyres" placeholder="Cubiertas" />
														</div>
														<div class="form-group">
															<input class="form-control" type="text"
																name="bikeDeflector" id="bikeDeflector"
																placeholder="Desviador" />
														</div>
														<div class="form-group">
															<input class="form-control" type="number"
																name="bikeWeight" id="bikeWeight"
																placeholder="Peso (kg.)" min="0.00" step="0.01" />
														</div>
													</div>
												</div>
	
												<!-- MOTOS -->
												<div class="row productType" id="motoType">
													<div class="col-lg-12">
														<h3>Moto</h3>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<span>Tipo de moto:</span> <select name="motoKind"
																class="form-control" id="motoKind" title="Tipo de moto">
																<option value="none">Seleccionar tipo...</option>
<?php 
	// Listado de Tipos de motocicleta
																for ($i = 0; $i < $motoTypeList->count(); $i++) {
																	$motoTypeDtoAux = new MotoTypeDto();
																	$motoTypeDtoAux = $motoTypeList->offsetGet($i);
																	echo '<option value="' . $motoTypeDtoAux->getId() . '">' . $motoTypeDtoAux->getName() . '</option> ' . "\n";
																}
?>
															</select>
														</div>
														<div class="form-group">
															<input class="form-control" type="number" name="motoCubic"
																id="motoCubic" placeholder="Cilindrada (cc&sup3;)"
																title="Cilindrada (cc&sup3;)" min="0" step="10" />
														</div>
														<div class="form-group">
															<input class="form-control" type="number"
																name="motoCylinder" id="motoCylinder"
																placeholder="N&ordm; cilindros" title="N&ordm; cilindros"
																min="0" step="1" />
														</div>
														<div class="form-group">
															<input class="form-control" type="number" name="motoPower"
																id="motoPower" placeholder="Potencia (cv)"
																title="Potencia (cv)" min="0.0" step="0.1" />
														</div>
														<div class="form-group">
															<input class="form-control" type="number" name="motoGears"
																id="motoGears" placeholder="Velocidades"
																title="Velocidades/Marchas" min="1" max="10" step="1" />
														</div>
														<div class="form-group">
															<input class="form-control" type="text"
																name="motoFrontBrake" id="motoFrontBrake"
																placeholder="Freno delantero (1 disco, 2 discos, tambor...)"
																title="Freno delantero" />
														</div>
														<div class="form-group">
															<input class="form-control" type="text"
																name="motoRearBrake" id="motoRearBrake"
																placeholder="Freno trasero (1 disco, tambor...)"
																title="Freno trasero" />
														</div>
														<div class="form-group">
															<input class="form-control" type="number"
																name="motoKilometers" id="motoKilometers"
																placeholder="Kil&oacute;metros" title="Kil&oacute;metros"
																min="0" step="1" />
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<span>Carnet:</span> <select name="motoLicense"
																class="form-control" id="motoLicense"
																title="Carnet de moto">
																<option value="none">Seleccionar carnet...</option>
<?php 
	// Listado de Permisos de conducir motocicleta
																for ($i = 0; $i < $motoLicenseList->count(); $i++) {
																	$motoLicenseDtoAux = new MotoLicenseDto();
																	$motoLicenseDtoAux = $motoLicenseList->offsetGet($i);
																	if (null == $motoLicenseDtoAux->getObservations() || strcasecmp("", trim($motoLicenseDtoAux->getObservations())) == 0) {
																		echo '<option value="' . $motoLicenseDtoAux->getId() . '">' . $motoLicenseDtoAux->getName() . '</option> ' . "\n";
																	} else {
																		echo '<option value="' . $motoLicenseDtoAux->getId() . '">' . $motoLicenseDtoAux->getName() . " (" . $motoLicenseDtoAux->getObservations() . ") " . '</option> ' . "\n";
																	}
																}
?>
															</select>
														</div>
														<div class="form-group">
															<input class="form-control" type="number"
																name="motoPlaces" id="motoPlaces"
																placeholder="Plazas homologadas" min="1" max="3" step="1" />
														</div>
														<div class="form-group">
															<span>Combustible:</span> <select class="form-control"
																name="motoFuel" id="motoFuel" title="Combustible">
																<option value="none">Seleccionar combustible...</option>
<?php 
	// Listado de Combustibles de motocicleta
																for ($i = 0; $i < $motoFuelList->count(); $i++) {
																	$motoFuelDtoAux = new MotoFuelDto();
																	$motoFuelDtoAux = $motoFuelList->offsetGet($i);
																	echo '<option value="' . $motoFuelDtoAux->getId() . '">' . $motoFuelDtoAux->getName() . '</option> ' . "\n";
																}
?>
															</select>
														</div>
														<div class="form-group">
															<span>Distintivo anticontaminaci&oacute;n:</span> <select
																class="form-control" name="motoContamination"
																id="motoContamination" title="Distintivo anticontaminaci&oacute;n">
																<option value="none">Seleccionar categor&iacute;a...</option>
<?php 
	// Listado de Distintivos anticontaminación de motocicleta
																for ($i = 0; $i < $motoContaminationList->count(); $i++) {
																	$motoContaminationDtoAux = new MotoContaminationDto();
																	$motoContaminationDtoAux = $motoContaminationList->offsetGet($i);
																	if (null == $motoContaminationDtoAux->getColor() || strcasecmp("", trim($motoContaminationDtoAux->getColor())) == 0) {
																		echo '<option value="' . $motoContaminationDtoAux->getId() . '">' . $motoContaminationDtoAux->getName() . '</option> ' . "\n";
																	} else {
																		echo '<option value="' . $motoContaminationDtoAux->getId() . '">' . $motoContaminationDtoAux->getName() . " (" . strtolower($motoContaminationDtoAux->getColor()) . ") " . '</option> ' . "\n";
																	}
																}
?>
															</select>
														</div>
														<div class="form-group">
															<span>Transmisi&oacute;n:</span> <select
																class="form-control" name="motoTransmission"
																id="motoTransmission" title="Transmisi&oacute;n">
																<option value="none">Seleccionar transmisi&oacute;n...</option>
<?php 
	// Listado de tipos de Transmisión de motocicleta
																for ($i = 0; $i < $motoTransmissionList->count(); $i++) {
																	$motoTransmissionDtoAux = new MotoTransmissionDto();
																	$motoTransmissionDtoAux = $motoTransmissionList->offsetGet($i);
																	echo '<option value="' . $motoTransmissionDtoAux->getId() . '">' . $motoTransmissionDtoAux->getName() . '</option> ' . "\n";
																}
?>
															</select>
														</div>
														<div class="form-group">
															<span>&iquest;Segunda mano?</span> <input type="checkbox"
																name="motoSecondHand" id="motoSecondHand" />
														</div>
													</div>
												</div>
	
												<!-- EQUIPACIÓN -->
												<div class="row productType" id="equipmentType">
													<div class="col-lg-12">
														<h3>Equipaci&oacute;n</h3>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<span>Equipaci&oacute;n de:</span> <select
																class="form-control" name="equipmentKind"
																id="equipmentKind" title="Tipo de equipaci&oacute;n"
																onChange="showSubtypeCategory(this);">
																<option value="none">Seleccionar tipo...</option>
<?php 
	// Listado de subcategorías
																for ($i = 0; $i < $subcategoryList->count(); $i++) {
																	$subcategoryDtoAux = new CategoryDto();
																	$subcategoryDtoAux = $subcategoryList->offsetGet($i);
																	echo '<option value="' . $subcategoryDtoAux->getId() . '">' . $subcategoryDtoAux->getName() . '</option> ' . "\n";
																}
?>
															</select>
														</div>
														<div class="form-group" id="genderSubType">
															<span>G&eacute;nero:</span> <select class="form-control"
																name="genderSubType" id="cbGender" title="G&eacute;nero">
																<option value="none">Seleccionar g&eacute;nero...</option>
<?php 
	// Listado de subtipo de géneros de personas
																for ($i = 0; $i < $genderList->count(); $i++) {
																	$genderDtoAux = new GenderDto();
																	$genderDtoAux = $genderList->offsetGet($i);
																	echo '<option value="' . $genderDtoAux->getId() . '">' . $genderDtoAux->getName() . '</option> ' . "\n";
																}
?>
															</select>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group subtypeCategory exampleSubType" id="exampleEquipmentSubType">
															<span>Subtipo:</span> <select class="form-control"
																name="exampleEquipmentSubType" id="cbExampleEquipmentSubType"
																title="Subtipo de equipaci&oacute;n">
																<option value="none">Seleccionar subtipo...</option>
															</select>
														</div>
														<div class="form-group subtypeCategory" id="bikeEquipmentSubType">
															<span>Subtipo:</span> <select class="form-control"
																name="bikeEquipmentSubType" id="cbBikeEquipmentSubType"
																title="Subtipo de equipaci&oacute;n de bicicleta">
																<option value="none">Seleccionar subtipo...</option>
<?php 
	// Listado de subtipo de equipación de bicicletas
																for ($i = 0; $i < $bikeEquipmentTypeList->count(); $i++) {
																	$bikeEquipmentTypeDtoAux = new EquipmentTypeDto();
																	$bikeEquipmentTypeDtoAux = $bikeEquipmentTypeList->offsetGet($i);
																	echo '<option value="' . $bikeEquipmentTypeDtoAux->getId() . '">' . $bikeEquipmentTypeDtoAux->getName() . '</option> ' . "\n";
																}
?>
															</select>
														</div>
														<div class="form-group subtypeCategory" id="motoEquipmentSubType">
															<span>Subtipo:</span> <select class="form-control"
																name="motoEquipmentSubType" id="cbMotoEquipmentSubType"
																title="Subtipo de equipaci&oacute;n de moto">
																<option value="none">Seleccionar subtipo...</option>
<?php 
	// Listado de subtipo de equipación de motos
																for ($i = 0; $i < $motoEquipmentTypeList->count(); $i++) {
																	$motoEquipmentTypeDtoAux = new EquipmentTypeDto();
																	$motoEquipmentTypeDtoAux = $motoEquipmentTypeList->offsetGet($i);
																	echo '<option value="' . $motoEquipmentTypeDtoAux->getId() . '">' . $motoEquipmentTypeDtoAux->getName() . '</option> ' . "\n";
																}
?>
															</select>
														</div>
														<div class="form-group subtypeCategory" id="otherEquipmentSubType">
															<span>Subtipo:</span> <select class="form-control"
																name="otherEquipmentSubType" id="cbOtherEquipmentSubType"
																title="Subtipo de equipaci&oacute;n de otros">
																<option value="none">Seleccionar subtipo...</option>
<?php 
	// Listado de subtipo de equipación de otros
																for ($i = 0; $i < $otherEquipmentTypeList->count(); $i++) {
																	$otherEquipmentTypeDtoAux = new EquipmentTypeDto();
																	$otherEquipmentTypeDtoAux = $otherEquipmentTypeList->offsetGet($i);
																	echo '<option value="' . $otherEquipmentTypeDtoAux->getId() . '">' . $otherEquipmentTypeDtoAux->getName() . '</option> ' . "\n";
																}
?>
															</select>
														</div>
														<div class="form-group" id="sizeSubType">
															<span>Talla:</span> <select class="form-control"
																name="sizeSubType" id="cbSize" title="Talla">
																<option value="none">Seleccionar talla...</option>
<?php 
	// Listado de subtipo de tallas de equipación
																for ($i = 0; $i < $equipmentSizeList->count(); $i++) {
																	$equipmentSizeDtoAux = new EquipmentSizeDto();
																	$equipmentSizeDtoAux = $equipmentSizeList->offsetGet($i);
																	echo '<option value="' . $equipmentSizeDtoAux->getId() . '">' . $equipmentSizeDtoAux->getName() . '</option> ' . "\n";
																}
?>
															</select>
														</div>
													</div>
												</div>
	
												<!-- ACCESORIOS -->
												<div class="row productType" id="accesoryType">
													<div class="col-lg-12">
														<h3>Accesorio</h3>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<span>Accesorio de:</span> <select
																class="form-control" name="accesoryKind"
																id="accesoryKind" title="Tipo de accesorio"
																onChange="showSubtypeCategory(this);">
																<option value="none">Seleccionar tipo...</option>
<?php 
	// Listado de subcategorías
																for ($i = 0; $i < $subcategoryList->count(); $i++) {
																	$subcategoryDtoAux = new CategoryDto();
																	$subcategoryDtoAux = $subcategoryList->offsetGet($i);
																	echo '<option value="' . $subcategoryDtoAux->getId() . '">' . $subcategoryDtoAux->getName() . '</option> ' . "\n";
																}
?>
															</select>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group subtypeCategory exampleSubType" id="exampleAccesorySubType">
															<span>Subtipo:</span> <select class="form-control"
																name="exampleAccesorySubType" id="cbExampleAccesorySubType"
																title="Subtipo de accesorio">
																<option value="none">Seleccionar subtipo...</option>
															</select>
														</div>
														<div class="form-group subtypeCategory" id="bikeAccesorySubType">
															<span>Subtipo:</span> <select class="form-control"
																name="bikeAccesorySubType" id="cbBikeAccesorySubType"
																title="Subtipo de accesorio de bicicleta">
																<option value="none">Seleccionar subtipo...</option>
<?php 
	// Listado de subtipo de accesorio de bicicletas
																for ($i = 0; $i < $bikeAccesoryTypeList->count(); $i++) {
																	$bikeAccesoryTypeDtoAux = new AccesoryTypeDto();
																	$bikeAccesoryTypeDtoAux = $bikeAccesoryTypeList->offsetGet($i);
																	echo '<option value="' . $bikeAccesoryTypeDtoAux->getId() . '">' . $bikeAccesoryTypeDtoAux->getName() . '</option> ' . "\n";
																}
?>
															</select>
														</div>
														<div class="form-group subtypeCategory" id="motoAccesorySubType">
															<span>Subtipo:</span> <select class="form-control"
																name="motoAccesorySubType" id="cbMotoAccesorySubType"
																title="Subtipo de accesorio de moto">
																<option value="none">Seleccionar subtipo...</option>
<?php 
	// Listado de subtipo de accesorio de motos
																for ($i = 0; $i < $motoAccesoryTypeList->count(); $i++) {
																	$motoAccesoryTypeDtoAux = new AccesoryTypeDto();
																	$motoAccesoryTypeDtoAux = $motoAccesoryTypeList->offsetGet($i);
																	echo '<option value="' . $motoAccesoryTypeDtoAux->getId() . '">' . $motoAccesoryTypeDtoAux->getName() . '</option> ' . "\n";
																}
?>
															</select>
														</div>
														<div class="form-group subtypeCategory" id="otherAccesorySubType">
															<span>Subtipo:</span> <select class="form-control"
																name="otherAccesorySubType" id="cbOtherAccesorySubType"
																title="Subtipo de accesorio de otros">
																<option value="none">Seleccionar subtipo...</option>
<?php 
	// Listado de subtipo de accesorio de otros
																for ($i = 0; $i < $otherAccesoryTypeList->count(); $i++) {
																	$otherAccesoryTypeDtoAux = new AccesoryTypeDto();
																	$otherAccesoryTypeDtoAux = $otherAccesoryTypeList->offsetGet($i);
																	echo '<option value="' . $otherAccesoryTypeDtoAux->getId() . '">' . $otherAccesoryTypeDtoAux->getName() . '</option> ' . "\n";
																}
?>
															</select>
														</div>
													</div>											
												</div>
	
												<!-- OTROS -->
												<div class="row productType" id="otherType"></div>
	
												<div class="col-lg-12 text-center">
													<div class="form-group">
														<div id="success"></div>
														<br /> <a href='../admin.php' class="noDecoration">
															<button id="cancelProductButton"
																class="btn btn-primary btn-xl text-uppercase"
																title="Cancelar el alta de producto y volver al men&uacute; de Administrador">Cancelar</button>
														</a>
														<button id="addProductButton"
															class="btn btn-primary btn-xl text-uppercase" name="newProductButton"
															type="submit">Dar de alta</button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</body>
</html>