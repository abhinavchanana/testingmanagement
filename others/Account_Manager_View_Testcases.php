<html>
	<head>
		<title>Account_Manager_View_Status_Testcases</title>
		<link rel="stylesheet" href="stylesheet.css"> 
	</head>
	<body>
		<div id="div1">
			<h1 style="text-align:center; padding-top:50px;">View Status of Testcases</h1>			
			<form action="Account_Manager_Login.html" method="post">
				<input type="submit" value="Log Out" name="amlogout" ><br>
			</form>
		</div>
		<div id="div2">
			<a href="Account_Manager_Home.php"><h3>Back To Home</h3></a>
		</div>
		<form>
		<br><select name="PID" style="margin:50px 20px 50px 50px">
			<option value="PID" selected="selected">PID</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="2">3</option>
			<option value="2">4</option>
			<option value="2">5</option>
		</select>
        <select name="RID">
			<option value="RID" selected="selected">RID</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="2">3</option>
			<option value="2">4</option>
			<option value="2">5</option>
		</select>		
		<br/>
		<table border="1" style="width:60%">
		<tr>
		<th>TID</th>
		<th>Test-Case Description</th>
		<th>Input</th>
		<th>Expected Output</th>
		<th>Actual Output</th>
		<th>Result</th>
		</tr>
		<tr>
		<td>T01</td>
		<td>AA001</td>
		<td>aaaa</td>
		<td>bbbb</td>
		<td>bbbb</td>
		<td>Success</td>
		</tr>
		<tr>
		<td>T02</td>
		<td>BB002</td>
		<td>dddd</td>
		<td>kkkk</td>
		<td>jjjj</td>
		<td>Fail</td>
		</tr>		
		<br><br>
		STATUS :
		<input type="radio" name="status" value="Completed">Complete  <input type="checkbox" name="status" value="Approve">Approve<br>
		<input type="radio" name="status" value="incompleted" checked>Incomplete<br><br>
        </form>
	</body>
</html>