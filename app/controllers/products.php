<?php

if(!isset($_SESSION)) { 
		session_start(); 
} 

require_once('app/models/product.php');
require_once('app/models/shoppingCart.php');

class ProductsController {

	private $connection;

	function __construct($connection) {
		$this->connection = $connection;
	}

	//Lista todos los productos de la base de datos 
	public function list($category, $search = "") {
		
		//Si esta vacia 
		if (empty($search)) {
			//Rescata los productos por el idCategoria 
			$stmt = $this->connection->prepare("SELECT * FROM productos WHERE idCategoria=:idCategoria");
			$stmt->execute(['idCategoria' => $category]); 
		} else {
			//Rescata los productos que coincidan con el nombre que se le ha pasado para buscar 
			$stmt = $this->connection->prepare("SELECT * FROM productos WHERE idCategoria=:idCategoria AND nombreProducto LIKE :nombreProducto");
			$stmt->execute(['idCategoria' => $category, 'nombreProducto' => "%" . $search . "%"]); 
		}
		$data = $stmt->fetchAll();
		$products = [];

		foreach ($data as $row) {
			$products = array_merge($products, [new Product(
				$row['idProducto'], 
				$row['nombreProducto'], 
				$row['descripción'], 
				$row['precio'], 
				$row['imagen'], 
				$row['idCategoria'], 
				$row['idSubcategoria'],
			)]);
		}

		return $products;
	}
	
}

?>


