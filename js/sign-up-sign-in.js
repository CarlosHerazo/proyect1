// AJAX para ingresar
document.getElementById('login-form').addEventListener('submit', function(e) {
    e.preventDefault();
    let data = {
        email: document.querySelector('[name="user"]').value,
        contrasena: document.querySelector('[name="contra"]').value,
        action: "ingresar",
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
        if (data.status === "success") {
            // Redirigir a otra página
            window.location.href = 'productos.php';
        }
    })
    .catch(error => {
        console.error('Error al procesar la respuesta:', error);
    });
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
        console.log(data)
        Swal.fire({
            position: "top-end",
            title: "Bienvenido!!",
            background: "#f9ba00",
            text: data.message,
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
        })
        .then(() => {
                location.reload(); 
            });
       }
        
    })
    .catch(error => console.error('Error:', error));
});

