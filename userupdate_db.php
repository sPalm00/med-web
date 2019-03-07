<meta charset="UTF-8">
<?php
include('connection.php');

$member_id = $_REQUEST["member_id"];
$member_name = $_REQUEST["member_name"];
$member_lname = $_REQUEST["member_lname"];
$username = $_REQUEST["usermember"];
$password = $_REQUEST["password"];
$email = $_REQUEST["email"];

$sql = "UPDATE tb_member SET 
        member_name='$member_name' ,
        member_lname='$member_lname' ,
        usernamer='$username',
        passwoed='$password' ,
        email='$email'
        WHERE member_id='$member_id' ";
$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
mysqli_close($con);

    if($result){
    echo "<script type='text/javascript'>";
    echo "alert('Update Succesfuly');";
    echo "</script>";
    }
    else{
    echo "<script type='text/javaript'>";
    echo "alert(Error back to Update again);";
    echo "</script>";
    }
?>