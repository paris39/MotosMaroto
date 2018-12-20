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
    <body class="noMargin" style="padding-top: 0px;" id="page-top" onload="openTab(event, 'listProductsTab');">
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
    				
    				<h2 class="mb-5">Listado de productos</h2>
    				
    				<div class="resume-item d-flex flex-column flex-md-row mb-5">
						<div class="resume-content">
		   					<div class="tabcontainer">
								<div id="listProductsTab" class="tabcontent">
    									
    								<table class="table">
										<tr >
											<th>ID</th>
											<th>Nombre</th>
											<th>Marca</th>
											<th>Modelo</th>
											<th>Categor&iacute;a</th>
											<th>Stock</th>
											<th>Precio</th>
											<th colspan="2">Acciones</th>
										</tr>
										
										<tr>
											<td>TD</td>
											<td>TD</td>
											<td>TD</td>
											<td>TD</td>
											<td>TD</td>
											<td>TD</td>
											<td>TD</td>
											<td>
												<div class="adminImg">
													<img src="../img/modify.png" title="Modificar producto"/>
												</div>
											</td>
											<td>
												<div class="adminImg">
													<img src="../img/delete.png" title="Eliminar productor"/>
												</div>
											</td>
										</tr>
										    									
    								
    								</table>
    								
    								<div class="col-lg-12 text-center">
										<div class="form-group">
		    								 <a href='../admin.php' class="noDecoration">
		    								 	<button id="returnButton" class="btn btn-primary btn-xl text-uppercase" title="Volver al men&uacute; de Administrador">Volver</button>
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