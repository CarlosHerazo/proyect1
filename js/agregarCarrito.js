let Toas = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
   
})

function agregarAlCarrito(elemento) {
    var productId = elemento.getAttribute('data-id');
    var productName = elemento.getAttribute('data-nombre');
    var productPrice = elemento.getAttribute('data-precio');
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../controllers/ajaxCarrito.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
        if (this.status == 200) {

        }
    };
    xhr.send('id=' + productId + '&nombre=' + encodeURIComponent(productName) + '&precio=' + encodeURIComponent(productPrice));
}

document.querySelectorAll("#agregar-product").forEach(function (elemento) {
    elemento.addEventListener('click', () => {
        let conteoClicks = parseInt(elemento.getAttribute('data-clicked')) || 0;
        conteoClicks++;

        // Actualiza el atributo con el nuevo conteo
        elemento.setAttribute('data-clicked', conteoClicks);

        // Alerta de éxito en el primer clic, alerta diferente en clics subsiguientes
        if (conteoClicks === 1) {
            Toas.fire({
                icon: 'success',
                title: 'Producto agregado al carrito',    
                background: "#FF8165",
                customClass: {
                    title: 'text-alert',
                },        
            })

            // Actualiza el contador del carrito
            let conteoCarrito = parseInt(document.querySelector(".conteo").textContent);
            let reseteo = document.querySelector(".conteo");
            reseteo.textContent = ++conteoCarrito;

        } else {
            Toas.fire({
                icon: 'info',
                title: 'cantidad actualizada',
                background : "#E6E6FA",
                customClass: {
                    title: 'text-alert2',                  
                },
            })
        }


    });
});
