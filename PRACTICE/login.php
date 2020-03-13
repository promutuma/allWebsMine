<?php
require_once 'header.php';
echo "<div class='main'><h3><span class='message'>Kindly enter your details to log in</h3></span>";
$error=$user = $pass="";
if (isset($_POST['user']))
{
    $user=sanitizeString($_POST['user']);
    $pass=sanitizeString($_POST['pass']);

    if($user==""||$pass=="")
    $error="<span class='error'>Kindly enter all fields</span><br>";
    else
    {
        $result= queryMYSQL("SELECT USER,PASS FROM MEMBERS WHERE USER='$user' AND PASS='$pass'");
        if($result->num_rows==0)
        {
            $error="<span class='error'>Username/Password invalid</span><br><br>";
        }
        else
        {
            $_SESSION['user']=$user;
            $_SESSION['pass']=$pass;
            die("<span class='success'>You are now logged in. Please <a href='home.php?view=$user'> click here</a> to continue.<br><br></span>");
        }
    }
}
echo<<<_END
<form method='post' action='login.php'>$error
<span class='fieldname'>Username</span>
<input type='text' maxlength='16' name='user' value='$user'><br><br>
<span class='fieldname'>Password</span>
<input type='password' maxlength='16' name='pass' value='$pass'><br><br>
_END;
?>
<br>
<span class='fieldname'>&nbsp;</span>
<input type='submit' value='login'>
</form><br></div>
</body>
</html>