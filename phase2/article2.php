<?php
if (!isset($_SESSION)) {
    ob_start();
    @session_start();
}
require "lib/functions.php";
$result = select_answer();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Game Kun - Bí kiếp của mẹ</title>

    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/p2_style.css" />
    <link rel="stylesheet" type="text/css" href="css/landing_page.css" />
    <link rel="stylesheet" type="text/css" href="css/skin.css" />
    <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.jcarousel.js"></script>
    <script type="text/javascript">

        function mycarousel_initCallback(carousel)
        {
            // Disable autoscrolling if the user clicks the prev or next button.
            carousel.buttonNext.bind('click', function() {
                carousel.startAuto(0);
            });

            carousel.buttonPrev.bind('click', function() {
                carousel.startAuto(0);
            });

            // Pause autoscrolling if the user moves with the cursor over the clip.
            carousel.clip.hover(function() {
                carousel.stopAuto();
            }, function() {
                carousel.startAuto();
            });

        };

        jQuery(document).ready(function() {
            jQuery('#mycarousel').jcarousel({
                vertical: true,
                scroll: 1,
                auto: 2,
                wrap: 'last',
                initCallback: mycarousel_initCallback
            });
            jQuery('#mycarousel-chat').jcarousel({
                vertical: true,
                scroll: 1,
                auto: 2,
                wrap: 'last',
                initCallback: mycarousel_initCallback
            });
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
<div id="wrap_landingpage" style="margin-top:-120px; z-index:0">
    <div class="tvc" style="top:163px">
        <div class="video"><img src="images/youtube-demo.jpg" /></div>
        <div class="social">LIKE AND SHARE HERE!!!</div>
    </div>
    <div class="question_img" style="background-size:80%; margin:30px 0 0 40px"></div>

    <!-- -------- Question and Answer -------- -->
    <div class="q_and_a">
        <ul id="mycarousel-chat" class="jcarousel-skin-tango-chat">
            <!-- -->
            <?php
            if(count($result)==0)
            {
                echo "<li>Chưa có câu trả lời nào . !</li>";
            }
            else
            {
                for($i=0;$i<count($result);$i++)
                {
                    $date = date_create($result[$i]['submitday']);
                    if($i%2==0)
                    {
                        if($result[$i]['email'] != "")
                        {
                            $img = "images/default-ava.png";
                            $name = $result[$i]['email']."  |  ".date_format($date, 'd/m/Y H:i:s');
                        }
                        else
                        {
                            $img = "https://graph.facebook.com/".$result[$i]['fbid']."/picture?type=large";
                            $name = $result[$i]['fbname']."  |  ".date_format($date, 'd/m/Y H:i:s');
                        }
                        ?>
                        <li>
                            <div class="chat boy">
                                <div class="ava"><img width='100%' src="<?php echo $img; ?>" /></div>
                                <div class="arrowleft"></div>
                                <div class="text">
                                    <div>
                                        <span><?php echo $name ?></span>
                                        <b><?php echo $result[$i]['message']; ?></b>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php
                    }
                    else
                    {
                        if($result[$i]['email'] != "")
                        {
                            $img = "images/default-ava.png";
                            $name = $result[$i]['email']."  |  ".date_format($date, 'd/m/Y H:i:s');
                        }
                        else
                        {
                            $img = "https://graph.facebook.com/".$result[$i]['fbid']."/picture?type=large";
                            $name = $result[$i]['fbname']."  |  ".date_format($date, 'd/m/Y H:i:s');
                        }
                        ?>
                        <li>
                            <div class="chat girl">
                                <div class="ava"><img width='100%' src="<?php echo $img; ?>" /></div>

                                <div class="text">
                                    <div>
                                        <span><?php echo $name; ?></span>
                                        <b><?php echo $result[$i]['message']; ?></b>
                                    </div>
                                </div>
                                <div class="arrowright"></div>
                            </div>
                        </li>

                    <?php
                    }
                }
            }

            ?>
            <!-- -->
        </ul>
        <div class="count_cm">Tổng số bình luận: <?php echo count($result); ?></div>
    </div>
</div>
</body>
</html>
