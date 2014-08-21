
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Ngán sữa</title>

    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/question_page.css" />
    <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="js/ga_kun.js"></script>
    <script>
        function directpage(){
            ga('send', 'event', 'button', 'click', 'Button Yes');
            $("#popup").css("display","block");
            setTimeout(function () {
                window.location.href = "landing_page.php";
            }, 3000);
        };
        function directpageNo(){
            ga('send', 'event', 'button', 'click', 'Button No');
            window.location.href = "answer.php";
        };
    </script>
</head>

<body>
<div id="popup" style="position:absolute;width:100%;height:100%;z-index:100;background:rgba(255,255,255,.7); display:none">
    <img src="images/p1-popup-chucmung.png" style="position:fixed; top:50%; left:50%; margin:-80px 0 0 -210px" />
</div>
<div id="wrap_answerpage">
    <div class="milk-bg"></div>
    <div class="question"></div>
    <form class="ans">
        <a href="#" class="yes" onclick="directpage()" id="yes"></a>
        <a href="#" class="no" onclick="directpageNo()"></a>
    </form>
</div>
</body>
</html>
