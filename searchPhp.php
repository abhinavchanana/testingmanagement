<html>
<head>
	<title>REGISTER DEFECT </title>
	<link rel="stylesheet" type="text/css" href="pagelayout.css">
	<link rel="stylesheet" type="text/css" href="registerstyle.css">
	<script src="time.js"></script>
	<style>
#d1
{
padding-top:2cm;
margin-left:10cm;
}
#d2
{
padding-top:2cm;
margin-left:9cm;
padding-bottom:2cm;
}
#a1{
width:5cm;
		height:0.8cm;
		background-color:lightpink;
}
table{
			padding-top:5px;
			padding-bottom:10px;
			border-spacing:0.5cm 0.4cm;
			background-color:#1fb2b2;;
		}
		#b1{
		width:2cm;
		height:200px;
		background-color:grey;}
		
#d1{
margin-left:7cm;
padding-top:2cm;
font-family:times new roman;

}
</style>
</head>


<body onload=display_ct();>	
	<header>
		<button id="logout" onclick="location.href = 'login.php'">LOGOUT</button>
		<label id="name">Hi, <?php //echo $userName;?></label>
		<h1>SEARCH DEFECT</h1>
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
	</div>
<?php

session_start();
echo "<div id='d1'>";
echo "Test Id-------->";
echo $_GET['tid'];
echo "<br/>";
echo "Defect Id----->";
echo $_GET['did'];
echo "</div>";
?>
	</body>
</html>
