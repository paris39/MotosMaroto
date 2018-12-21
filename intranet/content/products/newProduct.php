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
    <body class="noMargin" style="padding-top: 0px;" id="page-top" onload="openTab(event, 'newProductTab');">
    	<div class="container-fluid p-0">
    		<section class="resume-section p-3 p-lg-5 d-flex flex-column" id="admin">
				<div class="my-auto">
        			<div id="mainTitle" class="mainTitle">
        				<h1 class="mb-0">
        					Maroto
        					<span class="text-primary">Bikes</span>
        				</h1>
        			</div>
    				<div class="lead mb-5">
    					<p>
    						INTRANET
    					</p>
    				</div>
    				
    				<h2 class="mb-5">Nuevo producto</h2>
    				
    				<div class="resume-item d-flex flex-column flex-md-row mb-5">
						<div class="resume-content">
		   					<div class="tabcontainer">
								<div id="newProductTab" class="tabcontent">
		    						<div class="row">
					    				<div class="col-lg-12">
					    					<form id="productForm" name="sentMessage">
					    						<div class="row">
					    							<div class="col-md-6">
					    								<div class="form-group">
															<div class="productImg">
																<span>Im&aacute;genes:</span>
																<input class="form-control" type="file" name="fileToUpload" id="fileToUpload" multiple="multiple" accept="image/*" placeholder="Imagen *" required="required" data-validation-required-message="Por favor, cargue una imagen." />
															</div>
														</div>
														<div class="form-group">
															<input class="form-control" type="text" name="name" id="name" placeholder="Nombre *" required="required" data-validation-required-message="Por favor, introduzca un nombre." />
														</div>
														<div class="form-group">
															<textarea class="form-control" name="description" id="description" placeholder="Descripci&oacute;n *" required="required" data-validation-required-message="Por favor, introduzca una descripci&oacute;n."></textarea>
														</div>
														<div class="form-group">
															<input class="form-control" type="text" name="mark" id="mark" placeholder="Marca *" required="required" data-validation-required-message="Por favor, introduzca la marca del producto." />
														</div>
														<div class="form-group">
															<input class="form-control" type="text" name="model" id="model" placeholder="Modelo *" required="required" data-validation-required-message="Por favor, introduzca el modelo del producto." />
														</div>
														<div class="form-group">
															<input class="form-control" type="number" name="price" id="price" placeholder="Precio (&euro;) *" required="required" data-validation-required-message="Por favor, introduzca el precio del producto." min="0.00" step="0.01" />
														</div>
														<div class="form-group">
															<input class="form-control" type="number" name="stock" id="stock" placeholder="Existencias *" required="required" data-validation-required-message="Por favor, introduzca las existencias del producto." min="0" step="1" />
														</div>
														<div class="form-group">
															<span>&iquest;Mostrar en web?</span>
															<input type="checkbox" name="show" id="show" checked="checked" />
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<span>Categor&iacute;a:</span>
															<select name="productCategory" class="form-control" id="productCategory" title="Categor&iacute;a" onChange="showProductCategory(this);">
																<option value="none">Seleccionar categor&iacute;a...</option>
					        									<option value="motoType">Motos</option>
					        									<option value="bikeType">Bicicletas</option>
					        									<option value="equipmentType">Equipaciones</option>
					        									<option value="accesoryType">Accesorios</option>
					        									<option value="otherType">Otros</option>
					        								</select>
														</div>
														<div class="form-group">
															<input class="form-control" type="number" name="year" id="year" placeholder="A&ntilde;o de fabricaci&oacute;n *" required="required" data-validation-required-message="Por favor, introduzca el año de fabricaci&oacute;n." min="1900" max="2018" step="1" />
														</div>
														<div class="form-group">
															<span>Colores:</span>
															<select name="colors" class="form-control" id="colors" size="10" multiple>
															    <option value="yellow">Amarillo</option>
															    <option value="blue">Azul</option>
															    <option value="white">Blanco</option>
															    <option value="gray">Gris</option>
															    <option value="brown">Marr&oacute;n</option>
															    <option value="orange">Naranja</option>
															    <option value="black">Negro</option>
															    <option value="red">Rojo</option>
															    <option value="pink">Rosa</option>
															    <option value="green">Verde</option>
															</select>
														</div>
														<!-- div class="form-group">
															<span>&iquest;Alquiler?</span>
															<input type="checkbox" name="rent" id="rent" />
														</div-->
														<div class="form-group">
															<textarea class="form-control" name="observations" id="observations" placeholder="Observaciones" data-validation-required-message="Por favor, introduzca observaciones."></textarea>
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
					    								<div class="form-group">
															<input class="form-control" type="text" name="bikeFrame" id="bikeFrame" placeholder="Cuadro" />
														</div>
														<div class="form-group">
															<input class="form-control" type="text" name="bikeFork" id="bikeFork" placeholder="Horquilla" />
														</div>
														<div class="form-group">
															<input class="form-control" type="text" name="bikeHandlebars" id="bikeHandlebars" placeholder="Manillar" />
														</div>
														<div class="form-group">
															<input class="form-control" type="text" name="bikeSeat" id="bikeSeat" placeholder="Sill&iacute;n" />
														</div>
														<div class="form-group">
															<input class="form-control" type="text" name="bikeChange" id="bikeChange" placeholder="Cambio" />
														</div>
														<div class="form-group">
															<input class="form-control" type="text" name="bikeDeflector" id="bikeDeflector" placeholder="Desviador" />
														</div>
														<div class="form-group">
															<input class="form-control" type="text" name="bikeControl" id="bikeControl" placeholder="Mando" />
														</div>
														<div class="form-group">
															<input class="form-control" type="text" name="bikeGroup" id="bikeGroup" placeholder="Grupo" />
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<span>Talla:</span>
															<select name="bikeSize" class="form-control" id="bikeSize" title="Talla">
																<option value="none">Seleccionar talla...</option>
															    <option value="S">S</option>
															    <option value="M">M</option>
															    <option value="L">L</option>
															</select>
														</div>
														<div class="form-group">
															<input class="form-control" type="text" name="bikePedals" id="bikePedals" placeholder="Pedales" />
														</div>
														<div class="form-group">
															<input class="form-control" type="text" name="bikeCrank" id="bikeCrank" placeholder="Bielas" />
														</div>
														<div class="form-group">
															<input class="form-control" type="text" name="bikeCassette" id="bikeCassette" placeholder="Cassette" />
														</div>
														<div class="form-group">
															<input class="form-control" type="text" name="bikeWheels" id="bikeWheels" placeholder="Llantas" />
														</div>
														<div class="form-group">
															<input class="form-control" type="text" name="bikeTyres" id="bikeTyres" placeholder="Cubiertas" />
														</div>
														<div class="form-group">
															<input class="form-control" type="text" name="bikeDeflector" id="bikeDeflector" placeholder="Desviador" />
														</div>
														<div class="form-group">
															<input class="form-control" type="number" name="bikeWeight" id="bikeWeight" placeholder="Peso (kg.)" min="0.00" step="0.01" />
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
					    									<span>Tipo de moto:</span>
															<select name="motoKind" class="form-control" id="motoKind" title="Tipo de moto">
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
														<div class="form-group">
															<input class="form-control" type="number" name="motoCubic" id="motoCubic" placeholder="Cilindrada (cc&sup3;)" min="0" step="1" />
														</div>
														<div class="form-group">
															<input class="form-control" type="number" name="motoCylinder" id="motoCylinder" placeholder="N&ordm; cilindros" min="0" step="1" />
														</div>
					    								<div class="form-group">
															<input class="form-control" type="number" name="motoPower" id="motoPower" placeholder="Potencia (cv)" min="0.0" step="0.1" />
														</div>
														<div class="form-group">
															<input class="form-control" type="number" name="motoGears" id="motoGears" placeholder="Velocidades" min="1" max="10" step="1" />
														</div>
														<div class="form-group">
															<input class="form-control" type="text" name="motoFrontBrake" id="motoFrontBrake" placeholder="Freno delantero (1 disco, 2 discos, tambor...)" />
														</div>
														<div class="form-group">
															<input class="form-control" type="text" name="motoRearBrake" id="motoRearBrake" placeholder="Freno trasero (1 disco, tambor...)" />
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<span>Carnet:</span>
															<select name="motoLicense" class="form-control" id="motoLicense" title="Carnet de moto">
																<option value="none">Seleccionar carnet...</option>
															    <option value="AM">AM</option>
															    <option value="A1">A1</option>
															    <option value="A2">A2</option>
															    <option value="A2">A</option>
															    <option value="B">B* (>3 a&ntilde;os)</option>
															</select>
														</div>
														<div class="form-group">
															<input class="form-control" type="number" name="motoPlaces" id="motoPlaces" placeholder="Plazas homologadas" min="1" max="3" step="1" />
														</div>
														<div class="form-group">
															<span>Combustible:</span>
															<select class="form-control" name="motoFuel" id="motoFuel" title="Combustible">
																<option value="none">Seleccionar combustible...</option>
															    <option value="electric">El&eacute;ctrico</option>
															    <option value="gas95">Gasolina 95</option>
															    <option value="gas98">Gasolina 98</option>
															</select>
														</div>
														<div class="form-group">
															<span>Distintivo anticontaminaci&oacute;n:</span>
															<select class="form-control" name="motoContamination" id="motoContamination" title="Combustible">
																<option value="none">Seleccionar categor&iacute;a...</option>
															    <option value="A">No corresponde</option>
															    <option value="B">B (amarillo)</option>
															    <option value="C">C (verde)</option>
															    <option value="ECO">ECO (verde y azul)</option>
															    <option value="0">0 (cero)</option>
															</select>
														</div>
														<div class="form-group">
															<span>Transmisi&oacute;n:</span>
															<select class="form-control" name="motoTransmission" id="motoTransmission" title="Transmisi&oacute;n">
																<option value="none">Seleccionar transmisi&oacute;n...</option>
															    <option value="chain">Cadena</option>
															    <option value="cardan">Card&aacute;n</option>
															    <option value="belt">Correa</option>
															</select>
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
					    									<span>Equipaci&oacute;n de:</span>
															<select class="form-control" name="equipmentKind" id="equipmentKind" title="Tipo de equipaci&oacute;n" onChange="showSubtypeCategory(this);">
																<option value="none">Seleccionar tipo...</option>
																<option value="bike">Bicicletas</option>
															    <option value="moto">Motos</option>
															    <option value="other">Otros</option>
															</select>
														</div>
														<div class="form-group subtypeCategory" id="exampleSubType">
					    									<span>Subtipo:</span>
					    									<select class="form-control" name="exampleSubType" id="cbExampleSubType" title="Subtipo de equipaci&oacute;n">
																<option value="none">Seleccionar subtipo...</option>
															</select>
														</div>
														<div class="form-group subtypeCategory" id="bikeSubType">
					    									<span>Subtipo:</span>
															<select class="form-control" name="bikeSubType" id="cbBikeSubType" title="Subtipo de equipaci&oacute;n de bicicleta">
																<option value="none">Seleccionar subtipo...</option>
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
															</select>
														</div>
														<div class="form-group subtypeCategory" id="motoSubType">
					    									<span>Subtipo:</span>
															<select class="form-control" name="motoSubType" id="cbMotoSubType" title="Subtipo de equipaci&oacute;n de moto">
																<option value="none">Seleccionar subtipo...</option>
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
															</select>
														</div>
														<div class="form-group subtypeCategory" id="otherSubType">
					    									<span>Subtipo:</span>
															<select class="form-control" name="otherSubType" id="cbOtherSubType" title="Subtipo de equipaci&oacute;n de otros">
																<option value="none">Seleccionar subtipo...</option>
															    <option value="otherChainsaws">Motosierras</option>
															    <option value="otherPrunings">Podadoras</option>
															</select>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group" id="genderSubType">
					    									<span>G&eacute;nero:</span>
					    									<select class="form-control" name="generoSubType" id="cbGender" title="G&eacute;nero">
																<option value="none">Seleccionar g&eacute;nero...</option>
															    <option value="genderFemale">Femenino</option>
																<option value="genderMale">Masculino</option>
																<option value="genderUnisex">Unisex</option>
																<option value="genderChild">Infantil</option>
															</select>
														</div>
													</div>
												</div>
												
												<!-- ACCESORIOS -->
												<div class="row productType" id="accesoryType">
												
												</div>
												
												<!-- OTROS -->
												<div class="row productType" id="otherType">
												
												</div>
												
												<div class="col-lg-12 text-center">
													<div class="form-group">
					    								<div id="success"></div>
					    								<br />
					    								 <a href='../admin.php' class="noDecoration">
					    								 	<button id="cancelProductButton" class="btn btn-primary btn-xl text-uppercase" title="Cancelar el alta de producto y volver al men&uacute; de Administrador">Cancelar</button>
					    								 </a>
					    								<button id="addProductButton" class="btn btn-primary btn-xl text-uppercase" disabled type="submit">Dar de alta</button>
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