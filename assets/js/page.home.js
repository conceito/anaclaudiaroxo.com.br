$(document).ready(function() {
    var perView = 1;
    var mySwiper;
    swiper(1);

    function swiper(perView) {
        mySwiper = new Swiper('.swiper-container', {
            calculateHeight: true,
            slidesPerView: 'auto',
            loop: true
            // ,
            // resizeReInit: true,
            // ,
            // centeredSlides: (perView == 1) ? true : false
        });
    }
    $('.arrow-left', '.home-swiper').on('click', function(e) {
        e.preventDefault();
        mySwiper.swipePrev();
    });
    $('.arrow-right', '.home-swiper').on('click', function(e) {
        e.preventDefault();
        mySwiper.swipeNext();
    });
    $('.nivoSlider').nivoSlider({
        prevText: '&lt;',
        nextText: '&gt;',
        randomStart: true,
        animSpeed: 500,
        pauseTime: 3000,
        controlNav: false,
        pauseOnHover: false,
    });
    //
});