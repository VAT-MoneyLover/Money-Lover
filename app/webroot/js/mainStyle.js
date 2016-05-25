$(document).ready(function(){
	$('.transaction').click(function(){
		window.location = $(this).find('a').attr("href");
	});
});