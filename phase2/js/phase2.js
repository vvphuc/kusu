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
   $(".main-form").validate({
		"rules" :{
			"babyname" :{
				"required" : true	
			},
			"yourname" :{
				"required" : true	
			},
			"phone" :{
				"required" : true,
				"digits"   : true,
				"rangelength": [6, 12]
			},
			"email" :{
				"required" : true,
				"email"	   : true
			},
			"pid" :{
				"required" : true,	
				"number"   : true
			},
			"filename" :{
				"required" : true	
			},
		},
	});

   $('#vote-photo').click(function(){
   		console.log('co');
	   $.ajax({
		  type: "POST",
		  url: "vote.php",
		  data: { ptid: $('#pt-id').val()}
		}).done(function( msg ) {
			alert(msg);
			if(msg == 1){
		 	   alert( "Bạn đã bình chọn thành công!");
			}
			else{
				alert("Bạn đã bình chọn rồi");
			}
		  });
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
