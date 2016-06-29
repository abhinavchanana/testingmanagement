<?php
@ob_start();
session_start();
$userid=$_SESSION['EmpId'];
	
	include "connectdb.php";
		
		$query="select Emp_Name from Employee where Emp_Id='".$userid."';";
		$result= mysqli_query($conn, $query);
		$row=$result->fetch_assoc();
		$userName= $row['Emp_Name'];
?>
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
		

</style>
</head>


<body onload=display_ct();>	
	<header>
		<button id="logout" onclick="location.href = 'login.php'">LOGOUT</button>
		<label id="name">Hi, <?php echo $userName;?></label>
		<h1>SEARCH DEFECT</h1>
	</header>
	<label id='time' ></label>
	<nav>
		<ul style="list-style:none;">
		<li><a href="home_programmer.php">Home</a></li>
			<li><a href="searchdefect.php">Searh Defect</a></li>
			<li><a href="">Generate report</a></li>
		</ul>
	</nav>
	
	<form method="post">
    <div id="d1">
	   <p><h3>select the required search filter</h3></p>
           
            
                <select name="filter1">
                    <option name="Test_Id" value="Test_Id">Test_Id</option>
                    <option name="Defect_Id" value="Defect_Id">Defect_Id</option>
					<option name="Programmer_Id" value="Programmer_Id">Programmer_Id</option>
					<option name="Open_Date" value="Open_Date">Open_Date</option>
                </select>
            
			<br/>
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"><br/>
  Search: <input name="searchquery" type="text" size="70" maxlength="88">
  <input name="myBtn" type="submit">
  <br>
        
        <h3>Search Result</h3> 
           
        
        
            
        </div>
 
    </form>
<div id="php">	
<?php
//connect to server
$connect = mysqli_connect("localhost", "root", "","testingmanagement");


if(isset($_POST['searchquery']) && $_POST['searchquery'] != "")
{
$sq=$_POST['searchquery'];

if($_POST['filter1'] == 'Test_Id') 
{  
    // query to get all DEFECT records  
    $result=mysqli_query($connect,"SELECT * FROM defect where Test_Id ='$sq'");  
}  
else if($_POST['filter1'] == 'Programmer_Id') 
{  
    // query to get all AUD records  
    $result=mysqli_query($connect,"SELECT * FROM defect where Programmer_Id ='$sq'");  }
 else if($_POST['filter1'] == 'Open_Date') 
  {
    // query to get all records  
    $result=mysqli_query($connect,"SELECT * FROM defect where Open_Date ='$sq'") ;
	}
	 
	else 
	
	{
	 $result=mysqli_query($connect,"SELECT * FROM defect where Defect_Id ='$sq'");
	} 
//fetch the result
echo "<div id='d2'>";
echo "<table  id='t1'>";
 echo "<tr> <th>&nbsp;Test id&nbsp;</th> <th>&nbsp;&nbsp;Defect id&nbsp;&nbsp;</th> <th>&nbsp;Programmer Id &nbsp;</th> <th>&nbsp;Open Date &nbsp;</th> <th>&nbsp;&nbsp;Status&nbsp;&nbsp;</tr>";
while($row = mysqli_fetch_array($result))
{

 echo "<tr><td>";
 echo $row['Test_Id'];
 echo "</td><td>";
 echo $row['Defect_Id'];
echo "</td><td>";
 echo $row['Programmer_Id'];
 echo "</td><td>";
 echo $row['Open_Date'];
echo "</td><td>";
 echo $row['Status'];
 echo "</td><td>";
  echo "<a href='viewdefect.php?tid=$row[Test_Id]&did=$row[Defect_Id]' id='a1'>view</a>";
 echo "<tr><td>";
	 }
 }
echo "</table>";
echo "</div>";
?>
</div>
</body>
</html>
