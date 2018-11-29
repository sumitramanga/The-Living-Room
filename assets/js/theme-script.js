$ = jQuery

$(document).ready(function(){
	console.log('jQuery is plugged in');
	$(".navIcon").click(function(){
		this.classList.toggle("change");
	});
});
