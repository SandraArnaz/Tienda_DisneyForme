<?php

set_include_path($_SERVER['DOCUMENT_ROOT'] . "/TIENDA_DISNEYFORME");


require_once('conexion.php');
require_once('app/controllers/adding_favorite.php');

$pdo = getConnection();

$controllerFav = new AddingFavoriteController($pdo);

$error = "";

//Si POST esta enviando alg y el favorite_id tiene valor
if (isset($_POST) && isset($_POST["favorite_id"])) {
	try {
		//Llamar a metodo addToFavorite pasandole el favorite_id
		$controllerFav->addToFavorite($_POST["favorite_id"]);
		//Le redirige a la página que ha visitado antes de acceder aqui
		header("Location: " . $_SERVER['HTTP_REFERER']);
	} catch(Exception $e)  {
		$error = $e->getMessage();
	}
}

?>