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