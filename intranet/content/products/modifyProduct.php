<?php
	
	namespace intranet\content\products;
	
	/* Establecer la codificación de caracteres interna a UTF-8 */
	mb_internal_encoding('UTF-8');
 	mb_http_output('UTF-8');
	
	// Carga de combos
 	$root = realpath($_SERVER["DOCUMENT_ROOT"]) . "\MotosMaroto";
 	require $root . '\php\controller\InitController.php';
 	require_once $root . '\php\controller\ProductController.php';

	use php\controller\InitController;
	use php\controller\ProductController;
	use php\model\AccesoryDto;
	use php\model\AccesoryTypeDto;
	use php\model\BikeDto;
	use php\model\BikeTypeDto;
	use php\model\BikeSizeDto;
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
	use php\model\ProductDto;
	use php\model\ProductColorDto;
	use php\model\ProductImageDto;
	
	error_log("Inicializado modifyProduct");
	
	$error = false;
	// Comprobación de entrada
	if (isset($_GET['productId'])) {
		error_log("Product ID: " . $_GET['productId']);
	} else {
		error_log("No hay product ID");
		$error = true;
	}
	
	/**
	 * Constantes del código de subcategorías en Base de datos
	 */
	const BIKE = 1;
	const MOTO = 2;
	const EQUIPMENT = 3;
	const ACCESORY = 4;
	const OTHER = 5;
	const SUB_BIKE = 1;
	const SUB_MOTO = 2;
	const SUB_OTHER = 5;
	
	// Declaración e inicialización de objetos
	$initController = new InitController();
	$bikeAccesoryTypeList = new \ArrayObject();
	$bikeEquipmentTypeList = new \ArrayObject();
	$bikeTypeList = new \ArrayObject();
	$bikeSizeList = new \ArrayObject();
	$categoryList = new \ArrayObject();
	$colorList = new \ArrayObject();
	$equipmentSizeList = new \ArrayObject();
	$genderList = new \ArrayObject();
	$motoAccesoryTypeList = new \ArrayObject();
	$motoContaminationList = new \ArrayObject();
	$motoEquipmentTypeList = new \ArrayObject();
	$motoFuelList = new \ArrayObject();
	$motoLicenseList = new \ArrayObject();
	$motoTransmissionList = new \ArrayObject();
	$motoTypeList = new \ArrayObject();
	$otherAccesoryTypeList = new \ArrayObject();
	$otherEquipmentTypeList = new \ArrayObject();
	$productDto = new ProductDto();
	$subcategoryList = new \ArrayObject();
	
	if (!$error) {
		/**
		 * Carga de datos de combos
		 */
		$productController = new ProductController();
		$bikeAccesoryTypeList = $initController->listAccesoryTypeByCategory(BIKE);
		$bikeAux = new BikeDto();
		$bikeEquipmentTypeList = $initController->listEquipmentTypeByCategory(BIKE);
		$bikeTypeList = $initController->listBikeType(); // Listar tipos de bicicleta
		$bikeSizeList = $initController->listBikeSize(); // Listar tallas de bicicleta
		$categoryList = $initController->listCategories(); // Listar categorías de producto
		$colorList = $initController->listColors(); // Listar colores
		$equipmentSizeList = $initController->listEquipmentSize(); // Listar tallas de equipamiento
		$genderList = $initController->listGenders(); // Listar géneros
		$motoAccesoryTypeList = $initController->listAccesoryTypeByCategory(MOTO);
		$motoAux = new MotoDto();
		$motoContaminationList = $initController->listMotoContamination(); // Listar distintivos anticontaminación de motos
		$motoEquipmentTypeList = $initController->listEquipmentTypeByCategory(MOTO);
		$motoFuelList = $initController->listMotoFuel(); // Listar combustibles de motos
		$motoLicenseList = $initController->listMotoLicense(); // Listar permisos de conducir motos
		$motoTransmissionList = $initController->listMotoTransmission(); // Listar tipos de transmisión de motocicleta
		$motoTypeList = $initController->listMotoType(); // Listar tipos de motocicleta
		$otherAccesoryTypeList = $initController->listAccesoryTypeByCategory(OTHER);
		$otherEquipmentTypeList = $initController->listEquipmentTypeByCategory(OTHER);
		$subcategoryList = $initController->listSubcategories(); // Listar categorías de producto
		
		$productDto = $productController->getProductById($_GET['productId']);
		$mainImage = new ImageDto();
		$images = $productDto->getImages();
		$outputImages = $productController->writeOtherImages($images, 0);
		
		/*** PINTAR CÓDIGO ***/ /*
		echo '<!DOCTYPE html>' . "\n";
		echo '<html lang="es">' . "\n";
		echo '	<head>' . "\n";
		echo '		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />' . "\n";
		echo '		<title>INTRANET - Modificar Producto - Bicicletas y Motos Maroto</title>' . "\n";
		echo '		<link rel="icon" type="image/x-icon" href="../../../img/mm_logo.ico" />' . "\n";
		echo '		<script src="../../content/js/intranet.js" type="text/javascript"></script>' . "\n"; */
	}
