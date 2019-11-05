<!DOCTYPE html>
<html lang="en" >
<head>
    
    <link rel="stylesheet" href="css/style.css">

</head>
 <center><body>
<a href="../../MVP3.html"><img src="../../logo.png" alt="logo"></a><br><br>
<?php
$id= $_GET['id'];
$username=htmlspecialchars($_SESSION['drivername']);
  $db = mysqli_connect("localhost", "Team5", "KRbhQX8N")
        or die("Error connecting to MySQL sever" . mysqli_error($db));

mysqli_select_db($db , 'team5') or die ('db will not open');

$delete1= "Delete From Reservations WHERE BookingID ='$id'";
$delete2= "Delete From Bookings WHERE BookingID ='$id'";
$query= "SELECT * FROM drivers WHERE DriverUserName='$username'";
$result= mysqli_query($db,$query) or die("fail");
$row=mysqli_fetch_array($result);
$cancel=$row['DriverCancellations'];
 $new = $cancel+1;   
$update="Update Drivers set DriverCancellations='$new' WHERE DriverUserName='$username'";

if ($db->query($delete1) === TRUE && $db->query($delete2) === TRUE && $db->query($update)=== TRUE ) {
   
 header("location:mybookings.php");
} else {
    echo "Error: " . $enter . "<br>" . $db->error;
    
}


mysqli_close($db);
	?>
     <a href='mybookings.php'>Back to Your Bookings</a>
    </body></center>
</html>