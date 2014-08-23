$( document ).ready(function() {
   $( "#showpopup" ).click(function() {
		$('#simple-survey-box-popup').fadeIn();
	});
	$( "#closepopup" ).click(function() {
		$('#simple-survey-box-popup').fadeOut();
	});
});