?>
<!DOCTYPE html >
<html lang="es">
	<head>
		<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
		<title>INTRANET - Modificar Producto - Bicicletas y Motos Maroto</title>
		<link rel='icon' type='image/x-icon' href='../../../img/mm_logo.ico' />
		<script src='../../content/js/jquery-3.4.1.min.js' type='text/javascript'></script>
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
		onload="showProductCategory(document.getElementById('productCategory')); openTab(event, 'newProductTab');">
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
									<img src="../../../img/warning.jpg" id="warning" />
									<span class="information">Los campos indicados con un asterisco rojo (<span class="mandatory">*</span>) son obligatorios de cumplimentar</span>
									<br /><br />
									<div class="row">
										<div class="col-lg-12">
											<form id="productForm" method="post" name="modifyProductForm" action="/MotosMaroto/php/controller/ProductController.php">
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<div class="productImg">
																<span><span class="mandatory">*</span> Imagen principal:</span>
																<div id="mainImg">
<?php 
    // Imagen principal
																	$main = false;
																	if (null != $productDto->getImages()) {
																		for ($i = 0; $i < $productDto->getImages()->count() && !$main; $i++) {
																			$productImageDtoAux = new ProductImageDto();
																			$productImageDtoAux = $productDto->getImages()->offsetGet($i);
																			if ($productImageDtoAux->getMain() || 1 == $productImageDtoAux->getMain()) {
																				$mainImage = $productImageDtoAux->getImage();
																				echo '<img id="productMainImg" src="../../../img/products/' . $mainImage->getUrl() . ' "title="' . $mainImage->getName() . '" />' . "\n";
																				$main = true;
																			}
																		}
																	}
																	if (!$main) {
																		echo '<img src="../../../img/no-image.png" id="productMainImg" alt="Imagen principal" title="Imagen principal" onclick="changeImg(\'fileToUpload\')"; />' . "\n";
																	}
?>
																</div>
																<span>Cambiar imagen principal:</span>
																<input class="form-control" type="file" name="fileToUpload" id="fileToUpload" accept="image/*" placeholder="Imagen principal *" 
																	required="required" onchange="filePreview(this);" data-validation-required-message="Por favor, cargue una imagen." />
															</div>
														</div>
														<div class="form-group">
															<div class="productImg">
																<span>Otras im&aacute;genes:</span> 
																<div id="otherImg">
<?php 
    // Otras imágenes
																	echo $outputImages;
?>
																</div>
																<span>A&ntilde;adir m&aacute;s im&aacute;genes:</span>
																<input class="form-control"
																	type="file" name="filesToUpload" id="filesToUpload" multiple="multiple" accept="image/*" placeholder="Otras im&aacute;genes"
																	data-validation-required-message="" onchange="filePreview(this);" />
															</div>
														</div>
														<div class="form-group">
															<span><span class="mandatory">*</span> Nombre:</span> 
