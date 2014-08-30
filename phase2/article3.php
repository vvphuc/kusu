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
    <title>Game Kun - Details Page</title>

    <link rel="stylesheet" type="text/css" href="css/p2_style.css" />
    <link rel="stylesheet" type="text/css" href="css/p2_article.css" />
    <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.tinyscrollbar.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#scrollbar1').tinyscrollbar({ thumbSize: 40 });
            $("#scrollbar2").tinyscrollbar({ thumbSize: 80 });
        });
    </script>

</head>

<body>
<h1>Sữa Kun</h1>
<div id="topbar">
    <div class="repeatmenu"></div>
    <div class="wrapper_1000">
        <div id="logo"><img src="images/logo-kunkun.png" title="logo_kunkun" alt="logo_kunkun" /></div>
        <div class="iconKun"><span></span></div>
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
                <li class="active"><a href="#"><span></span>Giải pháp cho trẻ ngán sữa</a>
                    <ul>
                        <li><a href="article1.php?id=1">Nỗi lo ngán sữa</a></li>
                        <li><a href="article2.php">Bí kíp của mẹ</a></li>
                        <li><a href="article3.php">Sữa KUN Cookies</a></li>
                        <li class="last"></li>
                    </ul>
                </li>
                <li class=""><a href="#"><span></span>Cuộc thi ảnh</a>
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

