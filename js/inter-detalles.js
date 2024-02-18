document.querySelector('.heart-icon').addEventListener('click', function () {
    this.classList.toggle('far'); // Ícono de corazón no relleno
    this.classList.toggle('fas'); // Ícono de corazón relleno
    this.classList.toggle('active'); // Cambia el estilo para el estado activo
});

let quantityValue = document.getElementById('quantity-value');

document.querySelector('.quantity-minus').addEventListener('click', function () {
    let currentValue = parseInt(quantityValue.textContent, 10);
    if (currentValue > 1) {
        quantityValue.textContent = currentValue - 1;
    }
});

document.querySelector('.quantity-plus').addEventListener('click', function () {
    let currentValue = parseInt(quantityValue.textContent, 10);
    quantityValue.textContent = currentValue + 1;
});


function verDetalles(elemento) {
    var productId = elemento.getAttribute('data-id-detalles');
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../controllers/detallesControllers.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function () {
        if (xhr.status == 200) {
            var data = JSON.parse(xhr.responseText);
            // Redirigir a 'detalles.php' con los datos como parámetros en la URL
            window.location.href = 'detalles.php?nombre=' + encodeURIComponent(data.nombre) +
                '&categoria=' + encodeURIComponent(data.categoria) +
                '&precio=' + encodeURIComponent(data.precio) +
                '&descripcion=' + encodeURIComponent(data.descripcion) +
                '&imagen=' + encodeURIComponent(data.imagen);
        }
    };

    // Enviar la solicitud con el ID del producto
    xhr.send('id=' + productId);
}



document.addEventListener('DOMContentLoaded', function () {
    // Obtener parámetros de la URL
    var params = new URLSearchParams(window.location.search);

    // Obtener valores de los parámetros
    var nombre = params.get('nombre');
    var categoria = params.get('categoria');
    var precio = params.get('precio');
    var descripcion = params.get('descripcion');
    var imagen = params.get('imagen');

    // Obtener referencias a los elementos HTML
    var titleElement = document.querySelector('.title');
    var categoryElement = document.querySelector('.category');
    var priceElement = document.querySelector('.price');
    var descElement = document.querySelector('.desc');
    var imgElement = document.querySelector('.images img');

    // Actualizar el contenido de los elementos con los datos de la URL
    titleElement.textContent = nombre;
    categoryElement.textContent = categoria;
    priceElement.textContent = '$' + parseFloat(precio).toFixed(2);
    descElement.innerHTML = '<h2>Ingredientes de Primera Calidad</h2><strong>Base:</strong> ' + descripcion;
    imgElement.src = imagen;
});





