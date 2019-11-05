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
    

    echo  "<form method='post' action='Edit.php' enctype='multipart/form-data'>";
    echo "Username: <input name='username'value=".$row["PassUsername"]."><br><br>";
    echo "Name: <input name='name'value= ".$row['PassName']."><br><br>";
    echo "Age:<input name='age'value= ".$row['PassAge']."><br><br>";
    echo "County: <input name='county'value= ".$row['PassCounty']."><br><br>";
    echo "City: <input name='city'value=".$row['PassCity']."><br><br>";
    echo "Email: <input name='email'value=".$row['PassEmail']."><br><br>";
   echo  "File : <input type='file' name='upload'><br><br>";
    echo "<input type='submit' value='Submit'></form>";
    
    ?>
    
    
   
    </body></center>
</html>