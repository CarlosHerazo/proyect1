// modal para los pedidos por recibir
function openModal() {
    var modal = document.getElementById("myModal");
    modal.style.display = "block";
    setTimeout(function() {
        modal.classList.add("show");
    }, 10); 
}

// modal para los pedidos por completar
function openModal2() {
    var modal = document.getElementById("myModal");
    modal.style.display = "block";
    setTimeout(function() {
        modal.classList.add("show");
    }, 10); 
}


// funcion para cerrar el modal
function closeModal() {
    var modal = document.getElementById("myModal");
    modal.classList.remove("show");
    setTimeout(function() {
        modal.style.display = "none";
    }, 300); 
}


// funcion para llamar la funcion de cerrar
window.onclick = function(event) {
    var modal = document.getElementById("myModal");
    if (event.target == modal) {
        closeModal();
    }
}