<?php
@ob_start();
session_start();
?>
<html>
<head>
	<title> DEFECT DETAILS</title>
	<link rel="stylesheet" type="text/css" href="pagelayout.css">
	<link rel="stylesheet" type="text/css" href="registerstyle.css">
	<script src="time.js"></script>
</head>
<?php
	$userid=$_SESSION['EmpId'];
	$testid=$_GET['tid'];	
	$did=$_GET['did'];
	$_SESSION['testid']=$testid;
	$_SESSION['defectid']=$did;
	include "connectdb.php";
		$query="select * from project_testcase where Test_Id='".$testid."';";
		$result= mysqli_query($conn, $query);
		
		$query1="select Emp_Name from Employee where Emp_Id='".$userid."';";
		$result1= mysqli_query($conn, $query1);
		$row1=$result1->fetch_assoc();
		$userName= $row1['Emp_Name'];
		
		if($result -> num_rows == 1)
		{
			$row=$result->fetch_assoc();
			$pid= $row['Project_Id'];	
			$rid= $row['Requirement_Id'];	
			$tid= $row['Testcase_Id'];	
					
			$query2="select Emp_Name from employee where Emp_Id = (select Tester_Id from testcase where Test_Id='".$testid."');";
			$result2= mysqli_query($conn, $query2);
			$row2=$result2->fetch_assoc();
			$testerName=$row2['Emp_Name'];
			
			$testCaseId=$tid; 
			
			$query3="select * from defect where Test_Id='".$testid."' and Defect_id='".$did."';";
			$result3= mysqli_query($conn, $query3);
			$row3=$result3->fetch_assoc();
			$Programmer_Id=$row3['Programmer_Id'];
			
			$query4="select Emp_Name from employee where Emp_Id ='".$Programmer_Id."';";
			$result4= mysqli_query($conn, $query4);
			$row4=$result4->fetch_assoc();
			$ProgrammerName=$row4['Emp_Name'];
			
			$opendate=$row3['Open_Date'];
			$closedate=$row3['Modified_Date'];
			if($closedate=="")
			{
				$closedate="-";
			}
			$status=$row3['Status'];
			$defectDescription=$row3['Defect_Description'];
			$defectSolution=$row3['Defect_Solution'];
			if($defectSolution=="")
			{
				$defectSolution="-";
			}
			if($row3['Upload_File'] != NULL)
			{
				$file=$row3['Upload_File'];
			}
			else
			{
				$file= "";
			}
			$file_path = 'http://localhost:1079/Testing management/images/';
		}
		else 
		{
			echo "Error: ".mysqli_error($conn);
		}
	mysqli_close($conn);
?>

<body onload=display_ct();>	
	<header>
		<button id="logout" onclick="">LOGOUT</button>
		<label id="name">Hi, <?php echo $userName;?></label>
		<h1>DEFECT DETAILS</h1>
	</header>
	<label id='time' ></label>
	<nav>
		<ul style="list-style:none;">
		<li><a href="home_programmer.php">Home</a></li>
			<li><a href="viewdefect.php">View Defect</a></li>
			<li><a>Generate report</a></li>
		</ul>
	</nav>
	
	
	<form id="register" method="post" >
		<label class="insideForm">DEFECT ID : </label>
		<input class="getInsideForm" name="defect" type="text" value="<?php echo $did ?>" readonly="readonly"/>
		<input class="getInsideForm" name="testid" type="text" value="<?php echo $testid ?>" style="display:none;"/>
	
		<label class="insideForm">PROJECT ID : </label>
		<input class="getInsideForm" name="pid" type="text" value="<?php echo $pid ?>" readonly="readonly"/>
		
		<label class="insideForm">REQUIRMENT ID : </label>
		<input class="getInsideForm" name="rid" type="text" value="<?php echo $rid ?>" readonly="readonly"/>
		
		<label class="insideForm">TESTCASE ID : </label>
		<input class="getInsideForm" name="testCaseId" value="<?php echo $testCaseId ?>" type="text" readonly="readonly" /><br></br><br>
		
		<label class="insideForm">TESTER NAME : </label>
		<input class="getInsideForm" name="testerName" value="<?php echo $testerName ?>" type="text" readonly="readonly" />
		
		<label class="insideForm">PROGRAMMER NAME : </label>
		<input class="getInsideForm" name="programmerName" type="text" value="<?php echo $ProgrammerName ?>" readonly="readonly" /><br></br><br>
		<input class="getInsideForm" name="programmerId" type="text" value="<?php echo $Programmer_Id ?>" style="display:none;"/>
		
		<label class="insideForm">OPEN DATE : </label>
		<input class="getInsideForm" name="openDate" value="<?php echo $opendate ?>" type="text" readonly="readonly" />
		
		<label class="insideForm">MODIFIED DATE : </label>
		<input class="getInsideForm" name="closeDate" value="<?php echo $closedate ?>" type="text" readonly="readonly" />
		
		<label class="insideForm">STATUS : </label>
		<input class="getInsideFormRadio" name="Status" type="radio" id="Open"  value="Open" disabled='disabled' <?php echo ($status=='Open')?'checked="checked"':'' ?>>OPEN
		<input class="getInsideFormRadio" name="Status" type="radio" id="In-Progress" value="In-Progress" disabled='disabled' <?php echo ($status=='In-Progress')?'checked="checked"':'' ?>>IN-PROGRESS
		<input class="getInsideFormRadio" name="Status" type="radio" id="Closed" value="Closed" disabled='disabled' <?php echo ($status=='Closed')?'checked="checked"':''  ?>>CLOSED
		
		<label class="insideForm">DEFECT DESCRIPTION : </label>
		<textarea class="defectDescription" name="defectDescription" rows="2" col="500" style="border: 1px solid #eee;" readonly="readonly" ><?php echo $defectDescription ?></textarea>
		<br><br><br>
		
		<label class="insideForm" >DEFECT SOLUTION : </label>
		<textarea class="defectDescription" name="defectSoluition" rows="2" col="500" style="border: 1px solid #eee;" readonly="readonly" ><?php echo $defectSolution ?></textarea>
		<br><br><br>

		<label class="insideForm" >FILE : </label>
		<?php
			if($file != NULL)
			{
				echo "<a href='".$file_path.$file."' style='color:blue' download>".$file."</a>";
			}
			else
			{
				echo "No file";
			}
		?>
		<br>
		<input id="submit" name="submit" type="submit" onclick="submitForm('submitsolution.php')" value="MODIFY">
		<input id="reassign" name="submit" type="submit" onclick="submitForm('reassign.php')" value="RE-ASSIGN">
	</form>
<script type="text/javascript">
function submitForm(action)
{
	document.getElementById('register').action = action;
	document.getElementById('register').submit();
}
</script>
</body>
</html>
