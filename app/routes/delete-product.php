<?php

set_include_path($_SERVER['DOCUMENT_ROOT'] . "/TIENDA_DISNEYFORME");

require_once('conexion.php');
require_once('app/controllers/shopping_cart.php');

$pdo = getConnection();

$controller = new ShoppingCartController($pdo);

$error = "";

////Si POST esta enviando alg y el product_id tiene valor
if (isset($_POST) && isset($_POST["product_id"])) {
	try {
		//Llamar a metodo addToFavorite pasandole el product_id
		$controller->deleteProductoFromShoppingCart($_POST["product_id"]);
		//Le redirige a la página que ha visitado antes de acceder aqui
		header("Location: " . $_SERVER['HTTP_REFERER']);
	} catch(Exception $e)  {
		$error = $e->getMessage();
	}
}

?>