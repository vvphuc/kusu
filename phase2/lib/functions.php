<?php
require_once 'config/config.php';
require_once 'config/function.php';
require_once 'meekrodb.2.3.class.php';

DB::$user = DBUSER;
DB::$password = DBPASS;
DB::$dbName = DBNAME;
/******************************Hao*****************************/
//get name user
function get_name_user($id)
{
    DB::$encoding = 'utf8';
    $total = DB::query("SELECT `name`,`fbname` FROM user WHERE `id` = %s",$id);
    if($total[0]['name']=="")
    {
        return $total[0]['fbname'];
    }
    else
    {
        return $total[0]['name'];
    }
}
// check login
function check_user_login($id,$pass)
{
    DB::$encoding = 'utf8';
    $pass_in = md5(md5($pass));
    $type = DB::query("SELECT `type` FROM user WHERE `id` = %s",$id);
    if($type[0]['type'] == 1)
    {
        $total = DB::query("SELECT count(*) as total FROM user WHERE `id` = %s AND `password` = %s",$id,$pass_in);
        if($total[0]['total'] == 1)
        {
            update_lastlogin($id);
            return 1;
        }
        else
        {
            return 0;
        }
    }
    else
    {
        $total = DB::query("SELECT count(*) as total FROM user WHERE `id` = %s",$id);
        if($total[0]['total'] == 1)
        {
            update_lastlogin($id);
            return 1;
        }
        else
        {
            return 0;
        }
    }
}
//update lastlogin
function update_lastlogin($id)
{
    date_default_timezone_set("Asia/Bangkok");
    DB::$encoding = 'utf8';
    $today = date("Y-m-d H:i:s");
    $result = DB::query("UPDATE user SET `lastlogin` = %t WHERE `id` = %s",$today,$id);
}
//check exist user
function check_exist_user($id)
{
    DB::$encoding = 'utf8';
    $total = DB::query("SELECT count(*) as total FROM user WHERE `id` = %s",$id);
    if($total[0]['total'] == 1)
    {
        return 1;
    }
    else
    {
        return 0;
    }
}
//insert user
function insert_user_register($id,$pass,$fbname,$fbmail,$check,$ip)
{
    date_default_timezone_set("Asia/Bangkok");
    DB::$encoding = 'utf8';
    $pass_in = md5(md5($pass));
    $today = date("Y-m-d H:i:s");
    if($check == 1)
    {
        DB::insert('user',array(
            'id' => $id,
            'password' => $pass_in,
            'ip' => $ip,
            'type' => $check,
            'registerdate' => $today,
        ));
        _redirect("index.php");
    }
    else
    {
        DB::insert('user',array(
            'id' => $id,
            'password' => $pass,
            'fbname' => $fbname,
            'fbemail' => $fbmail,
            'ip' => $ip,
            'type' => $check,
            'registerdate' => $today,
        ));
        _redirect("index.php");
    }
}
//get infomation user from database
function get_info_user($id)
{
    DB::$encoding = 'utf8';
    $profile = DB::query("SELECT * FROM user WHERE `id` = %s",$id);
    return $profile;
}
//update profile
function update_profile($email,$name,$phone,$type)
{
    DB::$encoding = 'utf8';
    if($type == 1)
    {
        DB::query("UPDATE user SET `name` = %s , `phone` = %s WHERE `id` = %s ",$name,$phone,$email);
        _redirect("profile.php");
    }
    else
    {
        DB::query("UPDATE user SET `name` = %s , `fbname` = %s , `phone` = %s  WHERE `id` = %s ",$name,$name,$phone,$email);
        _redirect("profile.php");
    }
}

/******************************end*****************************/

/*
   l?y danh sách ch? ?? d? thi
*/
function select_subject(){
    DB::$encoding = 'utf8';
    $data = DB::query("SELECT * FROM `subject` where status = 1");
    return $data;
}
/**
 * Select photo by id
 */
function select_photo_by_id($id){
    DB::$encoding = 'utf8';
    $photo = DB::query("SELECT * FROM photo WHERE id = %d",$id);
    return $photo;
}
/**
 * Select photo by title
 */
function select_photo_by_title($title){
    DB::$encoding = 'utf8';
    $pt = DB::query("SELECT * FROM photo WHERE title = %ss",$title);
    return $pt;
}
/**
 * check have_photo
 */
function have_photo($ptid){
    DB::$encoding = 'utf8';
    $photo = DB::query("SELECT count(*) FROM photo WHERE id = %d",$ptid);
    return $photo;
}
/**
 * check have vote
 */
function have_vote($userid,$ptid){
    DB::$encoding = 'utf8';
    $voted = DB::query("SELECT * FROM vote WHERE userid = %d AND photoid = %d",$userid,$ptid);
    $count =count($voted);
    if($count == 0){
        return false;
    }
    else{
        return true;
    }
}
/**
 * check have vote
 */
