<?php
// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location:../Passenger/PassLogin.html");
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
$username=$_SESSION['username'];
  $db = mysqli_connect("localhost", "Team5", "KRbhQX8N")
        or die("Error connecting to MySQL server" . mysqli_error($db));

mysqli_select_db($db , 'Team5') or die ('db will not open');
$query= "SELECT * FROM Bookings Join Reservations on reservations.BookingID =bookings.BookingID WHERE PassUsername='$username'";
$query2= "SELECT * FROM reservations WHERE PassUsername='$username'";
$result2= mysqli_query($db,$query2) or die("fail");
$result= mysqli_query($db,$query) or die("fail");

echo "<br>";

echo "<h3> Your Reservation</h3>";
echo "<br>";
echo "<table class='table-fill'><thead><tr><th class='text-left'>PassUsername</th><th class='text-left'>DriverName</th><th class='text-left'>BookingID</th><th class='text-left''>Delete</th></tr></thead>";
        
while($row2=mysqli_fetch_array($result2) )
{
   
     echo  "<tbody class='table-hover'><tr><td class='text-left'>". $row2['PassUsername'] ."</td>";
     echo "<td class=text-left'><a href='profiles.php?username=".$row2['DriverUsername']."'>" . $row2['DriverUsername'] . "</a></td><td class='text-left'>" . $row2['BookingID']."
     <td class='text-left'><a href='delete.php?id=".$row2['BookingID']."&pass=".$row2['PassUsername']."'>Delete Reservation</a></td></tr></tbody>";
    
   
}
echo "</table><br><br>";
echo "<h3> Booking Information </h3>";
echo "<center><table class='table-fill'><thead><tr><th class='text-left'>BookingID</th><th class='text-left'>DriverUsername</th><th class='text-left'>MeetingPoint</th><th class='text-left'>MeetingDate</th><th class='text-left'>MeetingTime</th><th class='text-left'>NumberofSeats</th><th class='text-left'>Destination</th></tr></thead>";
 
if ($result2==""){
    $result=="";
}else{
while($row=mysqli_fetch_array($result) )
{
   
     echo  "<tbody class='table-hover'><tr><td class='text-left'>". $row['BookingID'] ."</td>";
     echo "<td class='text-left'>". $row['DriverUsername'] ."</td><td class='text-left'>" . $row['MeetingPoint']."<td class='text-left'>". $row['MeetingDate'] ."</td><td class='text-left'>". $row['MeetingTime'] ."</td><td class='text-left'>". $row['NumberofSeats'] ."</td><td class='text-left'>". $row['Destination'] ."</td>
     </tr></tbody>";
    
   
}
}
echo "</table></center><br><br>";


mysqli_close($db);
	?>
    <br>
    <a href="../Passenger/welcome.php">Back To Profile</a>
       </body></center>
</html>