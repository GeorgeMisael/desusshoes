// var categoriesSwiper = new Swiper("#MainSlider", {
//     slidesPerView: 1,
//     spaceBetween: 16,
//     loop: false,
//     pagination: {
//         el: ".swiper-pagination",
//         clickable: true,
//         bulletClass: "custom-bullet",
//         bulletActiveClass: "custom-bullet-active",
//         renderBullet: function (index, className) {
//             // Ganti dengan URL gambar sesuai dengan slide
//             const images = ["assets/images/thumbnails/thumb1.png", "assets/images/thumbnails/thumb2.png", "assets/images/thumbnails/thumb3.png", "assets/images/thumbnails/thumb4.png"];
//             return `
//                  <span class="${className} rounded-full w-[70px] h-[70px] bg-cover p-[2px] transition-all duration-300">
//                     <div class="w-full h-full flex items-center justify-center rounded-full bg-white">
//                         <div class="image-bg w-[60px] h-[60px] flex items-center justify-center overflow-hidden rounded-full">
//                             <div class="h-[45px] w-[45px] flex items-center justify-center overflow-hidden">
//                                 <img src="${images[index]}" alt="image" class="w-full h-full object-cover">
//                             </div>
//                         </div>
//                     </div>
//                  </span>
//             `;
//         },
//     },
// });

var categoriesSwiper = new Swiper("#ReviewsSlider", {
    slidesPerView: "auto",
    spaceBetween: 16,
    slidesOffsetAfter: 20,
    slidesOffsetBefore: 20,
});

