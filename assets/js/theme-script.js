$ = jQuery

$(document).ready(function(){
	$(".navbar-toggler").click(function(){
		this.classList.toggle("change");
	});

	var mySwiper = new Swiper (".swiper-container", {
		loop: true,
		autoHeight: true,
		autoplay: true,
		delay: 300,
		effect: "fade",
		fadeEffect: {
			crossFade: true
		},
	});

	$(".scrollDownBtn").click(function(){
		$("html, body").animate({
			scrollTop: $(".featuredReviews").offset().top
		}, 2500);
	});
});
