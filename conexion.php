<?php 


	global $dbh;

	
	function getConnection() {
		global $dbh;
		if (isset($dbh)) {
			return $dbh;
		}
		// Cambiar en el caso en que se monte la base de datos en otro lugar
		$user = "root";
		$pass = "";

		//Establecemos la conexion con la base de datos
		$dbh = new PDO('mysql:host=localhost;dbname=tienda;charset=utf8', $user, $pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	
		
		return $dbh;
	}


	function cerrarConexion($conexion) {
		mysqli_close($conexion);
	}


?>