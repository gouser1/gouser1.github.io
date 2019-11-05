<?php
// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['drivername']) || empty($_SESSION['drivername'])){
  header("location:../Driver/DriverLogin.html");
  exit;
}
?>

<html lang="en" >
<head>
    
   <link rel="stylesheet" href="css/style (2).css">
<meta name="viewport" content="initial-scale=1.0; maximum-scale=1.0; width=device-width;">
</head>
 <center><body>
 <a href="../../MVP3.html"><img src="../../logo.png" alt="logo"></a>

<div class="table-title">

    </div>
<?php
$username=$_SESSION['drivername'];
  $db = mysqli_connect("localhost", "Team5", "KRbhQX8N")
        or die("Error connecting to MySQL server" . mysqli_error($db));

mysqli_select_db($db , 'Team5') or die ('db will not open');

$query= "SELECT * FROM bookings WHERE DriverUsername='$username'";
$result= mysqli_query($db,$query) or die("fail");
$query2= "SELECT * FROM reservations WHERE DriverUsername='$username'";
$result2= mysqli_query($db,$query2) or die("fail");

echo "<br>";
echo "<h3>Your Bookings</h3><br>";
echo "<center><table class='table-fill'><thead><tr><th class='text-left'>BookingID</th><th class='text-left'>DriverName</th><th class='text-left'>MeetingPoint</th><th class='text-left'>MeetingDate</th>
        <th class='text-left'>MeetingTime</th><th class='text-left'>NumberofSeats</th><th class='text-left''>Destination</th><th class='text-left''>Delete</th></tr></thead>";
        
while($row=mysqli_fetch_array($result))
{
   
    echo "<tbody class='table-hover'><tr><td class='text-left'>" . $row['BookingID'] . "</td><td class='text-left'>" . $row['DriverUsername'] . "</td><td class='text-left'>" . $row['MeetingPoint'];
    echo "</td><td class='text-left'>" . $row['MeetingDate'] . "</td><td class='text-left'>" . $row['MeetingTime'] . "</td><td class='text-left'>" . $row['NumberofSeats'] . "</td><td class='text-left'>" . $row['Destination'] ."</td><td class='text-left'><a href='delete.php?id=".$row['BookingID']."'>Delete Booking</a></td></tr></tbody>";
    
   
}
echo "</table></center><br><br>";

echo "<br>";
echo "<h3>Your Passengers</h3><br>";    
echo "<center><table class='table-fill'><thead><tr><th class='text-left'>PassUsername</th><th class='text-left'>DriverName</th><th class='text-left'>BookingID</th></tr></thead>";
        
while($row2=mysqli_fetch_array($result2) )
{
   
     echo  "<tbody class='table-hover'><tr><td class='text-left'><a href='profiles.php?username=".$row2['PassUsername']."'>". $row2['PassUsername'] ."</a></td>";
     echo "<td class=text-left'>" . $row2['DriverUsername'] . "</td><td class='text-left'>" . $row2['BookingID']."
     </tr></tbody>";
    
   
}
echo "</table></center><br><br>";



mysqli_close($db);
	?>
    <br>
    <a href="../Driver/welcome.php">Back to Profile</a>
       </body></center>
</html>