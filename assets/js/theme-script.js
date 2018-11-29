$ = jQuery

$(document).ready(function(){
	console.log('jQuery is plugged in');
	$(".navbar-toggler").click(function(){
		console.log('clicked');
		this.classList.toggle("change");
	});
});
