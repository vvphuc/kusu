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
    <title>Game Kun - About Game Page</title>
    <link rel="stylesheet" type="text/css" href="css/p2_style.css" />
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

<body>
<h1>Sữa Kun</h1>
<div id="topbar">
    <div class="repeatmenu"></div>
    <div class="wrapper_1000">
        <div id="logo"><img src="images/logo-kunkun.png" title="logo_kunkun" alt="logo_kunkun" /></div>
        <div class="iconKun active"><span></span></div>
        <?php
        if(!isset($_SESSION['uid']) || $_SESSION['uid'] =="")
        {
            ?>
            <div class="login"><a href="login.php">Đăng nhập</a><span></span></div>
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
        }
        ?>
        <!-- ------ -->
        <nav>
            <ul>
                <li><a href="home.php"><span></span>Giới thiệu</a></li>
                <li><a href="article2.php"><span></span>Giải pháp cho trẻ ngán sữa</a>
                    <ul>
                        <li><a href="article1.php?id=1">Nỗi lo ngán sữa</a></li>
                        <li><a href="article2.php">Bí kíp của mẹ</a></li>
                        <li><a href="article3.php">Sữa KUN Cookies</a></li>
                        <li class="last"></li>
                    </ul>
                </li>
                <li class="active"><a href="aboutgame.php"><span></span>Cuộc thi ảnh</a>
                    <ul>
                        <li><a href="gameboard.php">Gửi ảnh dự thi</a></li>
                        <li><a href="library.php">Ảnh dự thi</a></li>
                        <li><a href="rules.php">Thể lệ & giải thưởng </a></li>
                        <li><a href="winlist.php">Danh sách trúng thưởng</a></li>
                        <li class="last"></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- ------ -->
    </div>
</div>
<div class="wrapper_1000">
    <div id="wrap_winlist">
        <!-- -->
        <a href="#" class="back-link"></a>
        <a href="gameboard.php" class="upload"></a>
        <a href="#" class="playgame"></a>
        <div class="titlepage"><h2>Cuộc thi ảnh</h2></div>
        <div class="imgtitle"></div>
        <!-- -->
        <div class="info">
            Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.
        </div>
        <!-- -->
        <div class="button_play">
            <a>
                <span></span>
                <h4>THAM GIA NGAY!</h4>
            </a>
        </div>
        <!-- -->
        <ul id="menu" class="anhduthi">
            <li><a href="#">Ảnh dự thi</a><span></span></li>
        </ul>
        <ul id="menu" class="thele">
            <li><a href="#">Thể lệ & Giải thưởng</a><span></span></li>
        </ul>
        <ul id="menu" class="danhsach">
            <li><a href="#">Danh sách trúng thưởng</a><span></span></li>
        </ul>
        <ul id="menu" class="top5">
            <li><a>Top 5 trong tuần</a><span></span></li>
        </ul>
        <!-- -->
        <div class="topimg">
            <ul id="mycarousel" class="jcarousel-skin-tango">
                <li><a href="#"><img src="images/post/baby.png" width="117" height="98" alt="bài dự thi" /><span>Tên của bé</span></a></li>
                <li><a href="#"><img src="images/post/baby.png" width="117" height="98" alt="bài dự thi" /><span>Tên của bé</span></a></li>
                <li><a href="#"><img src="images/post/baby.png" width="117" height="98" alt="bài dự thi" /><span>Tên của bé</span></a></li>
                <li><a href="#"><img src="images/post/baby.png" width="117" height="98" alt="bài dự thi" /><span>Tên của bé</span></a></li>
                <li><a href="#"><img src="images/post/baby.png" width="117" height="98" alt="bài dự thi" /><span>Tên của bé</span></a></li>
            </ul>
        </div>
        <a class="otherpic" href="#">Hình ảnh khác >></a>
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
