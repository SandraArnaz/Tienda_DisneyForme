<?php

set_include_path($_SERVER['DOCUMENT_ROOT'] . "/TIENDA_DISNEYFORME");

require_once('conexion.php');
require_once('app/controllers/adding_favorite.php');

$pdo = getConnection();

$controllerFav = new AddingFavoriteController($pdo);


$error = "";

//Si POST esta enviando alg y el product_fav tiene valor
if (isset($_POST) && isset($_POST["product_fav"])) {
	try {
		//Llamar a metodo addToFavorite pasandole el product_fav
		$controllerFav->deleteProductoFromAddingFavorite($_POST["product_fav"]);
		//Le redirige a la página que ha visitado antes de acceder aqui
		header("Location: " . $_SERVER['HTTP_REFERER']);
	} catch(Exception $e)  {
		$error = $e->getMessage();
	}
}

?>