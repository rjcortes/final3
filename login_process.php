<!-- Redirect Solution-->
<html>
<header>
<?php

   header( 'Location: https://web.njit.edu/~rjc37/is218_final/task_manager/' ) ;

?>
</header>
</html>





<?php ///The following is the code I was used to validate the login information, despite the changes I was not able to get it to work, in the interest of presenting I had to cut my losses, unfortunately



/*

///PDOConnect
include_once 'pdoConnect.php';

///Session IF
if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['email']))
{
     
 
     <h1>Member Area</h1>
     <p><code><?php = $_SESSION['email']?></code> and your email address is <code><?php=$_SESSION['email']?></code>.</p>
    
    <?php  

}
elseif(!empty($_POST['email']) && !empty($_POST['password']))
{
    $username = mysql_real_escape_string($_POST['email']);
    $password = md5(mysql_real_escape_string($_POST['password']));
     
    $checklogin = mysql_query("SELECT * FROM accounts WHERE email='$email' AND password = '$password'");
     
    if(mysql_num_rows($checklogin) == 1)
    {
        $row = mysql_fetch_array($checklogin);
        $email = $row['email'];
         
        $_SESSION['email'] = $email;
        $_SESSION['email'] = $email;
        $_SESSION['LoggedIn'] = 1;
         
        echo "<h1>Success</h1>";
        echo "<p>We are now redirecting you to the member area.</p>";
        echo "<meta http-equiv='refresh' content='=2;index.php' />";
    }
    else
    {
        echo "<h1>Error</h1>";
        echo "<p>Sorry, your account could not be found. Please <a href=\"index.php\">click here to try again</a>.</p>";
    }
}

*/
    ?>





