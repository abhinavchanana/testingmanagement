<html>
<head>
	<title>REGISTER DEFECT </title>
	<link rel="stylesheet" type="text/css" href="loginstyle.css">
	<link rel="stylesheet" type="text/css" href="registerstyle.css">
<script src="time.js"></script>
</head>
<?php


session_start();
$empl=$_SESSION['emid']; 
$ok= $_SESSION['vc'];


if(isset($_POST['pwd1'])&&isset($_POST['pwd2']))
{ 

$p1=$_POST['pwd1'];
$p2=$_POST['pwd2'];
$lp=$_POST['vf'];

	$cone= mysqli_connect('localhost','root','') or die('COULD NOT CONNECT');
$res= mysqli_select_db($cone,"testingmanagement");


  if($p1==$p2)
{  


   if($lp==$ok)
   {
     $en=md5($p1);
$qr= "update employee set Password = '$en' WHERE Emp_id = $empl";
$rop= mysqli_query($cone,$qr) or die("query error");
if($rop)
{
    $coun=1;
	
} }  else
    {$coun=2;
}
} else
{
 $coun=3;
}


mysqli_close($cone);  }
?>


<body onload=display_ct();>	
	<header>
		<button id="logout" onclick="location.href = 'login.php'">LOGIN</button>
		<label id="name"></label>
		<h1>Reset Password</h1>
	</header>
	<label id='time' ></label>
<div id="t">
	<form name="frm" method="POST" Action="setPassword.php">
    
<input type="text" disabled="disabled"value=" Employee ID" />
	<input type="text" disabled value="<?php  echo $empl ?>" required  /><br>
	<input type="text" disabled="disabled" value="Enter Password"/>
	<input type="password"  required name="pwd1" /><br>
	<input type="text" disabled="disabled" value="Confirm Password"/>
	<input type="password" required name="pwd2" /><br>
	<input type="text" disabled="disabled" value="Enter Verification Code" autocomplete="off"/>
	<input type="text" required maxlength="4"name="vf" /><br><br>
	
	
	
	<input type="submit"  value="Submit" style="width:20%;font-size:15;margin-left:38%;margin-top:30;height:30; position:Relative;" /><br>
	
  <label > <?php 
            if(@$coun==1)
			echo  "<p style='color:green; font-size:25;'> Password updated Successfully.  <a href='login.php' style='color:black;'><u> Go to Log In page</u></a></p>";
			if(@$coun==2)
			echo  "<p style='color:red; font-size:25;'> Invalid verification code.</p>";
			if(@$coun==3)
			echo  "<p style='color:red; font-size:25;'> Passwords don't match</p>";
			
			 
			 ?>




	</label>

	</div>
	
</form>

	
</body>
</html>