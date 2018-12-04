<!DOCTYPE html>
<html lang="es">
	<head>
		<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
		<title>INTRANET (ADMIN) - Bicicletas y Motos Maroto</title>
        <link rel='icon' type='image/x-icon' href='../../img/mm_logo.ico' />
        <script src='../content/js/intranet.js' type='text/javascript'></script>
        
        <!-- Bootstrap core CSS -->
	    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	
	    <!-- Custom fonts for this template -->
	    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" />
	    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" />
	    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" />
	    
	    <!-- Custom styles for this template -->
	    <link rel='STYLESHEET' type='text/css' href='../../css/resume.min.css' />
	    
	    <!-- Custom scripts for this template -->
	    <script src="../../js/resume.min.js"></script>	
    </head>

	<body style="padding-top: 0px;" id="page-top" onload="openTab(event, 'adminTab');">
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
						<span class="place">&iexcl;Hola, Jes&uacute;s!</span> <br />
						<form id="adminForm" name="adminForm" method="post" action="../login.php?option=exit" onSubmit="return validate();">
        					<div id="success"></div>
        					<button id="exitAdminButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Cerrar sesi&oacute;n</button>
        					<!-- input type='button' name='nuevo' value='Nuevo usuario' class='boton' onClick='window.location="./content/user/register.php"' title='Registro de un nuevo usuario' /-->
    					</form>
    				</div>
    				
    				<h2 class="mb-5">Consola de administraci&oacute;n</h2>
    				
        			<div class="resume-item d-flex flex-column flex-md-row mb-5">
						<div class="resume-content">
        					<div class="tabcontainer">
								<div id="adminTab" class="tabcontent">
									<div id="adminForm" class="formDiv">
										<div class="adminCategory">
											<div class="categoryImg">
												<img src="./img/product.png"/>
												<span>Productos</span>
											</div>
											<ul>
												<li>
													<div>
														<span><a href="./products/newProduct.php">Alta de productos</a></span>
													</div>
												</li>
												<li>
													<div>
														<span><a href="#">Baja o modificaci&oacute;n de productos</a></span>
													</div>
												</li>
											</ul>
										</div>
										<div class="adminCategory">
											<div class="categoryImg">
												<img src="./img/category.jpg"/>
												<span>Categor&iacute;as</span>
											</div>
											<ul>
												<li>
													<div>
														<span><a href="#">Alta de categor&iacute;a</a></span>
													</div>
												</li>
												<li>
													<div>
														<span><a href="#">Baja o modificaci&oacute;n de categor&iacute;as</a></span>
													</div>
												</li>
											</ul>
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