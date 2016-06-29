<?php
@ob_start();
session_start();
?>
<html>
<head>
	<title> HOME TESTER</title>
	<link rel="stylesheet" type="text/css" href="pagelayout.css">
	<link rel="stylesheet" type="text/css" href="home.css">
	<script src="time.js"></script>
</head>
<?php
	$_SESSION['userid']="1";
	$userid=$_SESSION['userid'];
	include "connectdb.php";
		
		$query1="select Emp_Name from Employee where Emp_Id='".$userid."';";
		$result1= mysqli_query($conn, $query1);
		$row1=$result1->fetch_assoc();
		$userName= $row1['Emp_Name'];
		
		$query1="select distinct(pt.Project_Id), p.Project_name from defect d, testcase t, project_testcase pt, project p where t.Tester_Id=".$userid."
		and pt.Test_Id=d.Test_ID and pt.Project_Id=p.Project_id and pt.Test_Id=t.Test_ID";
		$result1= mysqli_query($conn, $query1);
		
		$query2="select  Count(*) as testcasesNo from testcase where Tester_Id=".$userid." and Result='open';"; 
		$result2= mysqli_query($conn, $query2);
		$row2=$result2->fetch_assoc();
		$openNo= $row2['testcasesNo'];
		
		$query3="select Count(*) as noDefect from defect d, testcase t where t.Tester_Id=".$userid." and d.Test_Id=t.Test_ID";
		$result3= mysqli_query($conn, $query3);
		$row3=$result3->fetch_assoc();
		$defectsNo= $row3['noDefect'];
		
		$query4="select  Count(*) as testcasesNo from testcase where Tester_Id=".$userid." and Result='closed';"; 
		$result4= mysqli_query($conn, $query4);
		$row4=$result4->fetch_assoc();
		$closeNo= $row4['testcasesNo'];
		
	mysqli_close($conn);
?>

<body onload=display_ct();>	
	<header>
		<button id="logout" onClick="">LOGOUT</button>
		<label id="name">Hi, <?php echo $userName;?></label>
		<h1>HOME</h1>
	</header>
	<label id='time' ></label>
	<nav>
		<ul style="list-style:none;">
		<li><a href="home_tester.php">Home</a></li>
			<li><a href="">View Testcase</a></li>
			<li><a href="">View Defect</a></li>
			<li><a href="Report/main.php">Generate report</a></li>
		</ul>
	</nav><br>
	<div id="welcome">
	<q>Success is liking yourself, liking what you do and liking how you do it</q> -<cite> Maya Angelou</cite>
	<p>Have a Nice Day, <?php echo $userName;?> </p>
	</div>		
	<div id="project">
	<p> <b>CURRENTLY WORKING ON  <?php echo $count=$result1 -> num_rows;?> PROJECT </b></p>
	<?php
		if($result1 -> num_rows >0)
		{
			while($row1 = $result1 -> fetch_assoc())
			{
	?> 
	<p> <?php echo $row1['Project_name'];?> </p>
	<?php
			}
		}	
	
	?>
	</div>
		<div id="defect">
		<p> <b>No. of Open Testcases to be solved: </b> <?php echo $openNo; ?> </p>
		<p> <b>No. of Testcases Closed : </b> <?php echo $closeNo; ?> </p>
		<p> <b>No. of Defects raised : </b> <?php echo $defectsNo;?> </p>
	</div>
</body>
</html>
