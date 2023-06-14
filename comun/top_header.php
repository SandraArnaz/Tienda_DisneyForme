<?php
	require_once('app/models/shoppingCart.php');
	require_once('app/controllers/products.php');

	//Si la session tiene valor saca el valor y guardalo en variable
	$shoppingCart = isset($_SESSION["shopping_cart"]) ? unserialize($_SESSION["shopping_cart"]) : new ShoppingCart();
?>

<nav class="navbar bg-body-tertiary">

	<div class="container-fluid">

		<a class="navbar-brand text-primary letterTitle" href="./index.php">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-haze2-fill" viewBox="0 0 16 16">
				<path d="M8.5 2a5.001 5.001 0 0 1 4.905 4.027A3 3 0 0 1 13 12H3.5A3.5 3.5 0 0 1 .035 9H5.5a.5.5 0 0 0 0-1H.035a3.5 3.5 0 0 1 
				3.871-2.977A5.001 5.001 0 0 1 8.5 2zm-6 8a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zM0 13.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5z"/>
			</svg>
			Tienda DisneyForme
		</a>

		<ul class="nav justify-content-end">

			<li class="nav-item">

				<a class="nav-link " aria-current="page" href="<?= !isset($_SESSION["user"]) ? "login.php" : "logout.php" ?>">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
						<path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
					</svg>
					<!--Si variable de session no tiene valor mostrar Acceso|Registro y sino mostrar Cerrar sesión -->  
					<?= !isset($_SESSION["user"]) ? "Acceso | Registro" : "Cerrar Sesión" ?>
				</a>

			</li>

			<!--Si session tiene valor mostrar -->
			<?php if (isset($_SESSION["user"])): ?>

				<li class="nav-item">

					<a class="nav-link " aria-current="page" href="pedidos.php">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
							<path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 
									14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 
									2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 
									2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
						</svg>  
						Pedidos
					</a>

				</li>

				<li class="nav-item">

					<a class="nav-link " aria-current="page" href="favorite.php">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
							<path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 
									6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 
									2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 
									1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
						</svg>  
						Favoritos
					</a>

				</li>

				<?php endif; ?>

				<?php if (isset($_SESSION["user"])): ?>

					<li class="nav-item">

						<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket-fill" viewBox="0 0 16 16">
								<path d="M5.071 1.243a.5.5 0 0 1 .858.514L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v2a.5.5 0 
													0 1-.5.5H15v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 6h1.717L5.07 1.243zM3.5 10.5a.5.5 0 1 
													0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 
													1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3z"/>
							</svg>
							<!-- Mostrar numero total de productos dentro de la cesta-->   
							Cesta <?= $shoppingCart->numberProducts() ?>
						</button>

					</li>

				<?php endif; ?>
					
		</ul>

	</div>

</nav>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

	<div class="modal-dialog">

		<div class="modal-content">

			<div class="modal-header">

				<h1 class="modal-title fs-5" id="exampleModalLabel">Carrito</h1>

				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

			</div>

			<div class="modal-body">
				<!--Recorrer lista de items que tiene productos con sus cantidades -->		
				<?php foreach ($shoppingCart->items as $item): ?>

					<div class="card mb-3 mb-lg-0">

						<div class="card-body">

							<div class="d-flex justify-content-between">

								<div class="d-flex flex-row align-items-center">

									<div>
										<img src="<?=$item->producto->imagen?>"
											class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
									</div>

									<div class="ms-3">
										<h5><?=$item->producto->nombreProducto?></h5>
									</div>

								</div>

								<div class="d-flex flex-row align-items-center">

									<div style="width: 50px;">
										<h5 class="fw-normal mb-0"><?=$item->cantidad?></h5>
									</div>

									<div style="width: 80px;">
										<!--Mostrar el precio de cada producto -->
										<h5 class="mb-0"><?=$item->totalPrice()?>€</h5>
									</div>

									<form  action="/TIENDA_DISNEYFORME/app/routes/delete-product.php" method="post">

										<input hidden name="product_id" value="<?=$item->producto->idProducto?>">
										<button type="submit" class="btn btn-outline-danger btn-sm">borrar</a>

									</form>

								</div>

							</div>

						</div>

					</div>

				<?php endforeach?>

			</div>

			<div class="modal-footer">
				<form  action="/TIENDA_DISNEYFORME/app/routes/buy.php" method="post">

					<button type="submit" class="btn btn-primary  btn-lg">

						<div class="d-flex justify-content-between">
							<!---Mostrar el precio total de todos los productos -->
							<span><?=$shoppingCart->totalPrice()?>€ </span>
							<span>Comprar <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
						</div>
					</button>
				</form>

			</div>

		</div>

  </div>
  
</div>

