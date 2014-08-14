<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
require "lib/functions.php";
if(isset($_POST['submit']))
{
    if($_POST['answer']!="")
    {
        $message = $_POST['answer'] ;
        if($_POST['email']!="")
        {
            $email = $_POST['email'];
            if($_POST['avatar']!="")
            {
                $avatar = $_POST['avatar'];
                insert_answer($email,$message,$avatar);
                
            }
            else
            {
                _alert("Bạn chưa chọn avatar !! ");
                _redirect("index.php");
            }
        }
        else
        {
            _alert("Bạn chưa nhập email !!");
            _redirect("index.php");
        }
    }
    else
    {
        _alert("Bạn chưa nhập câu trả lời !! ");
        _redirect("index.php");
    }
}
else
{
    _redirect("index.php");
}