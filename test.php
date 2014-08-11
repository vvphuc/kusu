<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title>Test</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">
</head>
<body>
<?php 
require "./lib/functions.php";
/*
DB::insertUpdate('user', array(
  'id' => 9, //primary key
  'fbname' => 'hy hý',
  'fbemail' => 'none',
  'fbphone' => 'hy hý',
  'avatar' => 'hy hý',
), 'name=%s', 'no');

DB::delete('user', "fbname=%s", 'hy hý');
DB::update('user', array(
  'fbname' => 'sdfdd'
 ), "name=%s", 'goodbye');//"name=%s" (điều kiện where)
 DB::query("SELECT * FROM user");

 DB::insertUpdate('user', array(
  'id' => 16, //primary key update dòng dựa trên khóa chính (ptử dầu tiên của mãng)
  'fbname' => 'Joe',
  'fbphone' => 'hello',
  'name' => 'yes'
), array(
  'type' => 1,
  'name' => 'no'
));
 
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
$a = array(
'id' => "dsvfgfg",
'subjectid' => "dsvfgfg",
'userid' => "dsvfgfg",
'title' => "dsvfgfg",
'thumbnail' => "dsvfgfg",
'photo' => "dsvfgfg",
'description' => "dsvfgfg",
'view' => "dsvfgfg",
'vote' => "dsvfgfg",
'published' => "dsvfgfg",
'ip' => "dsvfgfg",
'submitdate' => "dsvfgfg",
);
$b = array_keys($a);echo $b[0];
$c = array_values($a);echo $c[0];
echo"<pre>";
print_r($c);echo "</pre>";
insert_images($a) */
$a = images_subjectid(0);
$a = array_slice ($a, 2, 6);
print_r($a);
?>
</body>
</html>