<?php 
    // Nombre de producto
															echo '<input class="form-control" type="text" name="name" id="name" placeholder="Nombre *" 
																	required="required" data-validation-required-message="Por favor, introduzca un nombre." 
																	title="Nombre del producto" value="' . $productDto->getName() . '"/>' . "\n";
?>
														</div>
														<div class="form-group">
															<span><span class="mandatory">*</span> Descripci&oacute;n:</span> 
<?php 
    // Descripción
															echo '<textarea class="form-control" name="description"
																	id="description" placeholder="Descripci&oacute;n *"
																	required="required" title="Descripci&oacute;n del producto"
																	data-validation-required-message="Por favor, introduzca una descripci&oacute;n.">'
																	. $productDto->getDescription() . 
																'</textarea>' . "\n";
?>
														</div>
														<div class="form-group">
															<span><span class="mandatory">*</span> Marca:</span> 
<?php 
    // Marca
															echo '<input class="form-control" type="text" name="mark"
																	id="mark" placeholder="Marca *" required="required" title="Marca del producto"
																	data-validation-required-message="Por favor, introduzca la marca del producto." 
																	value="' . $productDto->getMark() . '" />' . "\n";
?>
														</div>
														<div class="form-group">
															<span><span class="mandatory">*</span> Modelo:</span> 
<?php 
    // Modelo
															echo '<input class="form-control" type="text" name="model"
																	id="model" placeholder="Modelo *" required="required" title="Modelo del producto"
																	data-validation-required-message="Por favor, introduzca el modelo del producto." 
																	value="' . $productDto->getModel() .'" />' . "\n";
?>
														</div>
														<div class="form-group">
															<span><span class="mandatory">*</span> Precio:</span> 
<?php 
    // Precio
															echo '<input class="form-control" type="number" name="price" id="price" placeholder="Precio (&euro;) *"
																 	required="required" title="Precio del producto en euros (&euro;)" 
																	data-validation-required-message="Por favor, introduzca el precio del producto."
																	min="0.00" step="0.01" value="' . $productDto->getPrice() . '" />' . "\n";
?>
														</div>
														<div class="form-group">
															<span><span class="mandatory">*</span> Existencias:</span> 
<?php 
    // Stock
															echo '<input class="form-control" type="number" name="stock"
																id="stock" placeholder="Existencias *" required="required" title="Existencias del producto"
																data-validation-required-message="Por favor, introduzca las existencias del producto."
																min="0" step="1" value="' . $productDto->getStock() . '" />' . "\n";
?>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<span><span class="mandatory">*</span> Categor&iacute;a:</span> 
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
																	if ($productDto->getCategory()->getId() == $categoryDtoAux->getId()) {
																		echo '<option value="' . $categoryDtoAux->getId() . '" selected="selected">' . $categoryDtoAux->getName() . '</option> ' . "\n";
																		echo '<script type="text/javascript">;</script>';
																	} else {
																		echo '<option value="' . $categoryDtoAux->getId() . '">' . $categoryDtoAux->getName() . '</option> ' . "\n";
																	}
																}
?>
															</select>
														</div>
														<div class="form-group">
															<span><span class="mandatory">*</span> A&ntilde;o:</span> 
<?php 
	// Año de fabricación
															$dateAux = new \DateTime();
															$productDateAux = new \DateTime($productDto->getProductDate());
															echo '<input class="form-control" type="number" name="year"
																	id="year" placeholder="A&ntilde;o de fabricaci&oacute;n *" title="A&ntilde;o de fabricaci&oacute;n del producto"
																	required="required" min="1900" max="' . $dateAux->format("Y") . '" step="1"
																	data-validation-required-message="Por favor, introduzca el a&ntilde;o de fabricaci&oacute;n."
																 	value="' . $productDateAux->format("Y") . '" />' . "\n";
?>
														</div>
														<div class="form-group">
															<span>Colores:</span> <div id="selectedColor"></div>
															<select name="colors" class="form-control" id="colors" size="13" multiple onchange="selectedColor(value);">
