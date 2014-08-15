<?php
require "lib/functions.php";
if(isset($_GET['id']) && $_GET['id'] != "" )
{
    $id = $_GET['id'];
    $result_news = select_details_news($id);
    $result =select_news();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Game Kun - Details Page</title>

    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/details_page.css" />
    <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.tinyscrollbar.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#scrollbar1').tinyscrollbar({ thumbSize: 80 });
            $("#scrollbar2").tinyscrollbar({ thumbSize: 80 });
        });
    </script>

</head>

<body>
<div id="wrap_detailspage">
    <div id="details">
        <!-- ------ -->
        <a href="#" class="back-link"></a>
        <!-- ------ -->
        <ul id="menu">
            <li class="active"><b></b><a href="#">Bí kíp của mẹ</a><span></span></li>
        </ul>
        <!-- ------ -->
        <div id="scrollbar1">
            <div class="scrollbar"><div class="track"><div class="thumb"></div></div></div>
            <div class="viewport">
                <div class="overview">
                    <ul>
                        <?php
                            if(count($result)==0)
                            {
                            ?>
                                <li><a href='#'>Chưa có bài viết</a></li>;
                            <?php
                             }
                            else
                            {
                                for($i=0;$i<count($result);$i++)
                                {
                                ?>
                                    <li><a href="#"><?php echo $result[$i]['title'];?></a></li>
                                <?php
                                }
                            }

                        ?>

                    </ul>
                </div>
            </div>
        </div>
        <!-- ------ -->
        <div id="content_details">
            <div id="scrollbar2">
                <div class="scrollbar"><div class="track"><div class="thumb"></div></div></div>
                <div class="viewport">
                    <div class="overview">
                        <?php
                        if(count($result_news)==0)
                        {
                            _redirect("landing_page.php");
                        }
                        else
                        {
                           echo $result_news[0]['content'];
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
}
else
{
    _alert("Not found id URL !!");
    _redirect("landing_page.php");
}
?>
</body>
</html>
