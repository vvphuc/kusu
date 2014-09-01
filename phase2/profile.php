<?php
if (!isset($_SESSION)) {
    ob_start();
    @session_start();
}
require "lib/functions.php";
require 'lib/PHPPagination/Pagination.class.php';
if(!isset($_SESSION['subject']) || $_SESSION['subject'] == ''){
$subject = select_subject();
    if($subject){
         $_SESSION['subject'] = $subject['0'];
    }
}
$sub = $_SESSION['subject'];
if(isset($_SESSION['uid']) && $_SESSION['uid'] != "" )
{
    $profile = get_info_user($_SESSION['uid']);
    $name = "";
    $email = "";
    $type = $profile[0]['type'];
    if($profile[0]['type']==1)
    {
        $name = $profile[0]['name'];
        $email = $profile[0]['id'];
    }
    else
    {
        $name = $profile[0]['fbname'];
        $email = $profile[0]['fbemail'];
    }
    $phone = $profile[0]['phone'];
    $idcard = $profile[0]['idcard'];
    $image = select_images_subjectid($sub['id'], $_SESSION['uid']);
    $total = count($image);
    // determine page (based on <_GET>)
    $page = isset($_GET['page']) ? ((int) $_GET['page']) : 1;
    // instantiate; set current page; set number of records
    $pagination = (new Pagination());
    $pagination->setCurrent($page);
    $pagination->setRPP(2);
    $pagination->setTotal($total);
    $im = select_profile_paging($page,2, $_SESSION['uid'] );

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Game Kun - P2 - Profile</title>
    <link rel="stylesheet" type="text/css" href="css/p2_style.css" />
    <link rel="stylesheet" type="text/css" href="css/p2_profile.css" />
    <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript">
        function checkUpdateInfo(){
            var name = document.getElementById('name').value;
            var phone = document.getElementById('phone').value;
           // var idcard = document.getElementById('idcard').value;
            var type = <?php echo $type ; ?>;
            var data = name + "|" + phone + "|"+ type;
            $.ajax({
                type: "POST",
                url: "updateinfo.php",
                data:{dt:data}
            }).done(function(msg){
                    if(msg == 1)
                    {
                        window.top.location.href = "profile.php";

                    }
                    else
                    {
                        //alert("Lỗi sự cố! Vui lòng nhập lại.");
                        window.top.location.href = "profile.php";
                    }
                });
            //return true;
        }
    </script>
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
                <li class="active"><a href="home.php"><span></span>Giới thiệu</a></li>
                <li class=""><a href="article2.php"><span></span>Giải pháp cho trẻ ngán sữa</a>
                    <ul>
                        <li><a href="article1.php?id=1">Nỗi lo ngán sữa</a></li>
                        <li><a href="article2.php">Bí kíp của mẹ</a></li>
                        <li><a href="article3.php">Sữa KUN Cookies</a></li>
                        <li class="last"></li>
                    </ul>
                </li>
                <li class=""><a href="aboutgame.php"><span></span>Cuộc thi ảnh</a>
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
    <div id="frame_profile"></div>
    <div id="leftside">
        <h4>1. Thông tin cá nhân</h4>
        <div class="rowf"><span>Tên bạn:</span><input type="text" id="name" value="<?php echo $name;  ?>" /></div>
        <div class="rowf"><span>Điện thoại:</span><input type="text" id="phone" value="<?php echo $phone;  ?>" /></div>
        <div class="rowf"><span>Email:</span><input type="text" readonly="true"  id="email" value="<?php echo $email; ?>" /></div>
        <input type="button" value="Lưu" onclick="checkUpdateInfo()" />
    </div>
    <!-- -->
    <div id="rightside">
        <h4>2. Hình ảnh dự thi của bạn:</h4>
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
        <div class="paging">
            <?php
             // grab rendered/parsed pagination markup
            $markup = $pagination->parse();
            echo $markup;
            ?>
        </div>
        <!-- -->
        <div class="score">
            <b>9999</b>
            <span>điểm</span>
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
    _redirect("login.php");
}
?>