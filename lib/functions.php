<?php 
require './config/config.php';
require 'config/function.php';

//Demo function
function function_name($conn){
	try{  
		// mysql_query("SET NAMES 'utf8'");
		// mysql_query("SET CHARACTER SET 'utf8'");
		// $query = sprintf("SELECT * FROM winner WHERE fbid!='111' and name!='' ORDER BY time DESC LIMIT 0,500");		
		// mysql_query("SET NAMES 'utf8'", $conn);
		// $result = mysql_query($query, $conn);
		//return $result;
	}
	catch(Exception $e){
		echo "Message " . $e->getMessage();
		return;
	}
}
function utf8(){
	mysql_query("SET NAMES 'utf8'");
	mysql_query("SET CHARACTER SET 'utf8'");
}
require_once 'meekrodb.2.3.class.php';
DB::$user = 'kusu';
DB::$password = 'kusu@1qaz@WSX';
DB::$dbName = 'kusudemodb';
//DB::$user = 'root';
//DB::$password = '';
//DB::$dbName = 'kusudemodb';
// tìm kiếm 
function send($key){
utf8();
if (isset($key)){
	$KQ = DB::query("SELECT * FROM `user` WHERE  `fbname` = '$key' OR `phone` = '$key' OR `fbemail` = '$key'");
 }else{
	$KQ = "bạn phải nhập ít nhất 1 giá trị";
 }
 return $KQ;
 }
 //kiểm tra đăng nhập
 function login($user,$pass){
 utf8();
$flast = 0;
	if(isset($user)){
		if(isset($pass)){
			$temp = DB::query("SELECT * FROM `user` WHERE  `id` = '$user' AND `password` = '$pass'");
			$temp = mysql_fetch_assoc($temp);
			if(!empty($temp)){
			$flast = 1;
			}else{$last = 0;}
		}else{ $flast = 0;}
	}else{		$flast = 0;}
	return $flast;
	}
	function updata_user($id){
		DB::insertUpdate('user', array(
		  'id' => $id, //primary key update dòng dựa trên khóa chính (ptử dầu tiên của mãng)
		), array(
		  'type' => 1,
		  'name' => 'no'
		));
	}
	/*
	$data là 1 mãng
	vừa insert vừa update nếu ko tồn tại id thì insert
	nếu tồn tại id thì update lúc này các biến dc thay đổi tùy chỉnh
	*/
function insert_ubdate_fb($data){
 utf8();
DB::insertUpdate('user', array(
	'id' => $data['id'], //primary key update dòng dựa trên khóa chính (ptử dầu tiên của mãng)
	'password' =>$data['password'],
	'fbname' => $data['fbname'],
	'fbemail' => $data['fbemail'],
	'fbphone' => $data['fbphone'],
	'avatar' => $data['avatar'],
	'type'=>$data['type'],
	'name'=>$data['name'],
	'childrenname' =>$data['childrenname'],
	'address'=>$data['address'],
	'email'=>$data['email'],
	'phone'=>$data['phone'],
	'idcard'=>$data['idcard'],
	'lastlogin'=>$data['lastlogin'],
	'ip'=>$data['ip'],
	'registerdate'=>$data['registerdate']
), array(
  'fbname' => $data['fbname'],
	'fbemail' => $data['fbemail'],
	'fbphone' => $data['fbphone'],
	'avatar' => $data['avatar'],
	'type'=>$data['type'],
	'name'=>$data['name'],
	'address'=>$data['address'],
	'email'=>$data['email'],
	'phone'=>$data['phone'],
	'idcard'=>$data['idcard'],
	'lastlogin'=>$data['lastlogin'],
	'ip'=>$data['ip'],
	'registerdate'=>$data['registerdate']
));
}
 /*
	lấy danh sách chủ đề dự thi
 */	
 function select_subjec(){
  utf8();
	$data = DB::query("SELECT * FROM `subject`");
	return $data;
 }
 //gửi hình dự thi (insert vào DB)
 function insert_images($data){
  utf8();
 DB::insert('photo', array(
	'id'=>$data[id],
	'subjectid'=>$data[subjectid],
	'userid'=>$data[userid],
	'title'=>$data[title],
	'thumbnail'=>$data[thumbnail],
	'photo'=>$data[photo],
	'description'=>$data[description],
	'view'=>$data[view],
	'vote'=>$data[vote],
	'published'=>$data[published],
	'ip'=>$data[ip],
	'submitdate'=>$data[submitdate]
));
 }
 //phân trang
 function select_paging($conn,$cpage)
{
	mysql_query("SET NAMES 'utf8'");
	mysql_query("SET CHARACTER SET 'utf8'");
	$truoc  = (6*($cpage-1));
	$sau  = 6;
	mysql_query("SET NAMES 'utf8'", $conn);
	$result = DB::query("SELECT photo FROM photo LIMIT $truoc,$sau",$conn);//lấy ra 6 dòng 
	
	return $result;
}
//danh sách các hình 
function select_images_subjectid($key){
$images = DB::query("SELECT photo FROM photo  WHERE `subjectid` = $key");
return $images;
}
//lấy phần tử phân trang
function get_array($array,$cpage){
$truoc  = (6*($cpage-1));
$a = array_slice ($array, $truoc, 6);
return $a;
}
//danh sách tin tức
function select_tintuc(){
$total = DB::query("SELECT `id`, `userid` ,`photoid`, `vote` FROM news  ");
return $total;
}
//thêm câu trả lời vào bảng answer
function insert_answer($email,$message,$avatar)
{
    DB::insert('answer',array(
        'email' => $email,
        'message' => $message,
        'avatar' => $avatar,
    ));
    _redirect("landing_page.php");
}
//lấy câu trả lời
function select_answer()
{
    $total = DB::query("SELECT `email`,`message`,`avatar` FROM answer  ");
    return $total;
}
?>