var expSwiper = new Swiper('.exp-swiper', {
    spaceBetween: 32, /* gap */

    pagination: {
        el: '.swiper-pagination', /* katong button */
        clickable: true,
    },

    breakpoints: {
        /* Resolution */
        768: {
            slidesPerView: 2, /* pilay makita sa specific nga resolution */
        },
        
        1208: {
            slidesPerView: 3,
        },

    },
});