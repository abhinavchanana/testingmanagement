<html>
<head>
	<title>REGISTER DEFECT </title>
	<link rel="stylesheet" type="text/css" href="pagelayout.css">
	<link rel="stylesheet" type="text/css" href="registerstyle.css">
	
	<script>
		function display_c(){
		var refresh=1000; // Refresh rate in milli seconds
		mytime=setTimeout('display_ct()',refresh)
		}

		function display_ct() {
		var strcount
		var monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
		var d = new Date();
		var x = ("0" + d.getDate()).slice(-2) + " " + monthNames[d.getMonth()] + " - " + ("0" + d.getHours()).slice(-2) + 
		" : " + ("0" + d.getMinutes()).slice(-2)+ " : " + ("0" + d.getSeconds()).slice(-2);

		document.getElementById('time').innerHTML = x;
		tt=display_c();
		}
	</script>
</head>
<?php
	$userid="1";
	$conn = mysqli_connect('localhost','root','','testingmanagement');
	if(!$conn)
	{
		//echo "unconnection successful";
		die(mysqli_connect_error());
	}
	else
	{
		//echo "connection successful";
		$query1="select Emp_Name from Employee where Emp_Id='".$userid."';";
		$result1= mysqli_query($conn, $query1);
		$row1=$result1->fetch_assoc();
		$userName= $row1['Emp_Name'];
	}
	mysqli_close($conn);
?>

<body onload=display_ct();>	
	<header>
		<button id="logout" onclick="">LOGOUT</button>
		<label id="name">Hi, <?php echo $userName;?></label>
		<h1>REGISTER DEFECT</h1>
	</header>
	<label id='time' ></label>
	<nav>
		<ul style="list-style:none;">
			<li><a href="">Home</a></li>
			<li><a href="">Register defect</a></li>
			<li><a>View testcase</a></li>
			<li><a>Generate report</a></li>
		</ul>
	</nav>
</body>
</html>