<?php
require_once 'functions.php';

if(isset($_POST['name']))
{
    $user=sanitizeString($_POST['name']);
    $result=queryMysql("SELECT * FROM MEMBERS WHER NAME='$name'");
    if($result->num_rows)
    echo"<span class='taken'>&nbsp;&#x2718;".
    "This username is taken</span>";
    else
    echo"<span class='available'>&nbsp;&#x2718;".
    "This username is available</span>";
}
?>