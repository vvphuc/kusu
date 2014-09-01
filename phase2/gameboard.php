<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Game Kun - P2 - Library</title>
<link href="css/jquery.Jcrop.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/p2_style.css" />
<link rel="stylesheet" type="text/css" href="css/p2_upload.css" />
<link rel="stylesheet" type="text/css" href="css/phase2.css" />
<script src="js/jquery.min.js"></script>
<script src="js/jquery.Jcrop.min.js"></script>
<script src="js/script.js"></script>
<script src="js/phase2.js"></script>
<script type="text/javascript">
$( document ).ready(function() {
  $(".main-form").validate({
        "rules" :{
            "babyname" :{
                "required" : true   
            },
            "yourname" :{
                "required" : true   
            },
            "phone" :{
                "required" : true,
                "digits"   : true,
                "rangelength": [6, 12]
            },
            "email" :{
                "required" : true,
                "email"    : true
            },
        },
    });
  $("#main-submit").click(function(){
    if($('#log_in').val() == ''){
        alert("vui lòng đăng nhập!")
        return false;
    }
    if($(".uploadFile").val() ==''){
        alert("vui lòng chọn hình tham gia!")
        return false;   
    } 
  });
});
 </script> 
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
</head>

<body>
<h1>Sữa Kun</h1>
<div id="topbar">
	<div class="repeatmenu"></div>
    <div class="wrapper_1000">
    	<div id="logo"><img src="../images/logo-kunkun.png" title="logo_kunkun" alt="logo_kunkun" /></div>
        <div class="iconKun"></div>
        <?php
        $name = "";
        $email = "";
        $phone = '';
        $userid = '';
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
                $userid = $_SESSION['uid'];
                ?>
                <div class="welcome">
                    <b><?php echo get_name_user($_SESSION['uid']); ?></b>
                    <a href="profile.php">Xem hồ sơ ››</a>
                    <a href="logout.php">Đăng xuất</a>
                    <input type="hidden" name="log_in" id="log_in" value="<?php echo  $userid; ?>">
                </div>
            <?php
            $profile = get_info_user($_SESSION['uid']);
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
	<div id="wrap_winlist">
    <a href="#" class="back-link"></a>
    <a href="gameboard.php" class="upload"></a>
    <a href="#" class="playgame"></a>
    <div class="titlepage"><h2>Up ảnh dự thi</h2></div>
    <!-- -->
    <form class="main-form"  enctype="multipart/form-data" method="post" action="upload-article.php">
    	<div class="leftside">
            <h3>1. Chủ đề tuần này</h3>
            <div class="f13">Bạn hãy lựa chọn chủ đề mình yêu thích, sau đó tải hình ảnh tương tự như hình chủ đề bạn đã chọn.</div>
            <br>
            <div><img src="<?php echo $sub['photo']; ?>" alt="Chủ đề" /></div>
            <div class="clear"></div>
        </div>
        <!-- -->
        <div class="rightside">
        	<h3>2. Thông tin người dự thi</h3>
            <div class="rowf"><span>Tên bé:</span><input type="text" name="babyname" /></div>
            <div class="rowf"><span>Tên bạn:</span><input type="text" name="yourname" value="<?php echo $name; ?>" /></div>
            <div class="rowf"><span>Điện thoại:</span><input type="text" name="phone" value="<?php echo $phone; ?>" /></div>
            <div class="rowf"><span>Email:</span><input type="text" name="email" value="<?php echo $email;?>" /></div>
                <div class="rowf"><span>Up ảnh:</span></div>
            <div class="fileUpload">
                <input class="uploadFile" type="text" name="uploadFile" placeholder = "Chưa chọn file" />
                <div class="text">Chọn hình</div>
                <input id="uploadBtn" type="button" class="upload uploadBtn" />
            </div>
            <p class="alert">Hình dự thi là JPG/PNG và dung lượng không quá 5MB</p>
             <input type="submit" id="main-submit" > 
        </div>
        <div id="FrameImg">
           <img src="images/frame1.png" />
           <input type="hidden" name="frameImg" id="frameImg"value="images/frame1.png" >
        </div>
        <div id="CurrImg">
            <img src="" />
            <input type="hidden" name="ImgCurr" id="ImgCurr" value="" >
        </div>
    </form>
    <!-- -->
    <div class="edit-avatar-region">
        <div class="close-btn">X</div>
        <div class="bbody">
            <!-- upload form -->
            <form id="upload_form" class="upload_forms" enctype="multipart/form-data" method="post" target="if-handler"   action="upload.php" onsubmit="return checkForm()">
                <!-- hidden crop params -->
                <input type="hidden" id="x1" name="x1" />
                <input type="hidden" id="y1" name="y1" />
                <input type="hidden" id="x2" name="x2" />
                <input type="hidden" id="y2" name="y2" />
                <div class="step1">
                <h2>Step1: Chọn hình ảnh Upload</h2>
                <div><input type="file" name="image_file" id="image_file" onchange="fileSelectHandler()" /></div>
                </div>
                <div class="error"></div>
                <div class="step2">
                    <h2>Step2: Chỉnh sửa hình ảnh</h2>
                    <img id="preview" />
                    <div class="info">
                        <input type="hidden" id="filesize" name="filesize" />
                        <input type="hidden" id="filetype" name="filetype" />
                        <input type="hidden" id="filedim" name="filedim" />
                        <input type="hidden" id="w" name="w" value="400" />
                        <input type="hidden" id="h" name="h" height="300" />
                    </div>
                    <input id="btn-upload" type="submit" value="" />
                </div>
            </form>
        </div>
    </div>
    <div id="edit-mask" style="display: none; color: #fff; background-color: #000; opacity: 0.7; width: 100%; height: 100%; position: fixed; left: 0px; top: 0px; padding: 5% 25%; z-index: 1000;"></div>
    <div id="waiting"></div>
    <iframe name="if-handler" style="opacity:0; width:0; height:0"></iframe>
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
