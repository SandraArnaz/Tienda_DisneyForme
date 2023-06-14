<?php 
	
	session_start();

	require_once('conexion.php');
	require_once('app/controllers/products.php');

	$pdo = getConnection();

	$controller = new ProductsController($pdo);
	//Si categoy tiene valor asignarle a la variable el valor de category
	$category = isset($_GET["category"]) ? $_GET["category"] : 1;
	//Si search tiene valor asignarle a la variable el valor de search
	$search = isset($_GET["search"]) ? $_GET["search"] : "";
	//LLamar a metodo list pasandole la variable category y la variable search
	//Guardar en variable el array que devuelve el metodo
	$products = $controller->list($category, $search);


?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda DisneyForme - Pagina Disney</title>

    <!-- Bootstap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" 
		crossorigin="anonymous">

	<!--CSS -->  
    <link rel="stylesheet" href="CSS/styleProduct.css">
	<link rel="stylesheet" href="CSS/styleLetter.css">	

</head>
<body>
    
    <!-- Navegabilidad -->
    <header class="header-style-1">

        <?php include('comun/top_header.php');?>
        <?php include('comun/nav_header.php');?>

    </header>

	<?php if (!empty($error)): ?>

		<div class="alert alert-danger" role="alert">
			<?=$error?>
		</div>

	<?php endif; ?>

	<div class="container d-flex flex-wrap align-items-center">
		<!--Recorrer el array con productos para mostrarlos -->
		<?php foreach ($products as $product): ?>

			<div class="card product">

				<img class="card-img-top productImg" src="<?=$product->imagen?>" alt="Card image cap">

				<div class="card-body">

					<h5 class="card-title letterTitle"><?=$product->nombreProducto?></h5>
					<p class="card-text letterText"><?=$product->descripción?></p>
					<p class="card-text letterPrice" id="price"><?=$product->precio?>€</p>
					
					<!-- Si la session de usuario tiene valor mostrar -->
					<?php if (isset($_SESSION["user"])): ?>

						<form class="d-flex" action="/TIENDA_DISNEYFORME/app/routes/add-product.php" name="addProduct" method="post">

							<input hidden class="form-control me-2" name="product_id" value="<?=$product->idProducto?>">
							<button class="btn  btn-outline-primary" type="submit">Añadir al carrito</button>

						</form>

						<form class="d-flex" action="/TIENDA_DISNEYFORME/app/routes/add-fav.php" name="addFav" method="post">

							<input hidden class="form-control me-2" name="favorite_id" value="<?=$product->idProducto?>">
							<button class="btn  btn-outline-primary" type="submit">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
									<path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 
											6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 
											2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 
											1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
								</svg>  	
							Favorito</button>

						</form>

					<?php endif; ?>

				</div>

			</div>

		<?php endforeach?>
	</div>

    <!-- Popper JS Bootstap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" 
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" 
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

    <!-- Bootstap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>