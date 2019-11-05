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
 <a href="../../MVP3.html"><img src="logo.png" alt="logo"></a>
<?php
$username=$_POST['username'];
$name=$_POST['name'];
$county=$_POST['county'];
$age=$_POST['age'];
$city=$_POST['city'];
$email=$_POST['email'];
$old = htmlspecialchars($_SESSION['drivername']);
    
 if(isset($_FILES['upload']))

{

// file name, type, size, temporary name

$file_name = $_FILES['upload']['name'];

$file_type = $_FILES['upload']['type'];

$file_tmp_name = $_FILES['upload']['tmp_name'];

$file_size = $_FILES['upload']['size'];

// target directory



$target_dir = '../image/';
$target_file = $target_dir . basename($_FILES["upload"]["name"]);
// uploading file

move_uploaded_file($_FILES["upload"]["tmp_name"], $target_file);

 }
      
    
    
$db = mysqli_connect("localhost", "Team5", "KRbhQX8N")
 or die("Error connecting to MySQL sever" . mysqli_error($db));

mysqli_select_db($db , 'team5') or die ('db will not open');
$query= "SELECT * FROM Drivers WHERE DriverUserName='$username'";
$result= mysqli_query($db,$query) or die("fail");
$row2=mysqli_fetch_array($result);
$username2=$row2['DriverUsername'];  
if ($username==$old || $username!=$username2 ){
    if ($age<18){
echo "<br><br>You have to be 18 and above to join this service";
}
else {
$enter= "Update drivers set driverUsername='$username',DriverName='$name',DriverAge='$age',DriverCounty='$county',DriverCity='$city',DriverEmail='$email',DriverImage='$target_dir$file_name' WHERE DriverUsername='$old'";
$enter2= "Update driverlogin set driverUsername='$username' Where driverUsername='$old'";

if ($db->query($enter) === TRUE && $db->query($enter2) === TRUE) {
$_SESSION['drivername'] = $username;
    header("location: welcome.php");
} else {
    echo "Error: " . $enter . "<br>" . $db->error;
}


}}else{
    echo "username already exists Try Again";
    
}

mysqli_close($db);

	?>
    <br><br>
   <a href='ProfileEdit.php'>Back to Edit</a>
    </body></center>
</html>