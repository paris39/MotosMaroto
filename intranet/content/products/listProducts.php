<?php

namespace intranet\content\products;

/* Establecer la codificación de caracteres interna a UTF-8 */
mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');

// Carga de combos
$root = realpath($_SERVER["DOCUMENT_ROOT"]) . "\MotosMaroto";
require $root . '\php\controller\InitController.php';

use php\controller\InitController;
use php\form\ProductForm;
use php\model\AccesoryDto;
use php\model\AccesoryTypeDto;
use php\model\BikeTypeDto;
use php\model\CategoryDto;
use php\model\EquipmentDto;
use php\model\EquipmentTypeDto;
use php\model\MotoTypeDto;
use php\model\OtherTypeDto;
use php\model\ProductDto;

error_log("Inicializado listProducts");
session_start();

// Comprobar Login
if (null != $_SESSION && null != $_SESSION['user'] && "" != $_SESSION['user']) { // Usuario logueado en el sistema
	/**
	 * Carga de datos de combos
	 */
	$initController = new InitController();
	$accesoryTypeList = new \ArrayObject();
	$accesoryTypeList = $initController->listAccesoryType(); // Listar tipos de equipaciones
	$bikeTypeList = new \ArrayObject();
	$bikeTypeList = $initController->listBikeType(); // Listar tipos de bicicleta
	$categoryList = new \ArrayObject();
	$categoryList = $initController->listCategories(); // Listar categorías de producto
	$equipmentTypeList = new \ArrayObject();
	$equipmentTypeList = $initController->listEquipmentType(); // Listar tipos de equipaciones
	$motoTypeList = new \ArrayObject();
	$motoTypeList = $initController->listMotoType(); // Listar tipos de motocicleta
	$otherTypeList = new \ArrayObject();
	$otherTypeList = $initController->listOtherType(); // Listar tipos de otros
	//	$productList = new \ArrayObject();
	//	$productList = $initController->listProduct("", new ProductForm()); // Listar productos
	$subcategoryList = new \ArrayObject();
	$subcategoryList = $initController->listSubcategories(); // Listar subcategorías de producto
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
		<title>INTRANET - Nuevo Producto - Bicicletas y Motos Maroto</title>
		<link rel='icon' type='image/x-icon' href='../../../img/mm_logo.ico' />
		<script src='../../content/js/jquery-3.4.1.min.js' type='text/javascript'></script>
		<script src='../../content/js/intranet.js' type='text/javascript'></script>

		<!-- Bootstrap core CSS -->
		<link href="../../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

		<!-- Custom fonts for this template -->
		<link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" />
		<link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" />
		<link href="../../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" />

		<!-- Custom styles for this template -->
		<link rel='STYLESHEET' type='text/css' href='../../../css/resume.min.css' />

		<!-- Custom scripts for this template -->
		<script src="../../../js/resume.min.js"></script>
		<script src='../../content/js/intranet.js' type='text/javascript'></script>
	</head>
	<body class="noMargin" style="padding-top: 0px;" id="page-top" onload="findProductByFilters(); openTab(event, 'listProductsTab');" >
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

					<h2 class="mb-5">Listado de productos</h2>

					<div class="resume-item d-flex flex-column flex-md-row mb-5">
						<div class="resume-content">
							<div class="tabcontainer">
								<div id="listProductsTab" class="tabcontent">
									<div id="categoryFilter" class="categoriesFilter">
										<span id="bikeFilterTitle" class="filterTitle">Filtros de b&uacute;squeda:</span>
										<div class="row">
											<div class="col-lg-12">
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<input type="search" class="form-control short" id="txId"
																name="id" placeholder="ID" onkeyup="findProductByFilters();" />
														</div>
														<div class="form-group">
															<input type="search" class="form-control" id="txName"
																name="name" placeholder="Nombre" onkeyup="findProductByFilters();" />
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<div class="form-group noBlock">
																<!-- span>Categor&iacute;a:</span-->
																<select name="productCategory"
																	class="form-control short noBlock" id="cbProductCategory" title="Categor&iacute;a"
																	onChange="showSubtypeSubCategory(this); findProductByFilters();">
																	<option value="none">Seleccionar categor&iacute;a...</option>
<?php
	// Listado de Categorías
	for ($i = 0; $i < $categoryList->count(); $i ++) {
		$categoryDtoAux = new CategoryDto();
		$categoryDtoAux = $categoryList->offsetGet($i);
		echo '<option value="' . $categoryDtoAux->getId() . '">' . $categoryDtoAux->getName() . '</option> ' . "\n";
	}
?>
																</select>
															</div>
															<!-- SUBCATEGORÍAS -->
															<div class="form-group subtypeCategory exampleSubTypeInline" id="exampleSubType">
																<select class="form-control short noBlock" name="exampleSubType" id="cbExampleSubType"
																	title="Subtipo de equipaci&oacute;n">
																	<option value="none">Seleccionar subtipo...</option>
																</select>
															</div>
															<div class="form-group subtypeCategory noBlock" id="bikeSubType">
																<select name="bikeSubType" class="form-control short noBlock" id="cbBikeSubType"
																	title="Tipo de bicicleta" onchange="findProductByFilters();">
																	<option value="none">Seleccionar tipo...</option>
<?php
	// Listado de tipos de bicicletas
	for ($i = 0; $i < $bikeTypeList->count(); $i ++) {
		$bikeTypeDtoAux = new BikeTypeDto();
		$bikeTypeDtoAux = $bikeTypeList->offsetGet($i);
		echo '<option value="' . $bikeTypeDtoAux->getId() . '">' . $bikeTypeDtoAux->getName() . '</option> ' . "\n";
	}
?>
																</select>
															</div>
															<div class="form-group subtypeCategory noBlock" id="motoSubType">
																<select name="motoSubType" class="form-control short noBlock" id="cbMotoSubType"
																	title="Tipo de moto" onchange="findProductByFilters();">
																	<option value="none">Seleccionar tipo...</option>
<?php
	// Listado de tipos de motocicletas
	for ($i = 0; $i < $motoTypeList->count(); $i ++) {
		$motoTypeDtoAux = new BikeTypeDto();
		$motoTypeDtoAux = $motoTypeList->offsetGet($i);
		echo '<option value="' . $motoTypeDtoAux->getId() . '">' . $motoTypeDtoAux->getName() . '</option> ' . "\n";
	}
?>
																</select>
															</div>
															<div class="form-group subtypeCategory noBlock" id="otherSubType" onchange="findProductByFilters();">
																<select name="otherSubType" class="form-control short noBlock" id="cbOtherSubType"
																	title="Tipo de Otros">
																	<option value="none">Seleccionar tipo...</option>
<?php
	// Listado de tipos de otros
	for ($i = 0; $i < $otherTypeList->count(); $i ++) {
		$otherTypeDtoAux = new OtherTypeDto();
		$otherTypeDtoAux = $otherTypeList->offsetGet($i);
		echo '<option value="' . $otherTypeDtoAux->getId() . '">' . $otherTypeDtoAux->getName() . '</option> ' . "\n";
	}
?>
																</select>
															</div>
															<!-- FIN SUBCATEGORÍAS -->

															<div class="form-group subtypeCategory noBlock" id="accesorySubType" onchange="findProductByFilters();">
																<select class="form-control short noBlock" name="accesorySubType" id="cbAccesorySubType"
																	title="Subtipo de accesorio">
																	<option value="none">Seleccionar subtipo...</option>
<?php
	// Listado de tipos de accesorios
	$categoryActive = null;
	for ($i = 0; $i < $accesoryTypeList->count(); $i ++) {
		$accesoryTypeDtoAux = new AccesoryTypeDto();
		$accesoryTypeDtoAux = $accesoryTypeList->offsetGet($i);
		if (null == $categoryActive) {
			$categoryActive = $accesoryTypeDtoAux->getCategory()->getName();
			echo '<optgroup label="' . $categoryActive . '">' . "\n";
		} else if (strcasecmp($categoryActive, $accesoryTypeDtoAux->getCategory()->getName()) != 0) {
			$categoryActive = $accesoryTypeDtoAux->getCategory()->getName();
			echo '</optgroup>' . "\n";
			echo '<optgroup label="' . $categoryActive . '">' . "\n";
		}

		echo '<option value="' . $accesoryTypeDtoAux->getId() . '">' . $accesoryTypeDtoAux->getName() . '</option> ' . "\n";
		if ($accesoryTypeList->count() == $i + 1) { // Si es el último registro se cierra el grupo
			echo '</optgroup>' . "\n";
		}
	}
?>
																</select>
															</div>

															<div class="form-group subtypeCategory noBlock" id="equipmentSubType">
																<select class="form-control short noBlock" name="equipmentSubType" id="cbEquipmentSubType"
																	title="Subtipo de equipaci&oacute;n" onchange="findProductByFilters();">
																	<option value="none">Seleccionar subtipo...</option>
<?php
	// Listado de tipos de equipación
	$categoryActive = null;
	for ($i = 0; $i < $equipmentTypeList->count(); $i ++) {
		$equipmentTypeDtoAux = new EquipmentTypeDto();
		$equipmentTypeDtoAux = $equipmentTypeList->offsetGet($i);
		if (null == $categoryActive) {
			$categoryActive = $equipmentTypeDtoAux->getCategory()->getName();
			echo '<optgroup label="' . $categoryActive . '">' . "\n";
		} else if (strcasecmp($categoryActive, $equipmentTypeDtoAux->getCategory()->getName()) != 0) {
			$categoryActive = $equipmentTypeDtoAux->getCategory()->getName();
			echo '</optgroup>' . "\n";
			echo '<optgroup label="' . $categoryActive . '">' . "\n";
		}

		echo '<option value="' . $equipmentTypeDtoAux->getId() . '">' . $equipmentTypeDtoAux->getName() . '</option> ' . "\n";
		if ($equipmentTypeList->count() == $i + 1) { // Si es el último registro se cierra el grupo
			echo '</optgroup>' . "\n";
		}
	}
?>
																</select>
															</div>


														</div>

														<div class="form-group">
															<div class="form-group noBlock">
																<input type="search" class="form-control short noBlock" id="txMark"
																	name="mark" placeholder="Marca" onkeyup="findProductByFilters();" />
															</div>
															<div class="form-group noBlock">
																<span style="color: black;">S&oacute;lo productos activos: </span> <input type="checkbox" name="active" id="chbActive" checked="checked" onchange="findProductByFilters();" />
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div id="jQueryResults">
									</div>

									<div class="col-lg-12 text-center">
										<div class="form-group">
											<a href='../admin.php' class="noDecoration">
												<button id="returnButton"
													class="btn btn-primary btn-xl text-uppercase"
													title="Volver al men&uacute; de Administrador">Volver</button>
											</a>
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
<?php
} else {
	// Usuario no loguado en el sistema. Redirigir a la página de login
	header('Location: ../../login.php'); // Redirige al index
}
?>