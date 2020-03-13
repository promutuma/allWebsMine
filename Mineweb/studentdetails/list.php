<!DOCTYPE html>
<html>
<head>
	<title>List</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="background-image: url(kanga.jpg); background-size: cover;  color: orange;">

<div class="navbar" style="background-color: black ; padding: 25px; opacity: 0.6; top: 0; width: 100%;">
		<a href="index.php">Add Student Details</a>
		<a href="list.php">View Students' Details</a>
	</div>
	
	<?php
	require_once 'header.php';

	$sql="SELECT ADM,FIRST,MIDDLE,LAST,PHONE,EMAIL,DOR,ADD_TIME,DAY FROM STUDENT";
	$result=$conn->query($sql);
	if ($result->num_rows > 0) {

		echo "<table id='mytable'>
		<caption><h1>Student Details</h1></caption>
		
		<tr>
		<th>ADM Number</th>
		<th>First Name</th>
		<th>Middle Name</th>
		<th>Last Name</th>
		<th>Phone Number</th>
		<th>Email</th>
		<th>Date of Registration</th>
		<th>Time of Registration</th>
		<th>Day of Registration</th>
		</tr>";
		while ($row=mysqli_fetch_assoc($result)) {
			echo "<tr><td>".$row["ADM"] ."</td><td>" .$row["FIRST"] ."</td><td>" .$row["MIDDLE"] ."</td><td>" .$row["LAST"] ."</td><td>" .$row["PHONE"] ."</td><td>" .$row["EMAIL"]. "</td><td>" .$row["DOR"]. "</td><td>" .$row["ADD_TIME"]. "</td><td>" .$row["DAY"]. "</td></tr><br>"; 
			
		}
		echo "</table>";
		}	else echo "<span class='error'> Error: NO STUDENTS";
	?>



</body>
</html>