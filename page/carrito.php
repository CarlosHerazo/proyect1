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
                <div class="merca-btn pagar">

                </div>
                <div id="merx">
                    <?php
                    $llaveSecreta = "4Vj8eK4rloUd272L48hsrarnUA";
                    $merchantId = "508029";
                    $referenceCode = "PIZZA" . substr(md5(uniqid()), 0, 10);
                    $signature = hash('md5', "$llaveSecreta~$merchantId~$referenceCode~$total~COP");

                    ?>

                    <form method="post" action="https://sandbox.checkout.payulatam.com/ppp-web-gateway-payu/">
                        <input name="merchantId" type="hidden" value="<?php echo $merchantId; ?>">
                        <input name="accountId" type="hidden" value="512321">
                        <input name="description" type="hidden" value="Test PAYU">
                        <input name="referenceCode" type="hidden" value="<?php echo $referenceCode; ?>">
                        <input name="amount" type="hidden" value="<?php echo $total; ?>">
                        <input name="tax" type="hidden" value="0">
                        <input name="taxReturnBase" type="hidden" value="0">
                        <input name="currency" type="hidden" value="COP">
                        <input name="signature" type="hidden" value="<?php echo $signature; ?>">
                        <input name="test" type="hidden" value="0">
                        <input name="buyerEmail" type="hidden" value="<?php echo $_SESSION['user_info']['correo']; ?>">
                        <input name="responseUrl" type="hidden" value="http://localhost/proyect1/page/confirmacion.php">
                        <input name="confirmationUrl" type="hidden" value="http://localhost/proyect1/page/carrito.php">
                        <input name="shippingAddress" type="hidden" value="<?php echo $_SESSION['user_info']['direccion']; ?>">
                        <input name="shippingCity" type="hidden" value="Cartagena">
                        <input name="shippingCountry" type="hidden" value="CO">
                        <input name="Submit" type="submit" value="Pagar con Payu">
                    </form>


                </div>
            </div>
        </div>

    </main>


</body>
<br>
<?php require '../globals/footers.php'; ?>

<!--SDK MercadoPago.js-->
<script src="https://sdk.mercadopago.com/js/v2"></script>
<!-- Tu código existente -->
<script src="../js/generarCheckaout.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../js/alerta.js"></script>
<script src="../js/slaider_js.js"></script>
<script src="../js/actualizarCarrito.js"></script>
</body>
<script>
    var payuForm = document.getElementById('payuForm');

    // Modificar los valores de los campos según tus necesidades
    payuForm.querySelector('[name="merchantId"]').value = 'tu_merchant_id';
    payuForm.querySelector('[name="accountId"]').value = 'tu_account_id';
    // ... otros campos ...

    // Agregar un evento para enviar el formulario cuando sea necesario
    function enviarFormularioPayu() {
        // Aquí puedes agregar lógica adicional si es necesario
        payuForm.submit();
    }
</script>

</html>