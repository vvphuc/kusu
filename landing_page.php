<?php
require "lib/functions.php";
$result = select_answer();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="DC.title" content="Title here" />
    <meta name="DC.subject" content="Keywords here" />
    <meta name="DC.description" content="Description here" />
    <meta name="DC.format" content="text/html" />
    <meta name="DC.publisher" content="Publisher here" />
    <meta name="DC.language" content="en" />
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title>Game Kun - Landing Page</title>

    <link rel="stylesheet" type="text/css" href="css/style.css" />
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
        <div class="video"><iframe width="274" height="195" src="//www.youtube.com/embed/NXqvabhcI3A" frameborder="0" allowfullscreen></iframe></div>
        <ul id="mycarousel-tvc" class="jcarousel-skin-tango-tvc">
            <li><a><img src="images/youtube-thumb.jpg" /></a></li>
            <li><a><img src="images/youtube-thumb.jpg" /></a></li>
            <li><a><img src="images/youtube-thumb.jpg" /></a></li>
            <li><a><img src="images/youtube-thumb.jpg" /></a></li>
            <li><a><img src="images/youtube-thumb.jpg" /></a></li>
            <li><a><img src="images/youtube-thumb.jpg" /></a></li>
        </ul>
    </div>

    <div class="bikipcuame">
        <ul id="mycarousel" class="jcarousel-skin-tango">
            <li><a href="details.html"><span>15/05/2014</span>&nbsp;&nbsp;<b>Con ngán sữa -  vấn đề chung của mẹ</b></a></li>
            <li><a href="details.html"><span>15/05/2014</span>&nbsp;&nbsp;<b>Mẹ hiểu gì về tình trạng ngán sữa ở trẻ</b></a></li>
            <li><a href="details.html"><span>15/05/2014</span>&nbsp;&nbsp;<b>Con ngán sữa không còn là chuyện nhỏ</b></a></li>
            <li><a href="details.html"><span>15/05/2014</span>&nbsp;&nbsp;<b>Con ngán sữa -  vấn đề chung của mẹ</b></a></li>
            <li><a href="details.html"><span>15/05/2014</span>&nbsp;&nbsp;<b>Con ngán sữa không còn là chuyện nhỏ</b></a></li>
            <li><a href="details.html"><span>15/05/2014</span>&nbsp;&nbsp;<b>Con ngán sữa -  vấn đề chung của mẹ</b></a></li>
            <li><a href="details.html"><span>15/05/2014</span>&nbsp;&nbsp;<b>Mẹ hiểu gì về tình trạng ngán sữa ở trẻ</b></a></li>
            <li><a href="details.html"><span>15/05/2014</span>&nbsp;&nbsp;<b>Con ngán sữa không còn là chuyện nhỏ</b></a></li>
        </ul>
    </div>
    <div class="question_img"></div>

    <!-- -------- Question and Answer -------- -->
    <div class="q_and_a">
        <ul id="mycarousel-chat" class="jcarousel-skin-tango-chat">
            <!-- -->
            <?php
            for($i=0;$i<count($result);$i++)
            {
                if($i%2==0)
                {
                    ?>
                <li>
                    <div class="chat boy">
                        <div class="ava"><img src="images/icon-chat-1<?php //echo $result[$i]['avatar']; ?>.png" /></div>
                        <div class="arrowleft"></div>
                        <div class="text">
                            <div>
                                <span><?php echo $result[$i]['email']; ?></span>
                                <b><?php echo $result[$i]['message']; ?></b>
                            </div>
                        </div>
                    </div>
                </li>
                    <?php
                }
                else
                {
             ?>
                <li>
                    <div class="chat girl">
                        <div class="ava"><img src="images/icon-chat-2<?php //echo $result[$i]['avatar']; ?>.png" /></div>

                        <div class="text">
                            <div>
                                <span><?php echo $result[$i]['email']; ?></span>
                                <b><?php echo $result[$i]['message']; ?></b>
                            </div>
                        </div>
                        <div class="arrowright"></div>
                    </div>
                </li>

            <?php
                }
            }
            ?>
            <!-- -->
        </ul>
    </div>
</div>
</body>
</html>
