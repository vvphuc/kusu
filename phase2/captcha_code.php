<?php
session_start(); // Khởi tạo session
$ranStr = md5(microtime());	// Lấy chuỗi rồi mã hóa md5
$ranStr = substr($ranStr, 0, 6);	// Cắt chuỗi lấy 6 ký tự
$_SESSION['cap_code'] = $ranStr; // Lưu giá trị vào session
//$newImage = imagecreatefromjpeg("bg_captcha.jpg"); // Tạo hình ảnh từ bg_captcha.jpg
//$txtColor = imagecolorallocate($newImage, 100, 100, 100); // Thêm màu sắc cho hình ảnh
//imagestring($newImage, 15, 15, 15, $ranStr, $txtColor); // Vẽ ra chuỗi string
//header("Content-type: image/jpeg");	// Xuất định dạng là hình ảnh
//imagejpeg($newImage); // Xuất hình ảnh ra trình như 1 file
// Create image width dependant on width of the string
    // Set font size
    $font_size = 35;

    $ts=explode("\n",$ranStr);
    $width=0;
    foreach ($ts as $k=>$string) { //compute width
        $width=max($width,strlen($string));
    }

    // Create image width dependant on width of the string
    $width  = imagefontwidth($font_size)*$width;
    // Set height to that of the font
    $height = imagefontheight($font_size)*count($ts);
    $el=imagefontheight($font_size);
    $em=imagefontwidth($font_size);
    // Create the image pallette
    $img = imagecreatetruecolor($width,$height);
    // Dark red background
    $bg = imagecolorallocate($img, 255, 255, 255);
    imagefilledrectangle($img, 0, 0,$width ,$height , $bg);
    // White font color
    $color = imagecolorallocate($img, 0, 0, 0);

    foreach ($ts as $k=>$string) {
        // Length of the string
        $len = strlen($string);
        // Y-coordinate of character, X changes, Y is static
        $ypos = 0;
        // Loop through the string
        for($i=0;$i<$len;$i++){
            // Position of the character horizontally
            $xpos = $i * $em;
            $ypos = $k * $el;
            // Draw character
            imagechar($img, $font_size, $xpos, $ypos, $string, $color);
            // Remove character from string
            $string = substr($string, 1);
        }
    }
    // Return the image
    header("Content-Type: image/png");
    imagepng($img);
    // Remove image
    imagedestroy($img);

?>


