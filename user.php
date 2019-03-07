<?php
	include('connection.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>ภาควิชาอายุรศาสตร์ คณะแพทยศาสตร์ศิริราชพยาบาล</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container-fluid " id="headerimages" style="background-color:#ffffff">
		<img src="images/Si_Th_H_Color.png" style="width: 600px">
	</div>
	<nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="250">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
					<li class="nav-item"><a class="nav-link" href="index.html" ><i class="fa fa-home"> หน้าหลัก</a></li></i>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" data-toggle="dropdown">ข้อมูลองค์กร<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="Information.html">ประวัติภาควิชา</a></li>
							<li><a class="dropdown-item" href="Information.html#inform">วิสัยทัศน์/พันธกิจ</a></li>
							<li><a class="dropdown-item" href="structure.html">โครงสร้างการบริหารภาค</a></li>
							<li><a class="dropdown-item" href="department.html">รายนามหัวหน้าภาค</a></li>
							<li><a class="dropdown-item" href="Com.html">กรรมการบริหารภาค</a></li>
							<li><a class="dropdown-item" href="Branch.html">รายระเอียดสาขาวิชา</a></li>
						</ul>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" data-toggle="dropdown">บุคลากร<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" href="personnel.html">บุคลากร</a></li>
								<li><a class="dropdown-item" href="#">เกียรติยศอายุรศาสตร์</a></li>
							</ul>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" data-toggle="dropdown">ข่าวสาร<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" href="news.html">ข่าวประชาสัมพันธ์</a></li>
								<li><a class="dropdown-item" href="news.html">ข่าวกิจกรรม</a></li>
								<li><a class="dropdown-item" href="news.html">ข่าวการศึกษาก่อนปริญญา</a></li>
								<li><a class="dropdown-item" href="news.html">ข่าวการศึกษาหลังปริญญา</a></li>
							</ul>
						</li>
						<li class="nav-item"><a class="nav-link" href="other.html">อื่นๆ</a></li>
						<li class="nav-item"><a class="nav-link" href="Contact.html">ติดต่อ/สอบถาม</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li class="nav-item"><a class="nav-link" href="login.html"><i class="fa fa-user"></i> เข้าสู่ระบบ</a></li>
					</ul>
				</div>
			</div>
		</nav>
<?php
$query = "SELECT * FROM tb_member ORDER BY member+id asc" or die("Error:" . mysqli_error());
$result = mysqli_query($con, $query);
echo "<table border='1' align='center' width='500'>";
echo "<tr align='center' bgcolor='#CCCCCC'><td>รหัส</td><td>Uername</td><td>ชื่อ</td><td>นามสกุล</td><td>อีเมล</td><tb>แก้ไข</td><td>ลบ<td></tr>";
while($row = mysqli_fetch_array($result)) {
	echo "<tr>";
	echo "<td>" .$row["member_id"] . "</td>";
	echo "<td>" .$row["username"] . "</td>";
	echo "<td>" .$row["member_name"] . "</td>";
	echo "<td>" .$row["member_lname"] . "</td>";
	echo "<td>" .$row["email"] . "</td>";
	echo "<td><a href='userupdateform.php?member_id=$row[0]'>edit</a></td>";
	echo "<td><a href='UserDelete.php?member_id=$row[0]' onclick=\"return confirm('Do you want to delete this record? !!!')\"del</a></td>>";
	echo "</th>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>