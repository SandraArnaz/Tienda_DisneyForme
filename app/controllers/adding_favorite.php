<?php

if(!isset($_SESSION)) { 
		session_start(); 
} 

require_once('app/models/product.php');
require_once('app/models/adding_favorite.php');

class AddingFavoriteController {

	private $connection;

	function __construct($connection) {
		$this->connection = $connection;
	}

	//Agregar productos a la lista dado un id de producto y esa lista a una session
	public function addToFavorite($productId) {

		//Crear un objeto AddinfFavorite que este creara una lista de items
        $addingFav = new AddingFavorite();

		//Si la sesion tiene datos sacalos y guardalos en variable que tenia el objeto con la lista vacia
        if (isset($_SESSION["adding_fav"])) {
            $addingFav = unserialize($_SESSION["adding_fav"]);
        }

		//Preparar la consulta con el atributo de conexion 
        $stmt = $this->connection->prepare("SELECT * FROM productos WHERE idProducto = :productId");
		//Ejecutar la consulta
        $stmt->execute(['productId' => $productId]);

		//Abre un puntero listo para recorrer los datos uno por uno
        $row = $stmt->fetch();

		//Si el numero de filas de la ultima sentencia es 0
        if ($stmt->rowCount() === 0) {
			throw new Exception("producto invalido");
		}

		//Llama al metodo addFav y le pasa un objeto producto que añadira producto a la lista
		//Al objeto producto le mete de valor de cada campo rescatado
        $addingFav->addFav(new Product(
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
        $_SESSION["adding_fav"] = serialize($addingFav);

	}

	//Borrar productos de la lista y agregar la nueva lista sin producto a la sesion 
	public function deleteProductoFromAddingFavorite($productId) {

		//Crear nuevo objeto que tiene una lista vacia
		$addingFav = new AddingFavorite();

		//Si la sesion tiene valor
		if (isset($_SESSION["adding_fav"])) {
			//Asignarle el valor de la sesion a la variable creada antes 
			$addingFav = unserialize($_SESSION["adding_fav"]);
		}
		$stmt = $this->connection->prepare("SELECT * FROM productos WHERE idProducto = :productId");
		$stmt->execute(['productId' => $productId]); 

		$row = $stmt->fetch();

		if ($stmt->rowCount() === 0) {
			throw new Exception("producto invalido");
		}

		//Llama al metodo deleteFav y le pasa un objeto producto que va a borrar de la lista
		$addingFav->deleteFav(new Product(
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
		$_SESSION["adding_fav"] = serialize($addingFav);
	}
		
}

?>
