<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
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
	</head>

	<body id="page-top" onload="openTab(event, 'bikesTab');">
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
	    	<a class="navbar-brand js-scroll-trigger" href="#page-top">
	        	<span class="d-block d-lg-none">Maroto Bikes</span>
	        	<span class="d-none d-lg-block">
					<img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="./img/mm_logo.jpg" alt="" />
				</span>
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
						<a class="nav-link js-scroll-trigger" href="#skills">Pol&iacute;tica de Cookies</a>
					</li>
					<li class="nav-item">
						<a class="nav-link js-scroll-trigger" href="#interests">Aviso Legal</a>
					</li>
				</ul>
			</div>
		</nav>
	
	    <div class="container-fluid p-0">
			<section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
				<div class="my-auto">
					<div id="mainTitle" class="mainTitle">
    					<h1 class="mb-0">
    						Maroto
    						<span class="text-primary">Bikes</span>
    					</h1>
					</div>
					<div class="subheading mb-5">
						<p>
							<span class="place">&iquest;D&oacute;nde estamos?</span>
						</p>
						<p>
   							<span>Calle Anastasio Oliva 5, La Puebla de Montalb&aacute;n, 45516 (Toledo)</span>
   						</p>
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1287.562737310211!2d-4.363894685245855!3d39.86622855723823!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd6a7faf270034e9%3A0xb214a9f93012e54e!2sMotos+Maroto!5e0!3m2!1ses!2ses!4v1540805044919"></iframe>
						<br />
						925 74 57 59
						<br />
						<a href="mailto:name@email.com">info@marotobikes.com</a>
					</div>
					<p class="lead mb-5">I am experienced in leveraging agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition.</p>
					<div class="social-icons">
						<!--a href="#">
    							<i class="fab fa-twitter"></i>
     					</a> -->
						<a href="#">
							<i class="fab fa-facebook-f"></i>
						</a>
						<a href="#">
							<i class="fab fa-google"></i>
						</a>
					</div>
				</div>
			</section>
	
			<hr class="m-0" />
	
			<section class="resume-section p-3 p-lg-5 d-flex flex-column" id="catalogue">
				<div class="my-auto">
					<h2 class="mb-5">Cat&aacute;logo</h2>
		
					<div class="resume-item d-flex flex-column flex-md-row mb-5">
						<div class="resume-content">
							<div id="tab" class="tab">
								<button id="bikesTabButton" class="tablinks" onclick="openTab(event, 'bikesTab');">Bicicletas</button>
								<button id="motosTabButton" class="tablinks" onclick="openTab(event, 'motosTab');">Motos</button>
								<button id="othersTabButton" class="tablinks" onclick="openTab(event, 'othersTab');">Otros productos</button>
                            </div>
                            
                            <div class="tabcontainer">
    							<!-- Tab content -->
    							
    							<!-- BICICLETAS -->
                                <div id="bikesTab" class="tabcontent">
                                	<span id="closeBikes" onclick="closeTab(event, this);" class="topright">&times;</span>
    								<h3>Bicicletas</h3>
    								<form>
    									<span class="resultsNumber">Total resultados: <span class="blackResultsNumber">2</span></span>
        								<div id="bikesOrder" class="order">
        									<select id="bikesSelect" title="Seleccionar orden de resultados">
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
                									<span class="parentFilter">
                										<input id="bikeFilter1" type="checkbox" name="bikes" onchange="markChildren(event, this, 'bikes');" />Bicicletas
                										<span class="childFilter">
                    										<input id="bikeFilter1-1" type="checkbox" name="bikes" />Monta&ntilde;a
                    									</span>
                    									<span class="childFilter">
                    										<input id="bikeFilter1-2" type="checkbox" name="bikes" />Carretera
                    									</span>
                									</span>
                									<span class="parentFilter">
                										<input type="checkbox" />Equipaci&oacute;n
                									</span>
                									<span class="parentFilter">
                										<input type="checkbox" />Accesorios
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
            									<div id="bikesPages" class="pages">
            										1, 2, 3
            									</div>
            								</div>
            							</div>
        							</form>
                                </div>
                                
                                <!-- MOTOS -->
                                <div id="motosTab" class="tabcontent">
                                	<span onclick="closeTab(event, this);" class="topright">&times;</span>
    								<h3>Motos</h3>
    								<p>Paris is the capital of France.</p>
                                </div>
                                
                                <!-- OTROS -->
                                <div id="othersTab" class="tabcontent">
                                	<span onclick="closeTab(event, this);" class="topright">&times;</span>
    								<h3>Otros</h3>
    								<p>Paris is the capital of France.</p>
                                </div>
    						</div>
						</div>
					</div>
					
					<!-- PARTNERS -->					
					<div class="resume-item d-flex flex-column flex-md-row mb-5">
						<div class="resume-content mr-auto">
							<div class="subheading mb-3">Somos Partners oficiales de:</div>
							<div class="partner">
								<a href="https://www.vitoriabikes.es">
									<img src="./img/logos/vitoria-bikes-logo.png" />
								</a>	
							</div>
							<div class="partner">
								<a href="https://www.sellesmp.com/es/">
									<img src="./img/logos/selle-smp.png" />
								</a>	
							</div>
							<div class="partner">
								<a href="https://www.amv.es/">
									<img src="./img/logos/logo_amv.png" />
								</a>	
							</div>
						</div>
					</div>
	
    				<div class="resume-item d-flex flex-column flex-md-row mb-5">
    					<div class="resume-content mr-auto">
    						<h3 class="mb-0">Web Developers</h3>
    						<div class="subheading mb-3">Intelitec Solutions</div>
    						<p>Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.</p>
    					</div>
    					<div class="resume-date text-md-right">
    						<span class="text-primary">December 2011 - March 2013</span>
    					</div>
    				</div>
 
    			</div>
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
	
			<section class="resume-section p-3 p-lg-5 d-flex flex-column" id="contact">
				<div class="my-auto">
					<h2 class="mb-5">Contacto</h2>
					<ul class="fa-ul mb-0">
						<li>
							<i class="fa-li fa fa-trophy text-warning"></i>
							Google Analytics Certified Developer
						</li>
						<li>
							<i class="fa-li fa fa-trophy text-warning"></i>
							Mobile Web Specialist - Google Certification
						</li>
						<li>
							<i class="fa-li fa fa-trophy text-warning"></i>
							1<sup>st</sup>
							Place - University of Colorado Boulder - Emerging Tech Competition 2009
						</li>
						<li>
							<i class="fa-li fa fa-trophy text-warning"></i>
							1<sup>st</sup>
							Place - University of Colorado Boulder - Adobe Creative Jam 2008 (UI Design Category)
						</li>
						<li>
							<i class="fa-li fa fa-trophy text-warning"></i>
							2<sup>nd</sup>
							Place - University of Colorado Boulder - Emerging Tech Competition 2008
						</li>
						<li>
							<i class="fa-li fa fa-trophy text-warning"></i>
							1<sup>st</sup>
							Place - James Buchanan High School - Hackathon 2006
						</li>
						<li>
							<i class="fa-li fa fa-trophy text-warning"></i>
							3<sup>rd</sup>
							Place - James Buchanan High School - Hackathon 2005
						</li>
					</ul>
				</div>
				<div class="row">
				<div class="col-lg-12">
					<form id="contactForm" name="sentMessage" novalidate>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<input class="form-control" id="name" type="text" placeholder="Nombre *" required="required" data-validation-required-message="Por favor, introduzca su nombre." />
									<p class="help-block text-danger"></p>
								</div>
								<div class="form-group">
									<input class="form-control" id="email" type="email" placeholder="Correo electr&oacute;nico *" required="required" data-validation-required-message="Por favor, introduzca su correo electr&oacute;nico." />
									<p class="help-block text-danger"></p>
								</div>
								<div class="form-group">
									<input class="form-control" id="phone" type="tel" placeholder="Tel&eacute;fono *" required="required" data-validation-required-message="Por favor, introduzca su tel&eacute;fono." />
									<p class="help-block text-danger"></p>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<textarea class="form-control" id="message" placeholder="Mensaje *" required data-validation-required-message="Por favor, introduzca su mensaje."></textarea>
									<p class="help-block text-danger"></p>
								</div>
							</div>
							<div class="col-lg-12 text-center">
								<label class="checkboxcontainer">
									<input type="checkbox" name="politics" id="politics" onclick="formValidate();" required data-validation-required-message="La aceptación de los términos es obligatorio para enviar la solicitud" />
									Antes de enviar su solicitud, lea y acepte nuestra información básica sobre nuestra <a data-toggle="modal" href="#avisoLegal">política de uso de datos</a> *
								</label>
							</div>
							<div class="col-lg-12 text-center">
								<div id="success"></div>
								<br />
								<button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" disabled type="submit">Enviar</button>
							</div>
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