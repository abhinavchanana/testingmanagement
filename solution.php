<?php

if(isset($_POST['submit']) > 0)
{
	include "connectdb.php";

	$id=NULL;
	date_default_timezone_set("Asia/Kolkata");
	$date = date('Y-m-d');

	if($_FILES['fileUpload']['size'] > 0)
	{
		//If u dont have the images folder where u keep this file create a images folder
		$folder = "images/";
		move_uploaded_file($_FILES["fileUpload"]["tmp_name"] , "$folder".$_FILES["fileUpload"]["name"]);

		echo "File ".$_FILES["fileUpload"]["name"]." Uploaded...";

		$query1="update defect set Status = '".$_POST['Status']."' , Modified_Date = '".$date."', Upload_File = '".$_FILES['fileUpload']['name']."', 
			Defect_Solution= '".$_POST['defectsolution']."' where Test_Id ='".$_POST['testid']."' and Defect_Id='".$_POST['defect']."';";
	}
	else
	{
		$query1="update defect set Status = '".$_POST['Status']."' , Modified_Date = '".$date."',  
			Defect_Solution= '".$_POST['defectsolution']."' where Test_Id ='".$_POST['testid']."' and Defect_Id='".$_POST['defect']."';";
	}
	$result = $conn->query($query1);

	if (mysqli_query($conn, $query1)) 
	{
		echo "updated";
		header("Location: successfulsolution.php");
	} 
	else
	{
		echo "Error: ".mysqli_error($conn);
	}
		mysqli_close($conn);

}

?>