const swiper = new Swiper('.mySwiper', {
    // Opciones de Swiper
    slidesPerView: 4,
    spaceBetween: 30,
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    // Habilitar autoplay
    autoplay: {
        delay: 3000, // Retraso de 3 segundos
        disableOnInteraction: false, // Continuar con autoplay después de la interacción del usuario
    },
});


const swipers = new Swiper('.mySwipers', {
    // Opciones de Swiper
    slidesPerView: 1,
    spaceBetween: 30,
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    // Habilitar autoplay
    autoplay: {
        delay: 3000, // Retraso de 3 segundos
        disableOnInteraction: false, // Continuar con autoplay después de la interacción del usuario
    },
});