<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
if (!isset($_SESSION)) {
    ob_start();
    @session_start();
}
require 'lib/functions.php';
$subjectid =1;
$p = isset($_GET['p']) ? ((int) $_GET['p']) : 1;
$photo = select_photo_by_id($p);
if(have_photo($p)){
    update_view($p,$subjectid);
}
if(!$photo){
    _redirect('library.php');
    return;
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Game Kun - P2 - Library</title>

<link rel="stylesheet" type="text/css" href="css/p2_style.css" />
<link rel="stylesheet" type="text/css" href="css/p2_details.css" />
<script src="js/jquery.min.js"></script>
<script src="js/phase2.js"></script>
</head>

<body>
<h1>Sữa Kun</h1>
<div id="topbar">
	<div class="repeatmenu"></div>
    <div class="wrapper_1000">
    	<div id="logo"><img src="images/logo-kunkun.png" title="logo_kunkun" alt="logo_kunkun" /></div>
        <div class="iconKun"></div>
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
                <li class=""><a href="article2.php"><span></span>Giải pháp cho trẻ ngán sữa</a>
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
	<div id="frame_details">
    	<!-- -->
    	<div id="col-1">
        	<div class="face"><img src="images/p2-char-home.png" /></div>
            <div class="name">Tên facebook</div>
            <div class="view"><b><?php echo $photo['0']['view'];?></b></div>
            <div class="like"><b><?php echo $photo['0']['vote'];?></b><input type="hidden" value="<?php echo $photo['0']['vote'];?>" name ="vote-count" id="vote-count"></div>
            <div class="date">Ngày đăng<Br /><?php echo date('d/m/Y',strtotime($photo['0']['submitdate']));?></div>
            <strong>Chủ đề 1</strong>
            <div class="vote"><a href="#" id="vote-photo"></a><input type="hidden" value="<?php echo $p;?>" id ="pt-id" name = "ptid"></div>
            <a class="otherpic" href="library.php">Hình ảnh khác >></a>
        </div>
        <!-- -->
        <div id="col-2">
        	<img src="<?php echo $photo['0']['photo'];?>" />
            <div class="name"><?php echo $photo['0']['title'];?></div>
        </div>
        <!-- -->
        <div id="col-3">[API FACEBOOK COMMENT HERE]</div>
        <!-- -->
    </div>
    <!-- -->
    <div class="titlepage"><h2>Ảnh dự thi</h2></div>
    <!-- -->
    <div class="search">
        	<input type="text" placeholder="Tìm bài dự thi_" name="photo_title" class="search-text" />
            <input type ="hidden" value="library.php?" name ="crr_url" class="" ="curr_url">
            <div class="icon"><input type="submit" value="" class = "search-btn"/></div>
    </div>
    <!-- -->
    <div class="button_play">
    	<a href="gameboard.php">
            <span></span>
            <h4>THAM GIA NGAY!</h4>
        </a>
    </div>
    <!-- -->
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
