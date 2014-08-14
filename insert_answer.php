<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
require "config/config.php";
require "config/function.php";
require_once 'lib/meekrodb.2.3.class.php';
DB::$user = 'root';
DB::$password = '';
DB::$dbName = 'kusudemodb';
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
                DB::insert('answer',array(
                    'email' => $email,
                    'message' => $message,
                    'avatar' => $avatar,
                ));
                _redirect("landing_page.php");
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