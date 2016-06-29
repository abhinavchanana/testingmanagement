<?php

	include "connectdb.php";
	date_default_timezone_set("Asia/Kolkata");
	$date = date('Y-m-d');
	$query="INSERT INTO defect( Test_Id, Defect_Id, Programmer_Id, Open_Date, Status, Defect_Description) VALUES('".$_POST['testid']."','".$_POST['defect']."',
	'".$_POST['programmerId']."','$date','".$_POST['Status']."','".$_POST['defectDescription']."');";
	
	$query1="select Emp_Name, Emp_Email from Employee where Emp_Id='".$_POST['programmerId']."';";
	$result1= mysqli_query($conn, $query1);
	$row1=$result1->fetch_assoc();
	
	if (mysqli_query($conn, $query)) 
	{
		require_once('PHPMailer_5.2.3/class.phpmailer.php');

		$mail = new PHPMailer(); // create a new object
		$mail->IsSMTP(); // enable SMTP
		$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
		$mail->SMTPAuth = true; // authentication enabled
		$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
		$mail->Host = "smtp.gmail.com";
		$mail->Port = 465; // or 587
		$mail->IsHTML(true);
		$mail->Username = "testingmanagement5@gmail.com";
		$mail->Password = "testingmanagement";
		$mail->SetFrom("testingmanagement5@gmail.com");
		$mail->Subject = "Defect Assigned";
		$mail->Body = "The defect id ".$_POST['defect']." in project ".$_POST['pid']." has been assigned to you on ".date('d/m/Y').".<br><br>Please pay attention to the defect.<br><br> sent from software. ";
		$mail->AddAddress("".$row1['Emp_Email']."");
		$mail->ClearReplyTos();

		 if(!$mail->Send()) 
		 {
			//echo "Mailer Error: " . $mail->ErrorInfo;
			echo "
			<script>
			echo 'No Internet Connection';
			</script>";
			header("Location: registersuccessful.php?q='no'");
		 } 
		 else 
		 {
			echo "Message has been sent";
			header("Location: registersuccessful.php?q='yes'");
		 }		
	}
	mysqli_close($conn);
?>