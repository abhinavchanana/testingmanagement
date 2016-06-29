<html>
<head>
	<title>REGISTER DEFECT </title>
	<link rel="stylesheet" type="text/css" href="loginstyle.css">
	<link rel="stylesheet" type="text/css" href="registerstyle.css">

    
</head>
<?php
$tag="";
if(isset($_POST['tx']))
{

$eid=$_POST['tx'];
	$cone= mysqli_connect('localhost','root','') or die('COULD NOT CONNECT');
$res= mysqli_select_db($cone,"testingmanagement");

$quer= "SELECT Emp_Email,Emp_Name,Emp_id FROM employee WHERE Emp_id=$eid";
$res= mysqli_query($cone,$quer);
$count=0;
while($val = @mysqli_fetch_assoc($res))

{ 
  session_start();
  
$_SESSION['vc']= rand(1000,9999); 
$_SESSION['emid']= $val['Emp_id']; 
$vcode= $_SESSION['vc'];
$count++;
$em=$val['Emp_Email'];
require 'class.phpmailer.php';
require 'class.smtp.php';
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = 'smtp';
$mail->SMTPAuth = true;
$mail->Host = 'smtp.gmail.com'; // "ssl://smtp.gmail.com" didn't worked
$mail->Port = 465;
$mail->SMTPSecure = 'ssl';
// or try these settings (worked on XAMPP and WAMP):
// $mail->Port = 587;
// $mail->SMTPSecure = 'tls';
 
 
$mail->Username = "testingmanagement5@gmail.com";
$mail->Password = "testingmanagement";
 
$mail->IsHTML(true); // if you are going to send HTML formatted emails
$mail->SingleTo = true; // if you want to send a same email to multiple users. multiple emails will be sent one-by-one.
 
$mail->From = "testingmanagement5@gmail.com";
$mail->FromName = "testing team";
 
$mail->addAddress($em,"User 1");
 
 
$mail->Subject = "Change Password";
$mail->Body = "Hi,<br /><br />click this link to change password http://localhost:1079/Testing%20management/setPassword.php. and your verification code is $vcode";
 
if(!$mail->Send())
    $tag="Message was not sent. INTERNET CONNECTION ERROR <br/>";
else
    $tag="Message has been sent. Link has been sent to your mail";


 }  
if($count==0)
{
echo "Employee Id not found";
}

mysqli_close($cone);  }
?>

<body onload=display_ct();>	
	<header>
		<button id="logout" onclick="location.href = 'login.php'">LOGIN</button>
		<label id="name"></label>
		<h1>FORGOT PASSWORD</h1>
	</header>
	<label id='time' ></label>
	<div id="t">
<form name="form"method="POST" ACTION="#">
<input type="text" disabled="disabled" value="Enter Employee ID" />
<input type="text" required  maxlength="10" placeholder="max 10 characters" name="tx" /><br><br>
<input type="submit" style="margin-left:40%" />
</form>
<p><?php echo $tag ?></p>
	</div>

	
	
</form>

	
</body>
</html>