// Inicialización del objeto Swal para alertas
let Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
});



function incrementarCantidad(indice) {
    const datos = new URLSearchParams();
    datos.append('accion', 'incrementar');
    datos.append('indice', indice);

    fetch('../controllers/ajaxCarrito.php', {
        method: 'POST',
        body: datos
    }).then(data => {
        location.reload();
    }).catch(error => {
        console.error('Hubo un problema con la petición fetch:', error);
    });
}


function decrementarCantidad(indice) {
    const datos = new URLSearchParams();
    datos.append('accion', 'decrementar');
    datos.append('indice', indice);

    fetch('../controllers/ajaxCarrito.php', {
        method: 'POST',
        body: datos

    }).then(data => {
        location.reload();
    }).catch(error => {
        console.error('Hubo un problema con la petición fetch:', error);
    });

}

function alert(indice) {
    Swal.fire({
        title: "¿Desea eliminar el producto?",
        text: "puede volver a elegirlo en la seccion de productos!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#FF6347",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, Eliminar!",
        cancelButtonText: "Cancelar!",
    }).then((result) => {
        if (result.isConfirmed) {
            const datos = new URLSearchParams();
            datos.append('accion', 'eliminar');
            datos.append('indice', indice);

            fetch('../controllers/ajaxCarrito.php', {
                method: 'POST',
                body: datos
            }).then(data => {
                // Guarda una bandera en localStorage antes de recargar
                localStorage.setItem('mostrarAlerta', 'true');
                location.reload(); // Recarga la página
            }).catch(error => {
                console.error('Hubo un problema con la petición fetch:', error);
            });
        }
    });

}

// Listener para verificar la alerta en el localStorage
document.addEventListener('DOMContentLoaded', (event) => {
    if (localStorage.getItem('mostrarAlerta') === 'true') {
        // Mostrar la alerta de éxito
        Toast.fire({
            icon: 'success',
            title: 'Producto Eliminado'
        });
        // Limpia la bandera en localStorage
        localStorage.removeItem('mostrarAlerta');
    }
});