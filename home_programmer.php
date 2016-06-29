<?php
@ob_start();
session_start();
?>
<html>
<head>
	<title> HOME PROGRAMMER</title>
	<link rel="stylesheet" type="text/css" href="pagelayout.css">
	<link rel="stylesheet" type="text/css" href="home.css">
	<script src="time.js"></script>
</head>
<?php
	$userid=$_SESSION['EmpId'];
	
	include "connectdb.php";
		
		$query="select Emp_Name from Employee where Emp_Id='".$userid."';";
		$result= mysqli_query($conn, $query);
		$row=$result->fetch_assoc();
		$userName= $row['Emp_Name'];
		
		$query1="select distinct(pt.Project_Id), p.Project_name from defect d, project_testcase pt, project p where d.Programmer_Id=".$userid."
		and pt.Test_Id=d.Test_ID and pt.Project_Id=p.Project_id";
		$result1= mysqli_query($conn, $query1);
		
		$query2="select count(*) as open_defect from defect where status='Open' and Programmer_Id=".$userid.";"; 
		$result2= mysqli_query($conn, $query2);
		$row2=$result2->fetch_assoc();
		$openNo= $row2['open_defect'];
		
		$query3="select count(*) as inprogress_defect from defect where status='In-Progress' and Programmer_Id=".$userid.";"; 
		$result3= mysqli_query($conn, $query3);
		$row3=$result3->fetch_assoc();
		$InNo= $row3['inprogress_defect'];
		
		$query4="select count(*) as close_defect from defect where status='Closed' and Programmer_Id=".$userid.";"; 
		$result4= mysqli_query($conn, $query4);
		$row4=$result4->fetch_assoc();
		$CloseNo= $row4['close_defect'];
		
	mysqli_close($conn);
?>

<body onload=display_ct();>	
	<header>
		<button id="logout" onClick="location.href = 'login.php'">LOGOUT</button>
		<label id="name">Hi, <?php echo $userName;?></label>
		<h1>HOME</h1>
	</header>
	<label id='time' ></label>
	<nav>
		<ul style="list-style:none;">
		<li><a href="home_programmer.php">Home</a></li>
			<li><a href="searchdefect.php">Searh Defect</a></li>
			<li><a href="Report/main.php">Generate report</a></li>
		</ul>
	</nav><br>
	<div id="welcome">
	<q>The dictionary is the only place that success comes before work. work is the key to success, and hard work can help you accomplish anything.</q>
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
		<p> <b>No.of Open Defects to be solved: </b> <?php echo $openNo; ?> </p>
		<p> <b>No. of Defects currenly working on : </b> <?php echo $InNo; ?> </p>
		<p> <b>No. of solved defects : </b> <?php echo $CloseNo;?> </p>
	</div>
	
</body>
</html>
