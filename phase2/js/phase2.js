$( document ).ready(function() {
   // call show popup funtion
   $( ".uploadBtn" ).click(function() {
   		$( ".uploadBtn" ).attr("disabled", "disabled");
		showCropAvatar();
	});
   // call close popup function
   $( ".close-btn" ).click(function() {
		closeAvaEdit();
	});
   //validate profile form
 

   $('#vote-photo').click(function(){
   		$('#vote-photo').attr('disabled','disabled');
	   $.ajax({
		  type: "POST",
		  url: "vote.php",
		  data: { ptid: $('#pt-id').val()}
		}).done(function( msg ) {
			if(msg == 1){
				var h = $('#vote-count').val();
				h++;
				$('.like').html('<b>'+h+'</b>');
			}
			else{
				alert("Bạn đã bình chọn rồi");
			}
		  });
	});
   $('.search-btn').click(function(){
   		var searchtext = $('.search-text').val();
   		var curr_url= $('.curr_url').val();
   		if(searchtext != ''){
   			window.location.href = curr_url+"s="+searchtext;
   		}
   });
});

/**
 * show popup function
 */
function showCropAvatar(){
	$("#edit-mask").fadeIn(300);
	$('.edit-avatar-region').show(); 
	$('#x1').val('');
	$('#y1').val('');
	$('#x2').val('');
	$('#y2').val('');
	$('#w').val('');
	$('#h').val('');
}
/**
 * close popup funtion
 */
function closeAvaEdit(){
	$("#edit-mask").hide();
	$('.edit-avatar-region').hide();   
}
/**
 * show picture at step 2
 */
function ShowPicture(sImage)
{
	console.log(sImage);
	$("#edit-mask").hide();
    $('.edit-avatar-region').hide(); 
	var data = '<img src="'+sImage+'" /><input type="hidden" name="ImgCurr" id="ImgCurr" value="'+sImage+'" > ';
	$("#CurrImg").html(data);
}