<?php 
	// Listado de Colores	
																for ($i = 0; $i < $colorList->count(); $i++) {
																	$colorDtoAux = new ColorDto();
																	$colorDtoAux = $colorList->offsetGet($i);
																	if (null != $productDto->getColors()) {
																		$colorSelected = false;
																		for ($j = 0; $j < $productDto->getColors()->count() && !$colorSelected; $j++) {
																			$productColorDtoAux = new ProductColorDto();
																			$productColorDtoAux = $productDto->getColors()->offsetGet($j);
																			if ($productColorDtoAux->getColor()->getId() == $colorDtoAux->getId()) {
																				$colorSelected = true;
																			}
																		}
																		if ($colorSelected) {
																			echo '<option selected="selected" value="' . $colorDtoAux->getId() . '">' . $colorDtoAux->getName() . '</option> ' . "\n";
																			echo '<script type="text/javascript">selectedColor(' . $colorDtoAux->getId() . ');</script>'; // Para que aparezcan los colores
																		} else {
																			echo '<option value="' . $colorDtoAux->getId() . '">' . $colorDtoAux->getName() . '</option> ' . "\n";
																		}
																	} else {
																		echo '<option value="' . $colorDtoAux->getId() . '">' . $colorDtoAux->getName() . '</option> ' . "\n";
																	}
																}
?>
															</select>
														</div>
														<!-- div class="form-group">
															<span>&iquest;Alquiler?</span-->
															<input type="hidden" name="rent" id="rent" value="false" />
														<!-- /div-->
														<div class="form-group">
															<span>Observaciones:</span> 
<?php 
    // Observaciones del producto
															echo '<textarea class="form-control" name="observations"
																	id="observations" placeholder="Observaciones" title="Observaciones del producto"
																	data-validation-required-message="Por favor, introduzca observaciones.">'
																	 . $productDto->getObservations() . 
																'</textarea>' . "\n";
?>
														</div>
														<div class="form-group">
															<span>&iquest;Mostrar en web?</span>
<?php
    // Producto activo/inactivo
															if ($productDto->getActive() || 1 == $productDto->getActive()) {
																echo '<input type="checkbox" name="active" id="active" checked="checked" title="El producto se muestra en la web" />' . "\n";
															} else {
																echo '<input type="checkbox" name="active" id="active"  title="El producto no se muestra en la web" />' . "\n";
															}
?>
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
															<span>Tipo de bicicleta:</span> 
															<select name="bikeKind" class="form-control" id="bikeKind" title="Tipo de bicicleta">
																<option value="none">Seleccionar tipo...</option>
<?php 
	// Listado de Tipos de bicicleta
																for ($i = 0; $i < $bikeTypeList->count(); $i++) {
																	$bikeTypeDtoAux = new BikeTypeDto();
																	$bikeTypeDtoAux = $bikeTypeList->offsetGet($i);
																	if (null != $productDto->getDetails() && SUB_BIKE == $productDto->getCategory()->getId()
																	    && BIKE == $productDto->getSubcategory()->getId() && null != $productDto->getDetails()->getType() 
																	    && $bikeTypeDtoAux->getId() == $productDto->getDetails()->getType()->getId()) {
																	    $bikeAux = $productDto->getDetails();
    																	echo '<option value="' . $bikeTypeDtoAux->getId() . '" selected="selected">' . $bikeTypeDtoAux->getName() . '</option> ' . "\n";
																    } else {
																        echo '<option value="' . $bikeTypeDtoAux->getId() . '">' . $bikeTypeDtoAux->getName() . '</option> ' . "\n";
																    }
																}
?>
															</select>
														</div>
														<div class="form-group">
															<span>Cuadro:</span>
