<?php

require_once('app/models/category.php');

class CategoryController {

	private $connection;

	function __construct($connection) {
		$this->connection = $connection;
	}

	//Listar todas las categorias 
	public function list() {
		$stmt = $this->connection->query("SELECT * FROM categoria");
		//Almacena todos los valores en un array con nombre data
		$data = $stmt->fetchAll();
		$categories = [];

		//Recorre el array con las filas de la tabla
		foreach ($data as $row) {
			//Anexa al final los valores de un objeto category en el array de categories 
			$categories = array_merge($categories, [new Category(
				$row['idCategoria'], 
				$row['nombreCategoria'],
			)]);
		}

		return $categories;
	}

}

?>


