<?php

	/* Establecer la codificación de caracteres interna a UTF-8 */
	mb_internal_encoding('UTF-8');
	mb_http_output('UTF-8');

	// Carga de combos
	$root = realpath($_SERVER["DOCUMENT_ROOT"]) . "/MotosMaroto";
	require $root . '/php/controller/InitController.php';

	use php\controller\InitController;
	use php\model\AccesoryDto;
	use php\model\AccesoryTypeDto;
	use php\model\CategoryDto;
	use php\model\EquipmentDto;
	use php\model\EquipmentTypeDto;
	use php\model\ImageDto;
	use php\model\ProductDto;
	use php\model\ProductImageDto;
	
	error_log("Inicializado index");
	session_start();
	
	$initController = new InitController();
	$categoryList = new \ArrayObject();
	$categoryList = $initController->listCategories(); // Listar categorías de producto
	$subcategoryList = new \ArrayObject();
	$subcategoryList = $initController->listSubcategories(); // Listar subcategorías de producto
	$bikeTypeList = new \ArrayObject();
	$bikeTypeList = $initController->listBikeType(); // Listar tipos de bicicleta
	
	/*
	$accesoryTypeList = new \ArrayObject();
	$accesoryTypeList = $initController->listAccesoryType(); // Listar tipos de equipaciones
	$equipmentTypeList = new \ArrayObject();
	$equipmentTypeList = $initController->listEquipmentType(); // Listar tipos de equipaciones
	$motoTypeList = new \ArrayObject();
	$motoTypeList = $initController->listMotoType(); // Listar tipos de motocicleta
	$otherTypeList = new \ArrayObject();
	$otherTypeList = $initController->listOtherType(); // Listar tipos de otros
	*/
	//	$productList = new \ArrayObject();
	//	$productList = $initController->listProduct("", new ProductForm()); // Listar productos