<?php 
    // Cuadro
                                                            if (null != $bikeAux) {
                                                                echo '<input class="form-control" type="text" name="bikeFrame" title="Cuadro de la bicicleta"
																    id="bikeFrame" placeholder="Cuadro" value="' . $bikeAux->getFrame() . '" />';
                                                            } else {
                                                                echo '<input class="form-control" type="text" name="bikeFrame" id="bikeFrame" placeholder="Cuadro" title="Cuadro de la bicicleta />';
                                                            }
?>
														</div>
														<div class="form-group">
															<span>Manillar:</span>
<?php 
    // Manillar
                                                            if (null != $bikeAux) {
                                                                echo '<input class="form-control" type="text" name="bikeHandlebars" id="bikeHandlebars" title="Manillar de la bicicleta"
																    placeholder="Manillar" value="' . $bikeAux->getHandlebars() . '" />';
                                                            } else {
                                                                echo '<input class="form-control" type="text" name="bikeHandlebars" id="bikeHandlebars" placeholder="Manillar" title="Manillar de la bicicleta" />';
                                                            }
?>
														</div>
														<div class="form-group">
															<span>Sill&iacute;n:</span>
<?php 
    // Sillín
                                                            if (null != $bikeAux) {
                                                                echo '<input class="form-control" type="text" name="bikeSeat" title="Sill&iacute;n de la bicicleta"
																    id="bikeSeat" placeholder="Sill&iacute;n" value="' . $bikeAux->getSeat() . '" />';
                                                            } else {
                                                                echo '<input class="form-control" type="text" name="bikeSeat" id="bikeSeat" placeholder="Sill&iacute;n" title="Sill&iacute;n de la bicicleta" />';
                                                            }
?>
														</div>
														<div class="form-group">
															<span>Cambio:</span>
<?php 
    // Cambio
                                                            if (null != $bikeAux) {
                                                                echo '<input class="form-control" type="text" name="bikeShift" title="Cambio" title="Cambio de la bicicleta"
																    id="bikeShift" placeholder="Cambio" value="' . $bikeAux->getShift() . '" />';
                                                            } else {
                                                                echo '<input class="form-control" type="text" name="bikeShift" id="bikeShift" placeholder="Cambio" title="Cambio de la bicicleta" />';
                                                            }
?>
														</div>
														<div class="form-group">
															<span>Desviador:</span>
<?php 
    // Desviador
                                                            if (null != $bikeAux) {
                                                                echo '<input class="form-control" type="text" name="bikeDerailleur" id="bikeDerailleur"
																    placeholder="Desviador" title="Desviador de la bicicleta" value="' . $bikeAux->getDerailleur() . '" />';
                                                            } else {
                                                                echo '<input class="form-control" type="text" name="bikeDerailleur" id="bikeDerailleur" placeholder="Desviador" title="Desviador de la bicicleta" />';
                                                            }
?>
														</div>
														<div class="form-group">
															<span>Mando:</span>
<?php 
    // Mando
                                                            if (null != $bikeAux) {
                                                                echo '<input class="form-control" type="text" name="bikeTwistShifters"
																    id="bikeTwistShifters" title="Mando de la bicicleta" placeholder="Mando" value="' . $bikeAux->getTwistShifters() . '" />';
                                                            } else {
                                                                echo '<input class="form-control" type="text" name="bikeTwistShifters" id="bikeTwistShifters" title="Mando" placeholder="Mando de la bicicleta" />';
                                                            }
?>
														</div>
														<div class="form-group">
															<span>Grupo:</span>
<?php 
    // Grupo
                                                            if (null != $bikeAux) {
                                                                echo '<input class="form-control" type="text" name="bikeSpeedGroupset"
																    id="bikeSpeedGroupset" placeholder="Grupo" title="Grupo de la bicicleta" value="'. $bikeAux->getSpeedGroupset() .'" />';
                                                            } else {
                                                                echo '<input class="form-control" type="text" name="bikeSpeedGroupset" id="bikeSpeedGroupset" placeholder="Grupo" title="Grupo de la bicicleta" />';
                                                            }
?>
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
															<span>Horquilla:</span>
