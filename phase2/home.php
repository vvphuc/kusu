<?php
if (!isset($_SESSION)) {
    ob_start();
    @session_start();
}
require_once "lib/functions.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Game Kun - P2 - Home</title>

<link rel="stylesheet" type="text/css" href="css/p2_style.css" />
<link rel="stylesheet" type="text/css" href="css/p2_homepage.css" />
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
                <div class="login"><a href="profile.php"><?php $a = get_name_user($_SESSION['uid']); ?></a><a href="logout.php">logout</a><span></span></div>
                <?php
                }
            }
        ?>
        <!-- ------ -->
        <nav>
            <ul>
                <li class="active"><a href="home.php"><span></span>Giới thiệu</a></li>
                <li><a href="#"><span></span>Thể lệ & Giải thưởng</a></li>
                <li><a href="#"><span></span>Cuộc thi ảnh</a></li>
                <li><a href="#"><span></span>Thư viện ảnh</a></li>
                <li><a href="#"><span></span>Mẹo hay</a>
                    <ul>
                        <li><a href="#">Bí kíp của mẹ</a></li>
                        <li><a href="#">Cẩm nang</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- ------ -->
    </div>
    
</div>
<div class="wrapper_1000">
    <div id="tvc">
        <div class="video">width:443px; height:263px</div>
    </div>
    <div class="grass"></div>
    <div class="board">
        <div class="stick"></div>
        <div class="green"><a href="#"></a></div>
        <div class="violet"><a href="#"></a></div>
    </div>
    <div class="milkblock"></div>
    <div class="char-home"></div>
    <div class="bubble"></div>
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
