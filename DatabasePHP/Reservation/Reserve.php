<!DOCTYPE html>
<html lang="en" >
<head>
    
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <center> <a href="../../MVP3.html"><img src="../../logo.png" alt="logo"></a></center>
<?php
$id=$_POST['id'];
$pass=$_POST['pass'];
$driver=$_POST['driver'];   

  $db = mysqli_connect("localhost", "Team5", "KRbhQX8N")
        or die("Error connecting to MySQL sever" . mysqli_error($db));

mysqli_select_db($db , 'team5') or die ('db will not open');

$enter= "INSERT INTO reservations(PassUsername,DriverUsername,BookingID) VALUES ('$pass','$driver','$id')";
$select= "Select * FROM Bookings WHERE BookingID='$id'";
$result= mysqli_query($db,$select) or die("fail");
$row=mysqli_fetch_array($result);
$seat=$row["NumberofSeats"];
$seats= $seat-1;
$update="UPDATE Bookings SET NumberofSeats = $seats";
if ($db->query($enter) === TRUE && $db->query($update) === TRUE) {
   
 header("location:myres.php");
} else {
    echo "Error: " . $enter . "<br>" . $db->error;
}


mysqli_close($db);
	?>
    
    </body>
</html>