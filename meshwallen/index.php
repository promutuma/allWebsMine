<!DOCTYPE html>
<html>
<head>
	<title>New supply</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div>
<a href='index.php'>Add New Item</a>
<a href='supply.php'>Items Supply</a>

</div>






<?php

require_once 'header.php';
$error=$id=$pname=$quantity=$unitprice=$unit=$supplier="";

if (isset($_POST['id'])) {
	$id=$_POST['id'];
	$pname=$_POST['pname'];
	$quantity=$_POST['quantity'];
	$unitprice=$_POST['unitprice'];
	$unit=$_POST['unit'];
	$supplier=$_POST['supplier'];
	$c_date=date('Y-m-j');
	$c_day=date('l');
	$c_time=date('H:i:s');

	$sql= "INSERT INTO `supply` (`SUPPLYID`, `ITEM_NAME`, `QUANTITY`, `COST_PER_UNIT`, `UNITS`, `SUPPLIER`, `DO_SUPPLY`, `STIME`,`DAY`) VALUES ('$id', '$pname', '$quantity', '$unitprice', '$unit', '$supplier','$c_date','$c_time','$c_day')";
		 $result=$conn->query($sql);
    if(!$result){echo "<span class='error'><b>ERROR: <br></b>INSERT FAILED<br> <b> REASON(S):<br></b>$conn->error </span>";} else

    echo "<span class='asuccess'><b> Success:</br><u>$quantity $unit of $pname  </u></b> delivered by <u>$supplier  on<u><b>$c_day  $c_date at $c_time</b></u></span>";
}

?>









<form method="POST" action="index.php">
	<caption>Enter item details below:<br><br></caption>
	Product ID:<br>
	<input type="text" name="id"><br>
	Product Name:<br>
	<input type="text" name="pname"><br>
	Quantity:<br>
	<input type="text" name="quantity"><br>
	Unit Price:<br>
	<input type="text" name="unitprice"><br>
	Units:<br>
	<input type="text" name="unit"><br>
	Supplier:<br>
	<input type="text" name="supplier">	<br><br>
	<input type="submit" name="submit">
</form>


</body>
</html>