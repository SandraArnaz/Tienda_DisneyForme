<?php

class Product {
	public $idProducto;
	public $nombreProducto;
	public $descripción;
	public $precio;
	public $imagen;
	public $idCategoria;
	public $idSubcategoria;

	function __construct($idProducto, $nombreProducto, $descripción, $precio, $imagen, $idCategoria, $idSubcategoria){
		$this->idProducto = $idProducto;
		$this->nombreProducto = $nombreProducto;
		$this->descripción = $descripción;
		$this->precio = $precio;
		$this->imagen = $imagen;
		$this->idCategoria = $idCategoria;
		$this->idSubcategoria = $idSubcategoria;
	}
	
}

?>