<?php

class Category {
	public $idCategoria;
	public $nombreCategoria;

	function __construct($idCategoria, $nombreCategoria){
		$this->idCategoria = $idCategoria;
		$this->nombreCategoria = $nombreCategoria;
	}
	
}

?>