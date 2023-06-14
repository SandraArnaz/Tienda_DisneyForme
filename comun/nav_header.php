<nav class="navbar bg-body-tertiary">
  
    <div class="container-fluid">
			<?php
					require_once('conexion.php');
					require_once('app/controllers/category.php');

					$pdo = getConnection();

					$controller = new CategoryController($pdo);
					//Variable guardara array de categorias que devuelve el metodo list
					$categories = $controller->list();
			?>

			<!-- Recorre array con todas las categorias y las muestra-->
			<?php foreach ($categories as $category): ?>
				<a class="navbar-brand letterTitle" href="products_view.php?category=<?=$category->idCategoria?>"><?=$category->nombreCategoria?></a>
			<?php endforeach?>

			<form class="d-flex" role="search" action="" method="get">
					<input class="form-control me-2" name="search" type="search" placeholder="Buscar" aria-label="Search">
					<input hidden class="form-control me-2" name="category" value="<?=isset($_GET["category"]) ? $_GET["category"] : ""?>">
					<button class="btn  btn-outline-primary" type="submit">Buscar</button>
			</form>
  </div>

</nav>



