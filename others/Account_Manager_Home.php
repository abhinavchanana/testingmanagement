<html>
	<head>
		<title>Account_Manager_Home</title>
		<link rel="stylesheet" href="stylesheet.css"> 
	</head>
	<body>
		<?php
			$username=$_POST["username"];
			$password=$_POST["password"];
		?>
		<div id="div1">
			<h1 style="text-align:center; padding-top:50px;">Home - Assign Project Managers</h1>			
			<form action="Account_Manager_Login.html" method="post">
				<input type="submit" value="Log Out" name="amlogout"/>
			</form>
		</div>
		<div id="div2">
			<?php
				echo "Hello " . $username;
			?>
			<a href="Account_Manager_Home.php"><h3>Back To Home</h3></a>
		</div>
		<form action="Account_Manager_View_Testcases.php" method="post">
		<select name="PID" style="margin:50px 20px 50px 250px">
			<option value="PID" selected="selected">PID</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="2">3</option>
			<option value="2">4</option>
			<option value="2">5</option>
		</select>		
		<br/>
		<br/>
		<textarea rows="10" cols="15">
         PM1
		 PM3
		 PM4
         </textarea>
		 <textarea rows="10" cols="15">
         PM2
         </textarea>
		 <br><br>
		<button onclick="myFunction()">Save Changes</button>
		<input style="margin:50px 20px 50px 50px" type="submit" value="View test-cases" name="View test cases"/>
        </form>
		<script>
         function myFunction() 
		 {
             alert("Changes saved!");
         }
        </script>

	</body>
</html>