<?php
if (!isset($_SESSION)) {
    ob_start();
    @session_start();
}
require "lib/functions.php";
if(!isset($_SESSION['subject']) || $_SESSION['subject'] == ''){
$subject = select_subject();
    if($subject){
         $_SESSION['subject'] = $subject['0'];
    }
}
$sub = $_SESSION['subject'];
$img = select_images_top($sub['id']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Game Kun - About Game Page</title>
    <link rel="stylesheet" type="text/css" href="css/p2_style_2.css" />
    <link rel="stylesheet" type="text/css" href="css/p2_aboutgame.css" />
    <link rel="stylesheet" type="text/css" href="css/p2_skin.css" />
    <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.jcarousel.js"></script>
    <script type="text/javascript">

        function mycarousel_initCallback(carousel)
        {
            // Disable autoscrolling if the user clicks the prev or next button.
            carousel.buttonNext.bind('click', function() {
                carousel.startAuto(0);
            });

            carousel.buttonPrev.bind('click', function() {
                carousel.startAuto(0);
            });

            // Pause autoscrolling if the user moves with the cursor over the clip.
            carousel.clip.hover(function() {
                carousel.stopAuto();
            }, function() {
                carousel.startAuto();
            });

        };

        jQuery(document).ready(function() {
            jQuery('#mycarousel').jcarousel({
                vertical: false,
                scroll: 1,
                auto: 2,
                wrap: 'last',
                initCallback: mycarousel_initCallback
            });
        });
    </script>

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
            <li><a href="home.php">Trang chủ</a></li>
            <li class="round"><span></span></li>
            <li><a href="article2.php">Giải pháp cho trẻ ngán sữa</a>
                <ul>
                    <li><a href="article1.php?id=1">Nỗi lo ngán sữa</a></li>
                    <li><a href="article2.php">Bí kíp của mẹ</a></li>
                    <li><a href="article3.php">Sữa KUN Cookies</a></li>
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
        <!-- -->
        <div class="info">
            Trăm lo không bằng lo con ngán sữa. Hãy cùng <span style="font-weight:700; color:#009386">KUN Cookies</span> giúp bé hết ngán sữa và mỗi giờ uống sữa là 1 giờ vui nhộn với bé và mẹ. Mẹ hãy chụp khoảnh khắc <span style="font-weight:700; color:#009386">“UỐNG KUN MÊ TÍT”</span> của bé theo phong cách BTC đưa ra mỗi tuần để nhận được những phần quà thật hấp dẫn nhé.
        </div>
        <!-- -->
        <div class="button_play">
            <a href="gameboard.php">
                <span></span>
                <h4>THAM GIA NGAY!</h4>
            </a>
        </div>
        <!-- -->
        <ul id="menu" class="anhduthi">
            <li><a href="library.php">Ảnh dự thi</a><span></span></li>
        </ul>
        <ul id="menu" class="thele">
            <li><a href="rules.php">Thể lệ & Giải thưởng</a><span></span></li>
        </ul>
        <ul id="menu" class="danhsach">
            <li><a href="winlist.php">Danh sách trúng thưởng</a><span></span></li>
        </ul>
        <ul id="menu" class="top5">
            <li><a>Top 5 trong tuần</a><span></span></li>
        </ul>
        <!-- -->
        <div class="topimg">
            <ul id="mycarousel" class="jcarousel-skin-tango">
            <?php 
            if($img){
                foreach ($img as $key => $value) {
            ?>
            <li><a href="<?php echo WEBSITEURL;?>detail?p=<?php echo $value['id'] ?>"><img src="<?php echo $value['thumbnail'] ?>" width="117" height="98" alt="bài dự thi" /><span><?php echo $value['title']; ?></span></a></li>
            <?php        
                }

            }?>
            <!--     <li><a href="#"><img src="images/post/baby.png" width="117" height="98" alt="bài dự thi" /><span>Tên của bé</span></a></li>
                <li><a href="#"><img src="images/post/baby.png" width="117" height="98" alt="bài dự thi" /><span>Tên của bé</span></a></li>
                <li><a href="#"><img src="images/post/baby.png" width="117" height="98" alt="bài dự thi" /><span>Tên của bé</span></a></li>
                <li><a href="#"><img src="images/post/baby.png" width="117" height="98" alt="bài dự thi" /><span>Tên của bé</span></a></li>
                <li><a href="#"><img src="images/post/baby.png" width="117" height="98" alt="bài dự thi" /><span>Tên của bé</span></a></li> -->
            </ul>
        </div>
        <a class="otherpic" href="library.php">Hình ảnh khác >></a>
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
