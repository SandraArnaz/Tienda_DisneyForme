<?php 
	
	session_start();

	require_once('app/models/adding_favorite.php');
    require_once('app/controllers/products.php');

    //Si la session tiene valor, sacar el valor y guardarlo en variable
	$addingFav = isset($_SESSION["adding_fav"]) ? unserialize($_SESSION["adding_fav"]) : new AddingFavorite();
 
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda DisneyForme - Favorite</title>

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

        <!--Recorrer la lista de items para mostrarlos -->
        <?php foreach ($addingFav->items as $item): ?>

            <div class="card product">

                <img class="card-img-top productImg" src="<?=$item->producto->imagen?>" alt="Card image cap">

                <div class="card-body">

                    <h5 class="card-title letterTitle"><?=$item->producto->nombreProducto?></h5>
                    <p class="card-text letterText"><?=$item->producto->descripción?></p>
                    <p class="card-text letterPrice" id="price"><?=$item->producto->precio?>€</p>
                        
                    <form class="d-flex" action="/TIENDA_DISNEYFORME/app/routes/add-product.php" name="addProduct" method="post">

                        <input hidden class="form-control me-2" name="product_id" value="<?=$item->producto->idProducto?>">
                        <button class="btn  btn-outline-primary" type="submit">Añadir al carrito</button>

                    </form>

                    <form  action="/TIENDA_DISNEYFORME/app/routes/delete-fav.php" method="post">

						<input hidden name="product_fav" value="<?=$item->producto->idProducto?>">
						<button type="submit" class="btn btn-outline-danger btn-sm">Borrar</a>

					</form>

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