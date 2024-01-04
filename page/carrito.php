<?php
require '../model/conexion.php';
require '../controllers/ajaxCarrito.php';

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/carrito.css">
    <!--Fuentes-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- ... tus otros enlaces y scripts ... -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;500;600;0,800;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <title>Carrito</title>
</head>

<body>
    <?php require '../globals/headers.php'; ?>

    <!--fin del header-->
    <br><br><br><br>
    <!--comienzo del Main-->
    <h2 class="section-title">Carrito de Compras <i class="fas fa-shopping-cart"></i></h2>
    <main class="main-content">

        <div class="container-compra">
            <div class="listado">
                <table>
                    <tr class="tr">
                        <th>Nombre</th>
                        <th>cantidad</th>
                        <th>Precio</th>
                        <th>Subtotal</th>
                        <th>Eliminar Producto</th>
                    </tr>

                    <?php if (!empty($_SESSION['carrito'])) : ?>
                        <?php
                        ?>
                        <?php foreach ($_SESSION['carrito'] as $indice => $producto) : ?>
                            <tr class="tr">
                                <td><?php echo $producto['nombre']; ?></td>
                                <td>
                                    <button class="decremento" onclick="decrementarCantidad(<?php echo $indice; ?>)">-</button>
                                    <span id="cantidad_<?php echo $indice; ?>">
                                        <?php echo $producto['cantidad']; ?>
                                    </span>
                                    <button class="incremento" onclick="incrementarCantidad(<?php echo $indice; ?>)">+</button>
                                </td>
                                <td><?php echo "$" . number_format($producto['precio']); ?></td>
                                <td><?php echo "$" . number_format($producto['subtotal']); ?></td>
                                <td><i onclick="alert(<?php echo $indice; ?>)" class="fas fa-trash"></i></td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="5">
                                <div class="total">
                                    <h2>Total A pagar</h2>
                                    <p><?php echo "$" . number_format($total, 2); ?></p>
                                </div>
                            </td>
                        </tr>
                    <?php else : ?>
                        <tr>
                            <td colspan="5">No hay productos en el carrito</td>
                        </tr>
                    <?php endif; ?>
                </table>
                <button class="pagar">
                    Proceder a pagar
                </button>

            </div>
        </div>

    </main>


</body>
<br>
<?php require '../globals/footers.php'; ?>

</html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../js/alerta.js"></script>
<script src="../js/slaider_js.js"></script>
<script src="../js/cargando.js"></script>
<script src="../js/actualizarCarrito.js"></script>
</body>

</html>