<?php
if (!isset($_SESSION)) {
    ob_start();
    @session_start();
}
require "lib/functions.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Kun Cookies - Danh sách trúng thưởng</title>
<link rel="stylesheet" type="text/css" href="css/p2_style_2.css" />
<link rel="stylesheet" type="text/css" href="css/p2_winlist.css" />
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/jquery.tinyscrollbar.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#scrollbar1').tinyscrollbar({ thumbSize: 80 });
	});
</script>
<script type="text/javascript" src="js/ga_kun.js"></script>
</head>

<body style="margin-top:-18px">
<h1>Sữa Kun</h1>
<div id="topbar">
	<div class="repeatmenu"></div>
    <div class="wrapper_1000">
    	<div id="logo"><a href="home.php"><img src="images/logo-kunkun-2.png" title="logo_kunkun" alt="logo_kunkun" /></a></div>
		<a class="facebook"></a>



		<?php
        if((!isset($_SESSION['uid']) || $_SESSION['uid'] == "") && (!isset($_SESSION['pass']) || $_SESSION['pass'] == ""))
        {
            ?>
            <div class="login"><a href="login.php">Đăng nhập</a><span></span></div>
        <!-- SAU KHI ĐĂNG NHẬP THÀNH CÔNG -->

		<?php
        }
        else
        {
            if(check_user_login($_SESSION['uid'],$_SESSION['pass']) == 1)
            {
                ?>
                <div class="welcome">


                    <b><?php echo get_name_user($_SESSION['uid']); ?></b>
                    <a href="profile.php">Xem hồ sơ ››</a>
                    <a href="logout.php">Đăng xuất</a>
                </div>
            <?php
            }
            else
            {
                echo '<div class="login"><a href="login.php">Đăng nhập</a><span></span></div>';
            }
        }
        ?>
        <!-- <div class="welcome">
            <b>Nguyễn Văn Anh</b>

            <a href="#">Xem hồ sơ ››</a>
            <a href="#">Đăng xuất ››</a>
        </div> -->
        <!-- ------ -->
        <nav>
            <li class="round"><span></span></li>
            <li><a href="home.php">Trang chủ</a></li>
            <li class="round"><span></span></li>
            <li><a href="article2.php">Giải pháp cho trẻ ngán sữa</a>
                <ul>
                    <li><a href="article1.php?id=1">Nỗi lo ngán sữa</a></li>
                    <li><a href="article2.php">Bí kíp của mẹ</a></li>
                    <!--<li><a href="article3.php">Sữa KUN Cookies</a></li>-->
                </ul>
            </li>
            <li class="round"><span></span></li>
            <li><a class="active" href="aboutgame.php">Cuộc thi ảnh</a>
                <ul>
                    <li><a href="gameboard.php">Gửi ảnh dự thi</a></li>
                    <li><a href="library.php">Ảnh dự thi</a></li>
                    <li><a href="rules.php">Thể lệ & giải thưởng </a></li>
                    <li><a href="winlist.php">Danh sách trúng thưởng</a></li>
                </ul>
            </li>
            <li class="round"><span></span></li>
        </nav>
        <!-- ------ -->
    </div>

</div>
<div class="wrapper_1000">
	<div id="wrap_winlist">
        <!-- -->
    	<a href="javascript: history.go(-1)" class="back-link"></a>
        <input class="guianhduthi" type="button" value="Gửi ảnh dự thi" onclick="self.location='gameboard.php'" />
    	<div class="titlepage"><h2>Cuộc thi ảnh</h2></div>
    	<div class="imgtitle"></div>
        <h3>Danh sách trúng thưởng</h3>
        <!-- -->
        <div id="scrollbar1">
            <div class="scrollbar"><div class="track"><div class="thumb"></div></div></div>
            <div class="viewport">
                 <div class="overview">
                 <!-- -->
                 <table cellpadding="0" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="5%">STT</th>
                            <th width="30%">Tên</th>
                            <th width="30%">Email</th>
                            <th width="35%">Giải thưởng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>01</td>
                            <td>Đang cập nhật</td>
                            <td>Đang cập nhật</td>
                            <td>Đang cập nhật</td>
                        </tr>
                        <tr>
                            <td>02</td>
                            <td>Đang cập nhật</td>
                            <td>Đang cập nhật</td>
                            <td>Đang cập nhật</td>
                        </tr>
                        <tr>
                            <td>03</td>
                            <td>Đang cập nhật</td>
                            <td>Đang cập nhật</td>
                            <td>Đang cập nhật</td>
                        </tr>
                        <tr>
                            <td>04</td>
                            <td>Đang cập nhật</td>
                            <td>Đang cập nhật</td>
                            <td>Đang cập nhật</td>
                        </tr>
                        <tr>
                            <td>05</td>
                            <td>Đang cập nhật</td>
                            <td>Đang cập nhật</td>
                            <td>Đang cập nhật</td>
                        </tr>
                    </tbody>
                </table>
                 <!-- -->
                 </div>
            </div>
        </div>
        <!-- -->
    </div>
</div>
<div class="sunflower f7"></div>
<div class="sunflower f1"></div>
<div class="sunflower f2"></div>
<div class="sunflower f3"></div>
<div class="sunflower f4"></div>
<div class="sunflower f5"></div>
<div class="sunflower f6"></div>
<div class="sunflower f8"></div>
<div class="sunflower f9"></div>
<div class="sunflower f10"></div>
<div class="sunflower f11"></div>
</body>
</html>
