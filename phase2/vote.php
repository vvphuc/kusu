<?php 
require 'lib/functions.php';
if(!isset($_POST['ptid']) ||  $_POST['ptid'] == ''){
	echo -1;
	return;
}
$ptid = $_POST['ptid'];
$subjectid =1;
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
	$re = update_vote($ptid,$subjectid);
	if($re){
		echo  1;
		return ;
	}
}
echo  01;
return;
?>