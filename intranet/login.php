<?php
	session_start();
	
	// Cerrando sesión
	if (null == $_GET ['option'] || $_GET ['option'] == "") {
	} else {
		if ($_GET ['option'] == 'exit') {
			$_SESSION ['user'] = "";
			$_SESSION ['password'] = "";
			$_GET ['option'] = "";
		} // End if
	}

?>
<!doctype html>
<html lang="es">
<?php
	if (null == $_SESSION || null == $_SESSION ['user'] || $_SESSION ['user'] == "" || "root" != $_SESSION ['user']) { // Usuario no logueado en el sistema
?>
    <head>
		<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
		<title>INTRANET - Bicicletas y Motos Maroto</title>
		<link rel='icon' type='image/x-icon' href='../img/mm_logo.ico' />
		
		<!-- Bootstrap core CSS -->
		<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
		
		<!-- Custom fonts for this template -->
		<link
			href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700"
			rel="stylesheet" />
		<link
			href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i"
			rel="stylesheet" />
		<link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" />
		
		<!-- Custom styles for this template -->
		<link rel='STYLESHEET' type='text/css' href='../css/resume.min.css' />
		
		<script src='./content/js/intranet.js' type='text/javascript'></script>
	</head>
	<body style="padding-top: 0px;" id="page-top">
		<div class="container-fluid p-0">
			<section class="resume-section p-3 p-lg-5 d-flex d-column" id="login">
				<div class="my-auto">
					<div id="mainTitle" class="mainTitle">
						<h1 class="mb-0">
							Maroto <span class="text-primary">Bikes</span>
						</h1>
					</div>
					<p class="lead mb-5">INTRANET - Entrada</p>
	
					<form id="loginForm" name="loginForm" method="post"
						action="./content/check.php" onSubmit="return validate();">
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group">
									<input class="form-control" id="user" name="user" type="text"
										placeholder="Nombre *" required="required"
										data-validation-required-message="Por favor, introduzca su nombre." />
									<p class="help-block text-danger"></p>
								</div>
								<div class="form-group">
									<input class="form-control" id="password" name="password"
										type="password" placeholder="Contrase&ntilde;a *"
										required="required"
										data-validation-required-message="Por favor, introduzca su contrase&ntilde;a." />
									<p class="help-block text-danger"></p>
								</div>
							</div>
							<div class="col-lg-12 text-center">
								<div id="success"></div>
								<button id="loginButton"
									class="btn btn-primary btn-xl text-uppercase" type="submit">Enviar</button>
								<!-- input type='button' name='nuevo' value='Nuevo usuario' class='boton' onClick='window.location="./content/user/register.php"' title='Registro de un nuevo usuario' /-->
							</div>
						</div>
					</form>
				</div>
			</section>
		</div>
	</body>
<?php
	} else { // Usuario logueado en el sistema, redirigir a su respectiva página
		if ($_SESSION ['user'] == "root") {
?>
    <head>
		<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
		<title>INTRANET - Bicicletas y Motos Maroto</title>
		<link rel='icon' type='image/x-icon' href='../img/mm_logo.ico' />
		<script src='../js/intranet.js' type='text/javascript'></script>
		
		<!-- Bootstrap core CSS -->
		<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
		
		<!-- Custom fonts for this template -->
		<link
			href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700"
			rel="stylesheet" />
		<link
			href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i"
			rel="stylesheet" />
		<link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" />
		
		<!-- Custom styles for this template -->
		<link rel='STYLESHEET' type='text/css' href='../css/resume.min.css' />
		
		<meta http-equiv='refresh' content='1; url=./content/admin.php' />
	</head>
	<body>
		<div class="container-fluid p-0">
			<section class="resume-section p-3 p-lg-5 d-flex d-column"
				id="checkuser">
				<div class="my-auto">
					<p class="lead mb-5">Cargando...</p>
				</div>
			</section>
		</div>
	</body>
<?php
		} // End if
	} // End if
?>
</html>