<?php
require_once 'header.php';
echo "<br><span class='main'>Welcome to $appname,<br><br>";
if($loggedin)
echo "<span class='success'$user logged in successfuly thanks.</span>";
else echo "<span class='message'>To make updates please login as admin.</span><br><br><br>
<span class='message'>If you do not have an account contact admin to one create one for you.</span>";
?>
</span>
<?php
$query="SELECT * FROM movies";
$result=$connection->query($query);
if(!$result)die($connection->error);
$rows=$result->num_rows;
echo "<table><tr><th>NAME</th><th>TYPE</th><th>DATE</th><th>GENRE</th></tr>";
for($j=0;$j<$rows;++$j)
{
    $result->data_seek($j);
    $row=$result->fetch_array(MYSQLI_NUM);
    echo "<tr>";
    for($k=0;$k<4;++$k)echo "<td>$row[$k]</td>";
    echo "</tr>";
}
echo "</table>";
$result->close();
$connection->close();
?>
</body>
</html>