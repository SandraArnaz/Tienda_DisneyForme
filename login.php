<?php 
	
	session_start();

	require_once('conexion.php');
	require_once('app/controllers/user.php');

	$pdo = getConnection();

	$controller = new UserController($pdo);
    //Si tiene valor email guarda ese valor en variable sino guarda 1
	$email = isset($_POST["email"]) ? $_POST["email"] : 1;
    //Si tiene valor email guarda ese valor en variable sino guarda vacio
	$password = isset($_POST["password"]) ? $_POST["password"] : "";
	$error = "";

	try {
        //Si la variable email y la de password tiene valor llamar al metodo login
        //Despues redireccionar a la pagina de index
		if (!empty($email) && !empty($password)) {
			$controller->login($email, $password);
			header("Location: /TIENDA_DISNEYFORME/index.php");
			die();
		}
	} catch(Exception $e)  {
		$error = $e->getMessage();
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda DisneyForme - Pagina Inicio de Sesión</title>

    <!-- Bootstap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!--CSS -->
    <link rel="stylesheet" href="CSS/estiloFormulario.css">

</head>

<body>
    
    <!-- Navegabilidad -->
    <header class="header-style-1">

        <?php include('comun/top_header.php');?>
        <?php include('comun/nav_header.php');?>
    </header>

    <div class="d-flex justify-content-evenly">

        <form action="" method="post" name="login" class="enmarcar">

            <legend>Acceso </legend>

            <div class="mb-3">

                <label for="email" class="form-label">Correo</label>
                <input type="email" class="form-control" id="email"  name="email" aria-describedby="emailHelp">
                
            </div>

            <div class="mb-3">

                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password">
                
            </div>

			<div class="d-flex justify-content-between">
                <!--Con onclick llamamos a funcion de javascript para validar -->
				<button type="submit" class="btn btn-primary" value="acceder" onclick = "validarAcceso()">Acceder</button>
	
				<a class="nav-link " aria-current="page" href="register.php">
					Registro
				</a>

			</div>
						
			<?php if (!empty($error)): ?>

				<div class="alert alert-danger" role="alert">
					<?=$error?>
				</div>

			<?php endif; ?>

        </form>

    </div>

    <!-- Popper JS Bootstap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" 
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" 
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

    <!-- Bootstap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <!-- JS -->
    <script src="JS/login.js"></script>

</body>
</html>