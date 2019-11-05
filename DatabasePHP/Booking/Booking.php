<!DOCTYPE html>
<html lang="en" >
<head>
    
    <link rel="stylesheet" href="css/style.css">

</head>
 <center><body>
<a href="../../MVP3.html"><img src="../../logo.png" alt="logo"></a><br><br>
<?php
$username=$_POST['username'];
$meeting=$_POST['meeting'];
$time=$_POST['time'];
$date=$_POST['date'];
$seats=$_POST['seats'];
$dest=$_POST['dest'];

  $db = mysqli_connect("localhost", "Team5", "KRbhQX8N")
        or die("Error connecting to MySQL sever" . mysqli_error($db));

mysqli_select_db($db , 'team5') or die ('db will not open');

$enter= "INSERT INTO Bookings(DriverUsername,MeetingPoint,MeetingTime,MeetingDate,NumberofSeats,Destination) VALUES ('$username','$meeting','$time','$date','$seats','$dest')";

if ($db->query($enter) === TRUE) {
   
 header("location:mybookings.php");
} else {
    echo "Error: " . $enter . "<br>" . $db->error;
    
}


mysqli_close($db);
	?>
     <a href='BookingForm.php'>Back to Booking</a>
    </body></center>
</html>