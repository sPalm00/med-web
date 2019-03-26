<?php
include 'connection/controller.php';
$session_username = $_SESSION['user_name'];
$session_role = $_SESSION['status'];
if(empty($_SESSION['user_name'])){
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/loader.css">
    <script src="js/jquery-1.12.4.js"></script>
    <link rel="stylesheet" type="text/css" href="dashboard/vendor/font-awesome/css/font-awesome.min.css">
    <script>
        $(document).ready(function() {
                $('#example').DataTable({});
            });

        </script>
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="css/responsive.bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
</head>

<body onload="myFunction()" style="margin:0;">
    <div class="container">
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" data-toggle="dropdown"><span class='glyphicon glyphicon-user' aria-hidden='true'></span>
                <?php echo $session_username . " ($session_role)"; ?> <span class="caret"></span></button>
            <ul class="dropdown-menu">
                <li><a href="#logout" data-toggle="modal"><span class='glyphicon glyphicon-log-out' aria-hidden='true'></span> Logout</a></li>
                <li><a href="#changepass" data-toggle="modal"><span class='glyphicon glyphicon-edit' aria-hidden='true'></span> Change Password</a></li>
            </ul>
            <a href="#add" data-toggle="modal">
                <button type='button' class='btn btn-success btn-sm'><span class='glyphicon glyphicon-plus' aria-hidden='true'></span> Item</button>
            </a>
        </div>
        <br>
        <table id="example" class="display nowrap" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>หัวข้อข่าว</th>
                    <th>รายละเอียด</th>
                    <th>ไฟล์ประกอบ</th>
                    <th>วัน/เดือน/ปี</th>
                    <th>ผู้ประกาศ</th>
                    <th>ประเภทข่าว</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>หัวข้อข่าว</th>
                    <th>รายละเอียด</th>
                    <th>ไฟล์ประกอบ</th>
                    <th>วัน/เดือน/ปี</th>
                    <th>ผู้ประกาศ</th>
                    <th>ประเภทข่าว</th>
                </tr>
            </tfoot>
            <tbody>
                <?php 
                    $sql = "SELECT db_news.id, db_news.news_name, db_news.news_detail, db_news.news_file, db_news.news_date, db_news.news_announcer, db_news.news_status FROM db_news";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $id = $row['id'];
                            $news_name = $row['news_name'];
                            $news_detail = $row['news_detail'];
                            $news_file = $row['news_file'];
                            $news_announcer = $row['news_announcer'];
                            $news_date = $row['news_date'];
                            $news_status = $row['news_status'];
                    ?>
                <tr>
                    <td>
                        <?php echo $id; ?>
                    </td>
                    <td>
                        <?php echo $news_name; ?>
                    </td>
                    <td>
                        <?php echo $news_detail; ?>
                    </td>
                    <td>
                        <?php echo $news_file; ?>
                    </td>
                    <td>
                        <?php echo $news_announcer; ?>
                    </td>
                    <td>
                        <?php echo $news_date; ?>
                    </td>
                    <td>
                        <?php echo $news_status; ?>
                    </td>
                    <td>
                        <a href="#edit<?php echo $id;?>" data-toggle="modal">
                            <button type='button' class='btn btn-warning btn-sm'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></button>
                        </a>
                        <a href="#delete<?php echo $id;?>" data-toggle="modal">
                            <button type='button' class='btn btn-danger btn-sm'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button>
                        </a>
                    </td>

                    <div id="changepass" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="" method="post">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Change Password</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="name">Current:</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" name="current_password" required placeholder="Current Password" autofocus autocomplete="off"> </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="name">New:</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" name="new_password" required placeholder="New Password" autocomplete="off"> </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="name">Repeat:</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" name="repeat_password" required placeholder="Repeat Password" autocomplete="off"> </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" name="change_pass">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div id="edit<?php echo $id; ?>" class="modal fade" role="dialog">
                        <form method="post" class="form-horizontal" role="form">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">แก้ไขข่าวสาร</h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="edit_item_id" value="<?php echo $id; ?>">
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="news_name" align="right">หัวข้อข่าว :</label>
                                            <div class="col-sm-8" align="left">
                                                <input type="text" class="form-control" id="news_name" name="news_name" value="<?php echo $news_name; ?>" required autofocus> </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="$news_announcer" align="right">ผู้ประกาศ :</label>
                                            <div class="col-sm-8" align="left">
                                                <input type="text" class="form-control" id="$news_announcer" name="$news_announcer" value="<?php echo $news_announcer; ?>" required autofocus> </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="news_detail" align="right">รายละเอียด :</label>
                                            <div class="col-sm-8" align="left">
                                                <textarea class="ckeditor" id="news_detail" name="news_detail" required style="width: 100%;">
                                                            <?php echo $news_detail; ?>
                                                        </textarea>
                                            </div>
                                            <label class="control-label col-sm-2" for="news_file" align="right">ไฟล์ประกอบ :</label>
                                            <div class="col-sm-7" align="left">
                                                <input type="filt" class="form-control" id="news_file" name="news_file" cols="69" rows="5" value="<?php echo $news_file; ?>" required> </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="update_item"><span class="glyphicon glyphicon-edit"></span> บันทึก</button>
                                        <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> ยกเลิก</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="delete<?php echo $id; ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <form method="post">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">ลบข่าวสาร</h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="delete_id" value="<?php echo $id; ?>">
                                        <div class="alert alert-danger">Are you Sure you want Delete <strong>
                                                <?php echo $item_name; ?>?</strong> </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="delete" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> ตกลง</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> ยกเลิก</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </tr>
                <?php
                        }
                        if(isset($_POST['change_pass'])){
                            $sql = "SELECT password FROM db_user WHERE username='$session_username'";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    if($row['password'] != $current_password){
                                        echo "<script>window.alert('Invalid Password');</script>";
                                        $passwordErr = '<div class="alert alert-warning"><strong>Password!</strong> Invalid.</div>';
                                    } elseif($new_password != $repeat_password) {
                                        echo "<script>window.alert('Password Not Match!');</script>";
                                        $passwordErr = '<div class="alert alert-warning"><strong>Password!</strong> Not Match.</div>';
                                    } else{
                                        $sql = "UPDATE db_user SET password='$new_password' WHERE username='$session_username'";

                                        if ($conn->query($sql) === TRUE) {
                                            echo "<script>window.alert('Password Successfully Updated');</script>";
                                        } else {
                                            echo "Error updating record: " . $conn->error;
                                        }
                                    }    
                                }
                            } else {
                                $usernameErr = '<div class="alert alert-danger"><strong>Username</strong> Not Found.</div>';
                                $username = "";
                            }
                        }


                        if(isset($_POST['update_item'])){
                            $news_name = $_POST['news_name'];
                            $news_detail = $_POST['news_detail'];
                            $news_file = $_POST['news_file'];
                            $news_announcer = $_POST['news_announcer'];
                            $news_status = $_POST['news_status'];
                            $sql = "UPDATE db_news SET 
                                news_name='$news_name',
                                news_detail='$news_detail',
                                news_file='$news_file',
                                news_announcer='$news_announcer',
                                news_status='$news_status'
                                WHERE id='$edit_item_id' ";
                            if ($conn->query($sql) === TRUE) {
                                echo '<script>window.location.href="inventory.php"</script>';
                            } else {
                                echo "Error updating record: " . $conn->error;
                            }
                        }

                        if(isset($_POST['delete'])){
                            $delete_id = $_POST['delete_id'];
                            $sql = "DELETE FROM tbl_items WHERE id='$delete_id' ";
                            if ($conn->query($sql) === TRUE) {
                                $sql = "DELETE FROM tbl_inventory WHERE id='$delete_id' ";
                                if ($conn->query($sql) === TRUE) {
                                    $sql = "DELETE FROM tbl_inventory WHERE id='$delete_id' ";
                                    echo '<script>window.location.href="inventory.php"</script>';
                                } else {
                                    echo "Error deleting record: " . $conn->error;
                                }
                            } else {
                                echo "Error deleting record: " . $conn->error;
                            }
                        }
                    }

                    if(isset($_POST['add_news'])){
                        $news_name = $_POST['news_name'];
                        $news_detail = $_POST['news_detail'];
                        $news_file = $_POST['news_file'];
                        $news_announcer = $_POST['news_announcer'];
                        $news_status = $_POST['news_status'];
                        $sql = "INSERT INTO db_news (news_name,news_detail,news_file,news_announcer,news_status,news_date)VALUES ('$news_name','$news_detail','$news_file','$news_announcer','$news_status','$news_date')";
                        if ($conn->query($sql) === TRUE) {
                            if ($conn->query($add_inventory_query) === TRUE) {
                                echo '<script>window.location.href="inventory.php"</script>';
                            } else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                            }
                        } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                    }
