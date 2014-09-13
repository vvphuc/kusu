<?php
if (!isset($_SESSION)) {
    ob_start();
    @session_start();
}
require "lib/functions.php";
if(isset($_GET['id']) && $_GET['id'] != "" )
{
$id = $_GET['id'];
$result_news = select_details_news($id);
$result =select_news();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Kun Cookies - Nỗi lo ngán sữa</title>

    <link rel="stylesheet" type="text/css" href="css/p2_style_2.css" />
    <link rel="stylesheet" type="text/css" href="css/p2_article.css" />
    <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.tinyscrollbar.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#scrollbar1').tinyscrollbar({ thumbSize: 40 });
            $("#scrollbar2").tinyscrollbar({ thumbSize: 80 });
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
            <li><a href="home.php">Trang chủ</a></li>
            <li class="round"><span></span></li>
            <li><a class="active" href="article2.php">Giải pháp cho trẻ ngán sữa</a>
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

<div id="wrap_detailspage">
    <div id="details">
        <!-- ------ -->
        <a href="javascript: history.go(-1)" class="back-link"></a>
        <!-- ------ -->
        <ul id="menu" class="noilongansua active">
            <li><b></b><a href="article1.php?id=1">Nỗi lo ngán sữa</a><span></span></li>
        </ul>
        <ul id="menu" class="bikipcuame">
            <li><b></b><a href="article2.php">Bí kíp của mẹ</a><span></span></li>
        </ul>
		<!--
        <ul id="menu" class="suakun">
            <li><b></b><a href="article3.php">Sữa Kun Cookies</a><span></span></li>
        </ul>
		-->
        <!-- ------ -->
        <div id="scrollbar1" class="tab1">
            <div class="scrollbar"><div class="track"><div class="thumb"></div></div></div>
            <div class="viewport">
                <div class="overview">
                    <ul>
                        <?php
                        if(count($result)==0)
                        {
                            ?>
                            <li><a href='#'>Chưa có bài viết</a></li>;
                        <?php
                        }
                        else
                        {
                            for($i=0;$i<count($result);$i++)
                            {
                                ?>
                                <li><a href="article1.php?id=<?php echo $result[$i]['id']; ?>"><?php echo $result[$i]['title'];?></a></li>
                            <?php
                            }
                        }

                        ?>

                    </ul>
                </div>
            </div>
        </div>
        <!-- ------ -->
        <!-- ------ -->
        <div id="content_details">
            <div id="scrollbar2">
                <div class="scrollbar"><div class="track"><div class="thumb"></div></div></div>
                <div class="viewport">
                    <div class="overview">
                        <?php
                        if(count($result_news)==0)
                        {
                            _redirect("uongsuachudong.php");
                        }
                        else
                        {
                            echo $result_news[0]['content'];
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
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
<?php
}
else
{
    _redirect("home.php");
}
?>