<?php 
    // Horquilla
                                                            if (null != $bikeAux) {
                                                                echo '<input class="form-control" type="text" name="bikeFork" title="Horquilla de la bicicleta"
																    id="bikeFork" placeholder="Horquilla" value="' . $bikeAux->getFork() . '" />';
                                                            } else {
                                                                echo '<input class="form-control" type="text" name="bikeFork" id="bikeFork" placeholder="Horquilla" title="Horquilla de la bicicleta" />';
                                                            }
?>
														</div>
														<div class="form-group">
															<span>Pedales:</span>
<?php 
    // Pedales
                                                            if (null != $bikeAux) {
                                                                echo '<input class="form-control" type="text" name="bikePedals" title="Pedales de la bicicleta"
																    id="bikePedals" placeholder="Pedales" value="' . $bikeAux->getPedals() . '" />';
                                                            } else {
                                                                echo '<input class="form-control" type="text" name="bikePedals" title="Pedales de la bicicleta" id="bikePedals" placeholder="Pedales" />';
                                                            }
?>
														</div>
														<div class="form-group">
															<span>Bielas:</span>
<?php 
    // Bielas
                                                            if (null != $bikeAux) {
                                                                echo '<input class="form-control" type="text" name="bikeCranks" id="bikeCranks" 
                                                                    placeholder="Bielas" title="Bielas de la bicicleta" value="' . $bikeAux->getCranks() . '" />';
                                                            } else {
                                                                echo '<input class="form-control" type="text" name="bikeCranks" id="bikeCranks" placeholder="Bielas" title="Bielas de la bicicleta" />';
                                                            }
?>
														</div>
														<div class="form-group">
															<span>Cassette:</span>
<?php 
    // Cassette
                                                            if (null != $bikeAux) {
                                                                echo '<input class="form-control" type="text" name="bikeCassette" id="bikeCassette"
																    placeholder="Cassette" title="Cassette de la bicicleta" value="' . $bikeAux->getCassette() . '" />';
                                                            } else {
                                                                echo '<input class="form-control" type="text" name="bikeCassette" id="bikeCassette" placeholder="Cassette" title="Cassette de la bicicleta" />';
                                                            }
?>
														</div>
														<div class="form-group">
															<span>Llantas:</span>
<?php 
    // Llantas
                                                            if (null != $bikeAux) {
                                                                echo '<input class="form-control" type="text" name="bikeWheels" title="Llantas de la bicicleta"
																    id="bikeWheels" placeholder="Llantas" value="' . $bikeAux->getWheels() . '" />';
                                                            } else {
                                                                echo '<input class="form-control" type="text" name="bikeWheels" title="Llantas de la bicicleta" id="bikeWheels" placeholder="Llantas" />';
                                                            }
?>
														</div>
														<div class="form-group">
															<span>Cubiertas:</span>
<?php 
    // Cubiertas
                                                            if (null != $bikeAux) {
                                                                echo '<input class="form-control" type="text" name="bikeTyres" title="Cubiertas de la bicicleta"
																    id="bikeTyres" placeholder="Cubiertas" value="' . $bikeAux->getTyres() . '" />';
                                                            } else {
                                                                echo '<input class="form-control" type="text" name="bikeTyres" title="Cubiertas de la bicicleta" id="bikeTyres" placeholder="Cubiertas" />';
                                                            }
?>
														</div>
														<div class="form-group">
														<span>Peso (kg.):</span>
<?php 
    // Peso
                                                        if (null != $bikeAux) {
                                                            echo '<input class="form-control" type="number" name="bikeWeight" id="bikeWeight" title="Peso de la bicicleta en kilos"
																placeholder="Peso (kg.)" min="0.00" step="0.01" value="' . $bikeAux->getWeight() . '" />';
                                                        } else {
															echo '<input class="form-control" type="number" name="bikeWeight" id="bikeWeight" title="Peso de la bicicleta en kilos"
																placeholder="Peso (kg.)" min="0.00" step="0.01" />';
                                                        }
