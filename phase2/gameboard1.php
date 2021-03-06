<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
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
                <li class="active"><a href="#"><span></span>Giới thiệu</a></li>
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
    <div id="frame_library"></div>
    <div class="titlepage"><h2>Up ảnh dự thi</h2></div>
    <!-- -->
    <form>
        <!-- -->
        <div class="leftside">
            <h3>1. Lựa chọn chủ đề:</h3>
            <div class="f13">Bạn hãy lựa chọn chủ đề mình yêu thích, sau đó tải hình ảnh tương tự như hình chủ đề bạn đã chọn.</div>
            <br>
            <div><img src="images/p2-chude.png" alt="Chủ đề" /></div>
            <div class="clear"></div>
            <div class="fileUpload">
                <input class="uploadFile" type="text" value="Chưa chọn file" />
                <div class="text">Chọn hình</div>
                <input id="uploadBtn" type="file" class="upload" />
            </div>
            <p class="alert">Hình dự thi là JPG/PNG và dung lượng không quá 5MB</p>
        </div>
        <!-- -->
        <div class="rightside">
            <h3>2. Thông tin người dự thi</h3>
            <div class="rowf"><span>Tên bé:</span><input type="text" /></div>
            <div class="rowf"><span>Tên bạn:</span><input type="text" /></div>
            <div class="rowf"><span>Điện thoại:</span><input type="text" /></div>
            <div class="rowf"><span>Email:</span><input type="text" /></div>
            <div class="rowf"><span>CMND:</span><input type="text" /></div>
            <input type="submit" />
        </div>
        <!-- -->
    </form>
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
