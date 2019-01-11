<?php
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>INTRANET - Nuevo Producto - Bicicletas y Motos Maroto</title>
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
	onload="openTab(event, 'listProductsTab');">
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
									<span id="bikeFilterTitle" class="filterTitle">Filtros de
										b&uacute;squeda:</span>
									<div class="row">
										<div class="col-lg-12">
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<input type="search" class="form-control short" id="id"
															name="id" placeholder="ID" />
													</div>
													<div class="form-group">
														<input type="search" class="form-control" id="name"
															name="name" placeholder="Nombre" />
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<div class="form-group noBlock">
															<!-- span>Categor&iacute;a:</span-->
															<select name="productCategory"
																class="form-control short noBlock" id="productCategory"
																title="Categor&iacute;a"
																onChange="showSubtypeCategory(this);">
																<option value="none">Seleccionar categor&iacute;a...</option>
																<option value="moto">Motos</option>
																<option value="bike">Bicicletas</option>
																<option value="equipment">Equipaciones</option>
																<option value="accesory">Accesorios</option>
																<option value="other">Otros</option>
															</select>
														</div>
														<!-- SUBCATEGORÍAS -->
														<div class="form-group subtypeCategory noBlock"
															id="exampleSubType">
															<select class="form-control short noBlock"
																name="exampleSubType" id="cbExampleSubType"
																title="Subtipo de equipaci&oacute;n">
																<option value="none">Seleccionar subtipo...</option>
															</select>
														</div>
														<div class="form-group subtypeCategory noBlock"
															id="bikeSubType">
															<select name="bikeSubType"
																class="form-control short noBlock" id="cbBikeSubType"
																title="Tipo de bicicleta">
																<option value="none">Seleccionar tipo...</option>
																<option value="road">Carretera</option>
																<option value="electric">El&eacute;ctrica</option>
																<option value="fat">Fat</option>
																<option value="fixie">Fixie</option>
																<option value="hybrid">H&iacute;brida</option>
																<option value="mbx">MBX</option>
																<option value="mountain">Monta&ntilde;a</option>
																<option value="plegable">Plegable</option>
																<option value="urban">Urbana</option>
															</select>
														</div>
														<div class="form-group subtypeCategory noBlock"
															id="motoSubType">
															<select name="motoSubType"
																class="form-control short noBlock" id="cbMotoSubType"
																title="Tipo de moto">
																<option value="none">Seleccionar tipo...</option>
																<option value="chopper">Chopper</option>
																<option value="custom">Custom</option>
																<option value="enduro">Enduro</option>
																<option value="touring">Gran turismo</option>
																<option value="motocross">Motocross</option>
																<option value="naked">Naked</option>
																<option value="racing">Racing</option>
																<option value="trail">Trail</option>
																<option value="maxitrail">Maxi Trail</option>
																<option value="scooter">Scooter</option>
																<option value="maxiscooter">Maxi Scooter</option>
															</select>
														</div>
														<div class="form-group subtypeCategory noBlock"
															id="otherSubType">
															<select name="otherSubType"
																class="form-control short noBlock" id="cbOtherSubType"
																title="Tipo de Otros">
																<option value="none">Seleccionar tipo...</option>
																<option value="otherChainsaws">Motosierras</option>
																<option value="otherPrunings">Podadoras</option>
															</select>
														</div>
														<!-- FIN SUBCATEGORÍAS -->

														<div class="form-group subtypeCategory noBlock"
															id="equipmentSubType">
															<select class="form-control short noBlock"
																name="equipmentSubType" id="cbEquipmentSubType"
																title="Subtipo de equipaci&oacute;n">
																<option value="none">Seleccionar subtipo...</option>
																<optgroup label="Bicicletas">
																	<option value="bikeBottles">Bidones</option>
																	<option value="bikeSocks">Calcetines</option>
																	<option value="bikeShirts">Camisetas</option>
																	<option value="bikeHelmets">Cascos</option>
																	<option value="bikeWaistcoats">Chalecos</option>
																	<option value="bikeJackets">Chaquetas</option>
																	<option value="bikeCullotes">Cullotes</option>
																	<option value="bikeGlasses">Gafas</option>
																	<option value="bikeCaps">Gorras</option>
																	<option value="bikeGants">Guantes</option>
																	<option value="bikeMaillots">Maillots</option>
																	<option value="bikePants">Pantalones</option>
																	<option value="bikeProtections">Protecciones</option>
																	<option value="bikeThermalClothes">Ropa t&eacute;rmica</option>
																	<option value="bikeShoes">Zapatillas</option>
																</optgroup>
																<optgroup label="Motos">
																	<option value="motoSocks">Calcetines</option>
																	<option value="motoShirts">Camisetas</option>
																	<option value="motoHelmets">Cascos</option>
																	<option value="motoJackets">Chaquetas</option>
																	<option value="motoGants">Guantes</option>
																	<option value="motoOveralls">Monos</option>
																	<option value="motoPants">Pantalones</option>
																	<option value="motoProtections">Protecciones</option>
																	<option value="motoThermalClothes">Ropa t&eacute;rmica</option>
																	<option value="motoShoes">Zapatillas</option>
																</optgroup>
															</select>
														</div>
													</div>

													<div class="form-group">
														<input type="search" class="form-control" id="mark"
															name="mark" placeholder="Marca" />
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="adminResults">
									<span class="resultsNumber">Total resultados: <span
										class="blackResultsNumber">2</span></span>
									<div id="bikesOrder" class="order">
										<select id="bikesSelect" class="form-control"
											title="Seleccionar orden de resultados">
											<option value="ASC">Orden: Ascendente</option>
											<option value="DESC">Orden: Descendente</option>
										</select>
									</div>
								</div>

								<table class="table">
									<tr>
										<th>ID</th>
										<th>Nombre</th>
										<th>Marca</th>
										<th>Modelo</th>
										<th>Categor&iacute;a</th>
										<th>Stock</th>
										<th>Precio</th>
										<th colspan="2">Acciones</th>
									</tr>

									<tr class="impar">
										<td>TD</td>
										<td>TD</td>
										<td>TD</td>
										<td>TD</td>
										<td>TD</td>
										<td>TD</td>
										<td>TD</td>
										<td class="action">
											<div class="adminImg">
												<img src="../img/modify.png" title="Modificar producto" />
											</div>
										</td>
										<td class="action">
											<div class="adminImg">
												<img src="../img/delete.png" title="Eliminar productor" />
											</div>
										</td>
									</tr>
									<tr>
										<td>TD</td>
										<td>TD</td>
										<td>TD</td>
										<td>TD</td>
										<td>TD</td>
										<td>TD</td>
										<td>TD</td>
										<td class="action">
											<div class="adminImg">
												<img src="../img/modify.png" title="Modificar producto" />
											</div>
										</td>
										<td class="action">
											<div class="adminImg">
												<img src="../img/delete.png" title="Eliminar productor" />
											</div>
										</td>
									</tr>


								</table>

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