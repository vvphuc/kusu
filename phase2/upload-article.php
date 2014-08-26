<?php
if (!isset($_SESSION)) {
    ob_start();
	@session_start();
}
require '../lib/functions.php';
$userid = '123';
if($userid)
{
	if(!isset($_POST['frameImg']) || $_POST['frameImg'] ==''){
		_redirect('home.php');
		exit();
	}	
	$frame = $_POST['frameImg'];
	if(!isset($_POST['ImgCurr']) || $_POST['ImgCurr'] ==''){
		_redirect('home.php');
		exit();
	}	
	$Img = $_POST['ImgCurr'];
	if(!isset($_POST['babyname']) || $_POST['babyname'] ==''){
		_redirect('home.php');
		exit();
	}	
	$babyname = $_POST['babyname'];
	if(!isset($_POST['yourname']) || $_POST['yourname'] ==''){
		_redirect('home.php');
		exit();
	}	
	$yourname = $_POST['yourname'];
	if(!isset($_POST['phone']) || $_POST['phone'] ==''){
		_redirect('home.php');
		exit();
	}	
	$phone = $_POST['phone'];
	if(!isset($_POST['email']) || $_POST['email'] ==''){
		_redirect('home.php');
		exit();
	}	
	$email = $_POST['email'];
	if(!isset($_POST['pid']) || $_POST['pid'] ==''){
		_redirect('home.php');
		exit();
	}	
	$pid = $_POST['pid'];
	$published = "yes";
	$width = 447;
	$height = 379;
	$final_img = imagecreatetruecolor ($width, $height);
	
	imagealphablending($final_img, true);
	imagesavealpha($final_img, true);
	
	$base_image = imagecreatefromjpeg("".$Img."");
	$top_image = imagecreatefrompng("".$frame."");
	$merged_image = "photo/".time().".png";
	
	imagecopymerge($final_img,$base_image,  18, 14, 0, 0, $width, $height,100);
	
	imagefill($final_img,0,0,0x7fff0000);
	imagesavealpha($final_img, true);
	imagealphablending($final_img, true);
	
	
	imagesavealpha($top_image, true);
	imagealphablending($top_image, true);
	
	
	imagecopy($final_img,$top_image, 0, 0, 0, 0, $width, $height);
	
	imagepng($final_img, $merged_image);
	$ip = getIP();
	$data = array(
					'subjectid'=>1,
					'userid'=>$userid,
					'title'=>$babyname,
					'thumbnail'=> $merged_image,
					'photo'=>$merged_image,
					'description'=>'',
					'view'=>0,
					'vote'=>0,
					'published'=>1,
					'ip'=>$ip
					);
	insert_images($data);
	_redirect('library.php?page=1');
}
else{
	_redirect('home.php');
	exit();
}

?>