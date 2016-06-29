<?php
//Retrieves data from MySQL
	include "connectdb.php";


//Puts it into an array
$file_path = 'http://localhost:1079/Testing management/images/';

$result = $conn->query("select Defect_Id,Test_Id, Upload_File from defect");
while($row = $result->fetch_assoc())
  {
	  if($row['Upload_File'] !=""){
    echo "TestCase ID : ".$row['Test_Id']." - Defect Id : ".$row['Defect_Id']." - "."<a href='".$file_path.$row['Upload_File']."' download>".$row['Upload_File']."</a>";
	echo "<br>";
	  }
  }
?>