?>
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
																	if (null != $productDto->getDetails() && SUB_MOTO == $productDto->getCategory()->getId() 
																			&& MOTO == $productDto->getSubcategory()->getId() && null != $productDto->getDetails()->getType() 
																			&& $motoTypeDtoAux->getId() == $productDto->getDetails()->getType()->getId()) { // TODO JPD
                                                                        $motoAux = $productDto->getDetails();
																		echo '<option value="' . $motoTypeDtoAux->getId() . '" selected="selected">' . $motoTypeDtoAux->getName() . '</option> ' . "\n";
																	} else {
																		echo '<option value="' . $motoTypeDtoAux->getId() . '">' . $motoTypeDtoAux->getName() . '</option> ' . "\n";
																	}
																}
?>
															</select>
														</div>
														<div class="form-group">
															<span>Cilindrada (cc&sup3;):</span>
<?php
    // Cilindrada
                                                            if (null != $motoAux) {
                                                                echo '<input class="form-control" type="number" name="motoCubic" id="motoCubic" placeholder="Cilindrada (cc&sup3;)" 
                                                                    title="Cilindrada (cc&sup3;) de la motocicleta" min="0" step="10" value="' . $motoAux->getCylinderCapacity() . '" />';
                                                            } else {
                                                                echo '<input class="form-control" type="number" name="motoCubic"
																    id="motoCubic" placeholder="Cilindrada (cc&sup3;)" title="Cilindrada (cc&sup3;) de la motocicleta" min="0" step="10" />';
                                                            }
?>
														</div>
														<div class="form-group">
															<span>N&ordm; cilindros:</span>
<?php
    // Nº de cilindros
                                                            if (null != $motoAux) {
    															echo '<input class="form-control" type="number" name="motoCylinder" id="motoCylinder" placeholder="N&ordm; cilindros" 
    																title="N&ordm; cilindros de la motocicleta" value="' . $motoAux->getCylinders() . '" min="0" step="1" />';
                                                            } else {
                                                                echo '<input class="form-control" type="number" name="motoCylinder" id="motoCylinder"
    																placeholder="N&ordm; cilindros" title="N&ordm; cilindros de la motocicleta" min="0" step="1" />';
                                                            }
?>
														</div>
														<div class="form-group">
															<span>Potencia (cv):</span>
<?php 
    // Potencia
                                                            if (null != $motoAux) {
                                                                echo '<input class="form-control" type="number" name="motoPower" id="motoPower" placeholder="Potencia (cv)" 
                                                                    value="' . $motoAux->getPower() . '" title="Potencia (cv) de la motocicleta" min="0.0" step="0.1" />';
                                                            } else {
                                                                echo '<input class="form-control" type="number" name="motoPower" id="motoPower" 
                                                                    placeholder="Potencia (cv)" title="Potencia (cv) de la motocicleta" min="0.0" step="0.1" />';
                                                            }
?>
														</div>
														<div class="form-group">
															<span>Marchas / Velocidades:</span>
<?php 
    // Marchas / Velocidades
                                                            if (null != $motoAux) {
                                                                echo '<input class="form-control" type="number" name="motoGears" id="motoGears" placeholder="Velocidades" 
                                                                    value="' . $motoAux->getGears() . '" title="Velocidades/Marchas de la motocicleta" min="1" max="10" step="1" />';
                                                            } else {
                                                                echo '<input class="form-control" type="number" name="motoGears"
    																id="motoGears" placeholder="Velocidades" title="Velocidades/Marchas de la motocicleta" min="1" max="10" step="1" />';
                                                            }
?>
														</div>
														<div class="form-group">
															<span>Freno delantero:</span>
<?php 
    // Freno delantero
                                                            if (null != $motoAux) {
                                                                echo '<input class="form-control" type="text" name="motoFrontBrake" id="motoFrontBrake" placeholder="Freno delantero (1 disco, 2 discos, tambor...)" 
                                                                    title="Freno delantero de la motocicleta" value="' . $motoAux->getFrontBrake() . '" />';
                                                            } else {
                                                                echo '<input class="form-control" type="text" name="motoFrontBrake" id="motoFrontBrake"
																    placeholder="Freno delantero (1 disco, 2 discos, tambor...)" title="Freno delantero de la motocicleta" />';
                                                            }
