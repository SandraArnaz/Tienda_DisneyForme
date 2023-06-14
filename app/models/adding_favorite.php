<?php

require_once('app/models/addingFavItem.php');

class AddingFavorite {
	public $items;

	function __construct(){
		$this->items = [];
	}
	
	//Añade el producto que le pasamos a la lista vacia que tenemos como atributo en la clase
	function addFav($product) {
	
        $newItem = new AddingFavItem($product);
		$items = [];
		$hasAdded = false;

        foreach ($this->items as $item) {
			if ($item->equals($newItem)) {
				$item->increment();
				$hasAdded = true;
			}
			$items = array_merge($items, [$item]);
		}

		if (!$hasAdded) {
			$items = array_merge($items, [$newItem]);
		}

		$this->items = $items;

	}

	//Elimina el producto que le pasamos de la lista que tenemos como atributo en la clase
	function deleteFav($product) {

		$newItem = new AddingFavItem($product);
		$items = [];

		foreach ($this->items as $item) {
			if ($item->equals($newItem)) {
				$item->decrement();
			}
			if ($item->cantidad !== 0) {
				$items = array_merge($items, [$item]);
			}
		}

		$this->items = $items;
		
	}
	
}

?>