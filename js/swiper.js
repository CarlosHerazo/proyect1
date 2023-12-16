const swiper = new Swiper('.mySwiper', {
    // Opciones de Swiper
    slidesPerView: 4,
    spaceBetween: 30,
    // Habilitar autoplay
    autoplay: {
        delay: 3000, // Retraso de 3 segundos
        disableOnInteraction: false, // Continuar con autoplay después de la interacción del usuario
    },
    // Breakpoints
    breakpoints: {
        // Cuando la anchura de la ventana es >= 500px 
        320: {
            slidesPerView: 1,
            spaceBetween: 20
        },
        // Cuando la anchura de la ventana es >=600px 
        600: {
            slidesPerView: 2,
            spaceBetween: 20
        },
        // Cuando la anchura de la ventana es >= 768px 
        800: {
            slidesPerView: 3,
            spaceBetween: 30
        },
        // Cuando la anchura de la ventana es >= 1080px 
        1080: {
            slidesPerView: 4,
            spaceBetween: 30
        }
    }
});
