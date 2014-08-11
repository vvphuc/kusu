<?php
$data = array(
'id'=>1,
'fbname'=>2,
'fbemail'=>3,
'fbphone'=>4,
'avatar'=>5,
'type'=>6,
'name'=>7,
'address'=>8,
'email'=>9,
'phone'=>10,
'idcard'=>11,
'lastlogin'=>12,
'ip'=>13,
'registerdate'=>14
);
function paging($conn,$cpage, $keyword='')
{
	mysql_query("SET NAMES 'utf8'");
	mysql_query("SET CHARACTER SET 'utf8'");
	$listpage =array();
	$truoc  = (6*($cpage-1));//array =0
	$sau  = 6;
	mysql_query("SET NAMES 'utf8'", $conn);
	$result = mysql_query("SELECT P.idpizza, P.path, C.fbname, C.fbid, M.image FROM pizza P INNER JOIN customer C ON P.usermake = C.fbid INNER JOIN materials M ON P.frame = M.id WHERE C.fbname LIKE '%".$keyword."%' ORDER BY `timesubmit` DESC LIMIT $truoc,$sau",$conn);//lấy ra 6 dòng 
	
	return $result;
}
?>

