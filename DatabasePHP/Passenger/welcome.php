<?php
// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: PassLogin.html");
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
    <h1>Hi <b><?php echo htmlspecialchars($_SESSION['username']); ?></b></h1><br><br>
    
    <?php $db = mysqli_connect("localhost", "Team5", "KRbhQX8N")
        or die("Error connecting to MySQL server" . mysqli_error($db));

mysqli_select_db($db , 'Team5') or die ('db will not open');
    $username= htmlspecialchars($_SESSION['username']);
    $query= "SELECT * FROM Passengers WHERE PassUsername='$username'";
    $result= mysqli_query($db,$query) or die("fail");
    $row=mysqli_fetch_array($result);
    
  echo "Profile Image <br>";
  echo "<img src=".$row['PassImage']." width='300px' alt='No Pic' ><br>";
 
    echo "Username: ".$row['PassUsername']."<br><br>";
    echo "Name: ".$row['PassName']."<br><br>";
    echo "Age: ".$row['PassAge']."<br><br>";
    echo "County: ".$row['PassCounty']."<br><br>";
    echo "City: ".$row['PassCity']."<br><br>";
    echo "Email: ".$row['PassEmail']."<br><br>";
   
    
    
    
    ?>
    
    
     <a href="ProfileEdit.php"><h3>Edit Profile</h3></a>
     <a href="../Reservation/myres.php"><h3>My Reservations</h3></a>
   <a href="../logout.php"><h3>Log out</h3></a>
    </body></center>
</html>