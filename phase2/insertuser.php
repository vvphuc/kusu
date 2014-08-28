<?php
if (!isset($_SESSION)) {
    ob_start();
    @session_start();
}
require "lib/functions.php";
if(isset($_POST['submit']) && $_POST['submit'] != "")
{
    if($_POST['email'] != "")
    {
        $email = $_POST['email'];
        if($_POST['pass']!="")
        {
            if($_POST['captcha']!="" && $_POST['captcha'] == $_SESSION['cap_code'])
            {
                $pass = $_POST['pass'];
                $ip = getIP();
                $check_user = check_exist_user($email);
                if($check_user == 0)
                {
                    insert_user_register($email,$pass,"","",1,$ip);
                    $_SESSION['uid'] = $email;
                    $_SESSION['pass'] = $pass;
                    unset($_SESSION['cap_code']);
                }
                else
                {
                    _alert("Email đã tồn tại!");
                    _redirect("login.php");
                }
            }
            else
            {
                _alert("Mã xác nhận không đúng !");
                _redirect("login.php");
            }
        }
        else
        {
            _alert("Mật khẩu trống !");
            _redirect("login.php");
        }
    }
    else
    {
        _alert("Email trống !");
        _redirect("login.php");
    }
}
else
{
    _redirect("login.php");
}
