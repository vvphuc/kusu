
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Game Kun - Answer Page</title>

    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/answer_page.css" />
    <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <script>
        $.validator.setDefaults({
            submitHandler: function() { alert("submitted!"); }
        });

        $().ready(function() {
            // validate the comment form when it is submitted
            $("#info").validate();

            // validate signup form on keyup and submit
        });

    </script>
    <script>
        function check(){
            var email = document.getElementById('email').value;
            var message = document.getElementById('answer').value;
            if( message == '')
            {
                alert('Xin vui lòng nhập câu trả lời !');
                return false;
            }
            if(email=='')
            {
                alert('Xin vui lòng nhập email !');
                return false;
            }
            var rs = new RegExp("([A-Za-z0-9_.-]){2,}@([A-Za-z0-9_.-]){2,}.([A-Za-z0-9_.-]){2,}");
            if(email.match(rs) == null)
            {
                alert('Email không hợp lệ (ví dụ: abc@gmail.com)');
                return false;
            }
            return true;
        }
    </script>
    <script>
        function getID($id){
            $('#m1,#m2,#m3,#m4').removeClass('active');
            $("#m"+$id).addClass('active');
        };
    </script>

</head>

<body>
<div id="wrap_answerpage">
    <div class="milk-bg"></div>
    <div class="question"></div>
    <form class="ans" method="post" action="insert_answer.php" name="info" onsubmit="return check();">
        <textarea placeholder="Hãy chia sẻ cho chúng tôi “bí quyết” của bạn tại đây..." name="answer" id="answer" required  ></textarea>
        <div class="mail-icon"></div>
        <input type="text" placeholder="Email của bạn" id="email" name="email" required  />
        <div class="text-chon-ava">
            <a id="m1" onclick="getID(1)" class="active" href="#"><img src="images/icon-chat-1.png" /></a>
            <a id="m2" onclick="getID(2)" href="#"><img src="images/icon-chat-2.png" /></a>
            <a id="m3" onclick="getID(3)" href="#"><img src="images/icon-chat-1.png" /></a>
            <a id="m4" onclick="getID(4)" href="#"><img src="images/icon-chat-2.png" /></a>
        </div>
        <input type="hidden" id="hide" name="avatar" value="1" />
        <input type="submit" name="submit" value="ok" /></form>
    </form>
</div>
</body>
</html>
