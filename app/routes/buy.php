<?php

set_include_path($_SERVER['DOCUMENT_ROOT'] . "/TIENDA_DISNEYFORME");

require_once('conexion.php');
require_once('app/controllers/shopping_cart.php');

$pdo = getConnection();

$controller = new ShoppingCartController($pdo);

$error = "";
try {
	//Llama al metodo buy
	$controller->buy();
	//Le redirige a la página que ha visitado antes de acceder aqui
	header("Location: " . $_SERVER['HTTP_REFERER']);
} catch(Exception $e)  {
	$error = $e->getMessage();
}

print_r($error);

?>