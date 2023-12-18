<?php
require_once './../model/conexion.php';
$conexion = new ConexionBD("localhost", "root", "root", "pizzabd");
$conn = $conexion->obtenerConexion();
// Verifica si la conexión es exitosa
$query = "SELECT * FROM productos WHERE destacados = 1";

if (isset($_GET['categoria']) && !empty($_GET['categoria'])) {
    $categoria = $_GET['categoria'];
    $query .= " AND categoria = '$categoria'";
}

if (isset($_GET['precio']) && is_numeric($_GET['precio'])) {
    $precioMaximo = $_GET['precio'];
    $query .= " AND precio <= $precioMaximo";
}

$result = $conn->query($query);
if ($result) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/product.css">
        <!--Fuentes-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <!-- ... tus otros enlaces y scripts ... -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;500;600;0,800;1,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
        <title>Productos</title>
    </head>

    <body>
        <!-- <header class="header-content primary">
        <div class="header-contact">
            <p> CELL: +57 3135885420</p>
            <p> Carrera #48 Cra 59-25</p>
        </div>
    </header> -->
        <!--comienzo del header-->
        <header class="header-content ">
            <div class="content-logo">
                <img src="../img/logo.png" alt="PizzaMania Logo" class="logo"> <!-- Logo de PizzaMania -->
                <p>Pizza<span>Mania</span></p>
            </div>
            <div class="nav-var">
                <nav>
                    <ul>
                        <a href="">
                            <li>Inicio</li>
                        </a>
                        <a href="">
                            <li>productos</li>
                        </a>
                        <a href="">
                            <li>contactos</li>
                        </a>
                        <a href="">
                            <li><i class="fas fa-shopping-cart"></i></li>
                        </a>
                        <a href="">
                            <li><i class="fas fa-user"></i></li>
                        </a>
                    </ul>
                    <div class="hamburger-menu">
                        <!-- Icono del Menú Hamburguesa -->
                        <i class="fas fa-bars"></i>
                    </div>
                </nav>
            </div>
        </header>

        <!--fin del header-->

        <!--comienzo del Main-->
        <Main class="main-content">
            
            <div id="loader-wrapper">
                <div id="loader">
                    <img src="../img/logo.png" alt="Cargando..."> <!-- Cambia con tu imagen -->
                </div>
            </div>
            <!--Asaide-->
            <br><br><br><br>
            <div class="pizza-aside-separacion">
                <!-- <div class="video">
                    <video class="video" src="../video/video.mp4" autoplay muted loop></video>
                </div>
                <div class="separacion-diagonal"></div> -->
                <div class="Product-aside">
                    <div class="title-aside">
                        <h2 class="text-title-aside">Los mejores precios en pizza</h2>
                        <p class="text-product">¡NUESTROS PRODUCTOS!</p>
                    </div>
                </div>
            </div>
            <!--Fin Asaide img-->
            <!-- Agrega controles de filtro -->
            <form method="get">
                <div class="filter">
                    <label for="categoria">Filtrar por categoría:</label>
                <select name="categoria" id="categoria">
                    <option value="">Todas las categorías</option>
                    <option value="categoria1">Categoría 1</option>
                    <option value="categoria2">Categoría 2</option>
                    <!-- Agrega más opciones según tus categorías -->
                </select>
                </div>

               <div class="filter">
               <label for="precio">Filtrar por precio:</label>
                <input type="number" class="btn-filter" name="precio" id="precio" placeholder="Precio máximo">
               </div>

                <button class="btn " type="submit">Filtrar  <i class="fas fa-filter"></i></button>

            </form>
            <h2 class="section-title">Productos Destacados</h2>
            <div class="alerta" id="miAlerta">¡Elemento agregado correctamente!</div>
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <?php
                    // Iterar sobre los resultados de la consulta
                    while ($row = $result->fetch_assoc()) {
                    ?>
                        <div class="swiper-slide">
                            <div class="div-product">
                                <div class="header-slaider">
                                    <img src="<?php echo $row['imagen']; ?>" alt="pizza">
                                </div>
                                <div class="body-slaider">
                                    <h2><?php echo $row['nombre']; ?></h2>
                                    <p class="Precio">$<?php echo $row['precio']; ?></p>
                                    <p class="Valoracion">Valoración: <?php echo round($row['promedio_valoracion'], 2); ?></p>
                                    <div class="testimonial-stars">
                                        <i class="fas fa-star"></i> <!-- Estrella activa -->
                                        <i class="fas fa-star"></i> <!-- Estrella activa -->
                                        <i class="fas fa-star"></i> <!-- Estrella activa -->
                                        <i class="fas fa-star"></i> <!-- Estrella activa -->
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div class="btn-Botones">
                                        <button class="btn" onclick="mostrarAlerta()">Agregar</button>
                                        <button class="btn">Ver detalles</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>

            <!-- Tu contenido HTML posterior aquí -->
    </body>

    </html>
<?php

    // Liberar los resultados
    $result->free();
} else {
    echo "Error en la consulta: " . $conn->error;
}
?>
<br>


</Main>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="../js/swiper.js"></script>
<script src="../js/slaider_js.js"></script>
<script src="../js/cargando.js"></script>
<script src="../js/alerta.js"></script>
</body>

</html>