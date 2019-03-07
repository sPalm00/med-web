<?php
session_start();
$hostname = "localhost";
$user = "root";
$password = "";
$dbname = "testdb";
$tblname = "login";

mysql_connect($hostname, $user, $password) or die("ติดต่อฐานข้อมูลไม่ได้");
mysql_select_db($dbname) or die("เลือกฐานข้อมูลไม่ได้");
 $sql = "select * from $tblname where username='$username_log' and $pass='$passworf_log'";
 $dbquery = mysql_db_query($dbname,$sql);

$num_rows = mysql_num_rows($dbquery);
if($num_rows==1){
	header("locatin:http://www.webthaidd.com");
} else {
$code_error="<br><font color=\"red\">ข้อมูลที่คุณกรอกไม่ถูกต้อง กรุณา login มหม่อีกครั้ง</font>";
	header("location: form_login.php");
}
?>