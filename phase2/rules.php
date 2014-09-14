<?php
if (!isset($_SESSION)) {
    ob_start();
    @session_start();
}
require "lib/functions.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Kun Cookies - Thể lệ & Giải thưởng</title>
    <link rel="stylesheet" type="text/css" href="css/p2_style_2.css" />
    <link rel="stylesheet" type="text/css" href="css/p2_winlist.css" />
    <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.tinyscrollbar.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#scrollbar1').tinyscrollbar({ thumbSize: 80 });
        });
    </script>
	<script type="text/javascript" src="js/ga_kun.js"></script>
</head>

<body style="margin-top:-18px">
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
            <li><a href="article2.php">Giải pháp cho trẻ ngán sữa</a>
                <ul>
                    <li><a href="article1.php?id=1">Nỗi lo ngán sữa</a></li>
                    <li><a href="article2.php">Bí kíp của mẹ</a></li>
                    <li><a href="article3.php">Sữa KUN Cookies</a></li>
                </ul>
            </li>
            <li class="round"><span></span></li>
            <li><a class="active" href="aboutgame.php">Cuộc thi ảnh</a>
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
<div class="wrapper_1000">
    <div id="wrap_winlist">
        <!-- -->
        <a href="javascript: history.go(-1)" class="back-link"></a>
        <input class="guianhduthi" type="button" value="Gửi ảnh dự thi" onclick="self.location='gameboard.php'" />
        <div class="titlepage"><h2>Cuộc thi ảnh</h2></div>
        <div class="imgtitle"></div>
        <h3>Thể lệ & Giải thưởng cuộc thi ảnh</h3>
        <!-- -->
        <div id="scrollbar1">
            <div class="scrollbar"><div class="track"><div class="thumb"></div></div></div>
            <div class="viewport">
                <div class="overview">
                 <!-- -->
                 <p><strong style="color:#f00">Cuộc thi: &ldquo;UỐNG KUN M&Ecirc; T&Iacute;T&rdquo;</strong></p>

<p>L&agrave; một s&acirc;n chơi hấp dẫn cho c&aacute;c bậc phụ huynh v&agrave; c&aacute;c b&eacute; trong độ tuổi từ 3-12 tuổi, nhằm tạo ra một kh&ocirc;ng gian vui vẻ, th&iacute;ch th&uacute; cho c&aacute;c b&eacute; khi uống sữa v&agrave; nhận nhiều phần thưởng gi&aacute; trị từ Kun Cookies &ndash; Dinh dưỡng từ sữa, Vị ngon từ cookies.&nbsp;&nbsp;</p>

<p><strong style="color:#31849b">NỘI DUNG CUỘC THI:</strong></p>

<p>Cuộc thi diễn ra từ ng&agrave;y 15/09/2014 đến ng&agrave;y 13/10/2014, ho&agrave;n to&agrave;n online tại trang <a href="http://www.kuncookies.vn/">www.kuncookies.vn</a></p>

<p>Mỗi 2 tuần Ban tổ chức sẽ đưa ra một chủ đề, người chơi gửi ảnh b&eacute; tạo d&aacute;ng uống sữa theo chủ đề v&agrave; k&ecirc;u gọi b&igrave;nh chọn cho ảnh tại trang <a href="http://www.kuncookies.vn/">www.kuncookies.vn</a></p>

<p>Ban tổ chức sẽ trao giải thưởng cho c&aacute;c b&agrave;i dự thi c&oacute; b&igrave;nh chọn nhiều nhất theo mỗi chủ đề được đưa ra v&agrave; giải thưởng chung cuộc cho ba b&agrave;i dự thi c&oacute; b&igrave;nh chọn cao nhất trong tất c&aacute;c b&agrave;i dự thi của cả 2 chủ đề.&nbsp; &nbsp;</p>

<p>Thời gian gửi ảnh:</p>

