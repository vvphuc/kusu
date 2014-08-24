$( document ).ready(function() {
   // call show popup funtion
   $( ".uploadBtn" ).click(function() {
		showCropAvatar();
	});
   // call close popup function
   $( ".close-btn" ).click(function() {
		closeAvaEdit();
	});
   $(".main-form").validate({
		"rules" :{
			"babyname" :{
				"required" : true	
			},
			"yourname" :{
				"required" : true	
			},
			"phone" :{
				"required" : true	
			},
			"email" :{
				"required" : true	
			},
			"pid" :{
				"required" : true	
			},
			"filename" :{
				"required" : true	
			},
		},
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
