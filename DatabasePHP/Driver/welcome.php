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
 <center><a href="../../MVP3.html"><img src="logo.png" alt="logo"></a></center>
<h1>Hi, <b><?php echo htmlspecialchars($_SESSION['drivername']); ?></b></h1><br><br>
    
    
     <?php $db = mysqli_connect("localhost", "Team5", "KRbhQX8N")
        or die("Error connecting to MySQL server" . mysqli_error($db));

mysqli_select_db($db , 'Team5') or die ('db will not open');
    $username= htmlspecialchars($_SESSION['drivername']);
    $query= "SELECT * FROM Drivers WHERE DriverUsername='$username'";
    $result= mysqli_query($db,$query) or die("fail");
    $row=mysqli_fetch_array($result);
    
  
  
 echo "Profile Image<br><img src=".$row['DriverImage']." width='300px' alt='Profile Pic' ><br>";
    echo "Username: ".$row['DriverUsername']."<br><br>";
    echo "Name: ".$row['DriverName']."<br><br>";
    echo "Age: ".$row['DriverAge']."<br><br>";
    echo "County: ".$row['DriverCounty']."<br><br>";
    echo "City: ".$row['DriverCity']."<br><br>";
    echo "Email: ".$row['DriverEmail']."<br><br>";
    echo "Car: ".$row['DriverCar']."<br><br>";
    
    
    
    ?>
    
    
    
    
    
    
    
    
    
    
    
    
    
     <a href="ProfileEdit.php"><h3>Edit Profile</h3></a>
    <a href="../Booking/BookingForm.php"><h3>Create a Booking</h3></a>
    <a href="../Booking/mybookings.php"><h3>My Bookings</h3></a>
   <a href="../logout.php"><h3>Log out</h3></a>
    </body></center>
</html>