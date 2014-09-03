<?php
if (!isset($_SESSION)) {
    ob_start();
    @session_start();
}
require_once "lib/functions.php";
if(isset($_SESSION['uid']) && $_SESSION['uid'] != "")
{
    _redirect("index.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Game Kun - P2 - Login</title>
    <link rel="stylesheet" type="text/css" href="css/p2_style.css" />
    <link rel="stylesheet" type="text/css" href="css/p2_login.css" />
    <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <script>
        function checkRegister(){
            var email = document.getElementById('email1').value;
            var pass = document.getElementById('pass1').value;
            var cfpass = document.getElementById('cfpass').value;
            var captcha = document.getElementById('captcha').value;
            var rs = new RegExp("([A-Za-z0-9_.-]){2,}@([A-Za-z0-9_.-]){2,}.([A-Za-z0-9_.-]){2,}");
            if(email=='')
            {
                alert('Xin vui lòng nhập email !');
                return false;
            }
            if(email.match(rs) == null)
            {
                alert('Email không hợp lệ (ví dụ: abc@gmail.com)');
                return false;
            }
            if(pass=='')
            {
                alert('Xin vui lòng nhập mật khẩu !');
                return false;
            }
            if(cfpass=='')
            {
                alert('Xin vui lòng nhập xác nhận mật khẩu !');
                return false;
            }
            if(pass!=cfpass)
            {
                alert('Xin vui lòng nhập lại xác nhận mật khẩu !');
                return false;
            }
            if(captcha == '')
            {
                alert('Xin vui lòng nhập mã xác nhận !');
                return false;
            }
            return true;
        }
        function checkLogin(){
            var email = document.getElementById('email').value;
            var pass = document.getElementById('pass').value;
            var rs = new RegExp("([A-Za-z0-9_.-]){2,}@([A-Za-z0-9_.-]){2,}.([A-Za-z0-9_.-]){2,}");
            if( email == '')
            {
                alert('Xin vui lòng nhập email !');
                return false;
            }
            else if( pass == '')
            {
                alert('Xin vui lòng nhập mật khẩu !');
                return false;
            }
            else if(email.match(rs) == null)
            {
                alert('Email không hợp lệ (ví dụ: abc@gmail.com)');
                return false;
            }
            else
            {
                var data = email + "|" + pass;
                $.ajax({
                    type: "POST",
                    url: "checkLogin.php",
                    data:{dt:data}
                }).done(function(msg){
                        if(msg == 1)
                        {
                            window.top.location.href = "index.php";
                        }
                        else
                        {
                            alert("Email hoặc password chưa đúng! Bạn vui lòng kiểm tra lại");
                        }
                    });
                //return true;
            }
        }
        function loginFB()
        {
            window.top.location.href = '<?php echo SITEURL; ?>';
        }
    </script>
</head>

<body style="margin-top:-18px">
<h1>Sữa Kun</h1>
<div id="topbar">
    <div class="repeatmenu"></div>
    <div class="wrapper_1000">
        <div id="logo"><a href="home.php"><img src="images/logo-kunkun.png" title="logo_kunkun" alt="logo_kunkun" /></a></div>
        <div class="iconKun"></div>
        <?php
        if(!isset($_SESSION['uid']))
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
    <div id="frame_login"></div>
    <form class="flogin">
        <h4>Bạn đã là thành viên?</h4>
        <span>Email</span>
        <input type="text" name="email" id="email" />
        <span>Mật khẩu</span>
        <input type="password" name="pass" id="pass" />
        <input class="submit" type="button" value="Đăng nhập" onclick="checkLogin()" />
        <center>hoặc</center>
        <input class="fb" type="button" value="" onclick="loginFB()" />
    </form>
    <!-- -->
    <form class="fregister" method="post" action="insertuser.php" name="register" onsubmit="return checkRegister();">
        <h4>Bạn chưa là thành viên của gia đình Kun? Hãy đăng ký ngay hôm nay:</h4>
        <div class="fam"></div>
        <div class="text"></div>
        <input type="text" name="email" id="email1"/>
        <input type="password" name="pass" id="pass1" />
        <input type="password" name="cfpass" id="cfpass" />
        <input type="text" name="captcha" id="captcha" maxlength="6" size="6" />
        <div class="capt"><img style="width: 80px;height: 25px;margin-top: -10px;" src="captcha_code.php"/></div>
        <input type="submit" value="Đăng ký" name="submit" />
    </form>
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
