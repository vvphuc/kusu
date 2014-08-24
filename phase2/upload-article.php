<?php
session_start();
require  '../config/config.php';
require '../config/funtions.php';
$userid = '123';
if($userid)
{
	if(!isset($_POST['frameImg']) && $_POST['frameImg'] ==''){
		_redirect('home.php');
	}	
	$frame = $_POST['frameImg'];
	if(!isset($_POST['ImgCurr']) && $_POST['ImgCurr'] ==''){
		_redirect('home.php');
	}	
	$Img = $_POST['ImgCurr'];
	if(!isset($_POST['babyname']) && $_POST['babyname'] ==''){
		_redirect('home.php');
	}	
	$babyname = $_POST['babyname'];
	if(!isset($_POST['yourname']) && $_POST['yourname'] ==''){
		_redirect('home.php');
	}	
	$yourname = $_POST['yourname'];
	if(!isset($_POST['phone']) && $_POST['phone'] ==''){
		_redirect('home.php');
	}	
	$phone = $_POST['phone'];
	if(!isset($_POST['email']) && $_POST['email'] ==''){
		_redirect('home.php');
	}	
	$email = $_POST['email'];
	if(!isset($_POST['pid']) && $_POST['pid'] ==''){
		_redirect('home.php');
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
	// $query1 = sprintf("SELECT * FROM users WHERE fbid = '%s'",$userid);
	// mysql_query("SET NAMES 'utf8'", $conn);
	// $total = mysql_query($query1,$conn);
	// $r = mysql_fetch_array($total);
	// $fbName = $r['fbname'];
	// $avatar = "https://graph.facebook.com/$userid/picture?type=small";
	// $query = sprintf("INSERT INTO photo(fbid, fbname, avatar, photo, message, published, created, ip) VALUES('%s', '%s', '%s','%s', '%s', '%s','%s', '%s')", $userid, $fbName, $avatar, $merged_image, $message, $published, time(), $_SERVER['REMOTE_ADDR']);
	// mysql_query("SET NAMES 'utf8'", $conn);
	// mysql_query($query, $conn);
	print ' <script>window.location.href="library.php?page=1"</script>';
}
else{
	_redirect('home.php');
	exit();
}

?>