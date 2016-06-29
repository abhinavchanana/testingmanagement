<?php 
if(!isset($_POST['secure']))
{session_start();
$_SESSION['secure'] = rand(1000,9999);
} 

if(isset($_POST['un'])&& isset($_POST['pwd']))
{

$uname=$_POST['un'];
$pass=$_POST['pwd'];
$userid="1";
	$con= mysqli_connect('localhost','root','') or die('COULD NOT CONNECT');
$res= mysqli_select_db($con,"testingmanagement");
$amr="select * from admin";
$we=mysqli_query($con,$amr);
$count=1;
while($ro= mysqli_fetch_assoc($we))
{

   $ty=md5($pass);
	if($uname==$ro['Username']){
	   $cond=2;
			if($uname==$ro['Username']&& $ty==$ro['Password'])
	{   $count++; 
	   // if( $_SESSION['secure']==$_POST['secure'])
		{     
		$count++;  
	  
		   $_SESSION['EmpId']=$ro['AMID'];
		   header("Location:homeAM.php");
			  exit();
		    

} 
     $_SESSION['secure'] = rand(1000,9999);
		   break;


}  }


}

if(@$cond!=2)
{

$quer= "select * from employee";
$res= mysqli_query($con,$quer);

$count=1;


while($val = mysqli_fetch_assoc($res))
{      
           $ty=md5($pass);
	
			if($uname==$val['User_Name']&& $ty==$val['Password'])
	{   $count++;
	    if( $_SESSION['secure']==$_POST['secure'])
		{     $count++;  
	  
		   $_SESSION['EmpId']=$val['Emp_id'];
		   $_SESSION['desg']= $val['Emp_Designation'];
		   $j= $val['Emp_Designation'];
		   if( $j=="Tester")
		   {
		      header("Location:home_tester.php");
			  exit();
		   
		   }
		   if( $j=="Project Manager")
		   {
		      header("Location:homepm.php");
			  exit();
		   
		   }
		   if( $j=="Programmer")
		   {
		      header("Location:home_programmer.php");
			  exit();
		   
		   }
		      
		   
		   
		   
		   break;
		   } $_SESSION['secure'] = rand(1000,9999);
		   break;

} 
     


}  }

mysqli_close($con); }
?>



<html>
<head>
	<title>LOGIN </title>
	<link rel="stylesheet" type="text/css" href="loginstyle.css">
	<link rel="stylesheet" type="text/css" href="registerstyle.css">
<script src="time.js"></script>
</head>

<body onload=display_ct();>	
	<header>
		<label id="name"></label>
		<h1>LOGIN</h1>
	</header>
	<div id="t">
	<form  name="Lform" method="post" Action="login.php">
	<input type="text" disabled="disabled" value="Enter UserName"/>
	<input type="text" name="un" required="required" maxlength="10"; placeholder="max 10 characters"/><br>
	<input type="text" disabled="disabled" value="Enter Password"/>
	<input type="password" name="pwd" required="required" maxlength="15" placeholder="max 15 characters"/><br><br>
	<input type="text" disabled="disabled" value="Verification Code"/>
	<img src="generate.php" />
	<input type="text" name="secure" maxlength="4"; placeholder="enter captcha here"/><br><br>
	<input type="submit" value="Log In" style="margin-left:170"/><br>
	<a href="forgotpassword.php" style="color:Black"> <u>Forgot Password</u> </a>
	<label > <?php 
            if(@$count==1)
			echo  "<p style='color:red; font-size:25;'>please check your username or password</p>";
			else if(@$count==2)
			 echo "<p style='color:red; font-size:25;'>Verification code does not match</p>";
			 else if(@$count==3)
			 echo "<p style='color:green; font-size:25;'>you have logged in successfully</p>";
			 
			 ?>




	</label>
	</div>
	
</form>

	
</body>
</html>