<?php
@ob_start();
session_start();
?>
<html>
<head>
	<title>SUBMISSION DEFECT </title>
	<link rel="stylesheet" type="text/css" href="pagelayout.css">
	<link rel="stylesheet" type="text/css" href="registerstyle.css">
	<script src="time.js"></script>
	<style>
	#success{
				font-family:georgian;
				padding: 200px 200px 50px;
				float:left;	
			}
	#email{
				font:italic 24px times;
				margin: 0px 280px;
				padding : 10px;
				float:left;	
				background-color:green;
				color:white;	
				border: 1px groove green;
				border-radius:5px;
				}
	</style>
</head>
<?php
	$userid=$_SESSION['userid'];
	include "connectdb.php";
	$query1="select Emp_Name from Employee where Emp_Id='".$userid."';";
	$result1= mysqli_query($conn, $query1);
	$row1=$result1->fetch_assoc();
	$userName= $row1['Emp_Name'];
	mysqli_close($conn);
?>

<body onload=display_ct();>	
	<header>
		<button id="logout" onclick="">LOGOUT</button>
		<label id="name">Hi, <?php echo $userName;?></label>
		<h1>SUBMIT SOLUTION FOR DEFECT</h1>
	</header>
	<label id='time' ></label>
	<nav>
		<ul style="list-style:none;">
		<li><a href="home_programmer.php">Home</a></li>
			<li><a href="">View Defect</a></li>
			<li><a>Generate report</a></li>
		</ul>
	</nav>
	<h1 id="success">DEFECT MODIFIESD SUCCESSFULLY !!</h1>
</body>
</html>