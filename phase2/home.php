<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
if (!isset($_SESSION)) {
    ob_start();
    @session_start();
}
require_once "lib/functions.php";
if(!isset($_SESSION['subject']) || $_SESSION['subject'] == ''){
$subject = select_subject();
    if($subject){
         $_SESSION['subject'] = $subject['0'];
    }
}
$sub = $_SESSION['subject'];
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Kun Cookies - Uống Kun Mê Tít</title>

<link rel="stylesheet" type="text/css" href="css/p2_style_2.css" />
<link rel="stylesheet" type="text/css" href="css/p2_homepage_2.css" />
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script>
$( document ).ready(function() {
	$(".bubble").css('display','none');
	$(".green").mouseover(function(){
		$(".bubble").fadeIn();
	});
	$(".green").mouseout(function(){
		$(".bubble").fadeOut();
	});
	$(".violet").mouseover(function(){
		$(".bubble2").fadeOut(function(){
			$(".bubble2").delay(100).css('background-position','-1120px -570px');	
		});
		$(".bubble2").delay(100).fadeIn();
		
	});
	$(".violet").mouseout(function(){
		$(".bubble2").fadeOut(function(){
			$(".bubble2").delay(100).css('background-position','-790px -570px');
		});
		$(".bubble2").delay(100).fadeIn();	
	});
});
</script>
<script type="text/javascript" src="js/ga_kun.js"></script>
</head>

<body style="margin-top:-18px;">
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
            <li><a class="active" href="home.php">Trang chủ</a></li>
            <li class="round"><span></span></li>
            <li><a href="article2.php">Giải pháp cho trẻ ngán sữa</a>
                <ul>
                    <li><a href="article1.php?id=1">Nỗi lo ngán sữa</a></li>
                    <li><a href="article2.php">Bí kíp của mẹ</a></li>
                    <!--<li><a href="article3.php">Sữa KUN Cookies</a></li>-->
                </ul>
            </li>
            <li class="round"><span></span></li>
            <li><a href="aboutgame.php">Cuộc thi ảnh</a>
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
	<div class="leftnews"><a href="article1.php?id=1">Tìm hiểu thêm ›</a></div>
    <div class="rightnews">
    	<div class="first">
        	<a class="img"><img src="images/post/home-post1.jpg" alt="post1" width="210" height="210" /></a>
            <div class="trans">
            	<span>Xem 270</span>
                <var>Like 88</var>
            </div>
        </div>
        <div class="small">
        	<a class="img"><img src="images/post/home-post1.jpg" alt="post1" width="99" height="99" /></a>
            <div class="trans">
            	<span>88</span>
                <var>88</var>
            </div>
        </div>
        <div class="small">
        	<a class="img"><img src="images/post/home-post1.jpg" alt="post1" width="99" height="99" /></a>
            <div class="trans">
            	<span>88</span>
                <var>88</var>
            </div>
        </div>

        <div class="small">
        	<a class="img"><img src="images/post/home-post1.jpg" alt="post1" width="99" height="99" /></a>
            <div class="trans">
            	<span>88</span>
                <var>88</var>
            </div>
        </div>
        <div class="small">
        	<a class="img"><img src="images/post/home-post1.jpg" alt="post1" width="99" height="99" /></a>
            <div class="trans">
            	<span>88</span>
                <var>88</var>
            </div>
        </div>
        <div class="chude"><img src="images/p2-home-chude1.png" alt="chủ đề" /></div>
        <a class="more" href="rules.php">Tìm hiểu thêm ›</a>
    </div>
    <div class="award"><img src="images/p2-home-giaithuongtext.png" alt="giải thưởng" /></div>
    <div class="sunflower f7"></div>
    <div class="sunflower f8"></div>
    <div class="sunflower f1"></div>
    <div class="sunflower f2"></div>
    <div class="sunflower f3"></div>
    <div class="sunflower f4"></div>
    <div class="sunflower f5"></div>
    <div class="sunflower f6"></div>
</div>
</body>
</html>
