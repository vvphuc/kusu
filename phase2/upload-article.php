<?php
if (!isset($_SESSION)) {
    ob_start();
	@session_start();
}
require 'lib/functions.php';
if(!isset($_SESSION['uid']) || $_SESSION['uid'] ==""){
	_redirect('home.php');
	return false;
}
$userid = $_SESSION['uid'];
if(!isset($_SESSION['subject']) || $_SESSION['subject'] == ''){
$subject = select_subject();
    if($subject){
         $_SESSION['subject'] = $subject['0'];
    }
}
$sub = $_SESSION['subject'];
if($userid)
{
	if(!isset($_POST['frame_image'])){
		$frame_image='';
	}
	else{
		$frame_image = $_POST['frame_image'];
	}
	if(!isset($_POST['frameImg']) || $_POST['frameImg'] ==''){
		_redirect('home.php');
		return false;
	}	
	$frame = $_POST['frameImg'];
	if($frame_image != ''){
		$frame = $frame_image;
	}
	if(!isset($_POST['ImgCurr']) || $_POST['ImgCurr'] ==''){
		_redirect('home.php');
		return false;
	}	
	$Img = $_POST['ImgCurr'];
	if(!isset($_POST['babyname']) || $_POST['babyname'] ==''){
		_redirect('home.php');
		return false;
	}	
	$babyname = $_POST['babyname'];
	if(!isset($_POST['yourname']) || $_POST['yourname'] ==''){
		_redirect('home.php');
		return false;
	}	
	$yourname = $_POST['yourname'];
	if(!isset($_POST['phone']) || $_POST['phone'] ==''){
		_redirect('home.php');
		return false;
	}	
	$phone = $_POST['phone'];
	if(!isset($_POST['email']) || $_POST['email'] ==''){
		_redirect('home.php');
		return false;
	}	
	$email = $_POST['email'];
	$published = "yes";

	/*
	 *merge image function
	 */
	$width = 448;
	$height = 379;
	$final_img = imagecreatetruecolor ($width, $height);
	
	imagealphablending($final_img, true);
	imagesavealpha($final_img, true);
	
	$base_image = imagecreatefromjpeg("".$Img."");
	$top_image = imagecreatefrompng("".$frame."");
	$merged_image = "photo/".time().".png";
	
	imagecopymerge($final_img,$base_image,  0, 0, 0, 0, $width, $height,100);
	
	imagefill($final_img,0,0,0x7fff0000);
	imagesavealpha($final_img, true);
	imagealphablending($final_img, true);
	
	
	imagesavealpha($top_image, true);
	imagealphablending($top_image, true);
	
	
	imagecopy($final_img,$top_image, 0, 0, 0, 0, $width, $height);
	
	imagepng($final_img, $merged_image);
	$ip = getIP();
	$data = array(
					'subjectid'=>$sub['id'],
					'userid'=>$userid,
					'title'=>$babyname,
					'thumbnail'=> $merged_image,
					'photo'=>$merged_image,
					'description'=>'',
					'view'=>0,
					'vote'=>0,
					'published'=>1,
					'ip'=>$ip,
					'intsubmitdate' => time()
					);
	insert_images($data);
	insert_profile($userid, $yourname, $phone, $email);
	_redirect('library.php?page=1');
}
else{
	_redirect('home.php');
	exit();
}

?>