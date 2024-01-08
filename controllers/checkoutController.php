<?php 
session_start();
require '../vendor/autoload.php';
Require '../model/variables.env';

// token único
$acces_token = getenv('TOKEN-ACCESS');
MercadoPago\SDK::setAccessToken($acces_token);

// creamos una preferencia
$preference = new MercadoPago\Preference();

$preference->back_urls = array(
    "success" => "http://localhost/proyect1/controllers/carritoPedido.php",
    "failure" => "http://localhost/proyect1/page/falla.php",
);

$preference->binary_mode = true;

// creamos un array para los productos
$productos = [];
if (!empty($_SESSION['carrito'])) {
    foreach ($_SESSION['carrito'] as $indice => $producto) {
        $item = new MercadoPago\Item();
        $item->title = $producto['nombre'];
        $item->quantity = $producto['cantidad'];
        $item->unit_price = $producto['precio'];
        array_push($productos, $item);
    }
}

$preference->items = $productos;
$preference->save();

// Verificar si $preference->id es nulo
if ($preference->id === null) {
    echo json_encode(array('error' => 'Por favor, elige un producto antes de pagar'));
} else {
    echo json_encode(array('preference_id' => $preference->id));
}
?>
