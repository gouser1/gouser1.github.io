<!DOCTYPE html>
<html lang="en" >
<head>
    
    <link rel="stylesheet" href="css/style.css">

</head>
 <center><body>
<a href="../../MVP3.html"><img src="../../logo.png" alt="logo"></a><br><br>
<?php
$id= $_GET['id'];
$pass=$_GET['pass'];
  $db = mysqli_connect("localhost", "Team5", "KRbhQX8N")
        or die("Error connecting to MySQL sever" . mysqli_error($db));

mysqli_select_db($db , 'team5') or die ('db will not open');

$delete1= "Delete From Reservations WHERE BookingID ='$id' AND PassUsername='$pass'";
if ($db->query($delete1) === TRUE ) {
   
 header("location:myres.php");
} else {
    echo "Error: " . $enter . "<br>" . $db->error;
    
}


mysqli_close($db);
	?>
     <a href='BookingForm.php'>Back to Booking</a>
    </body></center>
</html>