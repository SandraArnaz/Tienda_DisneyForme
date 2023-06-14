<?php 
	
	session_start();

	require_once('conexion.php');
	require_once('app/controllers/user.php');

	$pdo = getConnection();

	$controller = new UserController($pdo);
	//Llamar a metodo logout
	$controller->logout();
	//Redirigir a pagina index
	header("Location: /TIENDA_DISNEYFORME/index.php");
	die();
	
?>
