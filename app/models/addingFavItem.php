<?php

class AddingFavItem {
	public $producto;
	public $cantidad;

	function __construct($product){
		$this->producto = $product;
		$this->cantidad = 1;
	}

	//Devuelve true si el producto que le pasamos es igual al que ya tenia 
	function equals($product) {
		return $this->producto->idProducto === $product->producto->idProducto;
	}

	//Al llamar al metodo que es despues de ver que los productos son iguales
	//Aumenta el atributo de cantidad en 1
	function increment() {
		$this->cantidad = $this->cantidad + 1;
	}

	//Al llamar al metodo para eliminar un producto
	//Disminuye el atributo de cantidad en 1
	function decrement() {
		$this->cantidad = $this->cantidad - 1;
	}

}

?>