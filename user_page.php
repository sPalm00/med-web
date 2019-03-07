<?php
session_start();
?>
<?php
if(!$_SESSION["UserID"]){
    Header("Location: form.php");
}else{
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <h1>You are Member</h1>
    <p><strong>hi </strong>:
<?php
    echo ($_SESSION['User']);
?>
    </p>
    <p><strong>
    <a href="logout.php">Log out</a></strong></p>
</body>
</html>
<?php }
?>