<ul>
	<li><strong>Chủ đề 1:</strong> C&ocirc;ng bố v&agrave;o ng&agrave;y 15/09 tại trang www.kuncookies.vn<br />
	Thời gian gửi ảnh dự thi từ ng&agrave;y 15/09 &ndash; 27/09/2014<br />
	Điểm b&igrave;nh chọn trao giải được t&iacute;nh đến 17h ng&agrave;y 27/09/2014 cho chủ đề 1<br />
	Kết quả sẽ được c&ocirc;ng bố v&agrave;o ng&agrave;y 28/09/2014</li>
	<li><strong>Chủ đề 2:</strong> C&ocirc;ng bố v&agrave;o ng&agrave;y 28/09 tại trang www.kuncookies.vn<br />
	Thời gian gửi ảnh dự thi từ ng&agrave;y 28/09 &ndash; 11/10/2014<br />
	Điểm b&igrave;nh chọn trao giải được t&iacute;nh đến 17h ng&agrave;y 11/10/2014 cho chủ đề 2<br />
	Kết quả sẽ được c&ocirc;ng bố v&agrave;o ng&agrave;y 12/10/2014</li>
</ul>

<p>Người chơi sẽ k&ecirc;u gọi b&igrave;nh chọn cho ảnh dự thi của m&igrave;nh từ ng&agrave;y 15/09 đến 17h ng&agrave;y 12/10/2014, ảnh được b&igrave;nh chọn nhiều nhất trong thời gian n&agrave;y sẽ nhận giải thưởng chung cuộc.</p>

<p>Giải thưởng chung cuộc sẽ được c&ocirc;ng bố v&agrave;o ng&agrave;y 13/10/2014</p>

<p><strong>ĐỐI TƯỢNG THAM GIA:</strong></p>

<p>C&ocirc;ng d&acirc;n Việt Nam kh&ocirc;ng giới hạn độ tuổi, giới t&iacute;nh, v&ugrave;ng miền l&agrave; người th&acirc;n của c&aacute;c b&eacute; nằm trong độ tuổi từ 3 &ndash; 12 tuổi&nbsp;</p>

<p><strong>C&Aacute;C THỨC THAM GIA:</strong></p>

<p>Bước 1: Người chơi chụp ảnh b&eacute; tạo d&aacute;ng giống với ảnh mẫu Ban tổ chức đưa ra</p>

<p>Bước 2: Người chơi truy cập trang <a href="http://www.kuncookies.vn/">www.kuncookies.vn</a> l&agrave;m theo hướng dẫn để đăng ảnh</p>

<p>Bước 3: Người chơi k&ecirc;u gọi b&igrave;nh chọn cho ảnh tham dự của m&igrave;nh bằng c&aacute;ch chia sẻ link ảnh tr&ecirc;n facebook.</p>

<p><em>(*) Lưu &yacute;: b&igrave;nh chọn chỉ c&oacute; gi&aacute; trị khi được b&igrave;nh chọn tại trang </em><a href="http://www.kuncookies.vn/"><em>www.kuncookies.vn</em></a></p>

<p><strong>CƠ CẤU CHẤM GIẢI:</strong></p>

<p>B&agrave;i dự thi được đ&aacute;nh gi&aacute; theo số lượng b&igrave;nh chọn tại trang <a href="http://www.kuncookies.vn/">www.kuncookies.vn</a></p>

<p>Đăng nhập l&agrave; th&agrave;nh vi&ecirc;n của trang <a href="http://www.kuncookies.vn/">www.kuncookies.vn</a> bằng t&agrave;i khoản facebook được cộng th&ecirc;m 5 lượt b&igrave;nh chọn</p>

