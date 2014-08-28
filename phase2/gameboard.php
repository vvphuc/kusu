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
            "pid" :{
                "required" : true,  
                "number"   : true
            },
            "filename" :{
                "required" : true   
            },
        },
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
    <form class="main-form"  enctype="multipart/form-data" method="post" action="upload-article.php">
    	<div class="leftside">
    		<h3>1. Lựa chọn chủ đề:</h3>
            <div class="f13">Bạn hãy lựa chọn chủ đề mình yêu thích, sau đó tải hình ảnh tương tự như hình chủ đề bạn đã chọn.</div>
            <br>
            <div>
                <a href="#" id="n1" onclick="getID(1)" class="choose"><img src="../images/p2-chude1.png" /></a>
                <a href="#" id="n2" onclick="getID(2)"><img src="../images/p2-chude2.png" /></a>
            </div>
            <div class="clear"></div>
            <div class="fileUpload">
            	<input class="uploadFile" name="filename" type="text" placeholder = "Chưa chọn file" value="" />
                <div class="text">Chọn hình</div>
                <div class="uploadBtn" id="uploadBtn" ></div>
            </div>
            <p class="alert">Hình dự thi là JPG/PNG và dung lượng không quá 5MB</p>
        </div>
        <div class="rightside">
        	<h3>2. Thông tin người dự thi</h3>
            <div class="rowf"><span>Tên bé:</span><input type="text" name="babyname" value="" /></div>
            <div class="rowf"><span>Tên bạn:</span><input type="text" name="yourname" value="" /></div>
            <div class="rowf"><span>Điện thoại:</span><input type="text" name="phone" value="" /></div>
            <div class="rowf"><span>Email:</span><input type="text" name="email" value="" /></div>
            <div class="rowf"><span>CMND:</span><input type="text" name="pid" value="" /></div>
             <input type="submit" > 
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
                    <div id="btn-resert"><a href="index.php"><img src="images/guiloichuc-reset.png" /></a></div>
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
