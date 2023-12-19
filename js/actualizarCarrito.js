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

function alert(indice){
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
                Swal.fire({
                    title: "Eliminado!",
                    text: "Producto Eliminado del carrito.",
                    icon: "success"
                }).then(() => {
                    location.reload(); // Recarga la página después de hacer clic en "OK"
                });
            }).catch(error => {
                console.error('Hubo un problema con la petición fetch:', error);
            });
        }
    });
    
    
  
}