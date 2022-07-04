let menu=document.querySelector('#menu-bars');
let navbar=document.querySelector('.navbar');

let section=document.querySelectorAll('section');
let navlinks=document.querySelectorAll('header .navbar a');

menu.onclick=()=>{
	menu.classList.toggle('fa-times');
	navbar.classList.toggle('active');
}

window.onscroll=()=>{
	menu.classList.remove('fa-times');
	navbar.classList.remove('active');

  section.forEach(sec=>{
    let top=window.scrollY;
    let height=sec.offsetHeight;
    let offset=sec.offsetTop -150;
    let id=sec.getAttribute('id');

    if (top=>offset && top<offset + height){
      navlinks.forEach(links=>{
          links.classList.remove('active');

          document.querySelector('header .navbar a  [href*='+id+']').classList.add('active');
      });
    };

  });
}

document.querySelector('#search-icon').onclick=()=>{
	document.querySelector('#search-form').classList.toggle('active');
}
document.querySelector('#close').onclick=()=>{
	document.querySelector('#search-form').classList.remove('active');
}

var swiper = new Swiper(".home-slider", {
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
          delay: 7500,
          disableOnInteraction: false,
        },
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        loop:true,

    });



var swiper = new Swiper(".review-slider", {
  spaceBetween:20,
  centeredSlides:true,
  loop:true,

  autoplay:{
    delay:7500,
    disableOnInteraction:false,
  },

  breakpoints:{
  0: {slidesPerView: 1,
  },

  640: {slidesPerView: 2,
  },

  768:{
    slidesPerView: 2,
  },

  1024:{
    slidesPerView: 3,
   },

  },

});

var swiper = new Swiper(".swiper", {
    spaceBetween: 15,
    centeredSlides: true,

    autoplay: {
      delay: 7500,
      disableOnInteraction: false,
    },

    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },

    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    loop:true,

});




