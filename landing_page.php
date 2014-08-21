<?php
if (!isset($_SESSION)) {
    ob_start();
    @session_start();
}
require 'config/config.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title>Giải pháp khi con ngán sữa</title>

    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/landing_page.css" />
    <link rel="stylesheet" type="text/css" href="css/skin.css" />
    <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.jcarousel.js"></script>
    <script type="text/javascript" src="js/ga_kun.js"></script>
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

        }

        jQuery(document).ready(function() {
            jQuery('#mycarousel').jcarousel({
                vertical: true,
                scroll: 1,
                auto: 2,
                wrap: 'last'
            });
            jQuery('#mycarousel-tvc').jcarousel({
                vertical: false,
                scroll: 1,
                wrap: 'last'
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

<div id="wrap_landingpage">
    <div class="tvc">
        <div class="video"><iframe width="279" height="190" src="//www.youtube.com/embed/Y-MsUcZ6SNI?rel=0&autoplay=1" frameborder="0" allowfullscreen></iframe></div>
        <div class="social">
            <div id="fb-root"></div>
            <script>(function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s); js.id = id;
                    js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&appId=<?php echo APPID; ?>&version=v2.0";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));</script>
            <div class="fb-like" data-href="<?php echo WEBSITEURL.$_SERVER['PHP_SELF'];  ?>" data-layout="standard" data-action="like" data-show-faces="false" data-share="true"></div>
        </div>
    </div>
    <?php

    require_once ("lib/functions.php");
    $result = select_answer();
    $result_news = select_news();
    ?>
    <div class="bikipcuame">
        <ul id="mycarousel" class="jcarousel-skin-tango">
            <?php
            if(count($result_news)==0)
            {
                echo "<li>Chưa có tin tức nào .!</li>";
            }
            else
            {
                for($i = 0;$i < count($result_news);$i++)
                {
                    $date = date_create($result_news[$i]['registerdate']);
            ?>

            <li><a href="details_news.php?id=<?php echo $result_news[$i]['id']; ?>"><span><?php //echo date_format($date, 'd/m/Y'); ?><img src="images/<?php echo $result_news[$i]['photo'] ;  ?>" /></span>&nbsp;&nbsp;<b><?php echo $result_news[$i]['title'] ;?></b></a></li>

            <?php
                }
            }
            ?>

        </ul>
    </div>
    <div class="question_img"></div>

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
                if($i%2==0)
                {
                    if($result[$i]['email'] != "")
                    {
                        $img = "images/default-ava.png";
                        $name = $result[$i]['email'];
                    }
                    else
                    {
                        $img = "https://graph.facebook.com/".$result[$i]['fbid']."/picture?type=large";
                        $name = $result[$i]['fbname'];
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
                        $name = $result[$i]['email'];
                    }
                    else
                    {
                        $img = "https://graph.facebook.com/".$result[$i]['fbid']."/picture?type=large";
                        $name = $result[$i]['fbname'];
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
    </div>
</div>
</body>
</html>
