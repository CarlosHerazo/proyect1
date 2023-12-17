function mostrarAlerta() {
    var alerta = document.getElementById('miAlerta');
    alerta.style.display = 'block';
    setTimeout(function() {
      alerta.style.display = 'none';
    }, 3000); // La alerta desaparecerá después de 3 segundos
  }