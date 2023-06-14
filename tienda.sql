-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-05-2023 a las 00:21:35
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda`
--
CREATE DATABASE IF NOT EXISTS `tienda` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `tienda`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL,
  `nombreCategoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `nombreCategoria`) VALUES
(1, 'Disney'),
(2, 'Pixar'),
(3, 'Stars Wars'),
(4, 'Marvel');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea_pedidos`
--

CREATE TABLE `linea_pedidos` (
  `id_producto` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `linea_pedidos`
--

INSERT INTO `linea_pedidos` (`id_producto`, `id_pedido`, `cantidad`) VALUES
(8, 9, 1),
(14, 9, 1),
(103, 9, 1),
(73, 10, 1),
(82, 10, 1),
(10, 11, 1),
(6, 11, 1),
(98, 12, 1),
(63, 12, 1),
(4, 13, 1),
(6, 13, 1),
(9, 13, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `idPedido` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`idPedido`, `idUsuario`, `created_at`) VALUES
(9, 3, '2023-04-24 12:33:16'),
(10, 3, '2023-04-24 12:35:23'),
(11, 3, '2023-05-01 18:48:55'),
(12, 3, '2023-05-01 18:49:51'),
(13, 10, '2023-05-01 20:32:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProducto` int(11) NOT NULL,
  `nombreProducto` varchar(50) NOT NULL,
  `descripción` varchar(300) NOT NULL,
  `precio` int(11) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `idSubcategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProducto`, `nombreProducto`, `descripción`, `precio`, `imagen`, `idCategoria`, `idSubcategoria`) VALUES
