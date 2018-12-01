$ = jQuery

$(document).ready(function(){
	$(".navbar-toggler").click(function(){
		this.classList.toggle("change");
	});

	var mySwiper = new Swiper ('.swiper-container', {
		loop: true,
		autoHeight: true,
		autoplay: true,
		delay: 300,
		effect: 'fade',
		fadeEffect: {
			crossFade: true
		},

		// If we need pagination
		pagination: {
		  el: '.swiper-pagination',
		},

		// Navigation arrows
		navigation: {
		  nextEl: '.swiper-button-next',
		  prevEl: '.swiper-button-prev',
		}
	});
});
