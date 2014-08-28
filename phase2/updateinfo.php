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
    $email = $_SESSION['uid'];
    $name = $data_arr[0];
    $phone = $data_arr[1];
    $idcard = $data_arr[2];
    $type = $data_arr[3];
    update_profile($email,$name,$phone,$idcard,$type);
    echo 1;
}
else
{
    echo 0;
    _redirect("index.php");
}
?>