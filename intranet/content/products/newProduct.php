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
    </head>
    <body style="padding-top: 0px;" id="page-top" onload="openTab(event, 'productTab');">
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
												<input class="form-control" type="file" name="fileToUpload" id="fileToUpload" multiple="multiple" accept="image/*"  />
											</div>
										</div>
										<div class="form-group">
											<span>Nombre:</span>
											<input class="form-control" type="text" name="name" id="name" />
										</div>
										<div class="form-group">
											<span>Descripci&oacute;n:</span>
											<textarea class="form-control" name="description" id="description"></textarea>
										</div>
										<div class="form-group">
											<span>Marca:</span>
											<input class="form-control" type="text" name="mark" id="mark" />
										</div>
										<div class="form-group">
											<span>Modelo:</span>
											<input class="form-control" type="text" name="model" id="model" />
										</div>
										<div class="form-group">
											<span>Precio:</span>
											<input class="form-control" type="text" name="price" id="price" />
										</div>
										<div class="form-group">
											<span>Categor&iacute;a:</span>
											<select id="bikesSelect" title="Categor&iacute;">
												<option value="none">Seleccionar categor&iacute;a...</option>
	        									<option value="moto">Moto</option>
	        									<option value="bike">Bicicleta</option>
	        									<option value="equipment">Equipaci&oacute;n</option>
	        									<option value="accesory">Accesorio</option>
	        									<option value="other">Otro</option>
	        								</select>
										</div>
										<div class="form-group">
											<span>A&ntilde;o fabricaci&oacute;n:</span>
											<input class="form-control" type="text" name="price" id="price" />
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
											<input class="form-control" type="checkbox" name="rent" id="rent" />
										</div>
										<div class="form-group">
											<span>Observaciones:</span>
											<textarea class="form-control" name="observations" id="observations"></textarea>
										</div>
										<div class="form-group">
											<span>Stock:</span>
											<input class="form-control" type="text" name="stock" id="stock" />
										</div>
										<div class="form-group">
											<span>&iquest;Mostrar en web?</span>
											<input class="form-control" type="radio" name="showProduct" id="showYes" value="yes" checked /><label>S&iacute;</label>
											<input class="form-control" type="radio" name="showProduct" id="showNo" value="no" /><label>No</label>
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