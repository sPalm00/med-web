<?php
echo "<pre>";
print_r($_POST);
echo "</pre>";
session_start();
    if(isset($_REQUEST['Username'])){
        include("connection/log.php");
        $Username = $_REQUEST['Username'];
        $Password = $_REQUEST['Password'];
        $sql="SELECT * FROM ... Where ... ='".$Username."' and ... ='".$Password."'";
        $result = mysqli_query($con,$sql);
        if(mysqli_num_rows($result)==1){
            $row = mysqli_fetch_array($result);
            $_SESSION["UserID"] = $row["member_id"];
            $_SESSION["User"] = $row["mender_firstname"]."".$row["member_lastname"];
            $_SESSION["Userlevel"] = $row["meder_level"];

            if($_SESSION["Userlevel"]=="a"){
                Header("location: admin_page.php");
            }
            if($_SESSION["Userlevel"]=="m"){
                Header("location: user_page.php");
            }
        }else{
            echo "<scrilt>";
                echo "alert(\" user หรือ password ไม่ถูกต้อง\");";
                echo "window.history.back()";
            echo "</script>";
        }
    }else{
        Header("location: form.php");
    }
?>