const publicKey = 'TEST-a68b8fde-2220-4039-b998-287ecd3e9a48';
const mp = new MercadoPago(publicKey, {
    locale: 'es-CO'
});

// Lógica para obtener la preferencia del backend
function obtenerPreferencia() {
    fetch('../controllers/checkoutController.php')
        .then(response => response.json())
        .then(data => {
            console.log(data); 
            inicializarCheckout(data.preference_id);
        })
        .catch(error => console.error('Error al obtener la preferencia:', error));
}

// Lógica para inicializar el checkout
function inicializarCheckout(preferenceId) {
    if (preferenceId) {
        const checkout = mp.checkout({
            preference: {
                id: preferenceId
            },
            render: {
                container: '.merca-btn',
                label: 'Proceder a pagar',
            },
        });
    } else {
        
    }
}


// Llamar a la función para obtener la preferencia al cargar la página
window.onload = obtenerPreferencia();