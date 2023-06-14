<?php

if(!isset($_SESSION)) { 
		session_start(); 
} 

require_once('app/models/product.php');
require_once('app/models/shoppingCart.php');
require_once('app/models/pedido.php');
require_once('app/models/shoppingCartItem.php');
require_once('app/models/user.php');

class PedidosController {

	private $connection;

	function __construct($connection) {
		$this->connection = $connection;
	}

	//Lista los pedidos realizados por un usuario
	public function list() {
		//Si la session de usuario no tiene valor
		if (!isset($_SESSION["user"])) {
			throw new Exception("no logeado");
		}

		//Saca el usuario 
		$user = unserialize($_SESSION["user"]);

		$this->connection->beginTransaction();
		$stmt = $this->connection->prepare("
			SELECT * FROM tienda.pedidos 
			left join linea_pedidos ON pedidos.idPedido = linea_pedidos.id_pedido
			left join productos ON productos.idProducto = linea_pedidos.id_producto
			WHERE idUsuario = '$user->id';"
		);
		//Ejecuta consulta SQL
		$stmt->execute();
		$data = $stmt->fetchAll();
		$datos = [];
		$pedidos = [];

		//Recorre filas rescatadas de base de datos que guardamos en array
		foreach ($data as $row) {
			$pedido = new Pedido($row["idPedido"], $row["created_at"]);
			$product = new Product(
				$row["idProducto"],
				$row["nombreProducto"],
				$row["descripción"],
				$row["precio"],
				$row["imagen"],
				$row["idCategoria"],
				$row["idSubcategoria"],
			);
			
			$item = new ShoppingCartItem($product, $row["cantidad"]);

			//Accede al ide de cada pedido, se lo pone camo indice del array de datos
			if (isset($datos[$row["idPedido"]])) {
				//La variable cogera el valor del pedido que este en esa posicion 
				$pedido = $datos[$row["idPedido"]];
			}
			//Llama a metodo pasandole un producto 
			$pedido->addProduct($item);
			//En la posicion marcada por el numero de idPedido le asigna el valor del pedido
			$datos[$row["idPedido"]] = $pedido;
		}

		//Recorre array datos que tiene objetos pedido
		foreach ($datos as $pedido) {
			//Array guarda al final del array pedidos el nuevo Pedido
			$pedidos = array_merge($pedidos, [$pedido]);
		}

		return $pedidos;
	}


}

?>