<div id="wrap_detailspage">
    <div id="details">
        <!-- ------ -->
        <a href="#" class="back-link"></a>
        <!-- ------ -->
        <ul id="menu" class="noilongansua">
            <li><b></b><a href="#">Nỗi lo ngán sữa</a><span></span></li>
        </ul>
        <ul id="menu" class="bikipcuame op2">
            <li><b></b><a href="#">Bí kíp của mẹ</a><span></span></li>
        </ul>
        <ul id="menu" class="suakun active">
            <li><b></b><a href="#">Sữa Kun Cookies</a><span></span></li>
        </ul>
        <!-- ------ -->
        <div id="scrollbar1" class="tab3">
            <div class="scrollbar"><div class="track"><div class="thumb"></div></div></div>
            <div class="viewport">
                <div class="overview">
                    <ul>
                        <li><a href="#">Làm gì khi trẻ biếng ăn?</a></li>
                        <li><a href="#">Làm gì khi trẻ biếng ăn? 2</a></li>
                        <li><a href="#">Làm gì khi trẻ biếng ăn? 3</a></li>
                        <li><a href="#">Làm gì khi trẻ biếng ăn? 4</a></li>
                        <li><a href="#">Làm gì khi trẻ biếng ăn? 5</a></li>
                        <li><a href="#">Làm gì khi trẻ biếng ăn? 6</a></li>
                        <li><a href="#">Làm gì khi trẻ biếng ăn? 7</a></li>
                        <li><a href="#">Làm gì khi trẻ biếng ăn? 8</a></li>
                        <li><a href="#">Làm gì khi trẻ biếng ăn? 9</a></li>
                        <li><a href="#">Làm gì khi trẻ biếng ăn? 2</a></li>
                        <li><a href="#">Làm gì khi trẻ biếng ăn? 3</a></li>
                        <li><a href="#">Làm gì khi trẻ biếng ăn? 4</a></li>
                        <li><a href="#">Làm gì khi trẻ biếng ăn? 5</a></li>
                        <li><a href="#">Làm gì khi trẻ biếng ăn? 6</a></li>
                        <li><a href="#">Làm gì khi trẻ biếng ăn? 7</a></li>
                        <li><a href="#">Làm gì khi trẻ biếng ăn? 8</a></li>
                        <li><a href="#">Làm gì khi trẻ biếng ăn? 9</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- ------ -->
        <!-- ------ -->
        <div id="content_details">
            <div id="scrollbar2">
                <div class="scrollbar"><div class="track"><div class="thumb"></div></div></div>
                <div class="viewport">
                    <div class="overview">
                        <h2><strong>Giai đoạn trẻ ch&aacute;n sữa</strong></h2>
                        <p><strong><em>http://vietnamnet.vn/vn/doi-song/193463/vi-sao-tre-ngan-sua-.html</em></strong></p>
                        <p><em>Bước sang tuổi thứ 4, trẻ mang lại cho gia đ&igrave;nh th&ecirc;m nhiều tiếng cười bởi con biết tự chăm s&oacute;c bản th&acirc;n, th&iacute;ch bắt chước người lớn, thể hiện y&ecirc;u thương r&otilde; r&agrave;ng hơn&hellip; Tuy nhi&ecirc;n, đ&acirc;y cũng l&agrave; l&uacute;c nhiều phụ huynh bối rối bởi con bắt đầu c&oacute; &yacute; thức về c&aacute;i t&ocirc;i, thể hiện sở th&iacute;ch ri&ecirc;ng v&agrave; giận dỗi r&otilde; n&eacute;t hơn, đặc biệt l&agrave; t&igrave;nh trạng con ng&aacute;n sữa v&agrave; &ldquo;kh&aacute;ng cự&rdquo; mỗi khi tới giờ uống sữa.</em></p>
                        <p>Sau 4 tuổi, khi trẻ đ&atilde; biết n&oacute;i tr&ograve;n v&agrave;nh r&otilde; chữ, đi đứng vững chải, th&iacute;ch hỏi v&agrave; t&ograve; m&ograve; kh&aacute;m ph&aacute; về thế giới xung quanh nhiều hơn&hellip; cũng l&agrave; l&uacute;c trẻ được cha mẹ cho đi học.</p>
                        <p><img src="images/ngansua_1.png" style="height:376px; width:566px" /></p>
                        <p><em>4 &ndash; 11 tuổi l&agrave; giai đoạn trẻ hoạt động thể lực lẫn tr&iacute; tuệ mạnh mẽ để kh&aacute;m ph&aacute; những b&agrave;i học đầu đời</em></p>
                        <p>&nbsp;</p>
                        <p>Khi đến trường, con bắt đầu c&oacute; những mối quan hệ của ri&ecirc;ng m&igrave;nh. Con c&oacute; bạn b&egrave;, thầy c&ocirc;. Con biết cảm nhận về t&igrave;nh bạn, t&igrave;nh thầy tr&ograve;, quy tắc cộng đồng v&agrave; phải phấn đấu để đạt được th&agrave;nh t&iacute;ch tốt.</p>
                        <p>&nbsp;</p>
                        <p>Con chơi đ&ugrave;a cả ng&agrave;y kh&ocirc;ng biết mệt, li&ecirc;n tục hỏi người lớn &ldquo;v&igrave; sao thế n&agrave;y l&agrave;m sao thế kia&rdquo;, con bắt chước l&agrave;m những việc như cha mẹ thường l&agrave;m, con biết tự chăm s&oacute;c bản th&acirc;n những điều cơ bản như tự thay quần &aacute;o, đi vệ sinh, m&uacute;c thức ăn&hellip;</p>
                        <p>&nbsp;</p>
                        <p>Con rất năng động v&agrave; cần phải học hỏi kh&aacute;m ph&aacute; nhiều thứ. Những kh&aacute;m ph&aacute; đầu ti&ecirc;n đ&oacute; c&oacute; thể được ghi nhớ suốt đời v&agrave; ảnh hưởng mạnh mẽ đến qu&aacute; tr&igrave;nh h&igrave;nh h&agrave;nh nh&acirc;n c&aacute;ch sau n&agrave;y.</p>
                        <p>&nbsp;</p>
                        <p>Theo khuyến c&aacute;o, trẻ từ 4 &ndash; 11 tuổi cần được uống 3 hộp sữa mỗi ng&agrave;y để đ&aacute;p ứng nhu cầu dinh dưỡng cho c&aacute;c hoạt động thể chất v&agrave; tr&iacute; tuệ tăng cao. Tuy nhi&ecirc;n, trẻ ở giai đoạn n&agrave;y đ&atilde; biết thể hiện &yacute; th&iacute;ch ri&ecirc;ng v&agrave; hay quyết định mọi việc theo cảm t&iacute;nh. V&igrave; vậy, cha mẹ thường đối diện với t&igrave;nh trạng con kh&ocirc;ng chịu uống sữa, thậm ch&iacute; từ chối rất quyết liệt.</p>
                        <p>&nbsp;</p>
                        <p>Cũng kh&oacute; tr&aacute;ch tại sao con ng&aacute;n sữa. V&igrave; con được uống một hương vị sữa qu&aacute; quen thuộc trong thời gian d&agrave;i, cộng với &ldquo;tr&aacute;ch nhiệm uống sữa&rdquo; m&agrave; người lớn đặt ra, từ đ&oacute; biến việc uống sữa trở n&ecirc;n qu&aacute; nh&agrave;m ch&aacute;n so với những điều mới lạ th&uacute; vị m&agrave; con mong đợi.</p>
                        <p>&nbsp;</p>
                        <p><img src="images/ngansua_2.jpg" style="height:324px; width:433px" /></p>
                        <p>&nbsp;</p>
                        <p><em>Cha mẹ n&ecirc;n t&igrave;m c&aacute;ch gi&uacute;p con uống sữa chủ động thay v&igrave; bắt &eacute;p, dọa nạt, đ&aacute;nh đ&ograve;n l&agrave;m trẻ &ldquo;sợ sữa&rdquo;.</em></p>
                        <p>Do lo lắng v&agrave; nghĩ con nhỏ chưa biết &yacute; thức, nhiều mẹ cố &eacute;p con uống sữa, con kh&ocirc;ng chịu th&igrave; mẹ dọa nạt, c&oacute; khi đ&aacute;nh đ&ograve;n hoặc cố gắng n&agrave;i &eacute;p, hứa hẹn qu&agrave; n&agrave;y, vật kia&hellip; nhưng đ&acirc;u vẫn ho&agrave;n đấy.</p>
                        <p>Trẻ từ 4 tuổi đ&atilde; biết &yacute; thức thế giới xung quanh m&igrave;nh, trẻ cũng c&oacute; những sở th&iacute;ch ăn uống ri&ecirc;ng như người lớn vậy. Việc bị bắt &eacute;p, dọa nạt, đ&aacute;nh đ&ograve;n, hoặc qu&aacute; xuống nước&hellip; đều g&acirc;y ra t&aacute;c dụng kh&ocirc;ng tốt về mặt l&yacute; t&iacute;nh v&agrave; cảm x&uacute;c cho cả hai ph&iacute;a mẹ v&agrave; con.</p>
                        <p>&nbsp;</p>
                        <p>Về mặt l&yacute; t&iacute;nh, khi uống sữa bị động, hệ thần kinh của con sẽ ra lệnh chậm chạp cho việc ti&ecirc;u h&oacute;a sữa. Đặc biệt, việc phải d&ugrave;ng một thức uống m&agrave; bản th&acirc;n đ&atilde; qu&aacute; ng&aacute;n c&oacute; thể g&acirc;y ra n&ocirc;n &oacute;i, đi k&egrave;m lu&ocirc;n cả thức ăn. C&oacute; trẻ c&ograve;n &ldquo;&aacute;p dụng h&igrave;nh thức n&oacute;i dối&rdquo; để khỏi bị uống sữa, như l&agrave; &ldquo;b&agrave; đ&atilde; cho con uống rồi&rdquo;, &ldquo;con đ&atilde; uống tr&ecirc;n trường rồi&rdquo;&hellip; cứ như vậy trẻ h&igrave;nh th&agrave;nh th&oacute;i quen xấu l&uacute;c n&agrave;o kh&ocirc;ng hay.</p>
                        <p>&nbsp;</p>
                        <p>Nghi&ecirc;m trọng hơn l&agrave; về mặt cảm x&uacute;c. V&igrave; bị &eacute;p v&agrave; dọa nạt qu&aacute; nhiều khiến trẻ &aacute;c cảm với sữa, c&oacute; thể bị ấn tượng m&atilde;i m&atilde;i hoặc kh&ocirc;ng cảm t&igrave;nh với những g&igrave; li&ecirc;n quan đến sữa. Hơn hết, t&igrave;nh cảm mẹ con trở n&ecirc;n xa c&aacute;ch hơn v&igrave; những bất h&ograve;a xoay quanh chuyện uống sữa. &nbsp;</p>
                        <p><img src="images/ngansua_3.jpg" style="height:285px; width:406px" /></p>
                        <p><em>Cha mẹ n&ecirc;n cho con uống sữa c&oacute; hương vị y&ecirc;u th&iacute;ch v&agrave; vui đ&ugrave;a với con để trẻ uống sữa chủ động hơn.</em></p>
                        <p>Ch&uacute;ng ta kh&ocirc;ng n&ecirc;n biến từ việc con &ldquo;ng&aacute;n sữa&rdquo; th&agrave;nh &ldquo;sợ sữa&rdquo; v&agrave; &ldquo;sợ lu&ocirc;n cả người cho uống sữa&rdquo;. H&atilde;y t&igrave;m ra một số giải ph&aacute;p gi&uacute;p trẻ uống sữa chủ động như chọn một vị sữa m&agrave; con y&ecirc;u th&iacute;ch, biến giờ uống sữa th&agrave;nh gi&acirc;y ph&uacute;t thư gi&atilde;n c&ugrave;ng mẹ v&agrave; con&hellip;</p>
                        <p>B&iacute;ch Ngọc</p>
                    </div>
                </div>
            </div>
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
