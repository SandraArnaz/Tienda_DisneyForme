<?php

if(!isset($_SESSION)) { 
		session_start(); 
} 

require_once('app/models/product.php');
require_once('app/models/shoppingCart.php');
require_once('app/models/user.php');

class ShoppingCartController {

	private $connection;

	function __construct($connection) {
		$this->connection = $connection;
	}

	//Comprar los productos
	public function buy() {
		//Si la session no tiene valor
		if (!isset($_SESSION["shopping_cart"])) {
			throw new Exception("no hay productos");
		}
		//Saca valor de las sessiones
		$shoppingCart = unserialize($_SESSION["shopping_cart"]);
		$user = unserialize($_SESSION["user"]);

		//Descativar el modo autocommit
		//Mientras este desactivado no se guardan cambios en BBDD hasta que se haga commit
		$this->connection->beginTransaction();
		$stmt = $this->connection->prepare("INSERT INTO pedidos (idUsuario, created_at) VALUES (:id_user, :created_at)");
		$stmt->execute(['id_user' => $user->id, 'created_at' => date('Y-m-d H:i:s')]);
		//Rescatar el id de la ultima fila insertada
		$idPedido = $this->connection->lastInsertId();

		//Insertar en tabla recorriendo items sacados de la session
		foreach($shoppingCart->items as $item){
				$sql = "INSERT INTO linea_pedidos (id_producto, id_pedido, cantidad) VALUES (:id_producto, :id_pedido, :cantidad)";
		
				$stmt = $this->connection->prepare($sql);
				$stmt->execute([
					"id_producto" => $item->producto->idProducto, 
					"id_pedido" => $idPedido,
					"cantidad" => $item->cantidad,
					]);
		}

		$this->connection->commit();

		$shoppingCart = new ShoppingCart();
		//Pone la sesseion con un nuevo objeto shoppingcart que tendra una lista de items vacia
		$_SESSION["shopping_cart"] = serialize($shoppingCart);
	}

	//Agregar productos a la lista dado un id de producto y esa lista a una session
	public function addToCart($productId) {

		//Crear un objeto ShoppingCart que este creara una lista de items
		$shoppingCart = new ShoppingCart();
		//Si la sesion tiene datos sacalos y guardalos en variable que tenia el objeto con la lista vacia
		if (isset($_SESSION["shopping_cart"])) {
			$shoppingCart = unserialize($_SESSION["shopping_cart"]);
		}
		$stmt = $this->connection->prepare("SELECT * FROM productos WHERE idProducto = :productId");
		$stmt->execute(['productId' => $productId]); 

		////Abre un puntero listo para recorrer los datos uno por uno
		$row = $stmt->fetch();

		////Si el numero de filas de la ultima sentencia es 0
		if ($stmt->rowCount() === 0) {
			throw new Exception("producto invalido");
		}

		//Llama al metodo addProduct y le pasa un objeto producto que añadira producto a la lista
		//Al objeto producto le mete de valor de cada campo rescatado
		$shoppingCart->addProduct(new Product(
			$row['idProducto'], 
			$row['nombreProducto'], 
			$row['descripción'], 
			$row['precio'], 
			$row['imagen'], 
			$row['idCategoria'], 
			$row['idSubcategoria'],
		));
		
		//A la sesion le añade el objeto guardado en la variable
		//Ese objeto tiene una lista de items (objetos con cantidad)
		$_SESSION["shopping_cart"] = serialize($shoppingCart);
	}

	//Borrar productos de la lista y agregar la nueva lista sin producto a la sesion 
	public function deleteProductoFromShoppingCart($productId) {

		//Crear nuevo objeto que tiene una lista vacia
		$shoppingCart = new ShoppingCart();
		//Si la sesion tiene valor
		if (isset($_SESSION["shopping_cart"])) {
			//Asignarle el valor de la sesion a la variable creada antes 
			$shoppingCart = unserialize($_SESSION["shopping_cart"]);
		}
		$stmt = $this->connection->prepare("SELECT * FROM productos WHERE idProducto = :productId");
		$stmt->execute(['productId' => $productId]); 

		$row = $stmt->fetch();

		if ($stmt->rowCount() === 0) {
			throw new Exception("producto invalido");
		}

		//Llama al metodo addFav y le pasa un objeto producto que va a borrar de la lista
		$shoppingCart->deleteProduct(new Product(
			$row['idProducto'], 
			$row['nombreProducto'], 
			$row['descripción'], 
			$row['precio'], 
			$row['imagen'], 
			$row['idCategoria'], 
			$row['idSubcategoria'],
		));
		
		//A la sesion le añade el objeto guardado en la variable
		//Ese objeto tiene una lista de items (objetos con cantidad)
		$_SESSION["shopping_cart"] = serialize($shoppingCart);
	}

}

?>


