<html>
<head>
	<title>SEARCH DEFECT </title>
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
		die(mysqli_connect_error());
	}
	else
	{
		$query1="select Emp_Name from Employee where Emp_Id='".$userid."';";
		$result1= mysqli_query($conn, $query1);
		$row1= $result1->fetch_assoc();
		$userName= $row1['Emp_Name'];
	}
	mysqli_close($conn); 
?>

<body onload=display_ct();>	
	<header>
		<button id="logout" onclick="">LOGOUT</button>
		<label id="name">Hi, <?php //echo $userName;?></label>
		<h1>REGISTER DEFECT</h1>
	</header>
	<label id='time' ></label>
	<nav>
<!--+	<ul style="list-style:none;">
			<li><a href="">Home</a></li>
			<li><a href="">Register defect</a></li>
			<li><a>View testcase</a></li>
			<li><a>Generate report</a></li>
		</ul>
	</nav>	-->
	<form method="post"> 
Select a User:
<select name="users" onChange="showUser(this.value)">
<option value="">Filter</option>
<option value="1">Date</option>
<option value="2">Project Name</option>
<option value="3">Tester ID</option>
<option value="4">Project ID</option>
</select>
</form>

<p>
<div id="txtHint"><b></b></div>
</p>
<?php 
include_once("connection.php");

$conn = mysqli_connect('localhost','root','','testingmanagement');
          
		  $query= 'select * from defect';  
		   $locate=mysqli_query($conn,$query);
           $categ = false;
           if(isset($_POST['Test_Id'])){
           $categ = $_POST['Test_Id'];
		   $locate=mysql_query("select * from defect where Test_Id like '%$categ%'");}
		   if(isset($_POST['Defect_Id'])){
           $categ = $_POST['Defect_Id'];
		   $locate=mysql_query("select * from defect where Defect_Id like '%$categ%'");}
		   if(isset($_POST['Programmer_Id'])){
           $categ = $_POST['Programmer_Id'];
		   $locate=mysql_query("select * from defect where Programmer_Id like '%$categ%'");}
		   if(isset($_POST['datef'])){
		   if(isset($_POST['datet']))
           {$categ = $_POST['datef'];
		   $categ2= $_POST['datet'];
		   $locate=mysql_query("select * from defect where Open_Date between '$categ' and '$categ2'");}}
		   
		  
		   
		   
			echo "<table border=1 id='tab' width='100%' cellpadding=0 cellspacing=0";
			echo "<tr>";
			echo "<th>Test Id</th>";
			echo "<th>Defect Id</th>";
			echo "<th>Programmer_id</th>";
			echo "<th>Open_date</th>";
			echo "<th>Modified_Date</th>";
			echo "<th>status</th>";
			echo "<th>Defect_description</th>";
			echo "<th>Defect_solution</th>";
			$i = 0;
            $checkboxes = "<input type='checkbox' name='selected[]' value='$i++'/><br />";
			
			echo "</tr>";
			if($locate === FALSE) { 
    		die("hello");}
				while($rows=mysqlI_fetch_array($locate)){
				echo "<tr>";
				echo "<td>".$rows['Test_Id']."</td>";
				echo "<td>".$rows['Defect_Id']."</td>";
				echo "<td>".""."</td>";
				echo "<td>".$rows['Programmer_Id']."</td>";
				echo "<td>".$rows['Open_Date']."</td>";
				echo "<td>".""."</td>";
				echo "<td title=Email><a href='borrowedform.php?name=".$rows['Test_Id']."'><center><img src='email.png' alt='Generate Mail' height='20' weight='20'></center></a></td>"	;
				echo "<td><center> $checkboxes </center></td>";
						       
	            echo "</tr>";}
			    echo "</table>";
		
		error_reporting(E_ERROR | E_PARSE);
?>
<center><div id="footer">
<?php
include'auto/clock.php';
?>
</center>
<div>
</div>
</div>
</body>
</html>