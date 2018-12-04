<?php
	session_start();
	
	// Envío del usuario y la clave a las variables de sesión
	$user = $_POST['user'];
	$password = $_POST['password'];
	
	// Usuario y contraseña a variables de sesión
	$_SESSION['user'] = $user;
	$_SESSION['password'] = $password;
	
	// Conexión a la base de datos
	/*
	$conexion = mysql_connect("localhost", "root", "root");
	mysql_select_db("tienda", $conexion);
	mysql_query("SET NAMES 'utf8'");
	*/
	
	// Seleccionar todos los datos del usuario a loguear en el sistema
	/*
	$resul = mysql_query("SELECT * FROM CLIENTES WHERE LOGIN=trim('".$usuario."')", $conexion) or die ("No funciona");
	$fila = mysql_fetch_array($resul);
	$_SESSION['userInfo'][] = $fila;
	$_SESSION['userName'] = $fila['NOMBRE'];
	*/
	
	// TODO cambiar por varible cuando se llame a BBDD 
	if ("root" == $user) {// Si es el administrador...  
	    if ("root" == $password) { // Si la clave del administrador coincide con la almacenada en BD
	        header("Location: ./admin.php"); // Redireccionar
	    } else {
	        resetSession();
	        // Revisar mensaje
	        header("Location: ../login.php"); // Redireccionar
	    }
	} else { // No es el usuario administrador
		resetSession();
		// Revisar mensaje
		header("Location: ../login.php"); // Redireccionar
	}
	
	
	// Función que resetea las variables de usuario de sesiÃ³n cuando el logeo es incorrecto
	function resetSession() {
		$_SESSION['user'] = '';
		$_SESSION['password'] = '';
	} // End resetSession
	
	//mysql_close();
?>