?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<meta name="description" content="" />
		<meta name="author" content="" />
		
		<title>Bicicletas y Motos Maroto</title>
		
		<!-- Bootstrap core CSS -->
		<link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
		
		<!-- Custom fonts for this template -->
		<link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" />
		<link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" />
		<link href="./vendor/fontawesome-free/css/all.min.css" rel="stylesheet" />
		
		<!-- Custom styles for this template -->
		<link href="./css/resume.min.css" rel="stylesheet" />
		<link rel='icon' type='image/x-icon' href='./img/mm_logo.ico' />
	
		<script type="text/javascript">
			function getCookie (c_name) {
				var c_value = document.cookie;
				var c_start = c_value.indexOf(" " + c_name + "=");
				if (c_start == -1) {
					c_start = c_value.indexOf(c_name + "=");
				}
				if (c_start == -1) {
					c_value = null;
				} else {
					c_start = c_value.indexOf("=", c_start) + 1;
					var c_end = c_value.indexOf(";", c_start);
					if (c_end == -1) {
						c_end = c_value.length;
					}
					c_value = unescape(c_value.substring(c_start, c_end));
				}
				return c_value;
			}
			 
			function setCookie (c_name, value, exdays) {
				var exdate = new Date();
				exdate.setDate(exdate.getDate() + exdays);
				var c_value = escape(value) + ((exdays == null) ? "" : "; expires=" + exdate.toUTCString());
				document.cookie=c_name + "=" + c_value;
			}
			 
			if (getCookie('cookiesaviso') != "1") {
				document.getElementById("barraaceptacion").style.display = "block";
			}
			
			function PonerCookie () {
				setCookie('cookiesaviso', '1', 365);
				document.getElementById("barraaceptacion").style.display = "none";
			}
			
			function formValidate () {
				if (document.getElementById("politics").checked) {
					document.getElementById("sendMessageButton").disabled = false;
				} else {
					document.getElementById("sendMessageButton").disabled = true;
				}
			}
		</script>
	</head>
	
	<body id="page-top" onload="openTab(event, 'bikesTab');">
		<!--//BLOQUE COOKIES-->
		<div id="barraaceptacion" style="display: block;">
			<div class="inner">
				Solicitamos su permiso para estad&iacute;sticas de navegaci&oacute;n en esta web, en cumplimiento del RDL 13/2012. 
				Si contin&uacute;a navegando consideramos que acepta el uso de cookies.
				<a href="javascript:void(0);" class="ok" onclick="PonerCookie();"><b>OK</b></a>
				| <a href="./content/politicaCookies.php" target="_blank" class="info">M&aacute;s informaci&oacute;n</a>
			</div>
		</div>
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
			<a class="navbar-brand js-scroll-trigger" href="#page-top"> 
				<span class="d-block d-lg-none">Maroto Bikes</span> 
				<span class="d-none d-lg-block"> 
					<img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="./img/mm_logo.jpg" alt="" />
				</span>
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" 
				aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link js-scroll-trigger" href="#about">La empresa</a>
					</li>
					<li class="nav-item">
						<a class="nav-link js-scroll-trigger" href="#catalogue">Cat&aacute;logo</a>
					</li>
					<li class="nav-item">
						<a class="nav-link js-scroll-trigger" href="#contact">Contacto</a>
					</li>
					<li class="nav-item">
						<a class="nav-link js-scroll-trigger" href="./content/politicaCookies.php" target="_blank">Pol&iacute;tica de Cookies</a>
					</li>
					<li class="nav-item">
						<a class="nav-link js-scroll-trigger" href="./content/avisoLegal.php" target="_blank">Aviso Legal</a>
					</li>
				</ul>
			</div>
		</nav>
	
		<div class="container-fluid p-0">
			<section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
				<div class="my-auto">
					<div id="mainTitle" class="mainTitle">
						<h1 class="mb-0">
							Maroto <span class="text-primary">Bikes</span>
						</h1>
					</div>
					<div class="subheading mb-5">
						<p>
							<span class="place">&iquest;D&oacute;nde estamos?</span>
						</p>
						<p>
							<span>Calle Anastasio Oliva 5, La Puebla de Montalb&aacute;n, 45516 (Toledo)</span>
						</p>
						<iframe
							src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1287.562737310211!2d-4.363894685245855!3d39.86622855723823!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd6a7faf270034e9%3A0xb214a9f93012e54e!2sMotos+Maroto!5e0!3m2!1ses!2ses!4v1540805044919"></iframe>
						<br /> 925 74 57 59 <br /> 691 58 52 74 <br />
						<a href="mailto:name@email.com">info@marotobikes.com</a>
					</div>
					<p class="lead mb-5">Maroto Bikes somos una empresa ubicada en La Puebla de Montalb&aacute;n con mucha experiencia en el
						&aacute;mbito de las dos ruedas, ya sean motos o bicicletas. Vendemos todo tipo de bicicletas, asesorando en todos los detalles
						al comprador. De igual forma reparamos aver&iacute;as y realizamos todo el mantenimiento que pueda necesitar.</p>
					<div class="social-icons">
						<!--a href="#">
	    							<i class="fab fa-twitter"></i>
	     					</a> -->
						<a href="https://www.facebook.com/Bicicletas-y-motos-maroto-165970644022270" target="_blank"> <i class="fab fa-facebook-f"></i></a> 
						<a href="https://goo.gl/maps/iPEz2aDwiU9owoVZA" target="_blank"> <i class="fab fa-google"></i></a>
					</div>
				</div>
			</section>
	
			<hr class="m-0" />
	
			<section class="resume-section p-3 p-lg-5 d-flex flex-column" id="catalogue">
				<div class="my-auto">
					<h2 class="mb-5">Cat&aacute;logo</h2>
				</div>
				<div class="resume-item d-flex flex-column flex-md-row mb-5">
					<div class="resume-content">
						<div id="tab" class="tab"> <!-- Botones de las pestañas -->
<?php
	// Listado de Categorías
	for ($i = 0; $i < $subcategoryList->count(); $i ++) {
		$subcategoryDtoAux = new CategoryDto();
		$subcategoryDtoAux = $subcategoryList->offsetGet($i);
		if (strcasecmp(strtolower($subcategoryDtoAux->getOriginalName()), "others") == 0) { // Si es la categoría de Otros, le añadimos la palabra producto
			echo '				<button id="' . strtolower($subcategoryDtoAux->getOriginalName()) . 'TabButton" class="tablinks" onclick="openTab(event, \'' . strtolower($subcategoryDtoAux->getOriginalName()) . 'Tab\');">' . $subcategoryDtoAux->getName() . ' productos' . '</button> ' . "\n";
		} else {
			echo '				<button id="' . strtolower($subcategoryDtoAux->getOriginalName()) . 'TabButton" class="tablinks" onclick="openTab(event, \'' . strtolower($subcategoryDtoAux->getOriginalName()) . 'Tab\');">' . $subcategoryDtoAux->getName() . '</button> ' . "\n";
		}
	}
