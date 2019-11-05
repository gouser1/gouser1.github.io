<?php
// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['drivername']) || empty($_SESSION['drivername'])){
  header("location: ../Driver/DriverLogin.html");
  exit;
}

?>
<!DOCTYPE html>
<html lang="en" >
<head>
    
    <link rel="stylesheet" href="css/style.css">

</head>
<center><body>
 <a href="../../MVP3.html"><img src="../../logo.png" alt="logo"></a>
<h1> Passenger Profile</h1>
    
    <?php $db = mysqli_connect("localhost", "Team5", "KRbhQX8N")
        or die("Error connecting to MySQL server" . mysqli_error($db));

mysqli_select_db($db , 'Team5') or die ('db will not open');
    $username= $_GET['username'];;
    $query= "SELECT * FROM Passengers WHERE PassUsername='$username'";
    $result= mysqli_query($db,$query) or die("fail");
    $row=mysqli_fetch_array($result);
    $email=$row['PassEmail'];
  
  
    echo "Profile Image <br>";
    echo "<img src=".$row['PassImage']." width='300px' alt='No Pic' ><br>";
    echo "Username: ".$row['PassUsername']."<br><br>";
    echo "Name: ".$row['PassName']."<br><br>";
    echo "Age: ".$row['PassAge']."<br><br>";
    echo "County: ".$row['PassCounty']."<br><br>";
    echo "City: ".$row['PassCity']."<br><br>";
    echo "Email: <a href='mailto:$email'>".$email."</a><br><br>";
   
    
    
    
    ?>
    
    
    
    
   <a href="../Driver/welcome.php"><h3 >Back to Profile</h3></a>
    </body></center>
</html>