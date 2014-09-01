<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
if (!isset($_SESSION)) {
    ob_start();
    @session_start();
}
require 'lib/functions.php';
if(!isset($_SESSION['subject']) || $_SESSION['subject'] == ''){
$subject = select_subject();
    if($subject){
         $_SESSION['subject'] = $subject['0'];
    }
}
$sub = $_SESSION['subject'];
require 'lib/PHPPagination/Pagination.class.php';
$image = select_images_subjectid(1);
$s ='';
if(isset($_GET['s']) && $_GET['s'] != ''){
    $s = $_GET['s'];
}
if($s !=''){
    $sp = search_images_subjectid(1,$s);
    if(count($sp) != 0 ){
        $image= $sp;    
    }
}
$total = count($image);
// determine page (based on <_GET>)
$page = isset($_GET['page']) ? ((int) $_GET['page']) : 1;
// instantiate; set current page; set number of records
$pagination = (new Pagination());
$pagination->setCurrent($page);
$pagination->setRPP(8);
$pagination->setTotal($total);
$im = select_paging($page,8,$s);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Game Kun - P2 - Library</title>

<link rel="stylesheet" type="text/css" href="css/p2_style.css" />
<link rel="stylesheet" type="text/css" href="css/p2_library.css" />
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
    <div id="frame_library"></div>
    <div class="titlepage"><h2>Thư Viện</h2></div>
    <div class="search">
        <input type="text" placeholder="Tìm bài dự thi_" name="photo_title" class="search-text" />
        <input type ="hidden" value="library.php?" name ="crr_url" class="curr_url">
        <div class="icon"><input type="submit" value="" class="search-btn" /></div>
    </div>
    <div class="tableft">
        <div class="tab <?php if($sub['id'] == 1) echo 'current'; ?>">
            <a href="#">Chủ đề 1</a>
        </div>
        <div class="tab <?php if($sub['id'] == 2) echo 'current'; ?>">
            <a href="#">Chủ đề 2</a>
        </div>
    </div>
    <div id="wrap_item">
        <!-- -->
        <?php 
        if($im){
            foreach ($im as $key => $value) {
        ?>    
                <div class="item">
                    <div class="thumb">
                        <a href="<?php echo 'detail.php?p='.$value['id']; ?> "><img src="<?php echo $value['thumbnail'];?>" alt="thumb" /></a>
                        <div class="circle"><span><?php echo $value['view']; ?></span></div>
                        <div class="info"><span><?php echo $value['title'] ?></span><?php echo date('d/m/Y',strtotime($value['submitdate']));?></div>
                        <div class="like"><?php echo $value['vote']; ?></div>
                    </div>
                </div>
        <?php
            }
        }
        else{
            echo 'không có kết quả nào!';
        }
        ?>
        
        <!-- -->
    </div>
    <div class="paging">
    <?php
        // grab rendered/parsed pagination markup
        $markup = $pagination->parse();
        echo $markup;
    ?>
        <!-- <a href="#" class="prev"></a>
        <a href="#">1</a>
        <a href="#">2</a>
        <a href="#" class="pageon">3</a>
        <a href="#">4</a>
        <span>...</span>
        <a href="#">6</a>
        <a href="#">7</a>
        <a href="#" class="next"></a> -->
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
