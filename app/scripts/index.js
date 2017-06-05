$(document).ready(function () {
  $(function () {
    var x = 0;
    setInterval(function () {
      x += 0.5;
      $('.cloud').css('background-position', x + 'px 0');
    }, 10);
  });

  $('.center').slick({
    centerMode: true,
    arrows: false,
    centerPadding: '0px',
    slidesToShow: 3,
    infinite: true,
    autoplay: true,
    autoplaySpeed: 1500,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          infinite: true,
          autoplay: true,
          arrows: false,
          autoplaySpeed: 1500,
          centerMode: true,
          centerPadding: '40px',
          slidesToShow: 1
        }
			},
      {
        breakpoint: 375,
        settings: {
          autoplay: true,
          autoplaySpeed: 1500,
          arrows: false,
          infinite: true,
          centerMode: true,
          centerPadding: '40px',
          slidesToShow: 1
        }
			}
		]
  });

  $('.one-time').slick({
    infinite: true,
    speed: 500,
    slidesToShow: 1,
    autoplay: true,
    arrows: false,
    autoplaySpeed: 2000,
    adaptiveHeight: true,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          infinite: true,
          autoplay: true,
          arrows: false,
          autoplaySpeed: 2000,
          speed: 500,
          slidesToShow: 1,
          adaptiveHeight: true
        }
			},
      {
        breakpoint: 375,
        settings: {
          infinite: true,
          autoplay: true,
          arrows: false,
          autoplaySpeed: 2000,
          speed: 500,
          slidesToShow: 1,
          adaptiveHeight: true
        }
			}
		]
  });

  var hamburgerNav = document.querySelector('.hamburgerNav');
  var hamburger = document.querySelector('.hamburger');

  hamburger.addEventListener(
    'click',
    function () {
      hamburger.classList.toggle('is-active');
      hamburgerNav.classList.toggle('is-active');
      if (hamburgerNav.classList.contains('is-active')) {
        hamburgerNav.style.display = 'inline-block';
      } else {
        hamburgerNav.style.display = 'none';
      }
    },
    false
  );
});

window.sr = ScrollReveal({
  delay: 250,
  duration: 700
});
window.sr = ScrollReveal();
sr.reveal('.home1');
sr.reveal('.home2');
sr.reveal('.home4');
