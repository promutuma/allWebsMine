<?php
$servername="localhost";
$username="bree";
$dbname="bree";
$password="";

$conn = new mysqli($servername,$username,$password,$dbname);

if ($conn->connect_error) {
	die("Connection failed:" . $conn->connect_error);
}

echo "<span class='success'>Server status: Connected</span>";

$sql="CREATE DATABASE SHOP;";



$sql= 
"CREATE TABLE SUPPLY
(SUPPLYID VARCHAR(16) NOT NULL,
 ITEM_NAME VARCHAR(266),
 QUANTITY VARCHAR(266),
 COST_PER_UNIT VARCHAR(266),
 UNITS VARCHAR(266),
 SUPPLIER VARCHAR(266),
 DO_SUPPLY DATE,
 STIME VARCHAR(266),
 DAY VARCHAR(266),
 PRIMARY KEY(SUPPLYID));";

 if ($conn->query($sql)=== TRUE){
 	echo "table created";
 }

 else
"";
  $current_date=date('jS F Y');
$current_day=date('l');
$current_time=date('H:i:s');
 echo "<h5>  Date: $current_date <br>Day: $current_day<br>Time:$current_time  </h5>"

?>