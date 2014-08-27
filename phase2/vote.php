<?php 
require 'lib/functions.php';
if(!isset($_POST['ptid']) ||  $_POST['ptid'] == ''){
	echo -1;
	return;
}
$ptid = $_POST['ptid'];
$userid = 123;
if(!have_photo($ptid) || have_photo($ptid) == 0){
	echo -1;
	return;
}
if(have_vote($userid,$ptid)){
	echo 0;
	return;
}
$ip = getIP();
$result = insert_vote($userid, $ptid,$ip);
if($result){

	echo  1;
	return ;
}
echo  01;
return;
?>