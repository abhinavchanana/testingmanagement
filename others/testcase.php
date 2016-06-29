<html>
<head>
	<title>TEST CASES</title>
	<link rel="stylesheet" type="text/css" href="testcase_css.css">
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
	
	<style>
	body {
    margin:0px;
} 
	#one table 
{
	width: 80%;
	height: 40%;
	border-collapse: collapse;
	margin-top: 20px; 
	margin-bottom: 10px;
	margin-left: 200px;
	margin-right: auto;
	text-align: center;
	
 }

#one th,td{
		
	border: 2px solid black; 
	padding-left: 15px;
	padding-right: 60px;
	padding-top: 10px;
	padding-bottom: 10px;
 
 }

#one button
{
	width: 70px;
	height: 30px;
	margin-left: 100px;
	border: 1px solid black;

}
 
#form_one
{
	width: 840px;
	height: 500px;	
	margin-left: 300px;
	margin-right: auto;
}

#one 
{
	display: inline-block;
}


#two table
{	
	width: 100%; 
	height: 40%;
	border-collapse: collapse;
	margin-top: 0px; 
	margin-bottom: 20px;
	margin-left: auto;
	margin-right: auto;
	text-align: center;
}

#two th,td{
		
	border: 2px solid black; 
	padding-left: 14px;
	padding-right: 14px;
	padding-top: 10px;
	padding-bottom: 10px;
 
 }

#two button
{
	width: 100px;
	height: 30px;
	border: 1px solid black;
	margin-left: 100px;
	margin-bottom: 20px;
	margin-top: 20px;
	margin-right: 30px;
}
	
	</style>
	
	
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
		$row1= $result1->fetch_assoc();
		$userName= $row1['Emp_Name'];
	}
	mysqli_close($conn); 
?>

<body onload=display_ct();>	
<section>
	<header>
		<button id="logout" onclick="">LOGOUT</button>
		<label id="name">Hi, <?php //echo $userName;?></label>
		<h1>TEST CASES</h1>
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
	<br /><br /><br /><br />
	<section id="form_one">

<section id="one">

	<table>
	<tr>
	<th>RID</th>
	<th>RID Description</th>
	</tr>
	<tr>
	<td>101</td>
	<td>Description 1 </td>
	</tr>
	<tr>
	<td>102</td> 
	<td>Description 2 </td>
	</tr>
	<tr>
	<td>103</td> 
	<td>Description 3 </td>
	</tr>
	
	</table> 
		<button type="submit" id="b_one">ADD</button>
		
</section>
<br /><br /><br />
<section id="two"> 

	<table>
	<tr>
	<th>Test_id</th>
	<th>Tester_id</th>
	<th>TestCase Desc</th>
	<th>Input</th>
	<th>Expected output</th>
	<th>Actual Output</th>
	<th>Result</th>
	</tr>
	
	<tr>
	<td>T01</td>
	<td>TR01</td>
	<td>Desc 1</td>
	<td>input 1</td>
	<td>Exp 1</td>
	<td></td>
	<td></td>
	
	</tr>
	<tr>
	<td>T02</td>
	<td>TR02</td>
	<td>Desc 2</td>
	<td>input 2</td>
	<td>Exp 2</td>
	<td></td>
	<td></td>
	
	</tr>
	
	<tr>
	<td>    </td>
	<td>    </td>
	<td>    </td>
	<td>    </td>
	<td>    </td>
	<td>    </td>
	<td>    </td>
	
	</tr>
	
	</table>

	<button type="submit" id="b_two">Modify</button>
	<button type="submit" id="b_three">Delete</button>
	<button type="submit" id="b_four">Reg.Defect</button>
	
	</section>
</body>
</html>