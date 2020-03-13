<?php
require_once 'header.php';

echo<<<_END
<script>
function checkUser(name)
{
    if(name.value=='')
    {
        0('info').innerHTML=''
        return
    }
    params="name="+name.value
    request=new ajaxRequest()
    request.open("POST","checkuser.php, true)
    request.setRequestHeader("Content-type",
    "application/x-www-form-urlencoded)
    request.setRequestHeader("Content-length",params.length)
    request.setRequestHeaeder("Connection","close")

    request.onreadystatechange=function()
    {
        if(this.readyState==4)
        if(this.status==200)
        if(this.responseText !=null)
        0('info').innerHTMl=this.responseText
    }
    request.send(params)
}
function ajaxRequest()
{
    try{var request=new XMlHTTpRequest()}
    catch(e1){
        try{request=new Activexobject("Msxml2.XMLHTTP")}
        catch(e3){
            request=false
        }}}
        return request
}
</script>
<div class='main'><h3>Please enter your details to sign up</h3>
_END;
$request=$name=$error="";
if(isset($_POST['NAME']))
{
    $name=sanitizeString($_POST['NAME']);
    if($name="")
    $error="please enter something";
    else
    {
        $query=queryMysql("SELECT * FROM MOVIES WHERE NAME='$name'");
        $result=$connection->query($query);
        if(!$result) die("Database access failed:".$connection->error);
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
            }
    }
echo<<<_END
<form action='search.php' method='post'>$error<pre>
<span class='fieldname'>NAME:</span>
<input type="text" name="NAME">
<input type="submit" value="SEARCH MOVIE">
</pre></form>
_END;
?>