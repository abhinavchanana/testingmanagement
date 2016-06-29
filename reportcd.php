
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US">
<head>
	<meta charset="utf-8" />
	<title>Community Deals - Swap Products, Save More</title>
      <link rel="stylesheet" type="text/css" href="slick.css"/>
  <link rel="stylesheet" type="text/css" href="slick-theme.css"/>
	<link rel="stylesheet" href="application.css" />
	<link rel="stylesheet" href="search.css" />
	<script src="j	query.js"></script>
</head>

<body onload=filter();>

	<div id="site-header" style="position:fixed;background-color:white; width:100%;top:0px; z-index:9999 ">
	 <div class="wrapper1" style="width:100%;background-color: rgb(99,46,2);">
      <div class=" c4 med-s0 med-c6" >
          <img src="logo.png" alt="logo" class="logo" >
      </div> <!-- .c -->
	   <div class=" c4 med-c6" >
          <p id="cd">Community Deals</p>
      </div> 
      <!--own Code-->
    </div> <!-- div.wrapper -->

</body>

<?php
	$conn = mysqli_connect('localhost','root','','communitydeals');
	if(!$conn)
	{
		//echo "unconnection successful";
		die(mysqli_connect_error());
	}
	else
	{ 
		date_default_timezone_set("Asia/Kolkata");
		$date = date('Y-m-d');
		
		$query1="select count(*), bookName  from order_ o, book b where orderType='sell' and o.productId=b.bookId and productId<1000 group by productId order by count(*) desc limit 3;"; 
		$result1= mysqli_query($conn, $query1);
		if($result1 -> num_rows >0)
		{
			echo "
				<label>Top 3 Books Sold : </label>	
				<table width='350' border='0' cellpadding='1' cellspacing='1' class='box'>
				<tr><td>BOOK NAME</td><td>UNITS SOLD</td></tr>
			";
			while($row1 = $result1 -> fetch_assoc())
			{
				echo "<td width='auto'>".$row1['bookName']."</td>";
				echo "<td width='auto'>".$row1['count(*)']."</td></tr>";			
			}
			echo "</table>";
		}
		$query2="select count(*), bookName  from order_ o, book b where orderType='rent' and o.productId=b.bookId and productId<1000 group by productId order by count(*) desc limit 3;"; 
		$result2= mysqli_query($conn, $query2);	
	}
?>