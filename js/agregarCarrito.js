function agregarAlCarrito(elemento) {
    var productId = elemento.getAttribute('data-id');
    var productName = elemento.getAttribute('data-nombre');
    var productPrice = elemento.getAttribute('data-precio');
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../controllers/ajaxCarrito.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (this.status == 200) {
            // Manejar la respuesta, mostrar alerta, etc.
        }
    };
    xhr.send('id=' + productId +'&nombre=' + encodeURIComponent(productName) + '&precio=' + encodeURIComponent(productPrice));
}