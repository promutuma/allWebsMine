<?php 
include('server.php');
# code to display data to the form data to be updated
if (isset($_GET['edit'])) {
		# i have renewed the code
		$id=$_GET['edit'];
		$result = mysqli_query($db, "SELECT * FROM rooms WHERE id='$id'");
		#checking if the record exist in the database
		if (count($result)==1) {
			# code...
			$row=mysqli_fetch_array($result);
			$id=$row['id'];
			$rtype = $row['rtype'];
	 		$beds = $row['beds'];
			$ac = $row['ac'];
			$cost = $row['cost'];
			$update=true;
			
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>rooms details </title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php if (isset($_SESSION['message'])): ?>
		<div class="msg">
			<?php 
				echo $_SESSION['message']; 
				unset($_SESSION['message']);
			?>
		</div>
	<?php endif ?>

<?php 
$results = mysqli_query($db, "SELECT * FROM rooms"); ?>

<table>
	<thead>
		<tr>
			<th>Room No.</th>
			<th>Room Type</th>
			<th>No.OfBeds</th>
			<th>AC Condition</th>
			<th>Cost/night</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>


<?php
# code to delete selected data from the table 
	if (isset($_GET['delete'])) {
	$id = $_GET['delete'];
	$sql="DELETE from rooms where id='$id'";

	 $result=$db->query($sql);
    if(!$sql){$_SESSION['message'] = "<b>ERROR: <br></b>INSERT FAILED<br> <b> REASON(S):<br></b>$db->error"; 
		header('location: index.php');} else

    echo $_SESSION['message'] = "Room <b>$id</b> DELETED"; 
		header('location: index.php');

}
?>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['id']; ?></td>
			<td><?php echo $row['rtype']; ?></td>
			<td><?php echo $row['beds']; ?></td>
			<td><?php echo $row['ac']; ?></td>
			<td><?php echo $row['cost']; ?></td>
			<td>
				<a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="index.php?delete=<?php echo $row['id'];?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
	


<form method="post" action="server.php" >

	<div class="input-group">
		<label>Room Number</label>				
		<input type="text" name="id" value="<?php echo $id; ?>">

	<div class="input-group">
		<label>Room Type</label>
		<input type="text" name="rtype" value="<?php echo $rtype; ?>">
	</div>
	<div class="input-group">
		<label>Number of Beds</label>
		<input type="text" name="beds" value="<?php echo $beds; ?>">
	</div>
	<div class="input-group">
		<label>Ac Condition</label>
		<input type="text" name="ac" value="<?php echo $ac; ?>">
	</div>
	<div class="input-group">
		<label>Cost per Night</label>
		<input type="text" name="cost" value="<?php echo $cost; ?>">
	</div>
	<div class="input-group">

		<?php if ($update == true): ?>
			<button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
		<?php else: ?>
			<button class="btn" type="submit" name="save" >Save</button>
		<?php endif ?>
	</div>
</form>
</body>
</html>