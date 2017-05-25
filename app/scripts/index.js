$(document).ready(function() {
	console.log('ready!');
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

console.log('hello');
