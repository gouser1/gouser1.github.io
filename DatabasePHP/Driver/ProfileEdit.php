<?php
// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['drivername']) || empty($_SESSION['drivername'])){
  header("location: DriverLogin.html");
  exit;
}

?>
<!DOCTYPE html>
<html lang="en" >
<head>
    
    <link rel="stylesheet" href="css/style.css">

</head>
<center><body>
 <a href="../../MVP3.html"><img src="logo.png" alt="logo"></a>
    <h1>Hi <b><?php echo htmlspecialchars($_SESSION['drivername']); ?></b></h1><br><br>
   
    <?php $db = mysqli_connect("localhost", "Team5", "KRbhQX8N")
        or die("Error connecting to MySQL server" . mysqli_error($db));

mysqli_select_db($db , 'Team5') or die ('db will not open');
    $username= htmlspecialchars($_SESSION['drivername']);
    $query= "SELECT * FROM Drivers WHERE DriverUsername='$username'";
    $result= mysqli_query($db,$query) or die("fail");
    $row=mysqli_fetch_array($result);
    

    echo  "<form method='post' action='Edit.php' enctype='multipart/form-data'>";
   
    echo "Username: <input name='username'value=".$row['DriverUsername']."><br><br>";
    echo "Name: <input name='name' maxlength='50'value= ".$row['DriverName']."><br><br>";
    echo "Age:<input name='age'value= ".$row['DriverAge']."><br><br>";
    echo "County: <input name='county'value= ".$row['DriverCounty']."><br><br>";
    echo "City: <input name='city'value=".$row['DriverCity']."><br><br>";
    echo "Email: <input name='email'value=".$row['DriverEmail']."><br><br>";
    echo  "File : <input type='file' name='upload'><br><br>";
    echo "<input type='submit' value='Submit'></form>";
    
    ?>
    
    
   
    </body></center>
</html>