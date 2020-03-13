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
_END;

$error=$name=$type=$date=$genre="";
if(!$loggedin) die();
echo "<div class='main'><span class='message'>Update movies<br><br><br>NB//be careful updates are not editable<br></span>";
if(isset($_POST['NAME']))
{
    $name=sanitizeString($_POST['NAME']);
    $type=sanitizeString($_POST['TYPE']);
    $date=sanitizeString($_POST['DATE']);
    $genre=sanitizeString($_POST['GENRE']);
    if($name==""||$type==""||$date==""||$genre=="")
    $error="<span class='error'><br><br>ERROR----Not all fields were entered<br><br></span>";
    else
    {
        $request=queryMysql("SELECT * FROM MOVIES WHERE NAME='$name'");

        if($request->num_rows)
        $error="<span class='error'><br>$name already available in $appname database</span><br><br>";
    else {
        if(isset($_POST['NAME'])&&
isset($_POST['TYPE'])&&
isset($_POST['DATE'])&&
isset($_POST['GENRE']))
{
    $name=get_post($connection,'NAME');
    $type=get_post($connection,'TYPE');
    $date=get_post($connection,'DATE');
    $genre=get_post($connection,'GENRE');
    $query="INSERT INTO MOVIES VALUES".
    "('$name','$type','$date','$genre')";
    $result=$connection->query($query);
    if(!$result) echo "INSERT failed: $query<br>".
    $connection->error."<br><br>";

    echo "<span class='success'><BR><H3>$name added to $appname database</span></H3>";
    }
}
}
        
    }
echo<<<_END
<form action='home.php' method='post'>$error<pre>
<span class='fieldname'>NAME:</span>
<input type="text" name="NAME">
<span class='fieldname'>TYPE:</span>
<input type="text" name="TYPE">
<span class='fieldname'>DATE:</span>
<input type="DATE" name="DATE">
<span class='fieldname'>GENRE:</span>
<input type="text" name="GENRE"><br><br>
<input type="submit" value="ADD RECORD">
</pre></form>
_END;

$query="SELECT * FROM MOVIES";
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
$result->close();
$connection->close();
function get_post($connection, $var)
{
    return $connection->real_escape_string($_POST[$var]);
}
?>
