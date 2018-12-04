<?php

	if ($_SESSION['user'] == "" || $_SESSION['user'] == null) { // Usuario no logueado
		header('Location: ../../index.php'); // Redirige al index
	} else { // Usuario logueado
		$url = $_SERVER['REQUEST_URI']; // URL de la p�gina actual
		
		/* **** COMPROBANDO LA DIRECCI�N DONDE QUIERE ENTRAR *** */
		if ($_SESSION['user'] == "root") { // Usuario administrador
			if (strpos($url, 'admin') === false) { // Quiere entrar a directorio de usuario normal
				header('Location: ../admin.php');
			} // End if
		} else { // Usuario normal
			if (strpos($url, 'user') === false) { // Quiere entrar a directorio de usuario administrador
				header('Location: ../../index.php');
			} // End if
		} // End else
	} // End else
	
?>