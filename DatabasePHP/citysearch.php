
<html>
    <head><link rel="stylesheet" href="Booking/css/style (2).css">
<meta name="viewport" content="initial-scale=1.0; maximum-scale=1.0; width=device-width;">
</head>
<center><body>
    <a href="../MVP3.html"><img src="../logo.png" alt="logo"></a><br><br>
    
<?php
$city=$_POST['city'];
$destination=$_POST['destination'];
  $db = mysqli_connect("localhost", "Team5", "KRbhQX8N")
        or die("Error connecting to MySQL sever" . mysqli_error($db));

mysqli_select_db($db , 'Team5') or die ('db will not open');

$query= "SELECT * FROM Bookings WHERE MeetingPoint='$city' AND Destination='$destination'";
$result= mysqli_query($db,$query) or die("fail");

echo "<br>";

echo "<center><table class='table-fill'><thead><tr><th class='text-left'>BookingID</th><th class='text-left'>DriverName</th><th class='text-left'>MeetingPoint</th><th class='text-left'>MeetingDate</th>
        <th class='text-left'>MeetingTime</th><th class='text-left'>NumberofSeats</th><th class='text-left''>Destination</th><th class='text-left''>Click to Book</th></tr></thead>";
        
while($row=mysqli_fetch_array($result))
{
   
    echo "<tbody class='table-hover'><tr><td class='text-left'>" . $row['BookingID'] . "</td><td class='text-left'><a href='reservation/profiles.php?username=".$row['DriverUsername']."'>". $row['DriverUsername'] . "</td><td class='text-left'>" . $row['MeetingPoint'];
    echo "</td><td class='text-left'>" . $row['MeetingDate'] . "</td><td class='text-left'>" . $row['MeetingTime'] . "</td><td class='text-left'>" . $row['NumberofSeats'] . "</td><td class='text-left'>" . $row['Destination'] ."</td><td class='text-left'><a href='Reservation/ReservationForm.php?id=".$row['BookingID']."&driver=".$row['DriverUsername']."'>Book</a></td></tr></tbody>";
    
   
}
echo "</table></center><br><br>";


mysqli_close($db);
	?>

    </body></center>
</html>