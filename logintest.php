<?php
    require('connection/connection.php');
	if(isset($_POST['submit'])){
		$sqli_login = " SELECT is FROM testdb WHERE
		$myusername = '".mysqli_real_escape_string($_POST['textUsername'])."' AND 
		$mypass = '".mysqli_real_escape_string($_POST['textPassword'])."'
		 ";
		$query_login = mysqli_query($sqli_login);
		$result_login = mysqli_fetch_array($query_login);
		if(!$result_login){
			echo "ชื่อผู้ใช้หรือรหัสผ่านผิด!!";
		}else{
			echo $result_login['member_name'] . "<br/>";
		}
	}
 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>LOGIN PHP</title>
   </head>
   <body>
   <form method="POST">
   	Useranme <br/>
   	<input type="text" name="textUsername"><br/>
   	Password <br/>
   	<input type="password" name="textPassword"><br/><br/>
   	<button type="submit" name="submit">LOGIN</button>
   </form>
   </body>
 </html>