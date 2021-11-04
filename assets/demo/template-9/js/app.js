// AOS
AOS.init({
  once: true,
});

// End AOS

// // Respownsive Background Body
// const bungkus_konten = document.getElementById('bungkus-content');

// function res_bg(bg) {
//   if (bg.matches) {
//     bungkus_konten.classList.remove('container-fluid');
//   } else {
//     bungkus_konten.classList.add('container-fluid');
//   }
// }
// var bg = window.matchMedia('(max-width: 360px)');
// res_bg(bg);
// bg.addListener(res_bg);

// // End Respownsive Background Body

// Swiper Galery Foto
var swiper = new Swiper('.mySwiper', {
  spaceBetween: 2,
  slidesPerView: 4,
  freeMode: true,
  watchSlidesProgress: true,
});
var swiper2 = new Swiper('.mySwiper2', {
  spaceBetween: 2,
  autoplay: {
    delay: 2200,
    disableOnInteraction: false,
  },
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
  thumbs: {
    swiper: swiper,
  },
});
// end Swiper Galery Foto

// Swiper Chat
var swiper = new Swiper('.slider', {
  spaceBetween: 30,
  centeredSlides: true,
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
});
// Ens Swiper Chat

// Smooth Scroll
$(document).ready(function () {
    $("a").on('click', function (event) {
        if (this.hash !== "") {
            event.preventDefault();
            var hash = this.hash;
            $('.content, section').animate({
                scrollTop: $(hash).offset().top
            }, 1000, function () {

                window.location.hash = hash;
            });
        }
    });
});
// End Smooth Scroll