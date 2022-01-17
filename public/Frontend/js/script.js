var swiper = new Swiper(".products-slider", {
    loop:true,

    spaceBetween: 100,
    grabCursor:true,
    centeredSlides: true,
    autoplay: {
        delay: 1500,
    },
    effect: 'coverflow',
    coverflowEffect: {
        rotate: 30,
        slideShadows: false,
    },
    keyboard: {
        enabled: true,
        onlyInViewport: false,
    },

    breakpoints: {
        0: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
        },
        991: {
            slidesPerView: 3,
        },
    },

});
// $(document).ready(function (){
//     loadcart();
//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });
//     function loadcart()
//     {
//         $.ajax({
//             method:"GET",
//             url:"/load-cart-data",
//             success: function (response){
//                 $('.cart-count').html('');
//                 $('.cart-count').html(response.count);
//
//
//             }
//         });
//     }
// });


