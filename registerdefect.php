<?php
@ob_start();
session_start();
?>
<html>
<html>
<head>
	<title>REGISTER DEFECT </title>
	<link rel="stylesheet" type="text/css" href="pagelayout.css">
	<link rel="stylesheet" type="text/css" href="registerstyle.css">
	<script src="time.js"></script>
</head>
<?php
	$userid=$_SESSION['userid'];
	$testid=$_SESSION['testid'];
	$pid='HM1';
	$rid='1';
	$tid='1';
	include "connectdb.php";
	$query="SELECT Test_Id from project_testcase where Project_Id ='".$pid."' AND Requirement_Id ='".$rid."' AND Testcase_Id='".$tid."';";
	$result= mysqli_query($conn, $query);
	
	$query1="select Emp_Name from Employee where Emp_Id='".$userid."';";
	$result1= mysqli_query($conn, $query1);
	$row1=$result1->fetch_assoc();
	
	if($result -> num_rows == 1)
	{
		$row=$result->fetch_assoc();
		$testid= $row['Test_Id'];	
		
		$query2="select max(Defect_Id) from defect where Test_Id='".$testid."';";
		$result2= mysqli_query($conn, $query2);
		$row2=$result2->fetch_assoc();
		$defectid= $row2['max(Defect_Id)'] + 1;	
		
		$query3="select e.Emp_Id ,e.Emp_Name, count(d.Defect_Id) from Employee e, defect d where e.Emp_Designation='Programmer' and d.Status='Open' and
					e.Emp_Id = d.Programmer_Id group by e.Emp_Name order by count(d.Defect_ID) limit 0 , 1;";
		$result3= mysqli_query($conn, $query3);
		$row3=$result3->fetch_assoc();
		$programmerName= $row3['Emp_Name'];	
		$programmerId= $row3['Emp_Id'];	
		
		$testCaseId=$tid; 
		$status="Open";
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
		<li><a href="home_tester.php">Home</a></li>
			<li><a href="">View Testcase</a></li>
			<li><a href="">View Defect</a></li>
			<li><a>Generate report</a></li>
		</ul>
	</nav>
	
	<form id="register" action="registersubmit.php" method="post">
		<label class="insideForm">DEFECT ID : </label>
		<input class="getInsideForm" name="defect" type="text" value="<?php echo $defectid ?>" readonly="readonly"/>
		<input class="getInsideForm" name="testid" type="text" value="<?php echo $testid ?>" style="display:none;"/>
	
		<label class="insideForm">PROJECT ID : </label>
		<input class="getInsideForm" name="pid" type="text" value="<?php echo $pid ?>" readonly="readonly"/>
		
		<label class="insideForm">REQUIRMENT ID : </label>
		<input class="getInsideForm" name="rid" type="text" value="<?php echo $rid ?>" readonly="readonly"/>
		
		<label class="insideForm">TESTCASE ID : </label>
		<input class="getInsideForm" name="testCaseId" value="<?php echo $testCaseId ?>" type="text" readonly="readonly" /><br></br><br>
		
		<label class="insideForm">STATUS : </label>
		<input class="getInsideForm" name="Status" type="text" value="<?php echo $status ?>" readonly="readonly" />
		
		<label class="insideForm">TESTER NAME : </label>
		<input class="getInsideForm" name="testerName" value="<?php echo $userName ?>" type="text" readonly="readonly" />
		
		<label class="insideForm">PROGRAMMER NAME : </label>
		<input class="getInsideForm" name="programmerName" type="text" value="<?php echo $programmerName ?>" readonly="readonly" />
		<input class="getInsideForm" name="programmerId" type="text" value="<?php echo $programmerId ?>" style="display:none;" /><br></br><br>
		
		<label class="insideForm">DEFECT DESCRIPTION : </label>
		<textarea class="defectDescription" name="defectDescription" style="border: 1px solid #666;" rows="5" col="500" required></textarea><br>
		
		<input id="submit" type="submit" value="SUBMIT">
		
		
	</form>
</body>
</html>