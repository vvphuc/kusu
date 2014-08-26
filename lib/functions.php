<?php 
require '../config/config.php';
require '../config/function.php';

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
/*DB::$user = 'kusu';
DB::$password = 'kusu@1qaz@WSX';
DB::$dbName = 'kusudemodb';
*/
DB::$user = DBUSER;
DB::$password = DBPASS;
DB::$dbName = DBNAME;
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
 function select_subject(){
  utf8();
	$data = DB::query("SELECT * FROM `subject`");
	return $data;
 }
 /**
  * Select photo by id
  */
 function select_photo_by_id($id){
 	utf8();
 	$photo = DB::query("SELECT * FROM photo WHERE id = %d",$id);
 	return $photo;
 }
 /**
  * check have_photo
  */
 function have_photo($ptid){
 	utf8();
 	$photo = DB::query("SELECT count(*) FROM photo WHERE id = %d",$ptid);
 	return $photo;
 }
 /**
  * check have vote
  */
 function have_vote($userid,$ptid){
 	utf8();
 	$voted = DB::query("SELECT count(*) FROM vote WHERE userid = %d AND photoid = %d",$userid,$ptid);
 	return $voted;
 }
 /**
  * check have vote
  */
 function insert_vote($userid,$ptid,$ip){
 	utf8();
 	$result = DB::insert('vote', array(
		'userid'=>$userid,
		'photoid'=>$ptid,
		'ip'=>$ip
		));

 	return $result;
 }
 /**
  * search detail
  */
 function search_detail($title){
 	utf8();
 	$result = DB::query("SELECT * FROM photo WHERE title = %s",$title);
 	return $result;
 }

 //gửi hình dự thi (insert vào DB)
 function insert_images($data){
  utf8();
 DB::insert('photo', array(
	'subjectid'=>$data['subjectid'],
	'userid'=>$data['userid'],
	'title'=>$data['title'],
	'thumbnail'=>$data['thumbnail'],
	'photo'=>$data['photo'],
	'description'=>$data['description'],
	'view'=>$data['view'],
	'vote'=>$data['vote'],
	'published'=>$data['published'],
	'ip'=>$data['ip'],
));
 }
 //phân trang
 function select_paging($tablename,$cpage = 1,$rpp = 8,$oderby = '',$order = '')
{
	utf8();
	$from = (($cpage * $rpp) - $rpp); 
	$result = DB::query("SELECT * FROM photo LIMIT %d, %d",$from,$rpp);//lấy ra 6 dòng 
	return $result;
}
//danh sách các hình 
function select_images_subjectid($key){
$images = DB::query("SELECT * FROM photo  WHERE `subjectid` = $key");
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
//------------------------------Hao--------------------------------------//
//thêm câu trả lời vào bảng answer
function insert_answer($email,$message,$avatar,$fbid,$fbname,$check)
{
    DB::$encoding = 'utf8';
    DB::insert('answer',array(
        'email' => $email,
        'message' => $message,
        'avatar' => $avatar,
        'fbid' => $fbid,
        'fbname'=> $fbname,
    ));
    if($check == 1)
    {
        _redirect("landing_page.php");
    }
    else
    {
        _redirect("loginfb.php");
    }
}
//lấy câu trả lời
function select_answer()
{
    DB::$encoding = 'utf8';
    $total = DB::query("SELECT `email`,`message`,`avatar`,`fbid`,`fbname` FROM answer ORDER BY submitday DESC ");
    return $total;
}
function select_news(){
    DB::$encoding = 'utf8';
    $total = DB::query("SELECT `id`, `title` ,`registerdate`,`photo` FROM news ORDER BY registerdate DESC  ");
    return $total;
}
function select_details_news($id){
    DB::$encoding = 'utf8';
    $total = DB::query("SELECT `title` ,`content`,`description`,`registerdate` FROM news WHERE `id` = $id");
    return $total;
}

?>