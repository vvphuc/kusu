<?php
if (!isset($_SESSION)) {
    ob_start();
    @session_start();
}
include "lib/functions.php";
//if(isset($_SESSION['fbid']) || $_SESSION['fbid'] != ""){
//    _redirect("index.php");
//}
if(isset($_POST['dt']))
{
    $data = $_POST['dt'];
    $data_arr = explode("|",$data);
    $email = $data_arr[0];
    $pass = $data_arr[1];
    $result = check_user_login($email,$pass);
    if($result == 1)
    {
        $_SESSION['uid'] = $email;
        $_SESSION['pass'] = $pass;
        //update_lastlogin($email);
        echo 1;
    }
    else
    {
        echo 0;
    }

}
else
{
    echo 0;
    _redirect("index.php");
}
?>