?>			
						</div>
	
						<div class="tabcontainer">
							<!-- Tab content -->
<?php
	// Listado de Categorías
	for ($i = 0; $i < $subcategoryList->count(); $i ++) {
		$subcategoryDtoAux = new CategoryDto();
		$subcategoryDtoAux = $subcategoryList->offsetGet($i);
		$listProduct = new \ArrayObject();
		$listProduct = $initController->getProductBySubcategory($subcategoryDtoAux->getId()); // Buscar productos por su subcategoría
		$productTypesList = new \ArrayObject();
		$productTypesList = $initController->getProductTypeBySubcategory($subcategoryDtoAux->getId());
		$productAccesoriesList = new EquipmentTypeDto();
		$productAccesoriesList = $initController->getAccesoriesBySubcategory($subcategoryDtoAux->getId());
		$productEquipmentsList = new EquipmentTypeDto();
		$productEquipmentsList = $initController->getEquipmentsBySubcategory($subcategoryDtoAux->getId());
		
		echo '				<!-- ' . strtoupper($subcategoryDtoAux->getName()) . ' -->'; // Comentario para que se vea en el código fuente
		echo '				<div id="' . strtolower($subcategoryDtoAux->getOriginalName()) . 'Tab" class="tabcontent">';
		echo '					<span id="close' . $subcategoryDtoAux->getOriginalName() . '" onclick="closeTab(event, this);" class="topright" title="Cerrar pesta&ntilde;a de ' . $subcategoryDtoAux->getName() . '">&times;</span>';
		echo '					<h3>' . $subcategoryDtoAux->getName() . '</h3>';
		echo '					<form>';
		echo '						<span class="resultsNumber">Total resultados: <span	class="blackResultsNumber">' . $listProduct->count() . '</span></span>';
		echo '						<div id="' . strtolower($subcategoryDtoAux->getOriginalName()) . 'Order" class="order">';
		echo '							<select id="' . strtolower($subcategoryDtoAux->getOriginalName()) . 'Select" class="form-control" title="Seleccionar orden de resultados"> ';
		echo '								<option value="ASC">Orden: Ascendente</option>';
		echo '								<option value="DESC">Orden: Descendente</option>';
		echo '							</select>';
		echo '						</div>';
		echo '						<div id="' . strtolower($subcategoryDtoAux->getOriginalName()) . 'Form" class="formDiv">';
		echo '							<div id="' . strtolower($subcategoryDtoAux->getOriginalName()) . 'Filter" class="categoriesFilter">';
		//echo '								<span id="minFilter' . $subcategoryDtoAux->getOriginalName() . '" class="topright" onclick="minFilter(event, \'' . strtolower($subcategoryDtoAux->getOriginalName()) . 'Filters \', \'maxFilter ' . $subcategoryDtoAux->getOriginalName() . '\', \'minFilter ' . $subcategoryDtoAux->getOriginalName() . '\');">-</span>';
		//echo '								<span id="minFilter' . $subcategoryDtoAux->getOriginalName() . '" class="topright" onclick="maxFilter(event, \'' . strtolower($subcategoryDtoAux->getOriginalName()) . 'Filters \', \'minFilter ' . $subcategoryDtoAux->getOriginalName() . '\', \'maxFilter ' . $subcategoryDtoAux->getOriginalName() . '\');">+</span>';
		echo '								<span id="' . strtolower($subcategoryDtoAux->getOriginalName()) . 'FilterTitle" class="filterTitle">Filtros de b&uacute;squeda:</span>';
		echo '								<div id="' . strtolower($subcategoryDtoAux->getOriginalName()) . 'Filters" class="categoriesFilters">';
		echo '									<span class="parentFilter"> <input id="' . strtolower($subcategoryDtoAux->getOriginalName()) . 'Filter1" type="checkbox" name="' . strtolower($subcategoryDtoAux->getOriginalName()) . '" onchange="markChildren(event, this, \'' . strtolower($subcategoryDtoAux->getOriginalName()) . '\');" />' . $subcategoryDtoAux->getName();		
		// Comprobar tipos de producto
		if (null != $productTypesList && 0 < $productTypesList->count()) {
			for ($j = 0; $j < $productTypesList->count(); $j ++) { // Listado de tipos de producto
				$productType = new CategoryDto();
				$productType = $productTypesList->offsetGet($j);
				echo '								<span class="childFilter"> <input id="' . strtolower($productType->getOriginalName()) . 'Filter1-' . ($j + 1) . '" type="checkbox" name="' . strtolower($productType->getOriginalName()) . '" />' . $productType->getName() . '</span>';
			}
		}
		echo '									</span>';
		echo '									<span class="parentFilter"> <input id="' . strtolower($subcategoryDtoAux->getOriginalName()) . 'Filter2" type="checkbox" name="' . strtolower($subcategoryDtoAux->getOriginalName()) . '" />Equipaci&oacute;n</span>';
		// Comprobar lista de equipamientos de la categoría del producto
		if (null != $productEquipmentsList && 0 < $productEquipmentsList->count()) {
			for ($j = 0; $j < $productEquipmentsList->count(); $j ++) { // Listado de equipamientos
				$equipmentType = new EquipmentTypeDto();
				$equipmentType = $productEquipmentsList->offsetGet($j);
				echo '								<span class="childFilter"> <input id="' . strtolower($productType->getOriginalName()) . 'Filter2-' . ($j + 1) . '" type="checkbox" name="' . strtolower($productType->getOriginalName()) . '" />' . $equipmentType->getName() . '</span>';
			}	
		}
		echo '									</span>';
		echo '									<span class="parentFilter"> <input id="' . strtolower($subcategoryDtoAux->getOriginalName()) . 'Filter3" type="checkbox" name="' . strtolower($subcategoryDtoAux->getOriginalName()) . '" />Accesorios</span>';
		// Comprobar lista de accesorios de la categoría del producto
		if (null != $productAccesoriesList && 0 < $productAccesoriesList->count()) {
			for ($j = 0; $j < $productAccesoriesList->count(); $j ++) { // Listado de accesorios
				$accesoryType = new AccesoryTypeDto();
				$accesoryType = $productAccesoriesList->offsetGet($j);
				echo '								<span class="childFilter"> <input id="' . strtolower($productType->getOriginalName()) . 'Filter3-' . ($j + 1) . '" type="checkbox" name="' . strtolower($productType->getOriginalName()) . '" />' . $accesoryType->getName() . '</span>';
			}	
		}
		echo '									</span>';
		echo '								</div>';
		echo '							</div>';
		echo '							<div id="' . strtolower($subcategoryDtoAux->getOriginalName()) . 'ResultContainer" class="resultContainer">';
		echo '									<div id="' . strtolower($subcategoryDtoAux->getOriginalName()) . 'SelectedFilter" class="selectedFilter">';
		echo '										<label>Tus filtros: TODOS</label>';
		echo '									</div>';
		echo '									<div id="' . strtolower($subcategoryDtoAux->getOriginalName()) . 'Results" class="results">';
		// Comprobar resultado de productos
		if (null != $listProduct && 0 < $listProduct->count()) { 
			for ($j = 0; $j < $listProduct->count(); $j ++) { // Listado de productos
				$productAux = new ProductDto();
				$productAux = $listProduct->offsetGet($j);
				echo '								<div id="result' . ($j + 1) . '" class="result">';
				echo '									<div id="image' . ($j + 1) . '" class="resultImage">'; // Imagen principal del producto
				 // Comprobar imágenes del producto
				if (null != $productAux->getImages() && 0 < $productAux->getImages()->count()) {
					$main = false;
					for ($k = 0; $k < $productAux->getImages()->count() && ! $main; $k ++) { // Listado de imágenes del producto
						$productImageDtoAux = new ProductImageDto();
						$productImageDtoAux = $productAux->getImages()->offsetGet($k);
						
						if ($productImageDtoAux->getMain() || 1 == $productImageDtoAux->getMain()) { // Buscando la imagen principal
							$mainImage = $productImageDtoAux->getImage();
							echo '							<img src="./img/products/' . $mainImage->getUrl() . '" alt="' . $mainImage->getName() . '" title="' . $mainImage->getName() . '" />';
							$main = true;
						}
					}
				} else { // Sin imagen principal
					echo '									<img src="./img/no-image.png" alt="Sin imagen principal" title="Sin imagen principal" />';	
				}
				echo '									</div>';
				echo '									<div id="title' . ($j + 1) . '" class="resultTitle">';
				echo '										<span>' . $productAux->getName() . '</span>'; // Nombre del producto
				echo '									</div>';
				echo '									<div id="subtitle' . ($j + 1) . '" class="resultSubtitle">';
				echo '										<span>' . $productAux->getObservations() . '&nbsp;</span>'; // Observaciones del producto
				echo '									</div>';
				echo '									<div id="prices" class="resultPrices">';
				echo '										<div id="price' . ($j + 1) . '" class="resultPrice">';
				echo '											<span>' . $productAux->getPrice() . ' &euro;</span>'; // Precio del producto
				echo '										</div>';
				if (null != $productAux->getOldPrice()) {
					echo '									<div id="oldPrice' . ($j + 1) . '" class="resultOldPrice">';
					echo '										<span>' . $productAux->getOldPrice() . ' &euro;</span>'; // Precio anterior del producto
					echo '									</div>';
				}
				echo '									</div>';
				echo '								</div>';
			}
		} else {
			// No hay resultados
			echo '								<span>NO HAY RESULTADOS</span>';
		}
		
		
		echo '									</div>';
		echo '								</div>';
		
		
		echo '						</div>';
		echo '					</form>';
		echo '				</div>';
	}

