$(document).ready(function() {
	$('.center').slick({
		centerMode: true,
		centerPadding: '0',
		slidesToShow: 3,
		responsive: [
			{
				breakpoint: 768,
				settings: {
					arrows: true,
					centerMode: true,
					centerPadding: '00px',
					slidesToShow: 1
				}
			},
			{
				breakpoint: 375,
				settings: {
					arrows: true,
					centerMode: true,
					centerPadding: '0px',
					slidesToShow: 1
				}
			}
		]
	});

	$('.one-time').slick({
		dots: true,
		infinite: true,
		speed: 300,
		slidesToShow: 1,
		adaptiveHeight: true,
		responsive: [
			{
				breakpoint: 768,
				settings: {
					dots: true,
					infinite: true,
					speed: 300,
					slidesToShow: 1,
					adaptiveHeight: true
				}
			},
			{
				breakpoint: 375,
				settings: {
					dots: true,
					infinite: true,
					speed: 300,
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
		function() {
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
