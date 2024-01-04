<?php
require '../model/conexion.php';
require '../controllers/ajaxCarrito.php';

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/pago.css">
    <title>Document</title>
</head>

<body>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Factura</title>
        <link rel="stylesheet" href="ruta/a/tu/estilo.css"> <!-- Asegúrate de vincular tu hoja de estilos CSS aquí -->
    </head>

    <body>

        <div class="factura">
            <div class="factura-header">
                <h2>Factura de Pago</h2>
            </div>

            <div class="factura-info">
                <div class="info-cliente">
                    <h4>Cliente: </h4> 
                    <p>Nombre del Cliente: <span>Carlos Herazo</span></p>                  
                    <p>Dirección del Cliente: <span>San jose de los campanos</span></p>
                </div>
                <div class="info-factura">
                    <h4>Factura #: <span>12345</span></h4>               
                    <p>Fecha: 2023-01-01</p>
                </div>
            </div>

            <table class="factura-detalle">
                <thead>
                    <tr class="tr">
                        <th>Nombre</th>
                        <th>cantidad</th>
                        <th>Precio</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($_SESSION['carrito'])) : ?>
                        <?php
                        $total = 0;
                        foreach ($_SESSION['carrito'] as $producto) {
                            $total += $producto['subtotal']; // Suma el subtotal de cada producto al total
                        }
                        ?>
                        <?php foreach ($_SESSION['carrito'] as $producto) : ?>
                            <tr class="tr">
                                <td><?php echo $producto['nombre']; ?></td>
                                <td><?php echo $producto['cantidad']; ?></td>
                                <td><?php echo "$" . $producto['precio']; ?></td>
                                <td><?php echo "$" . $producto['subtotal']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>

            <div class="total-factura">
                <h3><?php echo "$" . $total ?></h3>
            </div>

        </div>

    </body>

    </html>

</body>

</html>