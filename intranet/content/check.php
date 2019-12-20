<?php

    namespace intranet\content;

	session_start ();
	
	// Carga de combos
	$root = realpath($_SERVER["DOCUMENT_ROOT"]) . "\MotosMaroto";
	require $root . '\php\controller\InitController.php';
	
	use php\controller\InitController;
	
    /* Establecer la codificación de caracteres interna a UTF-8 */
    mb_internal_encoding('UTF-8');
    mb_http_output('UTF-8');
	
    // Envío del usuario y la clave a las variables de sesión
    $user = $_POST ['user'];
    $password = $_POST ['password'];
	
	// Conexión a la base de datos
	// Declaración e inicialización de objetos
	$initController = new InitController();
	$userAux = $initController->getUserByNick($user);
	
	if ($userAux->getNick() == $user && crypt($password, CRYPT_SALT_LENGTH) === $userAux->getPassword() && $userAux->getActive()) { // Si es el administrador...
        // Usuario y contraseña a variables de sesión
        $_SESSION ['user'] = $userAux->getNick();
        $_SESSION ['user_id'] = $userAux->getId();
        $_SESSION ['user_name'] = $userAux->getName();
        $_SESSION ['user_surname'] = $userAux->getSurname();
        $_SESSION ['user_password'] = $userAux->getPassword();
		header ( "Location: ./admin.php" ); // Redireccionar
	} else { // No es el usuario administrador
		resetSession ();
		$_SESSION ['error_message'] = "* Error de validaci&oacute;n. Usuario y/o contrase&ntilde;a incorrectos.";
		// Revisar mensaje
		header ( "Location: ../login.php" ); // Redireccionar
	}
	
	/**
	 * Función que resetea las variables de usuario de sesión cuando el logeo es incorrecto 
	 */
	function resetSession() {
		$_SESSION ['user'] = '';
		$_SESSION ['password'] = '';
		$_SESSION ['user_name'] = '';
		$_SESSION ['user_surname'] = '';
		$_SESSION ['user_password'] = '';
	} // End resetSession

	// mysql_close();
?>