<?php session_start(); ?>
<?php
if(!$_SESSION["UserID"]){
    header("location: form.php");
}else{ 
?>
<!doctype html>
<html>
<head>
    <meta charset ="UTF-8">
    <title></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <h1>You are Administrator</h1>
    <p><strong>hi</strong> :&nbsp;<?php echo ($_SESSION["User"]);?>
    </p>
    <p>&nbsp;</p>
    <p><strong><a href="logout.php">Log out</strong></a></p>
    <p>&nbsp;</p>
</body>
</html>
<?php } ?>