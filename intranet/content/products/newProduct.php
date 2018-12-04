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
    <body class="noMargin" style="padding-top: 0px;" id="page-top" onload="openTab(event, 'productTab');">
    	<div class="container-fluid p-0">
    		<section class="resume-section p-3 p-lg-5 d-flex flex-column" id="product">
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
											<select name="productCategory" id="productCategory" title="Categor&iacute;a" onChange="showProductCategory(this);">
												<option value="none">Seleccionar categor&iacute;a...</option>
	        									<option value="motoType">Moto</option>
	        									<option value="bikeType">Bicicleta</option>
	        									<option value="equipmentType">Equipaci&oacute;n</option>
	        									<option value="accesoryType">Accesorio</option>
	        									<option value="otherType">Otro</option>
	        								</select>
										</div>
										<div class="form-group">
											<input class="form-control" type="number" name="year" id="year" placeholder="A&ntilde;o de fabricaci&oacute;n *" required="required" data-validation-required-message="Por favor, introduzca el año de fabricaci&oacute;n." min="1900" max="2018" step="1" />
										</div>
										<div class="form-group">
											<span>Colores:</span>
											<select name="colors" id="colors" size="10" multiple>
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
										<div class="form-group">
											<span>&iquest;Alquiler?</span>
											<input type="checkbox" name="rent" id="rent" />
										</div>
										<div class="form-group">
											<textarea class="form-control" name="observations" id="observations" placeholder="Observaciones" data-validation-required-message="Por favor, introduzca observaciones."></textarea>
										</div>
									</div>
								</div>
								
								<!-- BICICLETAS -->
								<div class="row productType" id="bikeType">
    								<div class="col-lg-12">
    									<h3>Bicicletas</h3>
    								</div>
	    							<div class="col-md-6">
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
										<div class="form-group">
											<span>Talla:</span>
											<select name="bikeSize" id="bikeSize" title="Talla">
												<option value="none">Seleccionar talla...</option>
											    <option value="S">S</option>
											    <option value="M">M</option>
											    <option value="L">L</option>
											</select>
										</div>
									</div>
								</div>
								
								
							</form>
						</div>
					</div>
    			</div>
    		</section>
    	</div>
    </body>
</html>