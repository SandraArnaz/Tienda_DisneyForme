<?php 
	
	session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda DisneyForme - Pagina principal</title>

    <!-- Bootstap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

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

    <!-- Carousel imagenes -->
    <div id="carouselIndicators" class="carousel slide">

        <div class="carousel-indicators">

            <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>

        </div>

        <div class="carousel-inner">
            
            <div class="carousel-item active">
                <img src="img/carrusel_sudadera_mickey.jpg" class="d-block w-100" alt="Sudadera Mickey">
            </div>

            <div class="carousel-item">
                <img src="img/carrusel_funkos.jpg" class="d-block w-100" alt="Funkos Marvel">
            </div>

            <div class="carousel-item">
                <img src="img/carrusel_rey_leon.jpg" class="d-block w-100" alt="Juguetes Rey Leon">
            </div>

        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#carouselIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>

    </div>

    <!-- Seccion de destacados -->
    <div class="seccion">

        <h4 class="outstanding">Destacados</h4>

        <div class="position-relative">

            <div class="position-absolute start-0">

                  <div class="card productIndex" style="width: 18rem;">

                     <img src="img/productos/Disney/taza_reyleon.jpg" class="card-img-top productImg" alt="Taza Rey Leon">

                    <div class="card-body">
                        <h5 class="card-title letterTitle">Taza del Rey Leon - Hakuna Matata</h5>
                        <p class="card-text letterText">Taza del Rey León con la frase Hakuna Matata. Con el interior de 
                                            color verde. Ideal para regalar a un fanático del Rey León.</p>  
                     </div>

                 </div>

            </div>

            <div class="position-absolute start-50 translate-middle-x">

                <div class="card productIndex" style="width: 18rem;">

                    <img src="img/productos/StarsWars/sudadera_babeYoda.jpg" class="card-img-top productImg" alt="Sudadera Baby Yoda">

                    <div class="card-body">
                        <h5 class="card-title letterTitle">Sudadera de Baby Yoda - Grocu - The Mandalorian</h5>
                        <p class="card-text letterText">Sudadera de color gris con el dibujo de Baby Yoda, el personaje de la 
                                            serie The Mandalorian. El interior es de forro polar.</p>
                    </div>

                </div>

            </div>

            <div class="position-absolute end-0">

                <div class="card productIndex" style="width: 18rem;">

                    <img src="img/productos/Marvel/guante_spiderman.jpg" class="card-img-top productImg" alt="Guantes de Spiderman">

                    <div class="card-body">
                        <h5 class="card-title letterTitle">Guantes Spiderman - Lanzador</h5>
                        <p class="card-text letterText">Guante de Spiderman con lanzador. Ideal para que los más pequeños, para 
                                            que se sientan como si fueran spiderman.</p>
                    </div>

                </div>

            </div>
            
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