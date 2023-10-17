var TrandingSlider = new Swiper('.tranding-slider', {
  effect: 'coverflow',
  grabCursor: true,
  centeredSlides: true,
  loop: true,
  slidesPerView: 'auto',
  coverflowEffect: {
    rotate: 0,
    stretch: 0,
    depth: 100,
    modifier: 2.5,
  },
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  }
});

document.addEventListener('DOMContentLoaded', function () {
  var slider = document.getElementById('slider');

  slider.addEventListener('scroll', function () {
    var scrollPosition = slider.scrollLeft;

    // Adjust this threshold value based on your design
    var fadeThreshold = 100;

    if (scrollPosition > fadeThreshold) {
      slider.classList.add('slider-faded');
    } else {
      slider.classList.remove('slider-faded');
    }
  });
});