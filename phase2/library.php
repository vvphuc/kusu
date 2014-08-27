<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 
require 'lib/functions.php';
require 'lib/PHPPagination/Pagination.class.php';
$image = select_images_subjectid(1);
$total = count($image);
// determine page (based on <_GET>)
$page = isset($_GET['page']) ? ((int) $_GET['page']) : 1;
// instantiate; set current page; set number of records
$pagination = (new Pagination());
$pagination->setCurrent($page);
$pagination->setRPP(8);
$pagination->setTotal($total);
$im = select_paging(photo,$page,8);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Game Kun - P2 - Library</title>

<link rel="stylesheet" type="text/css" href="css/p2_style.css" />
<link rel="stylesheet" type="text/css" href="css/p2_library.css" />
<script src="js/jquery.min.js"></script>
</head>

<body>
<h1>Sữa Kun</h1>
<div id="topbar">
    <div class="repeatmenu"></div>
    <div class="wrapper_1000">
        <div id="logo"><img src="images/logo-kunkun.png" title="logo_kunkun" alt="logo_kunkun" /></div>
        <div class="iconKun"></div>
        <div class="login"><a href="#">Đăng nhập</a><span></span></div>
        <!-- ------ -->
        <nav>
            <ul>
                <li><a href="#"><span></span>Giới thiệu</a></li>
                <li><a href="#"><span></span>Thể lệ & Giải thưởng</a></li>
                <li><a href="#"><span></span>Cuộc thi ảnh</a></li>
                <li class="active"><a href="#"><span></span>Thư viện ảnh</a></li>
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
    <div id="frame_library"></div>
    <div class="titlepage"><h2>Thư Viện</h2></div>
    <div class="search">
        <input type="text" placeholder="Tìm bài dự thi_" />
        <div class="icon"><input type="submit" value="" /></div>
    </div>
    <div class="tableft">
        <div class="tab current">
            <a href="#">Chủ đề 1</a>
        </div>
        <div class="tab">
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
