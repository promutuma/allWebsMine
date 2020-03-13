<!DOCTYPE html>
<html>
<head>
	<title>Student Details</title>

	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="background-image: url(kanga.jpg); background-size: cover;">
	<div class="navbar" style="background-color: black ; padding: 25px; opacity: 0.6; top: 0; width: 100%;">
		<a href="index.php">Add Student Details</a>
		<a href="list.php">View Students' Details</a>
	</div>
	
	<?php
	require_once 'header.php';
	$error=$ADM=$first_name=$middle_name=$last_name=$phone=$email="";
	if(isset($_POST['ADM'])
	)
	{
		$ADM=$_POST['ADM'];
		$first_name=$_POST['first_name'];
		$middle_name=$_POST['middle_name'];
		$last_name=$_POST['last_name'];
		$phone=$_POST['phone'];
		$email=$_POST['email'];
		$c_date=date('Y-m-j');
		$c_day=date('l');
		$c_time=date('H:i:s');
		$sql= "INSERT INTO `student` (`ADM`, `FIRST`, `MIDDLE`, `LAST`, `PHONE`, `EMAIL`, `DOR`, `ADD_TIME`,`DAY`) VALUES ('$ADM', '$first_name', '$middle_name', '$last_name', '$phone', '$email','$c_date','$c_time','$c_day')";
		 $result=$conn->query($sql);
    if(!$result){echo "<span class='error'><b>ERROR: <br></b>INSERT FAILED<br> <b> REASON(S):<br></b>$conn->error </span>";} else

    echo "<span class='asuccess'><b> Success:</br><u> $first_name $middle_name  $last_name </u></b> admission number <u>$ADM </u>was added to  database on<u><b>$c_day  $c_date at $c_time</b></u></span>";
	}
	?>

	<form method="POST" action="index.php" 
	 style="background-color: lightcoral; color: black;">
	 <h4>Enter student details</h4>
			Admission number:<br>
		<input type="text" name="ADM" placeholder="Admission number..."><br>
		First name:<br>
		<input type="text" name="first_name" placeholder="first name..."><br>
		Middle name:<br>
		<input type="text" name="middle_name"  placeholder="middle name..."><br>
		Last name:<br>
		<input type="text" name="last_name" placeholder="last name..."><br>
		Phone number:<br>
		<input type="text" name="phone" placeholder="phone..."><br>
		Email:<br>
		<input type="email" name="email" placeholder="email.."><br>
		<br><br>
		<input type="submit" name="submit" value="submit">
	</form>

</body>
</html>