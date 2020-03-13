<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'buffalo_hotel');

	// initialize variables
	$id = "";
	$rtype = "";
	$beds = "";
	$ac = "";
	$cost = "";
	$update = "";

	if (isset($_POST['save'])) {
		$id = $_POST['id'];
		$rtype = $_POST['rtype'];
		$beds = $_POST['beds'];
		$ac = $_POST['ac'];
		$cost = $_POST['cost'];

		mysqli_query($db, "INSERT INTO rooms (id, rtype, beds, ac, cost) VALUES ('$id', '$rtype', '$beds', '$ac', '$cost')"); 
		$_SESSION['message'] = "room <b>$id</b> saved"; 
		header('location: index.php');
	}

# updated update code for the form

	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$rtype = $_POST['rtype'];
		$beds = $_POST['beds'];
		$ac = $_POST['ac'];
		$cost = $_POST['cost'];

		mysqli_query($db, "UPDATE rooms SET rtype='$rtype',beds='$beds',ac='$ac',cost='$cost' WHERE id='$id' "); 
		$_SESSION['message'] = "room <b>$id</b> UPDATED!!"; 
		header('location: index.php');
	}


	



	$results = mysqli_query($db, "SELECT * FROM rooms"); 


?>