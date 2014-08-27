<?php
if (!isset($_SESSION)) {
    ob_start();
    @session_start();
}
require "lib/functions.php";
$uid=$_SESSION['uid'];
unset($_SESSION['uid']);
unset($_SESSION['pass']);
_redirect("login.php");