<?php

require_once('app/models/user.php');

class UserController {

	private $connection;

	function __construct($connection) {
		$this->connection = $connection;
	}

	//Registrar al usuario
	public function register($email, $password) {

		//Buscar el correo en la base de datos
		$stmt = $this->connection->prepare("SELECT * FROM usuarios WHERE correo = :email");
		$stmt->execute(['email' => $email]); 

		$stmt->fetch();
		
		//Si hay alguna valor significa que el correo existe
		if ($stmt->rowCount() !== 0) {
			throw new Exception("el usuario existe");
		}

		//Crear un nuevo hash de la contraseña
		$password = password_hash($password, PASSWORD_DEFAULT);

		//Insertar el usuario
		$stmt = $this->connection->prepare("INSERT INTO usuarios (correo, contraseña) VALUES (:email, :pass)");
		$stmt->execute(['email' => $email, 'pass' => $password]); 
	}

	//Iniciar sesion
	public function login($email, $password) {

		//Buscar el correo en la base de datos
		$stmt = $this->connection->prepare("SELECT * FROM usuarios WHERE correo = :email");
		$stmt->execute(['email' => $email]); 

		$user = $stmt->fetch();

		//Si el numero de filas afectadas por la ultima sentencia es 0
		// Y si la contraseña no coincide coincide con un hash
		if ($stmt->rowCount() === 0 || !password_verify($password, $user["contraseña"])) {
			throw new Exception("login invalido");
		}
		
		//Guarda en una sesion al usuario
		$_SESSION["user"] = serialize(new User($user["idUusuario"], $user["correo"]));
	}

	//Destruye la session al cerrar sesión 
	public function logout() {
		session_destroy();
	}

}

?>

