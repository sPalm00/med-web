<?php session_start();?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Form Login</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>
<body>
    <form name="formlogin" method="post" action="login.php">
        <p></P>
        <p><b> Login Form </b></a>
        <p> ชื่อผู้ใช้ :
            <input type="text" id="Username" required name="Username" placeholder="Username">
        </P>
        <p> รหัสผ่าน :
            <input type=password id="Password" requiword name="Password" placeholder="Password">
        </p>
        <p>
            <button type="submit">Login</button>
            &nbsp;&nbsp;
            <button type="reset">Reset</button>
            <br>
        </p>
    </form>
</body>
</html>