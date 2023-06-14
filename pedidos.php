<?php 
	
	session_start();

	require_once('conexion.php');
	require_once('app/controllers/pedidos.php');

	$pdo = getConnection();

	$controller = new PedidosController($pdo);
	//Guardar en variable array con todos los pedidos
	$pedidos = $controller->list();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda DisneyForme - Pedidos</title>

    <!-- Bootstap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">

	<!--CSS -->  
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

	<div class="container d-flex flex-wrap justify-content-center mt-4">

		<div class="accordion" id="accordionExample">
			<!--Recorrer array con los pedidos para mostrarlos -->
			<?php foreach ($pedidos as $pedido): ?>

				<div class="accordion-item">

					<h2 class="accordion-header">

						<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?=$pedido->id?>" 
								aria-expanded="false" aria-controls="<?=$pedido->id?>">

								Id pedido: <?=$pedido->id?>
								Fecha: <?=$pedido->created_at?>
								Precio Total: <?=$pedido->totalPrice()?>€	

						</button>

					</h2>

					<div id="<?=$pedido->id?>" class="accordion-collapse collapse" data-bs-parent="#accordionExample">

						<div class="accordion-body">
						
							<table class="table">

								<thead>

									<tr id="letter-table">
									<th scope="col">Nombre del Producto</th>
									<th scope="col">Cantidad</th>
									<th scope="col">Precio</th>
									</tr>

								</thead>

								<?php foreach ($pedido->items as $item): ?>

								<tbody>

									<tr>
									<th scope="row"><?=$item->producto->nombreProducto?> </th>
									<td><?=$item->cantidad?></td>
									<td id = "price"><?=$item->totalPrice()?>€</td>
									</tr>
									
								</tbody>

								<?php endforeach?>

							</table>

						</div>

					</div>

				</div>

			<?php endforeach?>

		</div>

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