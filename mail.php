	<?php
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
	$mail->Subject = "remainder";
	$mail->Body = "Hi guys,<br/><br/>This is a kind remainder to send your details.<br/>Regards<br/>Rashmi.";
	$mail->AddAddress("rashmi05rash@gmail.com");
	//$mail->AddCC("ranganathanmg@gmail.com");
	$mail->ClearReplyTos();

	 if(!$mail->Send()) {
		echo "Mailer Error: " . $mail->ErrorInfo;
	 } else {
		echo "Message has been sent";
	 }

	 ?>