<p>Để h&igrave;nh ảnh đ&atilde; dự thi l&agrave; h&igrave;nh ảnh đại diện (avatar) của t&agrave;i khoản facebook được c&ocirc;ng th&ecirc;m 20 lượt b&igrave;nh chọn (nếu người chơi đăng nhập <a href="http://www.kuncookies.vn/">www.kuncookies.vn</a> bằng t&agrave;i khoản gmai vui l&ograve;ng để lại t&ecirc;n t&agrave;i khoản facebook &amp; mail đăng k&yacute; facebook trong &ocirc; b&igrave;nh luận của bức ảnh dự thi để ban tổ chức c&oacute; thể t&iacute;nh điểm phần n&agrave;y, ban tổ chức kh&ocirc;ng chịu tr&aacute;ch nhiệm cộng th&ecirc;m lượt b&igrave;nh chọn nếu người chơi kh&ocirc;ng để lại th&ocirc;ng tin)</p>

<p><strong>CƠ CẤU GIẢI THƯỞNG:</strong></p>

<p><strong>Giải thưởng theo chủ đề</strong>, c&oacute; 4 giải cho 16 b&agrave;i dự thi c&oacute; tổng lượt b&igrave;nh chọn cao nhất từ tr&ecirc;n xuống theo mỗi chủ đề:</p>

<ul>
	<li>1 giải nhất trị gi&aacute; 4.000.000&nbsp; đồng (click để xem h&igrave;nh ảnh giải thưởng)</li>
	<li>2 giải nh&igrave; trị gi&aacute; 2.000.000 đồng (click để xem h&igrave;nh ảnh giải thưởng)</li>
	<li>3 giải ba trị gi&aacute; 1.000.000 đồng (click để xem h&igrave;nh ảnh giải thưởng)</li>
	<li>10 giải khuyến kh&iacute;ch trị gi&aacute; 200.000 đồng (click để xem h&igrave;nh ảnh giải thưởng)</li>
</ul>

<p>(*) C&aacute;c b&agrave;i đạt giải nhất, nh&igrave;, ba phải c&oacute; đạt số votes tối thiểu l&agrave; 100 votes</p>

<p><strong>Giải thưởng chung cuộc</strong>, c&oacute; 3 giải chung cuộc trị gi&aacute; 3.000.000 đồng cho b&agrave;i dự thi c&oacute; b&igrave;nh chọn cao nhất trong tất cả c&aacute;c b&agrave;i dự thi của 4 chủ đề thi</p>

<p>Trường hợp 1 người tham gia c&oacute; hơn 1 b&agrave;i dự thi đoạt giải, Ban tổ chức chỉ chọn trao 1 giải cao nhất của người chơi đ&oacute;</p>

<p>Trường hợp số lượng b&agrave;i thi đoạt giải vượt qua mức số lượng giải thưởng, Ban tổ chức sẽ lựa chọn ngẫu nhi&ecirc;n để chọn ra b&agrave;i được trao giải thưởng.&nbsp;</p>

<p><strong>QUY ĐỊNH CHUNG:</strong></p>

<ul>
	<li>Ban tổ chức c&oacute; quyền x&oacute;a b&agrave;i dự thi tham gia, v&agrave; kh&ocirc;ng chấp nhận b&agrave;i thi nếu ph&aacute;t hiện c&oacute; gian lận nghi&ecirc;m trọng trong qu&aacute; tr&igrave;nh b&igrave;nh chọn.</li>
	<li>Trong trường hợp xảy ra tranh chấp li&ecirc;n quan đến chương tr&igrave;nh n&agrave;y, quyết định của c&ocirc;ng ty cổ phần sữa quốc tế - IDP sẽ l&agrave; quyết định cuối c&ugrave;ng</li>
	<li>Ban tổ chức c&oacute; quyền sử dụng h&igrave;nh ảnh của c&aacute;c th&iacute; sinh tham gia cho tất cả c&aacute;c hoạt động truyền th&ocirc;ng v&agrave; quảng c&aacute;o.</li>
</ul>

<p>&nbsp;</p>

                 <!-- -->
                 </div>
            </div>
        </div>
        <!-- -->
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