function insert_vote($userid,$ptid,$ip){
    DB::$encoding = 'utf8';
    $result = DB::insert('vote', array(
        'userid'=>$userid,
        'photoid'=>$ptid,
        'ip'=>$ip
    ));
    return $result;

}
/**
 * update vote for photo
 */
function update_vote($id, $subjectid){
    DB::$encoding = 'utf8';
    $result = DB::query("UPDATE photo SET vote = vote+1 WHERE id = %d AND subjectid = %d",$id,$subjectid);
    return $result;
}
/**
 * update view for photo
 */
function update_view($id, $subjectid){
    DB::$encoding = 'utf8';
    $result = DB::query("UPDATE photo SET view = view+1 WHERE id = %d AND subjectid = %d",$id,$subjectid);
    return $result;
}
/**
 * search detail
 */
function search_detail($title){
    DB::$encoding = 'utf8';
    $result = DB::query("SELECT * FROM photo WHERE title = %s ORDER BY submitdate DESC",$title);
    return $result;
}

//g?i hình d? thi (insert vào DB)
function insert_images($data){
    DB::$encoding = 'utf8';
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
/**
 * update  user profile for first time
 */
function insert_profile($id, $name, $phone, $email){
    DB::$encoding = 'utf8';
    $result = DB::update('user', array(
          'name' => $name,
          'phone'=> $phone,
          'email'=> $email
          ), "id=%s", $id);
    return $result;
}
//phân trang
function select_paging($cpage = 1, $rpp = 8,$title = '')
{
   DB::$encoding = 'utf8';
    $from = (($cpage * $rpp) - $rpp);
    if($title == ''){
        $result = DB::query("SELECT * FROM photo ORDER BY submitdate DESC LIMIT %d, %d",$from,$rpp);//l?y ra 6 dòng
    }
    else{
        $result = DB::query("SELECT * FROM photo WHERE `title` like %ss ORDER BY submitdate DESC LIMIT %d, %d",$title,$from,$rpp);//l?y ra 6 dòng
    }
    return $result;
}
function select_profile_paging($cpage = 1, $rpp = 8,$userid = '')
{
    DB::$encoding = 'utf8';
    $from = (($cpage * $rpp) - $rpp);
    if($userid == ''){
        $result = DB::query("SELECT * FROM photo ORDER BY submitdate DESC LIMIT %d, %d",$from,$rpp);//l?y ra 6 dòng
    }
    else{
        $result = DB::query("SELECT * FROM photo WHERE `userid` like %ss ORDER BY submitdate DESC LIMIT %d, %d",$userid,$from,$rpp);//l?y ra 6 dòng
    }
    return $result;
}
//danh sách các hình
function select_images_subjectid($key ='', $userid=''){
    if($userid == ''){
        $images = DB::query("SELECT * FROM photo  WHERE `subjectid` = %d AND `published` = %d ORDER BY submitdate DESC",$key,1);
    }
    else{
        $images = DB::query("SELECT * FROM photo  WHERE `subjectid` = %d AND `published` = %d AND `userid` = %s ORDER BY submitdate DESC",$key,1, $userid);   
    }
    return $images;
}
/**
 * Select top 5 of week
 */
function select_images_top($key =''){
	DB::$encoding = 'utf8';
    $images = DB::query("SELECT * FROM photo  WHERE `subjectid` = %d AND `published` = %d ORDER BY `vote` DESC LIMIT 5 ",$key,1);
    return $images;
}
function search_images_subjectid($key = 1,$s){
	DB::$encoding = 'utf8';
    $images = DB::query("SELECT * FROM photo  WHERE `subjectid` = %d AND `published` = %d AND `title` like %ss ORDER BY submitdate DESC",$key,1,$s);
    return $images;
}
//l?y ph?n t? phân trang
function get_array($array,$cpage){
    $truoc  = (6*($cpage-1));
    $a = array_slice ($array, $truoc, 6);
    return $a;
}
//danh sách tin t?c
function select_tintuc(){
	DB::$encoding = 'utf8';
    $total = DB::query("SELECT `id`, `userid` ,`photoid`, `vote` FROM news  ");
    return $total;
}
//------------------------------Hao--------------------------------------//
//thêm câu tr? l?i vào b?ng answer
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
        _redirect("uongsuachudong.php");
    }
    else
    {
        _redirect("loginfb.php");
    }
}
//l?y câu tr? l?i
function select_answer()
{
    DB::$encoding = 'utf8';
    $total = DB::query("SELECT `email`,`message`,`avatar`,`fbid`,`fbname`,`submitday` FROM answer ORDER BY submitday DESC ");
    return $total;
}
function select_news(){
    DB::$encoding = 'utf8';
    $total = DB::query("SELECT `id`, `title` ,`registerdate`,`photo` FROM news ORDER BY registerdate DESC  ");
    return $total;
}
function select_details_news($id){
    DB::$encoding = 'utf8';
    $total = DB::query("SELECT `title` ,`content`,`description`,`registerdate`,`photo` FROM news WHERE `id` = $id");
    return $total;
}

?>
