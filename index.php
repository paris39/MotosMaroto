<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport"
			content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<meta name="description" content="" />
		<meta name="author" content="" />
		
		<title>Bicicletas y Motos Maroto</title>
		
		<!-- Bootstrap core CSS -->
		<link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
		
		<!-- Custom fonts for this template -->
		<link
			href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700"
			rel="stylesheet" />
		<link
			href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i"
			rel="stylesheet" />
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
				Solicitamos su permiso para estad&iacute;sticas de su
				navegaci&oacute;n en esta web, en cumplimiento del RDL 13/2012. Si
				contin&uacute;a navegando consideramos que acepta el uso de cookies.
				<a href="javascript:void(0);" class="ok" onclick="PonerCookie();"><b>OK</b></a>
				| <a href="./content/politicaCookies.php" target="_blank"
					class="info">M&aacute;s informaci&oacute;n</a>
			</div>
		</div>
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top"
			id="sideNav">
			<a class="navbar-brand js-scroll-trigger" href="#page-top"> <span
				class="d-block d-lg-none">Maroto Bikes</span> <span
				class="d-none d-lg-block"> <img
					class="img-fluid img-profile rounded-circle mx-auto mb-2"
					src="./img/mm_logo.jpg" alt="" />
			</span>
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse"
				data-target="#navbarSupportedContent"
				aria-controls="navbarSupportedContent" aria-expanded="false"
				aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav">
					<li class="nav-item"><a class="nav-link js-scroll-trigger"
						href="#about">La empresa</a></li>
					<li class="nav-item"><a class="nav-link js-scroll-trigger"
						href="#catalogue">Cat&aacute;logo</a></li>
					<li class="nav-item"><a class="nav-link js-scroll-trigger"
						href="#contact">Contacto</a></li>
					<li class="nav-item"><a class="nav-link js-scroll-trigger"
						href="./content/politicaCookies.php" target="_blank">Pol&iacute;tica
							de Cookies</a></li>
					<li class="nav-item"><a class="nav-link js-scroll-trigger"
						href="./content/avisoLegal.php" target="_blank">Aviso Legal</a></li>
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
							<span>Calle Anastasio Oliva 5, La Puebla de Montalb&aacute;n,
								45516 (Toledo)</span>
						</p>
						<iframe
							src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1287.562737310211!2d-4.363894685245855!3d39.86622855723823!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd6a7faf270034e9%3A0xb214a9f93012e54e!2sMotos+Maroto!5e0!3m2!1ses!2ses!4v1540805044919"></iframe>
						<br /> 925 74 57 59 <br /> 691 58 52 74 <br /> <a
							href="mailto:name@email.com">info@marotobikes.com</a>
					</div>
					<p class="lead mb-5">Maroto Bikes somos una empresa ubicada en La
						Puebla de Montalb&aacute;n con mucha experiencia en el
						&aacute;mbito de las dos ruedas, ya sean motos o bicicletas.
						Vendemos todo tipo de bicicletas, asesorando en todos los detalles
						al comprador. De igual forma reparamos aver&iacute;as y realizamos
						todo el mantenimiento que pueda necesitar.</p>
					<div class="social-icons">
						<!--a href="#">
	    							<i class="fab fa-twitter"></i>
	     					</a> -->
						<a href="#"> <i class="fab fa-facebook-f"></i>
						</a> <a href="#"> <i class="fab fa-google"></i>
						</a>
					</div>
				</div>
			</section>
	
			<hr class="m-0" />
	
			<section class="resume-section p-3 p-lg-5 d-flex flex-column"
				id="catalogue">
				<div class="my-auto">
					<h2 class="mb-5">Cat&aacute;logo</h2>
				</div>
				<div class="resume-item d-flex flex-column flex-md-row mb-5">
					<div class="resume-content">
						<div id="tab" class="tab">
							<button id="bikesTabButton" class="tablinks"
								onclick="openTab(event, 'bikesTab');">Bicicletas</button>
							<button id="motosTabButton" class="tablinks"
								onclick="openTab(event, 'motosTab');">Motos</button>
							<button id="othersTabButton" class="tablinks"
								onclick="openTab(event, 'othersTab');">Otros productos</button>
						</div>
	
						<div class="tabcontainer">
							<!-- Tab content -->
	
							<!-- BICICLETAS -->
							<div id="bikesTab" class="tabcontent">
								<span id="closeBikes" onclick="closeTab(event, this);"
									class="topright">&times;</span>
								<h3>Bicicletas</h3>
								<form>
									<span class="resultsNumber">Total resultados: <span
										class="blackResultsNumber">2</span></span>
									<div id="bikesOrder" class="order">
										<select id="bikesSelect" class="form-control"
											title="Seleccionar orden de resultados">
											<option value="ASC">Orden: Ascendente</option>
											<option value="DESC">Orden: Descendente</option>
										</select>
									</div>
									<div id="bikesForm" class="formDiv">
										<div id="bikesFilter" class="categoriesFilter">
											<span id="minFilterBikes" class="topright"
												onclick="minFilter(event, 'bikesFilters', 'maxFilterBikes', 'minFilterBikes');">-</span>
											<span id="maxFilterBikes" class="topright"
												onclick="maxFilter(event, 'bikesFilters', 'minFilterBikes', 'maxFilterBikes');">+</span>
											<span id="bikeFilterTitle" class="filterTitle">Filtros de
												b&uacute;squeda:</span>
											<div id="bikesFilters" class="categoriesFilters">
												<span class="parentFilter"> <input id="bikeFilter1"
													type="checkbox" name="bikes"
													onchange="markChildren(event, this, 'bikes');" />Bicicletas
													<span class="childFilter"> <input id="bikeFilter1-1"
														type="checkbox" name="bikes" />Monta&ntilde;a
												</span> <span class="childFilter"> <input id="bikeFilter1-2"
														type="checkbox" name="bikes" />Carretera
												</span>
												</span> <span class="parentFilter"> <input type="checkbox" />Equipaci&oacute;n
												</span> <span class="parentFilter"> <input type="checkbox" />Accesorios
												</span>
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
											<div id="bikesPages" class="pagination">
												<a class="page-item first-child"> <span class="page-link">
														&lt;&lt; </span>
												</a> <a class="page-item"> <span class="page-link"> &lt; </span>
												</a> <a class="page-item active"> <span class="page-link"> 1
												</span>
												</a> <a class="page-item"> <span class="page-link"> 2 </span>
												</a> <a class="page-item"> <span class="page-link"> 3 </span>
												</a> <a class="page-item"> <span class="page-link"> &gt; </span>
												</a> <a class="page-item last-child"> <span class="page-link">
														&gt;&gt; </span>
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
						<div class="subheading mb-3">Somos Partners oficiales de:</div>
						<div class="partner">
							<a href="https://www.vitoriabikes.es" class="nav-link"> <img
								src="./img/logos/logo-vitoria-bikes-bn.png" alt="Vitoria Bikes"
								title="Vitoria Bikes"
								onmouseover="this.src='./img/logos/logo-vitoria-bikes.png';"
								onmouseout="this.src='./img/logos/logo-vitoria-bikes-bn.png';" />
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
							<a href="https://www.legnanobici.com/"> <img
								src="./img/logos/logo-legnano-bn.png" alt="Legnano Bici"
								title="Legnano Bici"
								onmouseover="this.src='./img/logos/logo-legnano.png';"
								onmouseout="this.src='./img/logos/logo-legnano-bn.png';" />
							</a>
						</div>
						<div class="partner">
							<a href="http://www.gistitalia.com"> <img
								src="./img/logos/logo-gist-bn.jpg" alt="Gist Italia"
								title="Gist Italia"
								onmouseover="this.src='./img/logos/logo-gist.jpg';"
								onmouseout="this.src='./img/logos/logo-gist-bn.jpg';" />
							</a>
						</div>
						<div class="partner">
							<a href="https://www.sellesmp.com/es/"> <img
								src="./img/logos/logo-selle-smp-bn.png" alt="Selle SMP"
								title="Selle SMP"
								onmouseover="this.src='./img/logos/logo-selle-smp.png';"
								onmouseout="this.src='./img/logos/logo-selle-smp-bn.png';" />
							</a>
						</div>
						<div class="partner">
							<a href="https://www.santinisms.it/"> <img
								src="./img/logos/logo-santini-bn.jpg"
								alt="Santini Maglificio Sportivo"
								title="Santini Maglificio Sportivo"
								onmouseover="this.src='./img/logos/logo-santini.jpg';"
								onmouseout="this.src='./img/logos/logo-santini-bn.jpg';" />
							</a>
						</div>
						<div class="partner">
							<a href="https://www.evofinance.com/"> <img
								src="./img/logos/logo-evo-finance-bn.png" alt="EVO Finance"
								title="EVO Finance"
								onmouseover="this.src='./img/logos/logo-evo-finance.png';"
								onmouseout="this.src='./img/logos/logo-evo-finance-bn.png';" />
							</a>
						</div>
						<div class="partner">
							<a href="https://www.amv.es/"> <img
								src="./img/logos/logo-amv-bn.png" alt="Seguros AMV"
								title="Seguros AMV"
								onmouseover="this.src='./img/logos/logo-amv.png';"
								onmouseout="this.src='./img/logos/logo-amv-bn.png';" />
							</a>
						</div>
						<div class="partner">
							<a href="http://www.umglobal.com/es/"> <img
								src="./img/logos/logo-um-bn.png" alt="UM Motos" title="UM Motos"
								onmouseover="this.src='./img/logos/logo-um.png';"
								onmouseout="this.src='./img/logos/logo-um-bn.png';" />
							</a>
						</div>
						<div class="partner">
							<a href="http://www.agrocel.es/"> <img
								src="./img/logos/logo-agrocel-bn.jpg" alt="Agrocel"
								title="Agrocel"
								onmouseover="this.src='./img/logos/logo-agrocel.jpg';"
								onmouseout="this.src='./img/logos/logo-agrocel-bn.jpg';" />
							</a>
						</div>
						<div class="partner">
							<a href="http://www.motogarden.com/"> <img
								src="./img/logos/logo-motogarden-bn.jpg" alt="Motogarden"
								title="Motogarden"
								onmouseover="this.src='./img/logos/logo-motogarden.jpg';"
								onmouseout="this.src='./img/logos/logo-motogarden-bn.jpg';" />
							</a>
						</div>
						<div class="partner">
							<a href="https://www.husqvarna.com/es/"> <img
								src="./img/logos/logo-husqvarna-bn.png" alt="Husqvarna"
								title="Husqvarna"
								onmouseover="this.src='./img/logos/logo-husqvarna.png';"
								onmouseout="this.src='./img/logos/logo-husqvarna-bn.png';" />
							</a>
						</div>
						<div class="partner">
							<a href="https://www.stihl.es/"> <img
								src="./img/logos/logo-stihl-bn.png" alt="Stihl" title="Stihl"
								onmouseover="this.src='./img/logos/logo-stihl.png';"
								onmouseout="this.src='./img/logos/logo-stihl-bn.png';" />
							</a>
						</div>
						<div class="partner">
							<a href="http://ducatigarden.com/home/"> <img
								src="./img/logos/logo-ducati-bn.jpg"
								alt="Ducati Gardening Collection"
								title="Ducati Gardening Collection"
								onmouseover="this.src='./img/logos/logo-ducati.jpg';"
								onmouseout="this.src='./img/logos/logo-ducati-bn.jpg';" />
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
										<input class="form-control" id="name" type="text"
											placeholder="Nombre *" required="required"
											data-validation-required-message="Por favor, introduzca su nombre." />
										<p class="help-block text-danger"></p>
									</div>
									<div class="form-group">
										<input class="form-control" id="email" type="email"
											placeholder="Correo electr&oacute;nico *" required="required"
											data-validation-required-message="Por favor, introduzca su correo electr&oacute;nico." />
										<p class="help-block text-danger"></p>
									</div>
									<div class="form-group">
										<input class="form-control" id="phone" type="tel"
											placeholder="Tel&eacute;fono *" required="required"
											data-validation-required-message="Por favor, introduzca su tel&eacute;fono." />
										<p class="help-block text-danger"></p>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<textarea class="form-control" id="message"
											placeholder="Mensaje *" required
											data-validation-required-message="Por favor, introduzca su mensaje."></textarea>
										<p class="help-block text-danger"></p>
									</div>
								</div>
								<div class="col-lg-12 text-center">
									<input type="checkbox" name="politics" id="politics"
										onclick="formValidate();" required
										data-validation-required-message="La aceptaci&oacute;n de los t&eacute;rminos es obligatorio para enviar la solicitud" />
									<label class="checkboxcontainer"> Antes de enviar su solicitud,
										lea y acepte nuestra informaci&oacute;n b&aacute;sica sobre
										nuestra <a href="./content/avisoLegal.php" target="_blank">pol&iacute;tica
											de uso de datos</a> *
									</label>
								</div>
								<div class="col-lg-12 text-center">
									<div id="success"></div>
									<br />
									<button id="sendMessageButton"
										class="btn btn-primary btn-xl text-uppercase" disabled
										type="submit">Enviar</button>
								</div>
							</div>
							<div class="espacio"></div>
							<div class="row">
								<div class="col-lg-12 text-center">Web dise&ntilde;ada y
									realizada por "Maroto Bikes". Todos los derechos reservados.</div>
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