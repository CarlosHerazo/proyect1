<?php
require_once './../model/conexion.php';
// Crear una instancia de ConexionBD
$conexion = new ConexionBD();

// Obtener la conexión
$conn = $conexion->obtenerConexion();

// Cerrar la conexión cuando haya terminado
$conexion->cerrarConexion();

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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/product.css">
    <link rel="stylesheet" href="../css/carrito.css">
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
    <!--comienzo del header-->
    <?php require '../globals/headers.php'; ?>
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
                    <option value="pizzas">pizzas</option>
                    <option value="combos">combos</option>
                    <option value="familiar">familia</option>
                    <option value="gaseosas">gaseosas</option>
                    <!-- Agrega más opciones según tus categorías -->
                </select>
            </div>

            <div class="filter">
                <label for="precio">Filtrar por precio:</label>
                <input type="number" class="btn-filter" name="precio" id="precio" placeholder="Precio máximo">
            </div>

            <button class="btn " type="submit">Filtrar <i class="fas fa-filter"></i></button>

        </form>
        <h2 class="section-title">Productos Destacados</h2>
        <div class="swiper mySwiper">
            <?php
            if ($result) {
            ?>
                <div class="swiper-wrapper">
                    <?php
                    if ($result-> rowCount() > 0) {
                        // Iterar sobre los resultados de la consulta
                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                            <div class="swiper-slide">
                                <div class="div-product">
                                    <div class="header-slaider">
                                        <img src="<?php echo $row['imagen']; ?>" alt="pizza">
                                    </div>
                                    <div class="body-slaider">
                                        <h2><?php echo $row['nombre']; ?></h2>
                                        <p class="Precio">$<?php echo number_format( $row['precio'],2); ?></p>
                                        <p class="Valoracion">Valoración: <?php echo round($row['promedio_valoracion'], 2); ?></p>
                                        <div class="testimonial-stars">
                                            <i class="fas fa-star"></i> <!-- Estrella activa -->
                                            <i class="fas fa-star"></i> <!-- Estrella activa -->
                                            <i class="fas fa-star"></i> <!-- Estrella activa -->
                                            <i class="fas fa-star"></i> <!-- Estrella activa -->
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <div class="btn-Botones">
                                            <button class="btn" id="agregar-product" data-id ="<?php echo ($row['id'])?>" data-nombre="<?php echo htmlspecialchars($row['nombre'], ENT_QUOTES); ?>" data-precio="<?php echo $row['precio']; ?>" onclick="agregarAlCarrito(this)">Agregar</button>
                                            <button class="btn">Ver detalles</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    } else {
                        echo "<p>No hay productos destacados disponibles.</p>";
                    }
                    ?>
                </div>
                <div class="swiper-pagination"></div>
        </div>
    <?php    
             
            } else {
                echo "Error en la consulta: ";
            }

    ?>

    <!--Combos-->
    <h2 class="section-title"> SUPER COMBOS</h2>
    <?php
    $query = "SELECT * FROM productos WHERE categoria = 'combos'";
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
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <?php
                if ($result-> rowCount() > 0) {
                    // Iterar sobre los resultados de la consulta
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                ?>
                        <div class="swiper-slide">
                            <div class="div-product">
                                <div class="header-slaider">
                                    <img src="<?php echo $row['imagen']; ?>" alt="pizza">
                                </div>
                                <div class="body-slaider">
                                    <h2><?php echo $row['nombre']; ?></h2>
                                    <p class="Precio">$<?php echo  number_format( $row['precio'],2); ?></p>
                                    <p class="Valoracion">Valoración: <?php echo round($row['promedio_valoracion'], 2); ?></p>
                                    <div class="testimonial-stars">
                                        <i class="fas fa-star"></i> <!-- Estrella activa -->
                                        <i class="fas fa-star"></i> <!-- Estrella activa -->
                                        <i class="fas fa-star"></i> <!-- Estrella activa -->
                                        <i class="fas fa-star"></i> <!-- Estrella activa -->
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div class="btn-Botones">
                                        <button class="btn agregar-product"  data-clicked="0" id="agregar-product" data-id ="<?php echo ($row['id'])?>" data-nombre="<?php echo htmlspecialchars($row['nombre'], ENT_QUOTES); ?>" data-precio="<?php echo $row['precio']; ?>" onclick="agregarAlCarrito(this)">Agregar</button>
                                        <button class="btn">Ver detalles</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo "<p class='alert-product'>No hay productos destacados disponibles.</p>";
                }
               
                ?>
            </div>
        </div>
    <?php

    } else {
        echo "Error en la consulta: ";
    }
    ?>

    <!--Tamaño Familiar-->
    <h2 class="section-title">TAMAÑOS FAMILIAR</h2>
    <?php
    $query = "SELECT * FROM productos WHERE categoria = 'familiar'";
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
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <?php
                if ($result->rowCount() > 0) {
                    // Iterar sobre los resultados de la consulta
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                ?>
                        <div class="swiper-slide">
                            <div class="div-product">
                                <div class="header-slaider">
                                    <img src="<?php echo $row['imagen']; ?>" alt="pizza">
                                </div>
                                <div class="body-slaider">
                                    <h2><?php echo $row['nombre']; ?></h2>
                                    <p class="Precio">$<?php echo number_format( $row['precio'], 2); ?></p>
                                    <p class="Valoracion">Valoración: <?php echo round($row['promedio_valoracion'], 2); ?></p>
                                    <div class="testimonial-stars">
                                        <i class="fas fa-star"></i> <!-- Estrella activa -->
                                        <i class="fas fa-star"></i> <!-- Estrella activa -->
                                        <i class="fas fa-star"></i> <!-- Estrella activa -->
                                        <i class="fas fa-star"></i> <!-- Estrella activa -->
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div class="btn-Botones">
                                        <button class="btn agregar-product" data-clicked="0" id="agregar-product" data-id ="<?php echo ($row['id'])?>" data-nombre="<?php echo htmlspecialchars($row['nombre'], ENT_QUOTES); ?>" data-precio="<?php echo $row['precio']; ?>" onclick="agregarAlCarrito(this)">Agregar</button>
                                        <button class="btn">Ver detalles</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo "<p class='alert-product'>No hay productos destacados disponibles.</p>";
                }
                ?>
            </div>
        </div>
    <?php

    } else {
        echo "Error en la consulta: ";
    }
    ?>


    <!--Bebidas-->
    <h2 class="section-title">BEBIDAS</h2>
    <?php
    $query = "SELECT * FROM productos WHERE categoria = 'gaseosas'";
    $result = $conn->query($query);
    if ($result) {
    ?>
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <?php
                if ($result->rowCount() > 0) {
                    // Iterar sobre los resultados de la consulta
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                ?>
                        <div class="swiper-slide">
                            <div class="div-product">
                                <div class="header-slaider">
                                    <img src="<?php echo $row['imagen']; ?>" alt="gaseosas">
                                </div>
                                <div class="body-slaider">
                                    <h2><?php echo $row['nombre']; ?></h2>
                                    <p class="Precio">$<?php echo  number_format( $row['precio'], 2); ?></p>
                                    <p class="Valoracion">Valoración: <?php echo round($row['promedio_valoracion'], 2); ?></p>
                                    <div class="testimonial-stars">
                                        <i class="fas fa-star"></i> <!-- Estrella activa -->
                                        <i class="fas fa-star"></i> <!-- Estrella activa -->
                                        <i class="fas fa-star"></i> <!-- Estrella activa -->
                                        <i class="fas fa-star"></i> <!-- Estrella activa -->
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div class="btn-Botones">
                                        <button class="btn agregar-product" data-clicked="0" id="agregar-product"  data-id ="<?php echo ($row['id'])?>" data-nombre="<?php echo htmlspecialchars($row['nombre'], ENT_QUOTES); ?>" data-precio="<?php echo $row['precio']; ?>" onclick="agregarAlCarrito(this)">Agregar</button>
                                        <button class="btn">Ver detalles</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo "<p class='alert-product'>No hay productos destacados disponibles.</p>";
                }
                // Liberar el resultado de la segunda consulta
                ?>
            </div>
        </div>
    <?php

    } else {
        echo "Error en la consulta: ";
    }
    ?>
    <br>
<?php require '../globals/footers.php'; ?>
</body>

</html>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="../js/swiper.js"></script>
<script src="../js/slaider_js.js"></script>
<script src="../js/cargando.js"></script>
<script src="../js/agregarCarrito.js"></script>
</body>

</html>