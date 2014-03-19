$(document).ready(function() {
    var perView = 1;
    var cirurgicos, esteticos;
    cirurgicos = new Swiper('.cirurgicos-swiper .swiper-container', {
        calculateHeight: true,
        slidesPerView: 'auto',
        loop: false
    });

    esteticos = new Swiper('.esteticos-swiper .swiper-container', {
        calculateHeight: true,
        slidesPerView: 'auto',
        loop: false
    });
    $('.arrow-left', '.cirurgicos-swiper').on('click', function(e) {
        e.preventDefault();
        cirurgicos.swipePrev();
    });
    $('.arrow-right', '.cirurgicos-swiper').on('click', function(e) {
        e.preventDefault();
        cirurgicos.swipeNext();
    });
    //
    $('.arrow-left', '.esteticos-swiper').on('click', function(e) {
        e.preventDefault();
        esteticos.swipePrev();
    });
    $('.arrow-right', '.esteticos-swiper').on('click', function(e) {
        e.preventDefault();
        esteticos.swipeNext();
    });
    //
});