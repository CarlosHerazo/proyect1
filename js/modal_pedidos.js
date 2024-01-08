
function openModal() {
    var modal = document.getElementById("myModal");
    modal.style.display = "block";
    setTimeout(function() {
        modal.classList.add("show");
    }, 10); 
}

function closeModal() {
    var modal = document.getElementById("myModal");
    modal.classList.remove("show");
    setTimeout(function() {
        modal.style.display = "none";
    }, 300); 
}




window.onclick = function(event) {
    var modal = document.getElementById("myModal");
    if (event.target == modal) {
        closeModal();
    }
}