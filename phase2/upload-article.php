<?php
session_start();
require 'config.php';
$userid = '123';
if($userid)
{
	$frame = $_POST['frameImg'];
	$Img = $_POST['ImgCurr'];
	$message = $_POST['message'];
	$published = "yes";
	$width = 440;
	$height = 340;
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

?>