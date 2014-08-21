<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
if (!isset($_SESSION)) {
    ob_start();
    @session_start();
}
require "lib/functions.php";

if(isset($_POST['submit']))
{
    if($_POST['answer']!="")
    {
        $message = $_POST['answer'] ;
        if($_POST['radiog_dark'] == "email")
        {
            if($_POST['email']!="")
            {
                $email = $_POST['email'];
                if($_POST['avatar']!="")
                {
                    $avatar = $_POST['avatar'];
                    insert_answer($email,$message,$avatar,"","",1);
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
            $_SESSION['answer'] = $_POST['answer'];
           _redirect("loginfb.php");
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