?>
														</div>
														<div class="form-group">
															<span>Freno trasero:</span>
<?php 
    // Freno trasero
                                                            if (null != $motoAux) {
    															echo '<input class="form-control" type="text" name="motoRearBrake" id="motoRearBrake"
    																placeholder="Freno trasero (1 disco, tambor...)" title="Freno trasero de la motocicleta" value="' . $motoAux->getRearBrake() . '" />';
                                                            } else {
                                                                echo '<input class="form-control" type="text" name="motoRearBrake" id="motoRearBrake"
    																placeholder="Freno trasero (1 disco, tambor...)" title="Freno trasero de la motocicleta" />';
                                                            }
?>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<span>Carnet:</span> 
															<select name="motoLicense" class="form-control" id="motoLicense" title="Carnet de moto m&iacute;nimo">
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
															<span>Plazas homologadas:</span>
<?php
    // Plazas homologadas
                                                            if (null != $motoAux) {
                                                                echo '<input class="form-control" type="number" name="motoPlaces" id="motoPlaces" value="' . $motoAux->getPlaces() . '"
																    placeholder="Plazas homologadas de la motocicleta" min="1" max="3" step="1" />';
                                                            } else {
                                                                echo '<input class="form-control" type="number" name="motoPlaces" id="motoPlaces"
																    placeholder="Plazas homologadas de la motocicleta" min="1" max="3" step="1" />';
                                                            }
?>
														</div>
														<div class="form-group">
															<span>Combustible:</span> 
															<select class="form-control" name="motoFuel" id="motoFuel" title="Combustible de la motocicleta">
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
															<span>Distintivo anticontaminaci&oacute;n:</span> 
															<select class="form-control" name="motoContamination" id="motoContamination" title="Distintivo anticontaminaci&oacute;n de la motocicleta">
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
															<span>Transmisi&oacute;n:</span> 
																<select class="form-control" name="motoTransmission" id="motoTransmission" title="Transmisi&oacute;n de la motocicleta">
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
															<span>Kil&oacute;metros:</span>
<?php 
    // Kilómetros
                                                            if (null != $motoAux) {
                                                                echo '<input class="form-control" type="number" name="motoKilometers" id="motoKilometers"
																    placeholder="Kil&oacute;metros" title="Kil&oacute;metros de la motocicleta" min="0" step="1" value="' . $motoAux->getKilometers() . '" />';
                                                            } else {
                                                                echo '<input class="form-control" type="number" name="motoKilometers" id="motoKilometers" 
                                                                    placeholder="Kil&oacute;metros" title="Kil&oacute;metros" min="0" step="1" />';
                                                            }
?>
														</div>
														<div class="form-group">
															<span>&iquest;Segunda mano?</span> 
<?php 
    // ¿Segunda mano?
                                                            if (null != $motoAux && null != $motoAux->getSecondHand() && 1 == $motoAux->getSecondHand()) {
                                                                echo '<input type="checkbox" name="motoSecondHand" id="motoSecondHand" title="Indica si la motocicleta es de segunda mano" checked />';
                                                            } else {
                                                                echo '<input type="checkbox" name="motoSecondHand" id="motoSecondHand" title="Indica si la motocicleta es de segunda mano" />';
                                                            }
?>
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
														<br /> <a href='./listProducts.php' class="noDecoration">
															<button id="cancelProductButton"
																class="btn btn-primary btn-xl text-uppercase"
																title="Cancelar el alta de producto y volver al men&uacute; de Administrador">Cancelar</button>
														</a>
														<button id="modifyProductButton"
															class="btn btn-primary btn-xl text-uppercase" name="modifyProductButton"
															type="submit">Modificar producto</button>
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
