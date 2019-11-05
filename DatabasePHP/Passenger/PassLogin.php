<!DOCTYPE html>
<html lang="en" >
<head>
    
    <link rel="stylesheet" href="css/style.css">

</head>
<center><body>
 <a href="../../MVP3.html"><img src="logo.png" alt="logo"></a>
<?php
$username=$_POST['username'];
$pass=trim($_POST['password']);
$password = md5($pass);
  $db = mysqli_connect("localhost", "Team5", "KRbhQX8N")
        or die("Error connecting to MySQL sever" . mysqli_error($db));

mysqli_select_db($db , 'team5') or die ('db will not open');

$enter2= "Select * From Passlogin Where PassUsername = '$username'" ;
$result= mysqli_query($db,$enter2) or die("fail");
$row2=mysqli_fetch_array($result);
$password2=$row2['password'];
$username2=$row2['PassUsername'];
if(($username2==$username)&&($password2==$password)){
    
 session_start();
$_SESSION['username'] = $username;      
header("location: welcome.php");
}
else{
    
   echo "<br><br>Password/Username incorrect<br>";
     echo "<a href='PassLogin.html'>Back to Login</a>";
}

mysqli_close($db);
	?>
   
    </body></center>
</html>