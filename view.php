<html>
<head>
<style>
#form1
{
margin-top:150;
margin-left:250;
position:fixed;
float:clear;
}
#qw
{
top:150;
left:300;
position:relative;
font-family:verdana;
}
</style>
	<title>VIEW DEFECT </title>
	<link rel="stylesheet" type="text/css" href="pagelayout.css">
	
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

<body onload=display_ct();>	
	<header>
		<button id="logout" onclick="">LOGOUT</button>
		<label id="name">Hi, <?php //echo $userName;?></label>
		<h1>VIEW DEFECT</h1>
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
<div id="qw">
<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$con = mysql_connect("localhost","root","");
mysql_select_db("testingmanagement", $con);

$testid = 1;//$_POST['testid'];
$defectid = 1002;// $POST['defectid'];

$q1 = "create view view1 as (select defect.*, project_testcase.Project_Id from defect, project_testcase where defect.Test_Id=project_testcase.Test_Id)";
$r1 = mysql_query($q1, $con);
$q2 = "create view result as (select view1.*, testcase.Tester_Id from view1, testcase where view1.Test_Id=testcase.Test_Id)";
$result = mysql_query($q2, $con);
$result2 = mysql_query("select * from result where Test_Id='$testid' and Defect_Id='$defectid'",$con);
echo "<table cellspacing='20'>";
while($row = mysql_fetch_assoc($result2))
{
echo "<tr><td style='width:100'>Project Name:</td><td style='width:200;'>" .$row['Project_Id']. "</td></tr>
<tr><td style='width:100;'>Test Case:</td></t><td style='width:200;'>" .$row['Test_Id']. "</td></tr>
<tr><td style='width:100;'>Defect ID:</td></t><td style='width:200;'>" .$row['Defect_Id']. "</td></tr>
<tr><td style='width:100;'>Status:</td></t><td style='width:200;'>" .$row['Status']. "</td></tr>
<tr><td style='width:100;'>Assigned By:</td></t><td style='width:200;'>" .$row['Tester_Id']. "</td></tr>
<tr><td style='width:100;'>Assigned To:</td></t><td style='width:200;'>" .$row['Programmer_Id']. "</td></tr>
<tr><td style='width:100;'>Register Date:</td></t><td style='width:200;'>". $row['Open_Date']. "</td></tr>
<tr><td style='width:100;'>Defect Description:</td></t><td style='width:200;'>" .$row['Defect_Description']. "</td></tr>
<tr><td style='width:100;'>Defect Solution:</td></t><td style='width:200;'>" .$row['Defect_Solution']. "</td></tr>";
}
echo "</table>";
mysql_close($con);
?>
</div>
</body>
</html>