(1, 'Taza del Rey León', 'Taza del Rey León con la frase Hakuna Matata. Con el interior de color verde. Ideal para regalar a un fanático del Rey León.', 15, 'img/productos/Disney/taza_reyleon.jpg', 1, 9),
(2, 'Sudadera de Baby yoda - Grocú', 'Sudadera de color gris con el dibujo de Baby Yoda, el personaje de la serie The Mandalorian. El interior es de forro polar.', 20, 'img/productos/StarsWars/sudadera_babeYoda.jpg', 3, 18),
(3, 'Guantes de Spiderman', 'Guante de Spiderman con lanzador. Ideal para que los más pequeños, para que se sientan como si fueran spiderman.', 10, 'img/productos/Marvel/guante_spiderman.jpg', 4, 24),
(4, 'Taza de Alicia en el país de las maravillas', 'Taza de 365ml de porcelana en color blanco. Apto para lavavajillas y microondas.', 16, 'img/productos/Disney/taza_alicia.jpg', 1, 1),
(5, 'Juego de té de Alicia en el país de las maravillas', 'El juego se compone de una tetera con capacidad de 250ml y una taza que pueden apilarse una dentro de la otra. Están fabricadas en porcelana de color blanco.', 32, 'img/productos/Disney/tetera_alicia.jpg', 1, 1),
(6, 'Disfraz de Alicia en el país de las maravillas', 'Disfraz de Alicia para niña, infantil 5-6 años. Téjido ligero y cómodo. Fácil de poner y quitar.', 20, 'img/productos/Disney/disfraz_alicia.jpg', 1, 1),
(7, 'Peluche del Gato Cheshire de Alicia en el país de ', 'Peluche de 18cm, es blandito y resistente. Confeccionado en fibra de poliéster de tacto suave y tiene uñas de fieltro.', 33, 'img/productos/Disney/peluche_gato_alicia.jpg', 1, 1),
(8, 'Funko de Alicia en el país de las maravillas', 'Funko 55733. La figura mide 15cm y viene en una caja de exhibición de ventana.', 30, 'img/productos/Disney/funko_alicia.jpg', 1, 1),
(9, 'Camiseta de Alicia en el país de las maravillas', 'Camiseta de mujer de color gris y de manga corta. 50% algodón y 50% poliéster.', 28, 'img/productos/Disney/camiseta_alicia.jpg', 1, 1),
(10, 'Funko de Encanto - Mirabel', 'Funko POP 57599. La figura mide 9cm y viene en una caja de exhibición de ventana', 17, 'img/productos/Disney/funko_encanto.jpg', 1, 2),
(11, 'Neceser de Encanto con bandolera', 'Neceser adaptable con bandolera. Es rígido y las medidas son 29x21x15cm. Posibilidad de adaptarla a la maleta con la banda trasera.', 40, 'img/productos/Disney/neceser_encanto.jpg', 1, 2),
(12, 'Estuche doble de Encanto', 'Estuche con dos compartimentos y cierre con cremallera. Tiene forro interior y sus dimensiones son 10x22.5x7cm.', 15, 'img/productos/Disney/estuche_encanto.jpg', 1, 2),
(13, 'Globos decoración de Encanto', 'El paquete incluye 8 globos metalizados de Encanto. Adecuado para fiestas de cumpleaños.', 14, 'img/productos/Disney/globos_encanto.jpg', 1, 2),
(14, 'Camiseta para niñas de Encanto', 'Camiseta 100% Algodón de manga corta. Recuérdale a tu pequeña fanática de Encanto lo mágica que es con esta hermosa camiseta.', 12, 'img/productos/Disney/camiseta_encanto.jpg', 1, 2),
(15, 'Maleta de cabina de Encanto', 'Maleta de cabina de 38x55x20cm. Tiene una capacidad de 34L y pesa 2.6Kg. Práctico interior con dos compartimentos.', 84, 'img/productos/Disney/maleta_encanto.jpg', 1, 2),
(16, 'Sofa de Frozen', 'Sofá hinchable. Cómodo mini sofá se despliega en una divertida tumbona. Tiene 26cm de altura y 68cm de anchura. ', 33, 'img/productos/Disney/sofa_frozen.jpg', 1, 3),
(17, 'Alfombra de Frozen', 'Alfombra de color azul de 133x95cm. Esta alfombra infantil encaja en cualquier habitación infantil.', 35, 'img/productos/Disney/alfombra_frozen.jpg', 1, 3),
(18, 'Joyero musical de Frozen', 'Joyero musical, toca una simpática música inspirada en el mundo mágico de Disney.', 30, 'img/productos/Disney/joyero_frozen.jpg', 1, 3),
(19, 'Set de maquillaje de Frozen', 'La lata reutilizable contiene 16 brillos de labios, 9 polvos brillantes, 8 cremas brillantes, 2 accesorios para el cabello, 1 aplicador de brillo de labios y 1 crema de brillo.', 8, 'img/productos/Disney/maquillaje_frozen.jpg', 1, 3),
(20, 'Pijama de Frozen', 'Pijama de manga larga con extremos ajustados en los brazos y en las piernas. Es 100% Algodón.', 13, 'img/productos/Disney/pijama_frozen.jpg', 1, 3),
(21, 'Walkie talkies de Frozen', 'Un par de walkie talkies para comunicarte. Rango de transmisión hasta 2Km en espacio abierto. Antena flexible y pinza para colgar del cinturón.', 27, 'img/productos/Disney/walkie_frozen.jpg', 1, 3),
(22, 'Figura de Bella y Bestia', 'Figura de Bella y Bestia bailando con el efecto de ser tallada en madera. Resina pintada a mano. Altura de 23cm.', 66, 'img/productos/Disney/figura_bella_bestia.jpg', 1, 4),
(23, 'Charm rosa encantada de la Bella y la Bestia', 'Tiene una cúpula de cristal de Murano azul claro transparente con estrellas grabadas que rodean una rosa cortada con detalles de esmalte rojo y verde.', 68, 'img/productos/Disney/charm_bella_bestia.jpg', 1, 4),
(24, 'Funda de Chip de la Bella y la Bestia', 'Funda para iphone 11 de Chip Potts de silicona transparente, flexible y resistente con Licencia Oficial de Disney.', 15, 'img/productos/Disney/funda_bella_bestia.jpg', 1, 4),
(25, 'LEGO Castillo de Bella y Bestia', 'Con este castillo de juguete de La Bella y La Bestia crea un edificio de 2 pisos con una pista de baile giratoria, un armario giratorio, una biblioteca y un comedor.', 35, 'img/productos/Disney/castillo_bella_bestia.jpg', 1, 4),
(26, 'Funko de Bella de la Bella y la Bestia', 'Funko 1132. Figura de la bella con espejo con protector de caja de exhibición transparente.', 25, 'img/productos/Disney/funko_bella_bestia.jpg', 1, 4),
(27, 'Funko de la Bella y la Bestia', 'Funko 57588 de la Bella y la Bestia. La figura mide 14cm y viene en una caja de exhibición de ventana.', 38, 'img/productos/Disney/funko_bella_bestia2.jpg', 1, 4),
(31, 'Bañador de La Sirenita', 'Bañador para niña. Viene con un detalle de volante por abajo y con tirantes finos para mayor comodidad.', 23, 'img/productos/Disney/banador_sirenita.jpg', 1, 5),
(32, 'Charm de La Sirenita', 'Charm 799508C01. Acabado a mano en plata de primera ley, este charm incluye detalles de color morado y verde aplicado a manos.', 49, 'img/productos/Disney/charm_sirenita.jpg', 1, 5),
(33, 'Joyero de La Sirenita', 'Joyero musical que toca una simpática melodía inspirada en el mundo mágico de Disney. Dimensiones de 18.5x12x10cm. ', 27, 'img/productos/Disney/joyero_sirenita.jpg', 1, 5),
(34, 'Peluche de Sebastián de La Sirenita', 'Esta confeccionado en poliéster suave al tacto y parcialmente rellenos de bolitas que los convierten en los peluches perfectos para  abrazar.', 28, 'img/productos/Disney/peluche_sirenita.jpg', 1, 5),
(35, 'Funko de La Sirenita', 'Funko 563. Muñeco realizado en vinilo y con un tamaño de 9cm.', 15, 'img/productos/Disney/funko_sirenita.jpg', 1, 5),
(36, 'Pijama de La Sirenita', 'Set de pijama para mujeres de manga corta y en conjunto con pantalones púrpura de pretina elástica y ajuste perfecto.', 18, 'img/productos/Disney/pijama_sirenita.jpg', 1, 5),
(37, 'Camiseta de Lilo y Stitch', 'Camiseta con las distintas emociones de Stitch. Camiseta de manga corta y 100% algodón.', 20, 'img/productos/Disney/camiseta_stitch.jpg', 1, 6),
(38, 'Peluche de Lilo y Stitch', 'Peluche hecho de vellón y relleno de alta calidad, es suave y mide 18cm.', 16, 'img/productos/Disney/peluche_stitch.jpg', 1, 6),
(39, 'Kit de papelería de Lilo y Stitch', 'Set de 3 piezas, incluye 1 cuaderno, 1 estuche y un juego de 6 bolígrafos de tinta negra.', 22, 'img/productos/Disney/kit_papeleria_stitch.jpg', 1, 6),
(40, 'Cartera de Lilo y Stitch', 'Cartera larga con 8 espacios para las tarjetas, espacio para billetes y monedero con cremallera en el centro.', 23, 'img/productos/Disney/cartera_stitch.jpg', 1, 6),
(41, 'Pijama de Lilo y Stitch', 'Pijama para niñas de manga corta y pantalón corto. Es de 100% algodón y de color lila.', 20, 'img/productos/Disney/pijama_stitch.jpg', 1, 6),
(42, 'Mochila de Lilo y Stitch', 'Mochila ligera y cómoda para el colegio o el tiempo libre con compartimento en el lateral para guardar botella.', 25, 'img/productos/Disney/mochila_stitch.jpg', 1, 6),
(43, 'Taza de Pesadilla antes de navidad', 'Taza de café 3D. Capacidad de 450ml. Atención no apto para microondas o lavavajillas. Caja de regalo.', 20, 'img/productos/Disney/taza_pesadilla.jpg', 1, 7),
(44, 'Termo de Pesadilla antes de navidad', 'Termo de acero inoxidable de color negro y con la capacidad de 425 ml.', 30, 'img/productos/Disney/termo_pesadilla.jpg', 1, 7),
(45, 'Manta de Pesadilla antes de navidad', 'Manta hecha de forro polar de poliéster de alta calidad y muy suave. Lavable a máquina en agua fría.', 20, 'img/productos/Disney/manta_pesadilla.jpg', 1, 7),
(46, 'Marco de Pesadilla antes de navidad', 'Hecho a mano en material de resina de piedra. El marco tiene capacidad para una imagen de 10x15cm.', 43, 'img/productos/Disney/marco_pesadilla.jpg', 1, 7),
(47, 'Funko de Pesadilla antes de navidad', 'Funko 50631. La figura mide 10cm y se envía en una caja ilustrada con ventana.', 16, 'img/productos/Disney/funko1_pesadilla.jpg', 1, 7),
(48, 'Funko de Pesadilla antes de navidad', 'Funko 50630. La figura mide 10cm y se envía en una caja ilustrada con ventana.', 32, 'img/productos/Disney/funko2_pesadilla.jpg', 1, 7),
(49, 'Estación de bomberos de Mickey Mouse y sus amgios', 'El set de juego incluye 3 mini figuras: Pato Donald, Mickey Mouse, Pluto y el gatito Fígaro. Ademas contiene un montón de accesorios.', 53, 'img/productos/Disney/bomberos_mickey.jpg', 1, 8),
(50, 'Calcetines de Mickey Mouse y sus amgios', 'Pack de 3 calcetines de Mickey Mouse y sus amigos. Lavar a máquina.', 10, 'img/productos/Disney/calcetines_mickey.jpg', 1, 8),
(51, 'Peluche de Mickey Mouse', 'Peluche hecho de guata y felpa suave que le brinda una sensación muy suave. El tamaño es de 35cm.', 20, 'img/productos/Disney/peluche_mickey.jpg', 1, 8),
(52, 'Funko de Mickey Mouse', 'Funko D100. Celebre el centenario de Disney con este funko pop de Mickey en blanco y negro.', 18, 'img/productos/Disney/funko_mickey.jpg', 1, 8),
(53, 'Cortador de galletas de Mickey Mouse', '6 piezas para cortar las galletas. Es fácil de usar y limpiar. Está hecho de acero inoxidable y es resistente a la corrosión y a la deformación.', 12, 'img/productos/Disney/galletas_mickey.jpg', 1, 8),
(54, 'Caja de almacenaje de Mickey Mouse', 'Caja de almacenaje con capacidad de 13 litros. Está hecha de plástico y sus dimensiones son ax29x15cm.', 16, 'img/productos/Disney/caja_mickey.jpg', 1, 8),
(55, 'Felpudo de El Rey León', 'Felpudo de un tamaño de 60x40cm. Sintético, fabricado de coco y con una base de PVC antideslizante.', 18, 'img/productos/Disney/felpudo_rey_leon.jpg', 1, 9),
(56, 'Cubertería de El Rey León', 'Juego de cubiertos para niños que consta de 1 tenedor, 1 cuchillo, 1 cuchara y una cuchara pequeña. Son de acero inoxidable.', 35, 'img/productos/Disney/cubiertos_rey_leon.jpg', 1, 9),
(57, 'Funko de El Rey León', 'Funko de Rafiki con simba en brazos.', 23, 'img/productos/Disney/funko_rey_leon.jpg', 1, 9),
(58, 'Funda nórdica de El Rey León', 'Funda nórdica para cama de bebé de 60x120cm o 70x140cm. Esta funda 100% algodón que mide 100x135cm.', 24, 'img/productos/Disney/funda_rey_leon.jpg', 1, 9),
(59, 'Parche de El Rey León', 'Parche termoadhesivo bordado. Su tamaño es de 6.7x6.3cm.', 6, 'img/productos/Disney/parche_rey_leon.jpg', 1, 9),
(60, 'Bolso para carro de El Rey León', 'Bolso para carrito de bebé. Cuerpo exterior repelente a líquidos y forro interior con 5 bolsillos .', 30, 'img/productos/Disney/bolso_rey_leon.jpg', 1, 9),
(61, 'Vajillade Cars', 'Incluye 1tenedor, 1 cuchillo, 1 cuchara, 1 cucharilla, 1 plato y un bol. Los cubiertos son de acero inoxidable y la vajilla de porcelana.', 40, 'img/productos/Pixar/cubiertos_cars.jpg', 2, 10),
(62, 'Vasos de Cars', 'Juego de 3 vasos de cristal con capacidad de 200ml. Apto para lavavajillas.', 8, 'img/productos/Pixar/vasos_cars.jpg', 2, 10),
(63, 'Toalla de Cars', 'Poncho de toalla con capucha para niños, con la imagen de Rayo McQueen de cars.', 20, 'img/productos/Pixar/toalla_cars.jpg', 2, 10),
(64, 'Ropa interior de Cars', 'Ropa interior para niños. Pack de 5 calzoncillos 100% algodón. Pretina elástica para mayor comodidad.', 15, 'img/productos/Pixar/calzoncillos_cars.jpg', 2, 10),
(65, 'Camión de Cars', 'Este camión transformable es un tráiler y un taller para mantener los coches de juguete. Posee un lanzador de coches.', 36, 'img/productos/Pixar/camion_cars.jpg', 2, 10),
(66, 'Manta de Cars', 'Manta polar con tacto suave que mide 130x150cm. Lavar a máquina con agua fría.', 20, 'img/productos/Pixar/manta_cars.jpg', 2, 10),
(67, 'Funko de Lightyear', 'Funko Pop con un tamaño de 9 cm y viene en una caja de exhibición de ventana.', 12, 'img/productos/Pixar/funko_lightyear.jpg', 2, 11),
(68, 'Lego batalla contra Zurg de Lightyear', 'Incluye 2 mini figuras de Buzz Lightyear e Izzy, el gato robótico Sox, 3 armas y una figura del villano Emperador Zurg, con piernas y brazos articulados.', 25, 'img/productos/Pixar/lego_lightyear.jpg', 2, 11),
(69, 'Peluche de Sox de Lightyear', 'El peluche Sox emite sonidos inspirados en la película y está confeccionado con un tejido suave y agradable al tacto.', 20, 'img/productos/Pixar/peluche_lightyear.jpg', 2, 11),
(70, 'Vajilla de cumpleaños de Lightyear', 'Incluye 20 servilletas, 10 platos pequeños, 10 platos grandes, 10 vasos de papel, 1 bandera y 6 piezas de sopladores de fiesta.', 21, 'img/productos/Pixar/vajilla_lightyear.jpg', 2, 11),
(71, 'Figura de Alisha de Lightyear', 'Esta figura cuenta con Alisha en el traje Alpha de Ranger espacial.', 20, 'img/productos/Pixar/figura_lightyear.jpg', 2, 11),
(72, 'Sandwichera de Lightyear', 'Sandwichera de plástico con 3 compartimentos. ', 6, 'img/productos/Pixar/sandwichera_lightyear.jpg', 2, 11),
(73, 'Funko de Red ', 'Funko 1185. La figura mide 16 cm y se envía en una caja ilustrada con ventana.', 33, 'img/productos/Pixar/funko1_red.jpg', 2, 12),
(74, 'Funko de Red ', 'Funko 1184. La figura mide 9 cm y viene en una caja de exhibición de ventana.', 18, 'img/productos/Pixar/funko2_red.jpg', 2, 12),
(75, 'Vajilla de cumpleaños de Red ', 'Incluye 10 platos, 10 vasos de papel, 20 servilletas, 6 cometas de burbujas, 10 pajitas de plástico, 10 tenedores, 1 cuchara y un mantel.', 28, 'img/productos/Pixar/vajilla_red.jpg', 2, 12),
(76, 'Peluche de Red ', 'Hecho de felpa suave y relleno de algodón de polipropileno. Es suave y delicado con la piel.', 16, 'img/productos/Pixar/peluche_red.jpg', 2, 12),
(77, 'Estuche de Red ', 'Estuche de dibujos de gran capacidad. Tiene una impresión clara y bonita. Dimensiones 6x4x1 cm.', 14, 'img/productos/Pixar/estuche1_red.jpg', 2, 12),
(78, 'Estuche de Red ', 'Estuche de dibujos de gran capacidad. Tiene una impresión clara y bonita. Dimensiones 5x5x1 cm.', 16, 'img/productos/Pixar/estuche2_red.jpg', 2, 12),
(79, 'Mochila de Toy Story ', 'Mochila de carro para niños. Confeccionada con poliéster y cremalleras suaves. Dimensiones de 22x10x27 cm.', 35, 'img/productos/Pixar/mochila_toy.jpg', 2, 13),
(80, 'Baberos de Toy Story ', 'Pack de 6 baberos de bebé. Es 100% algodón y permite lavado a máquina. ', 19, 'img/productos/Pixar/babero_toy.jpg', 2, 13),
(81, 'Funko de Toy Story ', 'Funko 519. Hecho de vinilo y con un tamaño de 10 cm.', 35, 'img/productos/Pixar/funko1_toy.jpg', 2, 13),
(82, 'Funko de Toy Story ', 'Funko 522. Figura de Woody hecha de vinilo y con un tamaño de 16 cm.', 18, 'img/productos/Pixar/funko2_toy.jpg', 2, 13),
(83, 'Puzzle de Toy Story ', '3 rompecabezas infantiles de 48 piezas. Puzzle para niños a partir de 4 años. Tamaño del puzzle completo 26.8x18.3 cm.', 10, 'img/productos/Pixar/puzzle_toy.jpg', 2, 13),
(84, 'Juego de cama de Toy Story ', 'Incluye una funda nórdica de 140x200 cm y una funda de almohada de 63x63 cm. ', 23, 'img/productos/Pixar/edredon_toy.jpg', 2, 13),
(85, 'Camiseta de Up ', 'Camiseta de manga corta 100% algodón. Permite lavado a máquina.', 20, 'img/productos/Pixar/camiseta_up.jpg', 2, 14),
(86, 'Taza de Up ', 'Taza de cerámica con capacidad de 250 ml. Se puede meter en el lavavajillas y en el microondas. ', 13, 'img/productos/Pixar/taza_up.jpg', 2, 14),
(87, 'Sudadera de Up ', 'Sudadera de manga larga sin capucha. Su composición es 80% algodón y 20% poliester. Se puede lavar a máquina. ', 40, 'img/productos/Pixar/sudadera_up.jpg', 2, 14),
(88, 'Funko de Up ', 'Funko edición limitada #05 de la Convención de otoño 2019. Sus dimensiones son 24x18x18 cm.', 300, 'img/productos/Pixar/funko_up.jpg', 2, 14),
(89, 'Figura de Up ', 'Figura hecha a mano de polirresina y vinilo, todo pintado a mano. Sus dimensiones son 26x14.5x22.8 cm.', 150, 'img/productos/Pixar/figura_up.jpg', 2, 14),
(90, 'Sudadera de Up ', 'Sudadera de manga larga con capucha con una composición de 78% algodón y 22% poliester. Permite lavado a máquina.', 43, 'img/productos/Pixar/sudadera2_up.jpg', 2, 14),
(91, 'Funko de Wall-E ', 'Funko de Eve 1116. Figura de vinilo que mide 9 cm y viene en una caja de exhibición de ventana.', 16, 'img/productos/Pixar/funko_wall_E.jpg', 2, 15),
(92, 'Camiseta de Wall-E ', 'Camiseta de manga corta de color blanco 100% algodón. Permite lavado a máquina.', 20, 'img/productos/Pixar/camiseta_wall_E.jpg', 2, 15),
(93, 'Funko de Wall-E ', 'Funko 1120. Figura de vinilo que mide 9 cm y viene en una caja de exhibición de ventana.', 18, 'img/productos/Pixar/funko2_wall_E.jpg', 2, 15),
(94, 'Charm de Wall-E ', 'Charm de Pandora. Es de plata con detalles en tonos morados y azul, todo hecho a mano.', 63, 'img/productos/Pixar/charm_wall_E.jpg', 2, 15),
(95, 'Camiseta de Wall-E ', 'Camiseta de manga corta de color negro 100% algodón. Permite lavado a máquina.', 20, 'img/productos/Pixar/camiseta2_wall_E.jpg', 2, 15),
(96, 'Robot de Wall-E ', 'Posee tres modos de control remoto (rápido, medio, lento), modo de trayectoria, modo giroscopio, modo de conducción con una sola mano y con ambas manos.', 69, 'img/productos/Pixar/robot_wall_E.jpg', 2, 15),
(97, 'Cuaderno de El libro de Boba Fett ', 'Nuestro bloc A5 presenta cubierta de tapa dura, con unas cubiertas interiores personalizadas y esquinas redondeadas.', 8, 'img/productos/StarsWars/cuaderno_boba.jpg', 3, 16),
(98, 'Funko de El libro de Boba Fett ', 'Funko de vinilo. La figura mide 9 cm y viene en una caja de exhibición de ventana. ', 12, 'img/productos/StarsWars/funko1_boba.jpg', 3, 16),
(99, 'Funko Fennec de El libro de Boba Fett ', 'Funko 481 de Fennec Shand de vinilo. La figura mide 12 cm y viene con un protector de caja de plástico.', 21, 'img/productos/StarsWars/funko2_boba.jpg', 3, 16),
(100, 'Funko de El libro de Boba Fett ', 'Funko 486. La figura mide 14 cm y viene en una caja de exhibición de ventana. ', 25, 'img/productos/StarsWars/funko3_boba.jpg', 3, 16),
(101, 'Planificador de El libro de Boba Fett ', 'Su orientación es horizontal y mide 21x29.7 cm, formato A4. Esta impreso a todo color por una única cara de 90 gramos.', 8, 'img/productos/StarsWars/planificador_boba.jpg', 3, 16),
(102, 'Tapete de escritorio de El libro de Boba Fett ', 'Las medidas son de 49.5x34.5 cm y el material es impermeable y antideslizante.', 13, 'img/productos/StarsWars/tapete_boba.jpg', 3, 16),
(103, 'Halcón Milenario de Star Wars ', 'Lego 75257. Esta maqueta para construir cuenta con torretas giratorias superiores e inferiores, una rampa descendente y una cabina abatible. Incluye 7 mini figuras.', 130, 'img/productos/StarsWars/halcon_star.jpg', 3, 17),
(104, 'Funko Darth Vader de Star Wars ', 'Figura de Darth Vader con la cabeza móvil. Mide 9 cm y viene embalado en una caja ilustrada con ventanas.', 16, 'img/productos/StarsWars/funko_star.jpg', 3, 17),
(105, 'Lámpara de proyección de Star Wars ', 'Lámpara de proyección, mostrará personajes de la película. Incluye una cubierta de plástico para la función de luz de ambiente.', 30, 'img/productos/StarsWars/lampara_star.jpg', 3, 17),
(106, 'Espada láser de Star Wars ', 'Basta con pulsar el botón del mango para encender el sonido de batalla y el efecto de luz LED.', 12, 'img/productos/StarsWars/espada_star.jpg', 3, 17),
(107, 'Caza Imperial de Star Wars ', 'Lego 75300. Incluye 2 mini figuras: un piloto de caza TIE y un Stormtrooper, ambos armados con pistolas láser. Además incluye un droide de protocolo NI-L8.', 40, 'img/productos/StarsWars/caza_star.jpg', 3, 17),
(108, 'Lamina Acuarela de R2-D2 de Star Wars ', 'Lámina decorativa de R2-D2 en estilo acuarela. Impresión en papel premium de 250 gramos. Medidas 21x29.7 cm.', 15, 'img/productos/StarsWars/lamina_star.jpg', 3, 17),
(109, 'Funko de The Mandalorian ', 'Figura coleccionable hecha de vinilo. La figura mide 12.7x12.7x15.24 cm y viene embalado en una caja ilustrada con ventanas.', 36, 'img/productos/StarsWars/funko1_mandalorian.jpg', 3, 18),
(110, 'Funko de The Mandalorian ', 'Funko 380 de vinilo. La figura mide 25 cm y viene en una caja expositoria con ventana.', 36, 'img/productos/StarsWars/funko2_mandalorian.jpg', 3, 18),
(111, 'Felpudo de Baby Yoda de The Mandalorian ', 'El felpudo tiene base antideslizante fabricado en PVC y tiene una medida de 50x55 cm.', 21, 'img/productos/StarsWars/felpudo_mandalorian.jpg', 3, 18),
(112, 'Manta de The Mandalorian ', 'Tela afelpada y suave. Las medidas son 130x150 cm. Permite lavado a máquina.', 35, 'img/productos/StarsWars/manta_mandalorian.jpg', 3, 18),
(113, 'Peluche de Baby Yoda de The Mandalorian ', 'Peluche de 28 cm con la cabeza de plástico y el cuerpo de peluche. Se mantiene de pie solo.', 25, 'img/productos/StarsWars/peluche_mandalorian.jpg', 3, 18),
(114, 'Funko de The Mandalorian ', 'Funko 416 de vinilo. La figura mide 15 cm y viene en una caja expositoria con ventana.', 36, 'img/productos/StarsWars/funko3_mandalorian.jpg', 3, 18),
(115, 'Funko de Obi-Wan Kenobi ', 'Funko 544 de vinilo. La figura mide 10 cm y viene en una caja expositoria con ventana.', 39, 'img/productos/StarsWars/funko1_obi.jpg', 3, 19),
(116, 'Disfraz de Obi-Wan Kenobi ', 'Disfraz para niño de Obi Wan Kenobi. Camiseta, pantalón con cinturón adjunto y túnica larga con capucha.', 30, 'img/productos/StarsWars/disfraz_obi.jpg', 3, 19),
(117, 'Funko de Obi-Wan Kenobi ', 'Funko 538 de vinilo. La figura mide 9 cm y viene en una caja expositoria con ventana.', 15, 'img/productos/StarsWars/funko2_obi.jpg', 3, 19),
(118, 'Figura de Obi-Wan Kenobi ', 'Los coleccionistas pueden exhibir esta figura altamente articulada (cabeza, brazos y piernas articuladas) con diseño premium.', 27, 'img/productos/StarsWars/figura_obi.jpg', 3, 19),
(119, 'Camiseta de Obi-Wan Kenobi ', 'Camiseta negra de manga corta 100% algodón. Se permite lavado a máquina.', 20, 'img/productos/StarsWars/camiseta_obi.jpg', 3, 19),
(120, 'Colección figuras de Obi-Wan Kenobi ', 'Figuras que miden 9.5 cm y tienen cabeza, piernas y brazos articulados.', 70, 'img/productos/StarsWars/figuras_obi.jpg', 3, 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategorias`
--

CREATE TABLE `subcategorias` (
  `idSubcategoria` int(11) NOT NULL,
  `nombreSubcategoria` varchar(50) NOT NULL,
  `idCategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `subcategorias`
--

INSERT INTO `subcategorias` (`idSubcategoria`, `nombreSubcategoria`, `idCategoria`) VALUES
(1, 'Alicia en el país de las maravillas', 1),
(2, 'Encanto', 1),
(3, 'Frozen', 1),
(4, 'La Bella y la Bestia', 1),
(5, 'La Sirenita', 1),
(6, 'Lilo y Stitch', 1),
(7, 'Pesadilla antes de navidad', 1),
(8, 'Mickey Mouse y sus amigos', 1),
(9, 'El Rey Leon', 1),
(10, 'Disney Pixar Cars', 2),
(11, 'Lightyear', 2),
(12, 'Red', 2),
(13, 'Toy Story', 2),
(14, 'Up', 2),
(15, 'Wall-E', 2),
(16, 'El libro de Boba Fett', 3),
(17, 'Stars Wars: Episodios 1-6', 3),
(18, 'The Mandalorian', 3),
(19, 'Obi-Wan Kenobi', 3),
(20, 'Black Panther', 4),
(21, 'Guardianes de la galaxia', 4),
(22, 'Loki', 4),
(23, 'Los Vengadores', 4),
(24, 'Spider-Man', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUusuario` int(11) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `contraseña` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUusuario`, `correo`, `contraseña`) VALUES
(3, 's.arnaz@prueba.com', '$2y$10$hcEhLoaoZ7LoX3.vzhHs.uR15w6Z9X6pFWAVbulAr6AuAfPilU/rG'),
(4, 'prueba@gmail.com', '$2y$10$KbB6DvWbiS8pB3ahbjbVZu7fmbI8Ir2s3TEbE.PXyQreHOoLOiXzy'),
(5, 'prueba1@gmail.com', '$2y$10$sK6G1KyAMjndy9snS/TYI.qXMeDjfFnwPGYAqH8ZouzzxXsSAP/Uq'),
(6, 'prueba2@gmail.com', '$2y$10$lFMI3RoWOMcUminT0zv59enrYcum9qahg42wSXKKb1BhLY0gE6uUa'),
(7, 'prueba3@gmail.com', '$2y$10$g9PK2BZOP9gJA7Ubk8CZ2ur1fDkOhUaBarKYTddCKYmp1qsnDl1de'),
(8, 'prueba5@gmail.com', '$2y$10$xt8LMbAtnSkMxWml8XnsNu2FABx2VKi0Iksnun/Pp9egBh/NdycVy'),
(9, 'prueba6@gmail.com', '$2y$10$7EnbIm4twPbDzMSAcn4MS.MOaSxibGMBnaGjmxjRDfYAT6kp6lCFu'),
(10, 'prueba7@gmail.com', '$2y$10$dZjWoySkf84buztsaf1LNue8.AFaH9jBiSB8kOOyRELM21sWwrCoK'),
(11, 'prueba8@gmail.com', '$2y$10$SKee0swaFtzI4dl/cY1n6uCO7PWoSEBe6M46vcp5q9tNR8ElDlcX.'),
(12, 'prueba9@gmail.com', '$2y$10$4AIbikyIfmHFP5Squ//fPOy8iNQGtcwb0d1d5Mi92wIhyv.N20p8W'),
(13, 'prueba10@gmail.com', '$2y$10$q4gjVupbwn46MnMa/.huLeMTo2sZa9s2p2HEx6aOoM4TfTU/DMRP.'),
(14, 'prueba11@gmail.com', '$2y$10$reHMYI.ssLXno2Y7Ao2CeOqluPeChAO2qQZoIbq9u09mCKqHDT6Sm'),
(15, 'prueba12@gmail.com', '$2y$10$Nn1xsRwd.jgMvko63zy2mOR.rGoIaL6Bz4/fkDReJmdo3Es7vyALe');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `linea_pedidos`
--
ALTER TABLE `linea_pedidos`
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_pedido` (`id_pedido`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idPedido`),
  ADD KEY `fk_pedidos_1_idx` (`idUsuario`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProducto`);

--
-- Indices de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  ADD PRIMARY KEY (`idSubcategoria`),
  ADD KEY `idCategoria` (`idCategoria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idPedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  MODIFY `idSubcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `linea_pedidos`
--
ALTER TABLE `linea_pedidos`
  ADD CONSTRAINT `linea_pedidos_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`idProducto`),
  ADD CONSTRAINT `linea_pedidos_ibfk_2` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`idPedido`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk_pedidos_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUusuario`);

--
-- Filtros para la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  ADD CONSTRAINT `subcategorias_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
