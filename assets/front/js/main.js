
/*===== Scroll Menu =====*/
/*window.addEventListener("scroll", function(){
    var header = document.querySelector("header");
    header.classList.toggle("sticky", window.scrollY > 0);
})*/
/*====== Button Scroll =======*/
const scrollBtn = document.querySelector('.scroll-btn') ;


window.addEventListener('scroll', () => {
    if(document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        scrollBtn.style.display = 'block' ;
    }
    else {
        scrollBtn.style.display = 'none' ;
    }
})
scrollBtn.addEventListener('click' , () => {
    window.scroll({
        top: 0 ,
        behavior: "smooth"
    })
})

/*===== SCROLL REVEAL ANIMATION =====*/
const sr = ScrollReveal({
    origin: 'top',
    distance: '30px',
    duration: 2000,
    reset: true
});

/*SCROLL WHY US*/
sr.reveal('.why-us',{}); 
sr.reveal('.card-body',{delay: 400}); 
sr.reveal('.icon',{delay: 400}); 
sr.reveal('.card-text',{delay: 400}); 

/*SCROLL Pricing*/
sr.reveal('.pricing',{}); 
sr.reveal('.pricing-item',{delay: 400}); 
sr.reveal('.pricing-deco',{delay: 400}); 

/*SCROLL Pricing*/
sr.reveal('.contact-us',{}); 
sr.reveal('.fields',{delay: 400}); 
sr.reveal('.col',{delay: 400});


anime({
    targets: '.card-body',
    delay: anime.stagger(600, {easing: 'easeOutQuad'})
  });

  /* ======================================*/
  <!-- Initialize Swiper -->
      let swiper = new Swiper(".swiper-container", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        },
        coverflowEffect: {
          rotate: 0,
          stretch: 0,
          depth: 40,
          modifier: 1,
          slideShadows: true,
        },
        loop: true,
      });