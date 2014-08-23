<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
if (!isset($_SESSION)) {
    ob_start();
	@session_start();
}
require 'config.php';
require 'src/function.php';
// if(!isset($_SESSION['fbid']) || $_SESSION['fbid']==''){
// _redirect("index.php");
// return;
// }
// $uid=$_SESSION['fbid'];
// $query=sprintf("select * from photo where fbid='%s'",$uid);
//    mysql_query("SET NAMES 'utf8'", $conn);
// 	$result = mysql_query($query, $conn);
// 	$count = mysql_num_rows($result);
// 	$count = mysql_num_rows($result);
// if($count>=MAXPOST){
// 	_alert("Bạn đã hết lượt chơi.Cảm ơn bạn đã tham gia.");
// 	_redirect(FANPAGEURL);
// 	return;
// }
 ?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Game Kun - P2 - Library</title>
        <link href="css/jquery.Jcrop.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="css/p2_style.css" />
        <link rel="stylesheet" type="text/css" href="css/p2_upload.css" />
        <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
 		<script src="js/jquery.min.js"></script>
        <script src="js/jquery.Jcrop.min.js"></script>
        <script src="js/script.js"></script>
		<script src="js/popup.js"></script>
        <title>Gửi lời chúc</title>
        <link href="css/htv3.css" rel="stylesheet" type="text/css" />
    	<style>
        #btn-upload {background:url(images/guiloichuc-upload.png) no-repeat; width:75px; height:27px; border:none;float:left; margin-right:10px; margin-top:10px; cursor:pointer;}
		#btn-resert { margin-top:10px;}
		.tt-page { width:239px; height:71px; position:absolute; top:0; right:20px; background:url(img/bg-tt-page.png) no-repeat; color:#fff; font:bold 22px Arial, Helvetica, sans-serif; }
		.tt-page .upanh { display:block; width:81px; height:24px; background:url(img/text-tt.png) 0 0 no-repeat;margin: 27px 0 0 80px;}
		a.huongdan { display:block; width:103px; height:21px; background:url(img/text-tt.png) 0 -30px no-repeat; float:left}
        </style>
    </head>
   
    <body>
    <div id="gui-loi-chuc">
    	<div id="simple-survey-box-popup">
        	<div id="simple-survey-box-popup-inner1">
        		<a id="closepopup" href="#"></a>
        	</div>
    	</div>
    	<div class="tt-page"><span class="upanh"></span></div>
        <form id="upload_article_form" enctype="multipart/form-data" method="post" action="upload-article.php">
        <div id="frame-item-list">
            <div style="clear:both"></div>
        	<div class="Frame-Mess">
                 <div class="header-title-frame"><img src="images/guiloichuc_09.png" /></div>
                 <textarea name="message" id="message" ></textarea>
                 <a class="huongdan" href="#" id="showpopup"></a>
                <input id="btn-guiloichuc" type="image" src="images/btn-guiloichuc.png" >
            </div>
        </div>        
        <div id="Frame-Upload">
       <div id="FrameImg"><img src="images/frame1.png" />
       <input type="hidden" name="frameImg" id="frameImg"value="images/frame1.png" ></div>
      <div id="CurrImg"><img src="images/b1.jpg" />
      	<input type="hidden" name="ImgCurr" id="ImgCurr" value="images/b1.jpg" > </div> 
        </div>
        </form>
        <div class="ShowCrop"><img onclick="showCropAvatar();" src="images/btn-upload-anh.png" /></div>
        <div class="edit-avatar-region">
        	<div class="close-btn" onclick="closeAvaEdit();">X</div>
            <div class="bbody">
                <!-- upload form -->
                <form id="upload_form" enctype="multipart/form-data" method="post" target="if-handler"   action="upload.php" onsubmit="return checkForm()">
                    <!-- hidden crop params -->
                    <input type="hidden" id="x1" name="x1" />
                    <input type="hidden" id="y1" name="y1" />
                    <input type="hidden" id="x2" name="x2" />
                    <input type="hidden" id="y2" name="y2" />
					<div class="step1">
                    <h2>Step1: Chọn hình ảnh Upload</h2>
                    <div><input type="file" name="image_file" id="image_file" onchange="fileSelectHandler()" /></div>
					</div>
                    <div class="error"></div>
                    <div class="step2">
                        <h2>Step2: Chỉnh sửa hình ảnh</h2>
                        <img id="preview" />
                        <div class="info">
                           <input type="hidden" id="filesize" name="filesize" />
                            <input type="hidden" id="filetype" name="filetype" />
                            <input type="hidden" id="filedim" name="filedim" />
                            <input type="hidden" id="w" name="w" value="400" />
                            <input type="hidden" id="h" name="h" height="300" />
                        </div>
                     	<input id="btn-upload" type="submit" value="" />
                        <div id="btn-resert"><a href="index.php"><img src="images/guiloichuc-reset.png" /></a></div>
		            </div>
                </form>
            </div>
        </div>
    <div id="edit-mask" style="display: none; color: #fff; background-color: #000; opacity: 0.7; width: 100%; height: 100%; position: fixed; left: 0px; top: 0px; padding: 5% 25%; z-index: 1000;"></div>
<div id="waiting"></div>
<iframe name="if-handler" style="opacity:0; width:0; height:0"></iframe>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script> 
	$(document).ready(function(e) {
		$("#btn-guiloichuc").click(function (e) {
			$("#upload_article_form").validate();
			if($("#upload_article_form").valid())
			{
				$(this).hide();
				$("#waiting").show();
				return true;
			}
			else
				return false;
		});
		$("#upload_article_form").validate({
			"rules" :{
				"message" :{
					"required" : true	
				},		
			},
		});
    });
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
	function closeAvaEdit(){
    	$("#edit-mask").hide();
        $('.edit-avatar-region').hide();   
    }
	function ShowPicture(sImage)
	{
		$("#edit-mask").hide();
        $('.edit-avatar-region').hide(); 
		var data = '<img src="'+sImage+'" /><input type="hidden" name="ImgCurr" id="ImgCurr" value="'+sImage+'" > ';
		$("#CurrImg").html(data);
	}
	function ChangeFrame(i)
	{
		var data = '<img src="images/frame'+i+'.png" /><input type="hidden" name="frameImg" id="frameImg" value="images/frame'+i+'.png" >';
		$("#FrameImg").html(data);
	}
	function ChangeImage(i)
	{
		var data = '<img src="images/b'+i+'.jpg" /><input type="hidden" name="ImgCurr" id="ImgCurr" value="images/b'+i+'.jpg" >';
		$("#CurrImg").html(data);
	}
</script>
	</div>
</div>
    </body>
</html>