?>
							<!-- BICICLETAS -->
							<div id="bikes2Tab" class="tabcontent">
								<span id="closeBikes" onclick="closeTab(event, this);" class="topright">&times;</span>
								<h3>Bicicletas</h3>
								<form>
									<span class="resultsNumber">Total resultados: <span	class="blackResultsNumber">2</span></span>
									<div id="bikesOrder" class="order">
										<select id="bikesSelect" class="form-control" title="Seleccionar orden de resultados">
											<option value="ASC">Orden: Ascendente</option>
											<option value="DESC">Orden: Descendente</option>
										</select>
									</div>
									<div id="bikesForm" class="formDiv">
										<div id="bikesFilter" class="categoriesFilter">
											<span id="minFilterBikes" class="topright" onclick="minFilter(event, 'bikesFilters', 'maxFilterBikes', 'minFilterBikes');">-</span>
											<span id="maxFilterBikes" class="topright" onclick="maxFilter(event, 'bikesFilters', 'minFilterBikes', 'maxFilterBikes');">+</span>
											<span id="bikeFilterTitle" class="filterTitle">Filtros de b&uacute;squeda:</span>
											<div id="bikesFilters" class="categoriesFilters">
												<span class="parentFilter"> <input id="bikeFilter1" type="checkbox" name="bikes" onchange="markChildren(event, this, 'bikes');" />Bicicletas
													<span class="childFilter"> <input id="bikeFilter1-1" type="checkbox" name="bikes" />Monta&ntilde;a</span> 
													<span class="childFilter"> <input id="bikeFilter1-2" type="checkbox" name="bikes" />Carretera</span>
												</span> 
												<span class="parentFilter"> <input type="checkbox" />Equipaci&oacute;n</span> 
												<span class="parentFilter"> <input type="checkbox" />Accesorios</span>
											</div>
										</div>
										<div id="bikesResultContainer" class="resultContainer">
											<div id="bikesSelectedFilter" class="selectedFilter">
												<label>Tus filtros: TODOS</label>
											</div>
											<div id="bikesResults" class="results">
												<div id="result1" class="result">
													<div id="image1" class="resultImage">
														<img src="./img/products/nyxtralight-acqua-sh-105fsa.jpg" />
													</div>
													<div id="title1" class="resultTitle">
														<span>Nyxtralight Acqua SH 105 R7/FSA</span>
													</div>
													<div id="subtitle1" class="resultSubtitle">
														<span>Resistencia, reactividad y peso</span>
													</div>
													<div id="price1" class="resultPrice">
														<span>650,00&euro;</span>
													</div>
												</div>
												<div id="result2" class="result">
													<div id="image2" class="resultImage">
														<img src="./img/products/nyxtralight-acqua-sh-105fsa.jpg" />
													</div>
													<div id="title2" class="resultTitle">
														<span>Nyxtralight Acqua SH 105 R7/FSA</span>
													</div>
													<div id="subtitle2" class="resultSubtitle">
														<span>Resistencia, reactividad y peso</span>
													</div>
												</div>
											</div>
											<!-- Paginador -->
											<div id="bikesPages" class="pagination">
												<a class="page-item first-child"> 
													<span class="page-link"> &lt;&lt; </span>
												</a> 
												<a class="page-item"> 
													<span class="page-link"> &lt; </span>
												</a>
												<a class="page-item active"> 
													<span class="page-link"> 1 </span>
												</a> 
												<a class="page-item">
													<span class="page-link"> 2 </span>
												</a> 
												<a class="page-item"> 
													<span class="page-link"> 3 </span>
												</a> 
												<a class="page-item"> 
													<span class="page-link"> &gt; </span>
												</a> 
												<a class="page-item last-child"> 
													<span class="page-link"> &gt;&gt; </span>
												</a>
											</div>
										</div>
									</div>
								</form>
							</div>
	
							<!-- MOTOS -->
							<div id="motosTab" class="tabcontent">
								<span onclick="closeTab(event, this);" class="topright">&times;</span>
								<h3>Motos</h3>
							</div>
	
							<!-- OTROS -->
							<div id="othersTab" class="tabcontent">
								<span onclick="closeTab(event, this);" class="topright">&times;</span>
								<h3>Otros</h3>
							</div>
						</div>
					</div>
				</div>
	
				<!-- PARTNERS -->
				<div class="resume-item d-flex flex-column flex-md-row mb-5">
					<div class="resume-content mr-auto">
						<div class="subheading mb-3">Somos Partners oficiales de: </div>
						<div class="partner">
							<a href="https://www.vitoriabikes.es" class="nav-link"> 
								<img src="./img/logos/logo-vitoria-bikes-bn.png" alt="Vitoria Bikes" title="Vitoria Bikes"
									onmouseover="this.src='./img/logos/logo-vitoria-bikes.png';" onmouseout="this.src='./img/logos/logo-vitoria-bikes-bn.png';" />
							</a>
						</div>
						<div class="partner">
							<a href="https://www.biocyclespain.com/"> <img
								src="./img/logos/logo-biocycle-bn.jpg" alt="Biocycle Spain"
								title="Biocycle Spain"
								onmouseover="this.src='./img/logos/logo-biocycle.jpg';"
								onmouseout="this.src='./img/logos/logo-biocycle-bn.jpg';" />
							</a>
						</div>
						<div class="partner">
							<a href="https://www.legnanobici.com/"> 
								<img src="./img/logos/logo-legnano-bn.png" alt="Legnano Bici" title="Legnano Bici"
									onmouseover="this.src='./img/logos/logo-legnano.png';" onmouseout="this.src='./img/logos/logo-legnano-bn.png';" />
							</a>
						</div>
						<div class="partner">
							<a href="http://www.gistitalia.com"> 
								<img src="./img/logos/logo-gist-bn.jpg" alt="Gist Italia" title="Gist Italia"
									onmouseover="this.src='./img/logos/logo-gist.jpg';" onmouseout="this.src='./img/logos/logo-gist-bn.jpg';" />
							</a>
						</div>
						<div class="partner">
							<a href="https://www.sellesmp.com/es/"> 
								<img src="./img/logos/logo-selle-smp-bn.png" alt="Selle SMP" title="Selle SMP"
									onmouseover="this.src='./img/logos/logo-selle-smp.png';" onmouseout="this.src='./img/logos/logo-selle-smp-bn.png';" />
							</a>
						</div>
						<div class="partner">
							<a href="https://www.santinisms.it/"> 
								<img src="./img/logos/logo-santini-bn.jpg" alt="Santini Maglificio Sportivo" title="Santini Maglificio Sportivo"
									onmouseover="this.src='./img/logos/logo-santini.jpg';" onmouseout="this.src='./img/logos/logo-santini-bn.jpg';" />
							</a>
						</div>
						<div class="partner">
							<a href="https://www.evofinance.com/"> 
								<img src="./img/logos/logo-evo-finance-bn.png" alt="EVO Finance" title="EVO Finance"
									onmouseover="this.src='./img/logos/logo-evo-finance.png';" onmouseout="this.src='./img/logos/logo-evo-finance-bn.png';" />
							</a>
						</div>
						<div class="partner">
							<a href="https://www.amv.es/"> 
								<img src="./img/logos/logo-amv-bn.png" alt="Seguros AMV" title="Seguros AMV"
									onmouseover="this.src='./img/logos/logo-amv.png';" onmouseout="this.src='./img/logos/logo-amv-bn.png';" />
							</a>
						</div>
						<div class="partner">
							<a href="http://www.umglobal.com/es/"> 
								<img src="./img/logos/logo-um-bn.png" alt="UM Motos" title="UM Motos"
									onmouseover="this.src='./img/logos/logo-um.png';" onmouseout="this.src='./img/logos/logo-um-bn.png';" />
							</a>
						</div>
						<div class="partner">
							<a href="http://www.agrocel.es/"> 
								<img src="./img/logos/logo-agrocel-bn.jpg" alt="Agrocel" title="Agrocel" 
									onmouseover="this.src='./img/logos/logo-agrocel.jpg';" onmouseout="this.src='./img/logos/logo-agrocel-bn.jpg';" />
							</a>
						</div>
						<div class="partner">
							<a href="http://www.motogarden.com/"> 
								<img src="./img/logos/logo-motogarden-bn.jpg" alt="Motogarden" title="Motogarden"
									onmouseover="this.src='./img/logos/logo-motogarden.jpg';" onmouseout="this.src='./img/logos/logo-motogarden-bn.jpg';" />
							</a>
						</div>
						<div class="partner">
							<a href="https://www.husqvarna.com/es/"> 
								<img src="./img/logos/logo-husqvarna-bn.png" alt="Husqvarna" title="Husqvarna"
									onmouseover="this.src='./img/logos/logo-husqvarna.png';" onmouseout="this.src='./img/logos/logo-husqvarna-bn.png';" />
							</a>
						</div>
						<div class="partner">
							<a href="https://www.stihl.es/"> 
								<img src="./img/logos/logo-stihl-bn.png" alt="Stihl" title="Stihl" 
									onmouseover="this.src='./img/logos/logo-stihl.png';" onmouseout="this.src='./img/logos/logo-stihl-bn.png';" />
							</a>
						</div>
						<div class="partner">
							<a href="http://ducatigarden.com/home/"> 
								<img src="./img/logos/logo-ducati-bn.jpg" alt="Ducati Gardening Collection" title="Ducati Gardening Collection"
									onmouseover="this.src='./img/logos/logo-ducati.jpg';" onmouseout="this.src='./img/logos/logo-ducati-bn.jpg';" />
							</a>
						</div>
					</div>
				</div>
	
				<!-- div class="resume-item d-flex flex-column flex-md-row mb-5">
	    				<div class="resume-content mr-auto">
	    					<h3 class="mb-0">Web Developers</h3>
	    					<div class="subheading mb-3">Intelitec Solutions</div>
	    					<p>Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.</p>
	    				</div>
	    				<div class="resume-date text-md-right">
	    					<span class="text-primary">December 2011 - March 2013</span>
	    				</div>
	    			</div-->
			</section>
	
			<hr class="m-0" />
	
			<!-- 
				<section class="resume-section p-3 p-lg-5 d-flex flex-column" id="skills">
		        	<div class="my-auto">
	    				<h2 class="mb-5">Skills</h2>
	    	
	    				<div class="subheading mb-3">Programming Languages &amp; Tools</div>
						<ul class="list-inline dev-icons">
							<li class="list-inline-item">
								<i class="fab fa-html5"></i>
							</li>
							<li class="list-inline-item">
								<i class="fab fa-css3-alt"></i>
							</li>
							<li class="list-inline-item">
								<i class="fab fa-js-square"></i>
							</li>
							<li class="list-inline-item">
								<i class="fab fa-angular"></i>
							</li>
							<li class="list-inline-item">
								<i class="fab fa-react"></i>
							</li>
							<li class="list-inline-item">
								<i class="fab fa-node-js"></i>
							</li>
							<li class="list-inline-item">
								<i class="fab fa-sass"></i>
							</li>
							<li class="list-inline-item">
								<i class="fab fa-less"></i>
							</li>
							<li class="list-inline-item">
								<i class="fab fa-wordpress"></i>
							</li>
							<li class="list-inline-item">
								<i class="fab fa-gulp"></i>
							</li>
							<li class="list-inline-item">
								<i class="fab fa-grunt"></i>
							</li>
							<li class="list-inline-item">
								<i class="fab fa-npm"></i>
							</li>
						</ul>
		
						<div class="subheading mb-3">Workflow</div>
						<ul class="fa-ul mb-0">
							<li>
								<i class="fa-li fa fa-check"></i>
								Mobile-First, Responsive Design
							</li>
							<li>
								<i class="fa-li fa fa-check"></i>
								Cross Browser Testing &amp; Debugging
							</li>
							<li>
								<i class="fa-li fa fa-check"></i>
								Cross Functional Teams
							</li>
							<li>
								<i class="fa-li fa fa-check"></i>
								Agile Development &amp; Scrum
							</li>
						</ul>
					</div>
				</section>
		
				<hr class="m-0" />
				-->
	
			<!-- Contacto -->
			<section class="resume-section p-3 p-lg-5 d-flex flex-column"
				id="contact">
				<div class="myAuto">
					<h2 class="mb-5">Contacto</h2>
					<p class="lead mb-5">
						Introduzca sus datos en el siguiente formulario y nos pondremos en
						contacto con usted lo antes posible <br /> <label>(Los campos
							marcados con asterisco (*) son obligatorios)</label>
					</p>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<form id="contactForm" name="sentMessage">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input class="form-control" id="name" type="text" placeholder="Nombre *" required="required"
											data-validation-required-message="Por favor, introduzca su nombre." />
										<p class="help-block text-danger"></p>
									</div>
									<div class="form-group">
										<input class="form-control" id="email" type="email" placeholder="Correo electr&oacute;nico *" required="required"
											data-validation-required-message="Por favor, introduzca su correo electr&oacute;nico." />
										<p class="help-block text-danger"></p>
									</div>
									<div class="form-group">
										<input class="form-control" id="phone" type="tel" placeholder="Tel&eacute;fono *" required="required"
											data-validation-required-message="Por favor, introduzca su tel&eacute;fono." />
										<p class="help-block text-danger"></p>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<textarea class="form-control" id="message" laceholder="Mensaje *" required
											data-validation-required-message="Por favor, introduzca su mensaje."></textarea>
										<p class="help-block text-danger"></p>
									</div>
								</div>
								<div class="col-lg-12 text-center">
									<input type="checkbox" name="politics" id="politics" onclick="formValidate();" required
										data-validation-required-message="La aceptaci&oacute;n de los t&eacute;rminos es obligatorio para enviar la solicitud" />
									<label class="checkboxcontainer"> Antes de enviar su solicitud,
										lea y acepte nuestra informaci&oacute;n b&aacute;sica sobre
										nuestra <a href="./content/avisoLegal.php" target="_blank">pol&iacute;tica de uso de datos</a> *
									</label>
								</div>
								<div class="col-lg-12 text-center">
									<div id="success"></div>
									<br />
									<button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" disabled type="submit">Enviar</button>
								</div>
							</div>
							<div class="espacio"></div>
							<div class="row">
								<div class="col-lg-12 text-center">Web dise&ntilde;ada y realizada por "Maroto Bikes". Todos los derechos reservados.</div>
							</div>
						</form>
					</div>
				</div>
			</section>
		</div>
	
		<!-- Bootstrap core JavaScript -->
		<script src="./vendor/jquery/jquery.min.js"></script>
		<script src="./vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	
		<!-- Plugin JavaScript -->
		<script src="./vendor/jquery-easing/jquery.easing.min.js"></script>
	
		<!-- Custom scripts for this template -->
		<script src="./js/resume.min.js"></script>
	
	</body>
</html>