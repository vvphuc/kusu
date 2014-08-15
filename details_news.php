<?php
require "lib/functions.php";
if(isset($_GET['id']) && $_GET['id'] != "" )
{
    $id = $_GET['id'];
    $result = select_details_news($id);
    if(count($result)==0)
    {
        _alert("News not found !");
        _redirect("landing_page.php");
    }
    else
    {
        print_r($result);
    }
}
else
{
    _alert("Not found id URL !!");
    _redirect("landing_page.php");
}