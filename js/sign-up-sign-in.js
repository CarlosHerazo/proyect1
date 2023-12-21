document.getElementById('login-form').addEventListener('submit', function(e) {
    e.preventDefault();
    // Obtener datos del formulario
    // Enviar datos a UserController.php usando AJAX
});

// AJAX para registrar

document.getElementById('registro-form').addEventListener('submit', function(e) {
    e.preventDefault();

    let data = {
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
    .then(data => {
        
       if(data){
        Swal.fire({
            position: "top-end",
            title: "Bienvenido!!",
            background: "#f9ba00",
            text: data,
            footer: "Confirma tu cuenta en tu email!!",
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            allowOutsideClick: true,
            confirButtonArialLabel: 'Registro Exitoso',
            imageUrl: '../img/logo.png',
            imageWidth: '100px',
            imageHeight: '100px',
            imageAlt: 'Logo de la pizzeria',
            customClass: {
                title: 'text-alert',
                footer: 'text-alert-Important',
                image: 'swal2-image-circular' // Aplica la clase personalizada a la imagen
            },
        }).then(() => {
            location.reload(); 
        });
       }
        
    })
    .catch(error => console.error('Error:', error));
});

