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