<!DOCTYPE html>
<html>
<head>
	<title>delete</title>
</head>
<body>


<?php
require_once 'server.php';
$error=$id="";

if (isset($_POST['id'])) {

	$id=$_POST['id'];


	$sql="DELETE from rooms where id='$id'";

	 $result=$db->query($sql);
    if(!$sql){echo "<span class='error'><b>ERROR: <br></b>INSERT FAILED<br> <b> REASON(S):<br></b>$conn->error </span>";} else

    echo "<span class='asuccess'><b> $id deleted";
}

?>

	<form method="post" action="delete.php">
		Room ID: <input type="text" name="id">
		<input type="submit" value="Delete">
	</form>

</body>
</html>