?>
            </tbody>
        </table>
    </div>
    <div id="add" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form method="post" class="form-horizontal" role="form">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">เพิ่มข่าวสาร</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="news_name" align="right">หัวข้อข่าว :</label>
                            <div class="col-sm-8" align="left">
                                <input type="text" class="form-control" id="news_name" name="news_name" autocomplete="off" autofocus required> </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="news_announcer" align="right">ผู้ประกาศ :</label>
                            <div class="col-sm-8" align="left">
                                <input type="text" class="form-control" id="news_announcer" name="news_announcer" autocomplete="off" autofocus required> </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="news_detail" align="right">รายละเอียด :</label>
                            <div class="col-sm-8" align="left">
                                <textarea class="ckeditor" id="news_detail" name="news_detail" cols="69" rows="5" autocomplete="off" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="news_file" align="right">ไฟล์ประกอบ :</label>
                            <div class="col-sm-7" align="left">
                            <input type="file" id="news_file" name="news_file" autocomplete="off" autofocus required> </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="add_item"><span class="glyphicon glyphicon-plus"></span> บันทึก</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> ยกเลิก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="logout" class="modal fade" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">ออกจากระบบ</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="delete_id" value="<?php echo $id; ?>">
                    <div class="alert alert-danger">Are you Sure you want to logout
                        <strong>
                            <?php echo $_SESSION['user_name']; ?>?
                        </strong>
                    </div>
                    <div class="modal-footer">
                        <a href="logout.php">
                            <button type="button" class="btn btn-danger">ตกลง</button>
                        </a>
                        <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>