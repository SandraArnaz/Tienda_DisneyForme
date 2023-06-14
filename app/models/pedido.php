<?php

require_once('app/models/shoppingCartItem.php');

class Pedido {
	public $items;
	public $id;
	public $created_at;

	function __construct($id, $created_at){
		$this->items = [];
		$this->id = $id;
		$this->created_at = $created_at;
	}

	function addProduct($item) {
		$this->items = array_merge($this->items, [$item]);
	}

	function numberProducts() {
		$numberProducts = 0;

		foreach ($this->items as $item) {
			$numberProducts += $item->cantidad;
		}

		return $numberProducts;
	}

	function totalPrice() {
		$totalPrice = 0;

		foreach ($this->items as $item) {
			$totalPrice += $item->totalPrice();
		}

		return $totalPrice;
	}
}

?>