<?php
session_start();
echo "<!DOCTYPE html>\n<html><head>";
require_once 'functions.php';
$userstr='Guest';
if(isset($_SESSION['user']))
{
    $user=$_SESSION['user'];
    $loggedin=TRUE;
    $userstr="$user";
}
else $loggedin=FALSE;

echo " <meta charset='utf-8'/>
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<title>$appname logged as $userstr</title>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<link rel='stylesheet' type='text/css' media='screen' href='style.css'/>
<script src='main.js'></script></head>";

if($loggedin)
echo "<br><ul class='menu'>
<li><a href='home.php?view=$user'>HOME</a></li>
<li><a href ='search.php'>SEARCH MOVIES</a></li>
<li><a href ='signup.php'>NEW ADMIN</a></li>
<li><a href ='logout.php'>LOG OUT</a></li></ul><br>";
else
echo("<br><ul class='menu'>
<li><a href='index.php'>Home</a></li>
<li><a href ='search.php'>SEARCH MOVIES</a></li>
<li><a href='login.php'>Log in as admin</a></li>");
?>