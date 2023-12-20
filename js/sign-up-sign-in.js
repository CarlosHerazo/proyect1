document.getElementById('login-form').addEventListener('submit', function(e) {
    e.preventDefault();
    // Obtener datos del formulario
    // Enviar datos a UserController.php usando AJAX
});

// AJAX para registrar
document.getElementById('registro-form').addEventListener('submit', function(e) {
    e.preventDefault();

    var data = {
        nombre: document.querySelector('[name="name"]').value,
        email: document.querySelector('[name="email"]').value,
        contrasena: document.querySelector('[name="pass"]').value,
        direccion: document.querySelector('[name="adress"]').value,
        telefono: document.querySelector('[name="phone"]').value,
        action: "registrar",
    };

    fetch('../ajax/UserAjax.php', {
        method: 'POST',
        body: JSON.stringify(data),
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => console.log(data))
    .catch(error => console.error('Error:', error));
});
