//Swiper.js library configuration 
const swiper = new Swiper('.swiper', {
  // Optional parameters
  loop: true,
  grabCursor : true,
  speed: 300,  
  spaceBetween :30,
  
  
  // If we need pagination
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

  breakpoints : {
    0: { 
      slidesPerView : 1,
  },
  512 :{
    slidesPerView : 2,    
  },

  1024 :{
    slidesPerView : 4,
  }
  }
});