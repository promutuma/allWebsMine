<?php
$servername="localhost";
$username="id11833972_user";
$dbname="id11833972_mutuma";
$password="my.kinya";

$conn = new mysqli($servername,$username,$password,$dbname);

if ($conn->connect_error) {
	die("Connection failed:" . $conn->connect_error);
}

echo "<span class='success'>Server status: Connected</span>";

$sql= 
"CREATE TABLE STUDENT
(ADM VARCHAR(16) NOT NULL,
 FIRST VARCHAR(266),
 MIDDLE VARCHAR(266),
 LAST VARCHAR(266),
 PHONE VARCHAR(266),
 EMAIL VARCHAR(266),
 DOR DATE,
 ADD_TIME VARCHAR(266),
 DAY VARCHAR(266),
 PRIMARY KEY(ADM),
UNIQUE(PHONE),
UNIQUE(EMAIL));";

 if ($conn->query($sql)=== TRUE){
 	echo "table created";
 }

 else

  $current_date=date('jS F Y');
$current_day=date('l');
$current_time=date('H:i:s');
 echo "<h5>  Date: $current_date <br>Day: $current_day<br>Time:$current_time  </h5>"

?>