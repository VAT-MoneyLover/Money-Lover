$(document).ready(function(){
	// add link to div tag
	$('.transaction').click(function(){
		window.location = $(this).find('a').attr("href");
	});
	// text color of expense and income
	







	//popup - show add transaction box
	/*$('#addBox').dialog({
		autoOpen: false,
		show:{
			effect: 'blind',
			duration: 400
		},
		hide:{
			effect: 'blind',
			duration: 400
		},
		modal: true
	});
	//respond to click event - overlay class
	event.event.preventDefault();
	$('#contentWrap').load($this.attr('href'));
	$('#addBox').dialog('open');*/
});