<?php
// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: ../Passenger/PassLogin.html");
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
<h1>Driver Profile</h1>
    
    <?php $db = mysqli_connect("localhost", "Team5", "KRbhQX8N")
        or die("Error connecting to MySQL server" . mysqli_error($db));

mysqli_select_db($db , 'Team5') or die ('db will not open');
    $username= $_GET['username'];;
    $query= "SELECT * FROM Drivers WHERE DriverUsername='$username'";
    $result= mysqli_query($db,$query) or die("fail");
    $row=mysqli_fetch_array($result);
    $email=$row['DriverEmail'];
  
  
    echo "Profile Image <br>";
  echo "<img src=".$row['DriverImage']." width='300px' alt='No Pic' ><br>";
    echo "Username: ".$row['DriverUsername']."<br><br>";
    echo "Name: ".$row['DriverName']."<br><br>";
    echo "Age: ".$row['DriverAge']."<br><br>";
    echo "County: ".$row['DriverCounty']."<br><br>";
    echo "City: ".$row['DriverCity']."<br><br>";
    echo "Email: <a href='mailto:$email'>".$email."</a><br><br>";
   
    
    
    
    ?>
    
    
    
    
   <a href="../Passenger/welcome.php"><h3>Back to Profile</h3></a>
    </body></center>
</html>